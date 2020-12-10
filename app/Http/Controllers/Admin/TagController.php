<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
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
        $tag_show = tag::where('user_id',Auth::user()->id)->get();
        return view('admin.tag.index',compact('tag_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.add');
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
            'slug' => 'required',
        ]);

        $tag_add = new tag;
        $tag_add->nom = $request->nom;
        $tag_add->slug = $request->slug;
        $tag_add->user_id = Auth::user()->id;
        $tag_add->save();
        return redirect(route('admin.tag.index'))->with('message','Votre tag a ete ajouter');
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
        $edit_tag = tag::where('id',$id)->first();
        return view('admin.tag.edite',compact('edit_tag'));
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
            'slug' => 'required',
        ]);

        $tag = tag::find($id);
        $tag->nom = $request->nom;
        $tag->slug = $request->slug;
        $tag->user_id = Auth::user()->id;
        $tag->save();
        return redirect(route('admin.tag.index'))->with('message','Votre tag a ete Modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tag::where('id',$id)->delete();
        return redirect()->back()->with('message','Votre Category a ete Supprimer');
    }
}
