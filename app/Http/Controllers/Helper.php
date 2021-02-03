<?php


namespace App\Http\Controllers;


use App\Models\LearningPath;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class Helper extends Facade
{
    public static function getLearningPath(){
        return LearningPath::whereTeamId(Auth::user()->currentTeam->id)->get();
    }
}