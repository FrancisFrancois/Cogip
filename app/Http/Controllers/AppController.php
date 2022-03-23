<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Invoice;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {

        return view('layouts.app')
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
