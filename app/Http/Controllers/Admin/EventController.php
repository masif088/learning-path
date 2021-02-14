<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        return view('pages.event.index', [
            'event' => Event::class
        ]);
    }

    public function create()
    {
        return view('pages.event.create');
    }

    public function edit($id)
    {
        $lp=Event::findOrFail($id);
        if ($lp->team_id != Auth::user()->currentTeam->id){
            abort(403);
        }
        return view('pages.event.edit', compact('id'));
    }
}
