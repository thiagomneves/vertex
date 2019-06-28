<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return $contacts->toJson();
    }

    public function indexJson()
    {
        $contacts = Contact::paginate(10);
        return $contacts->toJson();
    }

    public function indexJsonSearch($search)
    {
        $contacts = Contact::orWhere('name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%')->paginate(10);
        return $contacts->toJson();
    }

    public function indexView()
    {
        return view('contacts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->cep = $request->input('cep');
        $contact->street = $request->input('street');
        $contact->number = $request->input('number');
        $contact->complement = $request->input('complement');
        $contact->district = $request->input('district');
        $contact->city = $request->input('city');
        $contact->state = $request->input('state');

        $contact->save();

        return $contact->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return $contact->toJson();
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
        return $id;
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
        $contact = Contact::find($id);
        if (isset($contact)) {
            $contact->name = $request->input('name');
            $contact->phone = $request->input('phone');
            $contact->email = $request->input('email');
            $contact->cep = $request->input('cep');
            $contact->street = $request->input('street');
            $contact->number = $request->input('number');
            $contact->complement = $request->input('complement');
            $contact->district = $request->input('district');
            $contact->city = $request->input('city');
            $contact->state = $request->input('state');

            $contact->save();

            return $contact->toJson();
        }
        return response('Contato não encontrado, 404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (isset($contact)) {
            $contact->delete();
            return response('OK', 200);
        }
        return response('Contato não encontrado', 404);
    }
}
