<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Admin\category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $category_show = category::where('user_id',Auth::user()->id)->get();
        return view('admin.category.index',compact('category_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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

        $category = new category;
        $category->nom = $request->nom;
        $category->slug = $request->slug;
        $category->user_id = Auth::user()->id;
        $category->save();
        // dd($category);
        return redirect(route('admin.category.index'))->with('message','Votre category a ete ajouter');
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
        $edit_category = category::where('id',$id)->first();
        return view('admin.category.edite',compact('edit_category'));
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

        $category = category::find($id);
        $category->nom = $request->nom;
        $category->slug = $request->slug;
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect(route('admin.category.index'))->with('message','Votre category a ete Modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id',$id)->delete();
        return redirect()->back()->with('message','Votre Category a ete Supprimer');
    }
}
