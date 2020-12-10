<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\team;
use App\Model\Admin\statu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Admin\commission;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $personnel_show = team::all();
        return view('admin.team.index',compact('personnel_show'));
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
        $com = commission::all();
        $status = statu::all();
        return view('admin.team.add',compact('com','status'));
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
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:9|unique:users|numeric',
            'commission' => 'required',
            'adresse' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        // $request['password'] = bcrypt($request->password);
        // $user = user::create($request->all());
        // $user->roles()->sync($request->role);
        // return redirect(route('user_inscription'));
         
     
        // dd($request->all());

        $team = new team;
        $team->nom = $request->nom;
        $team->prenom = $request->prenom;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->adresse = $request->adresse;
        $team->commission = $request->commission;
        $team->status = $request->status;

        $team->image = $request->image;
             // l'image de l'attestation d'inscription;
             if($request->has('image')){
                //On enregistre l'url dans un dossier
                $url = $request->file('image');
                //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
                $image_name = Str::slug($request->input('name')).'_'.time();
                //Nous enregistrerons nos fichiers dans /uploads/images dans public
                $folder = '/uploads/team/';
                //Nous allons enregistrer le chemin complet de l'url dans la BD
                $team->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
                //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
                $this->uploadImage($url, $folder, 'public', $image_name);
            }
                // fin de l'image d'attstation d'inscription

        $team->save();
        $team->commissions()->sync($request->commission);
        $team->status()->sync($request->status);
        return redirect(route('admin.team.index'))->with('message','Votre personnel a ete enregistre');
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
        $com = commission::all();
        $status = statu::all();
        $edit_team = team::where('id',$id)->first();
        return view('admin.team.edite',compact('edit_team','com','status'));
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
            'commission' => 'required',
            'adresse' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        // $request['password'] = bcrypt($request->password);
        // $user = user::create($request->all());
        // $user->roles()->sync($request->role);
        // return redirect(route('user_inscription'));
         
     
        // dd($request->all());

        $team = team::find($id);
        $team->nom = $request->nom;
        $team->prenom = $request->prenom;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->adresse = $request->adresse;
        $team->commission = $request->commission;
        $team->status = $request->status;

        $team->image = $request->image;
             // l'image de l'attestation d'inscription;
             if($request->has('image')){
                //On enregistre l'url dans un dossier
                $url = $request->file('image');
                //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
                $image_name = Str::slug($request->input('name')).'_'.time();
                //Nous enregistrerons nos fichiers dans /uploads/images dans public
                $folder = '/uploads/team/';
                //Nous allons enregistrer le chemin complet de l'url dans la BD
                $team->image = $folder.$image_name.'.'.$url->getClientOriginalExtension();
                //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
                $this->uploadImage($url, $folder, 'public', $image_name);
            }
                // fin de l'image d'attstation d'inscription

        $team->save();
        $team->commissions()->sync($request->commission);
        $team->status()->sync($request->status);
        return redirect(route('admin.team.index'))->with('message','Votre personnel a ete modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        team::where('id',$id)->delete();
        return redirect()->back()->with('message','Votre Personnel a ete supprimer');
    }
}
