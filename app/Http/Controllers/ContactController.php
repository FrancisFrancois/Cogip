<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('contacts.contacts')
            ->with('contacts', Contact::orderBy('lastname')
                ->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        $contacts = Contact::all();

        return view('create.newcontact', compact(['companies' => 'companies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'company_id' => 'required'
        ]);


        Contact::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'company_id' => $request->input('company_id')
        ]);

        Alert::success('Success', 'The contact has been added');
        return redirect('/admin');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contacts.detailcontact')
            ->with('contact', Contact::where('id', $id)
                ->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();

        $contact = Contact::where('id', $id)->first();

        return view('edit.editcontact', compact(['contact' => 'contact', 'companies' => 'companies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'company_id' => 'required'
        ]);


        $contact = Contact::where('id', $id)->firstOrFail();

        $contact->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'company_id' => $request->input('company_id')
        ]);

        Alert::success('Success', 'The contact has been updated');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::where('id', $id)->delete();

        Alert::success('Success', 'The contact has been deleted');
        return redirect('/admin');
    }
}
