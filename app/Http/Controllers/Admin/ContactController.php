<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\contact;
use Illuminate\Http\Request;
use App\Model\User\newsleter;
use MercurySeries\Flashy\Flashy;
use App\Mail\ContactMessageCreated;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
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
    public function index() {
        $contact = contact::paginate(15);
        $contact1 = newsleter::paginate(15);
        return view('admin.contact.index',compact('contact','contact1'));
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
        $mailabe =  new ContactMessageCreated($request->nom,$request->email,$request->sms);
        Mail::to('eshop@gmail.com')->send($mailabe);
        Flashy::message('Nous vous repondrons dans les brefs delais');
        return redirect()->route('admin.contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $show = contact::where('id',$id)->first();
        $edit = contact::where('id',$id)->first();
        $edit->lire = $request->input('1');
        $edit->save();
         return view('admin.contact.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $send = contact::where('id',$id)->first();
        return view('admin.contact.send',compact('send'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        contact::where('id',$id)->delete();
        return redirect()->back();
    }
}
