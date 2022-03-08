<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Contact;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.companies')
            ->with('companies', Company::orderBy('name')
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

        return view('create.newcompany', compact('companies', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'vat_number' => 'required',
            'category' => 'required'
        ]);

        Company::create([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'vat_number' => $request->input('vat_number'),
            'category' => $request->input('category')
        ]);

        return redirect('/admin')->with('message', 'The company has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('companies.detailcompany')
            ->with('company', Company::where('id', $id)
                ->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::where('id', $id)->first();

        return view('edit.editcompany', compact(['companies' => 'companies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'vat_number' => 'required',
            'category' => 'required'
        ]);

        $company = Company::where('id', $id)->firstOrFail();

        $company->update([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'vat_number' => $request->input('vat_number'),
            'category' => $request->input('category')
        ]);

        return redirect('/admin')->with('message', 'The company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::where('id', $id)->delete();
        return redirect('/companies')->with('message', 'The company has been deleted');
    }
}
