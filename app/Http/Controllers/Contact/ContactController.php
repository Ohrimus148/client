<?php

namespace App\Http\Controllers\Contact;

use App\Client;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('clients.index');
    }

    public function index()
    {
        return Contact::orderBy('id', 'DESC')->get();
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
        $this->validate($request, [
            'address' => 'required',
            'postcode' => 'required',
       //     'client_id' => 'required'
        ]);
        $create = Contact::create($request->all());
        return response()->json(['status' => 'success','msg'=>'Contact created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Contact::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Contact::find($id);
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
        $this->validate($request, [
            'postcode' => 'required',
            'address' => 'required',
        ]);

        $contact = Contact::find($id);
        if($contact->count()){
            $contact->update($request->all());
            return response()->json(['status'=>'success','msg'=>'Contact updated successfully']);
        } else {
            return response()->json(['status'=>'error','msg'=>'error in updating contact']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::whereIn('id',explode(",",$id));
        if($contact->count()){
            $contact->delete();
            return response()->json(['status'=>'success','msg'=>'Contact deleted successfully']);
        } else {
            return response()->json(['status'=>'error','msg'=>'error in deleting contact']);
        }
    }
}
