<?php

namespace App\Http\Controllers\User;
use App\Model\Admin\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.inscription.index');
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
        //
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
            'genre' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:9|unique:users|numeric',
            'date' => 'required',
            'password' => 'required',
            'addresse' => 'required',
            'image' => 'required',
        ]);

        // $request['password'] = bcrypt($request->password);
        // $user = user::create($request->all());
        // $user->roles()->sync($request->role);
        // return redirect(route('user_inscription'));
         
     
        // dd($request->all());

        $user = new user;
        $user->genre = $request->genre;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->password = bcrypt($request->password);
        $user->addresse = $request->addresse;

        $user->image = $request->image;
             // l'image de l'attestation d'inscription;
             if($request->has('image')){
                //On enregistre l'url dans un dossier
                $url = $request->file('image');
                //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
                $image_name = Str::slug($request->input('name')).'_'.time();
                //Nous enregistrerons nos fichiers dans /uploads/images dans public
                $folder = '/uploads/inscription/';
                //Nous allons enregistrer le chemin complet de l'url dans la BD
                $user->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
                //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
                $this->uploadImage($url, $folder, 'public', $image_name);
            }
                // fin de l'image d'attstation d'inscription

        $user->save();
        return redirect(route('login'))->with('message','Votre inscription a ete enregistre');

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
        //
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
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:9|unique:users|numeric',
            'date' => 'required',
            'addresse' => 'required',
            'image' => 'required',
        ]);
dd($request->all());
        // $request['password'] = bcrypt($request->password);
        // $user = user::create($request->all());
        // $user->roles()->sync($request->role);
        // return redirect(route('user_inscription'));
         
     
        // dd($request->all());

        $user_update = user::where('id','Auth::user()->id');
        $user_update->nom = $request->nom;
        $user_update->prenom = $request->prenom;
        $user_update->email = $request->email;
        $user_update->phone = $request->phone;
        $user_update->date = $request->date;
        $user_update->password = bcrypt($request->password);
        $user_update->addresse = $request->addresse;

        $user_update->image = $request->image;
             // l'image de l'attestation d'inscription;
             if($request->has('image')){
                //On enregistre l'url dans un dossier
                $url = $request->file('image');
                //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
                $image_name = Str::slug($request->input('name')).'_'.time();
                //Nous enregistrerons nos fichiers dans /uploads/images dans public
                $folder = '/uploads/inscription/';
                //Nous allons enregistrer le chemin complet de l'url dans la BD
                $user_update->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
                //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
                $this->uploadImage($url, $folder, 'public', $image_name);
            }
                // fin de l'image d'attstation d'inscription

        $user_update->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
