<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningPath;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningPathController extends Controller
{
    
    public function index()
    {
        return view('pages.lp.index', [
            'lp' => LearningPath::class
        ]);
    }

    public function create()
    {
        return view('pages.lp.create');
    }

    public function edit($id)
    {
        $lp=LearningPath::findOrFail($id);
        if ($lp->team_id != Auth::user()->currentTeam->id){
            abort(403);
        }
        return view('pages.lp.edit', compact('id'));
    }


}
