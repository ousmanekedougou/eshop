<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Model\Admin\tag;
use Illuminate\Support\Str;
use App\Model\Admin\produit;
use Illuminate\Http\Request;
use App\Model\Admin\category;
use App\Model\Admin\user;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
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
    public function index()
    {
        $produit_show = produit::where('user_id',Auth::user()->id)->get();
        return view('admin.produit.index',compact('produit_show'));
    }


    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
     
        return $file;
     } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = tag::where('user_id',Auth::user()->id)->get();
        $category = category::where('user_id',Auth::user()->id)->get();
        return view('admin.produit.add',compact('tag','category'));
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
            'genre' => 'required|numeric',
            'nom' => 'required',
            'age' => 'required|numeric',
            'tag' => 'required',
            'category' => 'required',
            'detail' => 'required',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'prix' => 'required|numeric'
        ]);
        $produit = new produit;
        $produit->genre = $request->genre;
        $produit->nom = $request->nom;
        $produit->age = $request->age;
        $produit->detail = $request->detail;
        $produit->prix = $request->prix;
        $produit->user_id = Auth::user()->id;
        $produit->user_phone = Auth::user()->phone;
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/produit');
        }
        $produit->image = $imageName;
        $produit->save();
        $produit->tags()->sync($request->tag);
        $produit->categories()->sync($request->category);
        return redirect(route('admin.produit.index'))->with('message','Votre produit a ete enregistre');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = produit::with('tags','categories')->where('id',$id)->first();
        $tag = tag::all();
        $category = category::all();
        return view('admin.produit.edite',compact('edit','tag','category'));
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
            'genre' => 'required|numeric',
            'nom' => 'required',
            'age' => 'required|numeric',
            'tag' => 'required',
            'category' => 'required',
            'detail' => 'required',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'prix' => 'required|numeric',
        ]);
        $produit = produit::find($id);
        $produit->genre = $request->genre;
        $produit->nom = $request->nom;
        $produit->age = $request->age;
        $produit->detail = $request->detail;
        $produit->prix = $request->prix;
        $produit->user_id = Auth::user()->id;
        $produit->user_phone = Auth::user()->phone;
    
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/produit');
        }
        $produit->image = $imageName;
        // fin de l'image d'attstation d'inscription
        $produit->save();
        $produit->tags()->sync($request->tag);
        $produit->users()->sync($request->user);
        $produit->categories()->sync($request->category);
        return redirect(route('admin.produit.index'))->with('message','Votre produit a ete enregistre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        produit::where('id',$id)->delete();
        return redirect()->back();
    }
}


// if($request->hasFile('image'))
// {
//     $imageName = $request->image->store('/produit');
// }
// $produit->image = $imageName;