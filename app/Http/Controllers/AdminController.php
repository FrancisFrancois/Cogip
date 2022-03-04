<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('layouts.admin')
            ->with('invoices', Invoice::orderByRaw('coalesce(updated_at, created_at) DESC')
                ->limit(5)
                ->get())
            ->with('contacts', Contact::orderByRaw('coalesce(updated_at, created_at) DESC')
                ->limit(5)
                ->get())
            ->with('companies', Company::orderByRaw('coalesce(updated_at, created_at) DESC')
                ->limit(5)
                ->get());
    }
}
