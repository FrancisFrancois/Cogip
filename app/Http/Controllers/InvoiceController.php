<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Company;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoices.invoices')
            ->with('invoices', Invoice::orderByRaw('coalesce(updated_at, created_at) DESC')
                ->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = Invoice::all();

        $companies = Company::all(); // fetcher seulement ce qui a besoin

        $contacts = Contact::all();

        return view('create.newinvoice', compact(
            ['invoice' => 'invoice'],
            ['companies' => 'companies'],
            ['contacts' => 'contacts']
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required',
            'created_at' => 'required',
            'contact_id' => 'required'
        ]);

        Invoice::create([
            'invoice_number' => $request->input('invoice_number'),
            'created_at' => $request->input('created_at'),
            'contact_id' => $request->input('contact_id')
        ]);

        Alert::success('Success', 'The invoice has been added');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('invoices.detailinvoice')
            ->with('invoice', Invoice::where('id', $id)
                ->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::all();

        $companies = Company::all(); // fetcher seulement ce qui a besoin

        $invoice = Invoice::where('id', $id)->first();

        return view('edit.editinvoice',  compact(
            ['invoice' => 'invoice'],
            ['companies' => 'companies'],
            ['contacts' => 'contacts']
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_number' => 'required',
            'updated_at' => 'required',
            'contact_id' => 'required'
        ]);

        $invoice = Invoice::where('id', $id)->firstOrFail();

        $invoice->update([
            'invoice_number' => $request->input('invoice_number'),
            'updated_at' => $request->input('updated_at'),
            'contact_id' => $request->input('contact_id')
        ]);

        Alert::success('Success', 'The invoice has been updated');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::where('id', $id)->delete();

        Alert::success('Success', 'The invoice has been deleted');
        return redirect('/admin');
    }
}
