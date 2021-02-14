<?php


namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\LearningPath;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class Helper extends Facade
{
    public static function getLearningPath(){
        return LearningPath::whereTeamId(Auth::user()->currentTeam->id)->get();
    }

    public static function getUsers(){
        return User::get();
    }

    public static function getAllTeam(){
        return Auth::user()->allTeams()->count();
    }

    public static function getCountModule(){
        return Module::whereHas('learningPath',function ($q){
            $q->whereTeamId(Auth::user()->currentTeam->id);
        })->get()->count();
    }
    public static function getCountEvent(){
        return Event::whereTeamId(Auth::user()->currentTeam->id)->get();
    }

}