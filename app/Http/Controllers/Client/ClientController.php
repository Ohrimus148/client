<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function home()
    {
        return view('clients.index');
    }

    public function getClientContactsById($id)
    {
         return Contact::where('client_id', $id)->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::with('Contacts')->orderBy('id', 'DESC')->get();
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

    public function importCsv(Request $request)
    {
        $data = $request['customers'];
        $client = new Client;
        $valid_data = $client->getValidatedData($data);
        $invalid_data = $client->getInvalidatedData($data, $valid_data);
        $create = Client::insert($valid_data);
        return response()->json( ['status' => 'success','msg'=>'Clients has been created successfully', 'invalid_data' => $invalid_data] );
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
            'first_name' => 'required',
            'email' => 'required',
        ]);
        $create = Client::create($request->all());
        return response()->json(['status' => 'success','msg'=>'Client created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Client::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $edit = Client::with('contacts')->where('id', $id)->get();

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
            'first_name' => 'required',
            'email' => 'required',
        ]);
        $client = Client::find($id);
        if($client->count()) {
            $client->update($request->all());
            return response()->json(['statur'=>'success','msg'=>'Client updated successfully']);
        } else {
            return response()->json(['statur'=>'error','msg'=>'error in updating client']);
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
        $client = Client::find($id);
        if($client->count()){
            $client->delete();
            return response()->json(['statur'=>'success','msg'=>'Client deleted successfully']);
        } else {
            return response()->json(['statur'=>'error','msg'=>'error in deleting post']);
        }
    }
}
