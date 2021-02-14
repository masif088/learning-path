<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningPath;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LpModuleController extends Controller
{
    public function index($slug){
        $lp=LearningPath::whereSlug($slug)->firstOrFail();
        if ($lp->team_id != Auth::user()->currentTeam->id){
            abort(403);
        }
//        $module=Module::whereLearningPathId($lp->id)->get();
        return view('pages.learning-path.index',compact('lp'));
    }

    public function show($slug,$module){
        $lp=LearningPath::whereSlug($slug)->firstOrFail();
        if ($lp->team_id != Auth::user()->currentTeam->id){
            abort(403);
        }
        $module=Module::whereLearningPathId($lp->id)->whereSlug($module)->firstOrFail();
        return view('pages.learning-path.show',compact('module'));
//        return view('pages.lp.edit', compact('id'));
    }
}
