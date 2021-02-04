<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('pages.announcement.index', [
            'announcement' => Announcement::class
        ]);
    }

    public function create()
    {
        return view('pages.announcement.create');
    }

    public function edit($id)
    {
        $lp=Announcement::findOrFail($id);
        if ($lp->team_id != Auth::user()->currentTeam->id){
            abort(403);
        }
        return view('pages.announcement.edit', compact('id'));
    }
}
