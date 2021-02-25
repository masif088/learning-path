<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function index()
    {
        return view('pages.mail.index', [
            'mail' => Mail::class
        ]);
    }

    public function create()
    {
        return view('pages.mail.create');
    }

    public function edit($id)
    {
        return view('pages.mail.edit', compact('id'));
    }
}
