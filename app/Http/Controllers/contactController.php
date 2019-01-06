<?php

namespace App\Http\Controllers;
use App\User;
use App\Contacts;
use Alert;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Notifications\SingleUser;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.adminOnlyPages.contact')
        ->with('new',Contacts::where('isResponded','=','0')->orderBy('created_at', 'DESC')->get())
        ->with('responded',Contacts::where('isResponded','=','1')->orderBy('created_at', 'DESC')->get());
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
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'message' =>'required',
        //     'phone' => 'numeric|max:11'
        // ]);
        //getting the id of last record
        $l= DB::table('contacts')->latest()->first();
        if ($l != null){
          $lastId=$l->id;
          $id=$lastId+1;
        }else{
          $id = 1;
        }
        $contact = new Contacts;
        $contact->id = $id;
        $contact->email=$request->input('email');
        $contact->phone=$request->input('phone');
        $contact->subject= $request->input('subject');
        $contact->message= $request->input('message');
        $contact->isResponded = '0';
        $contact->save();
        Alert::success('Your Message Submitted.','Done!');
        return redirect('/');

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
        //
    }

    // This function loads the form for responding for emails
    public function replyForm($id)
    {
      return view('pages.adminOnlyPages.replyContact')->with('contact',Contacts::find($id));
    }

    // This function send a reply for contactSubmited
    public function reply(Request $request)
    {
      // Validating the form
      $this->validate($request, [
          'subject' => 'required',
          'message' =>'required'
      ]);
      $contact = Contacts::find($request->input('id'));
      // Notify that contact with email as the respond to the contact
      $subject = $request->input('subject');
      $msg = $request->input('message');
      $contact->notify(new SingleUser($subject,$msg));
      // Turning the isResponded to true in contact
      $contact->isResponded = '1';
      $contact->save();
      //Alert and redirect
      Alert::success('Reply successful','Done');
      return redirect('/contactForm');
    }


}
