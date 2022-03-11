<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Company;
use App\Models\Contact;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$invoice = Invoice::all();

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

        return view('create.newinvoice', compact(['invoice' => 'invoice'], [' companies' => 'companies'], ['contacts' => 'contacts']));
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

        return redirect('/admin')->with('message', 'The invoice has been added');
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

        return view('edit.editinvoice',  compact(['invoice' => 'invoice'], [' companies' => 'companies'], ['contacts' => 'contacts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
