<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\partenere;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class PartenerController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
     
        return $file;
     } 
    public function index()
    {
        $part_affiche = partenere::all();
        return view('admin.partener.index',compact('part_affiche'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partener.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'nom' => 'required',
            'email' => 'required|email|unique:parteneres',
            'phone' => 'required|min:9|unique:parteneres|numeric',
            'addresse' => 'required',
            'image' => 'required',
            'lien' => 'required|unique:parteneres',
        ]);

        $part = new partenere;
        $part->nom = $request->nom;
        $part->email = $request->email;
        $part->phone = $request->phone;
        $part->addresse = $request->addresse;
        $part->lien = $request->lien;
        $part->image = $request->image;
        // l'image de l'attestation d'inscription;
        if($request->has('image')){
           //On enregistre l'url dans un dossier
           $url = $request->file('image');
           //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
           $image_name = Str::slug($request->input('name')).'_'.time();
           //Nous enregistrerons nos fichiers dans /uploads/images dans public
           $folder = '/uploads/partenaire/';
           //Nous allons enregistrer le chemin complet de l'url dans la BD
           $part->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
           //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
           $this->uploadImage($url, $folder, 'public', $image_name);
       }
           // fin de l'image d'attstation d'inscription
        $part->save();
        return view('admin.partener.index')->with('message','Votre Partenaire a ete ajoute');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_part = partenere::where('id',$id)->first();
        return view('admin.partener.edite',compact('edit_part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validate($request,[
            'nom' => 'required',
            'email' => 'required|email|unique:parteneres',
            'phone' => 'required|min:9|unique:parteneres|numeric',
            'addresse' => 'required',
            'image' => 'required',
            'lien' => 'required|unique:parteneres',
        ]);

        $part = partenere::find($id);
        $part->nom = $request->nom;
        $part->email = $request->email;
        $part->phone = $request->phone;
        $part->addresse = $request->addresse;
        $part->lien = $request->lien;
        $part->image = $request->image;
        // l'image de l'attestation d'inscription;
        if($request->has('image')){
           //On enregistre l'url dans un dossier
           $url = $request->file('image');
           //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
           $image_name = Str::slug($request->input('name')).'_'.time();
           //Nous enregistrerons nos fichiers dans /uploads/images dans public
           $folder = '/uploads/partenaire/';
           //Nous allons enregistrer le chemin complet de l'url dans la BD
           $part->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
           //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
           $this->uploadImage($url, $folder, 'public', $image_name);
       }
           // fin de l'image d'attstation d'inscription
        $part->save();
        return redirect()->back()->with('message','Votre Partenaire a ete Modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        partenere::where('id',$id)->delete();
        return redirect()->back()->with('message','Votre Partenaire a ete supprimer');
    }
}
