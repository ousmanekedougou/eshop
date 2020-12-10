<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\social;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
class SocialController extends Controller
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
        $social_show = social::all();
        return view('admin.social.index',compact('social_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.add');
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
            'lien' => 'required|unique:socials',
            'image' => 'required',
        ]);

        $social = new social;
        $social->nom = $request->nom;
        $social->lien = $request->lien;
        
        $social->image = $request->image;
        // l'image de l'attestation d'inscription;
        if($request->has('image')){
           //On enregistre l'url dans un dossier
           $url = $request->file('image');
           //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
           $image_name = Str::slug($request->input('name')).'_'.time();
           //Nous enregistrerons nos fichiers dans /uploads/images dans public
           $folder = '/uploads/Social/';
           //Nous allons enregistrer le chemin complet de l'url dans la BD
           $social->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
           //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
           $this->uploadImage($url, $folder, 'public', $image_name);
       }
           // fin de l'image d'attstation d'inscription
        $social->save();
        return redirect(route('admin.social.index'))->with('message','Votre reseau a ete ajouter');
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
        $edit_social = social::where('id',$id)->first();
        return view('admin.social.edite',compact('edit_social'));
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
            'lien' => 'required|unique:socials',
            'image' => 'required',
        ]);

        $social =  social::find($id);
        $social->nom = $request->nom;
        $social->lien = $request->lien;
        
        $social->image = $request->image;
        // l'image de l'attestation d'inscription;
        if($request->has('image')){
           //On enregistre l'url dans un dossier
           $url = $request->file('image');
           //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
           $image_name = Str::slug($request->input('name')).'_'.time();
           //Nous enregistrerons nos fichiers dans /uploads/images dans public
           $folder = '/uploads/Social/';
           //Nous allons enregistrer le chemin complet de l'url dans la BD
           $social->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
           //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
           $this->uploadImage($url, $folder, 'public', $image_name);
       }
           // fin de l'image d'attstation d'inscription
        $social->save();
        return redirect(route('admin.social.index'))->with('message','Votre reseau a ete Modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        social::where('id',$id)->delete();
        return redirect()->back()->with('message','Votre reseau a ete Supprimer');
    }
}
