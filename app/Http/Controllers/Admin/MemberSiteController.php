<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\LearningPath;
use App\Models\Module;
use App\Models\ModuleRead;
use App\Models\UserLevel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberSiteController extends Controller
{
    public function moduleIndex($slug){
        $lp=LearningPath::whereSlug($slug)->firstOrFail();
        if ($lp->team_id != Auth::user()->currentTeam->id){
            abort(403);
        }
//        $module=Module::whereLearningPathId($lp->id)->get();
        return view('pages.learning-path.index',compact('lp'));
    }

    public function moduleShow($slug,$module){
        $auth=Auth::user();
        $date=Carbon::now();
        $lp=LearningPath::whereSlug($slug)->firstOrFail();
        $moduleBase=$module=Module::whereLearningPathId($lp->id)->whereSlug($module);
        $module=$moduleBase->firstOrFail();
        $mrBase=ModuleRead::whereUserId($auth->id)->whereModuleId($module->id);
        if ($lp->team_id != $auth->currentTeam->id){
            abort(403);
        }
        $ul=UserLevel::whereUserId($auth->id)->whereLearningPathId($lp->id)->first();
        if ($ul==null){
            $ul=UserLevel::create(['user_id'=>$auth->id,'learning_path_id'=>$lp->id,'level'=>1]);
        }

        if ($ul->level<$module->level){
            abort(403);
        }

        $mr=$mrBase->where('month','=',$date->month)->where('year','=',$date->year)->first();
        if ($mr==null){
            $mr=ModuleRead::create(['user_id'=>$auth->id,'module_id'=>$module->id,'month'=>$date->month,'year'=>$date->year,'view'=>1]);
        }else{
            $mr->update(['view'=>$mr->view+1]);
        }

        $moduleLevelUp=$mrBase->get()->groupBy('module_id')->count();
        $moduleTotal=$moduleBase->whereLevel($module->level)->count();
        if ($moduleLevelUp==$moduleTotal){
            $ul->update(['level'=>$module->level+1]);
        }
        return view('pages.learning-path.show',compact('module'));
    }

    public function announcementIndex(){
        return view('pages.announcement-site.index');
    }

    public function announcementShow($id){
        $announcement=Announcement::findOrFail($id);
        if ($announcement->team_id != Auth::user()->currentTeam->id){
            abort(403);
        }
        return view('pages.announcement-site.show',compact('announcement'));
    }

    public function eventIndex(){
        return view('pages.event-site.index');
    }

    public function eventShow($id){
        $event=Event::findOrFail($id);
        if ($event->team_id != Auth::user()->currentTeam->id){
            abort(403);
        }
        return view('pages.event-site.show',compact('event'));
    }
}
