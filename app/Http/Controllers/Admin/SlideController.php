<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Admin\category;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class SlideController extends Controller
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
        $slid_show = slider::all();
        return view('admin.slider.index',compact('slid_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add');
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
            'image' => 'required',
        ]);

        $slider = new slider;
        $slider->image = $request->image;
        // l'image de l'attestation d'inscription;
        if($request->has('image')){
           //On enregistre l'url dans un dossier
           $url = $request->file('image');
           //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
           $image_name = Str::slug($request->input('name')).'_'.time();
           //Nous enregistrerons nos fichiers dans /uploads/images dans public
           $folder = '/uploads/Slider/';
           //Nous allons enregistrer le chemin complet de l'url dans la BD
           $slider->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
           //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
           $this->uploadImage($url, $folder, 'public', $image_name);
       }
           // fin de l'image d'attstation d'inscription
        $slider->save();
        // dd($category);
        return redirect(route('admin.slider.index'))->with('message','Votre slide a ete ajouter');
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
        $edit_slider = slider::where('id',$id)->first();
        return view('admin.slider.edite',compact('edit_slider'));
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
            'image' => 'required',
        ]);

        $slider = slider::find($id);
        $slider->image = $request->image;
        // l'image de l'attestation d'inscription;
        if($request->has('image')){
           //On enregistre l'url dans un dossier
           $url = $request->file('image');
           //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
           $image_name = Str::slug($request->input('name')).'_'.time();
           //Nous enregistrerons nos fichiers dans /uploads/images dans public
           $folder = '/uploads/Slider/';
           //Nous allons enregistrer le chemin complet de l'url dans la BD
           $slider->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
           //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
           $this->uploadImage($url, $folder, 'public', $image_name);
       }
           // fin de l'image d'attstation d'inscription
        $slider->save();
        // dd($category);
        return redirect(route('admin.slider.index'))->with('message','Votre slide a ete Modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        slider::where('id',$id)->delete();
        return redirect()->back()->with('message','Votre slider a ete Supprimer');
    }
}
