<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModuleReadChart extends Component
{
    public $results;
    public $a;
    public $data;
    public $resultsMonth;
    public $total = 0;
    public $totalMonth = 0;
    public $minStep=false;

    public function mount()
    {
        $user=Auth::user();
        $teamId = $user->currentTeam->id;
        $lp = Helper::getLearningPath()->select('id', 'title')->get();

        $a = [];
        foreach ($lp as $l) {
            $a[$l->id]['title'] = $l->title;
            $a[$l->id]['access'] = 0;
            $a[$l->id]['month'] = 0;
        }
//        dd(Auth::user()->teamRole(Auth::user()->currentTeam)->key);
        if ($user->teamRole($user->currentTeam)->key == "admin") {
            $query = "SELECT learning_paths.title,learning_paths.id,month, SUM(module_reads.view) as mr FROM `learning_paths` JOIN modules ON modules.learning_path_id=learning_paths.id left JOIN module_reads on module_reads.module_id=modules.id WHERE team_id='$teamId' GROUP BY learning_paths.title, month,learning_paths.id ";
        }
        else{
            $query = "SELECT learning_paths.title,learning_paths.id,month, SUM(module_reads.view) as mr FROM `learning_paths` JOIN modules ON modules.learning_path_id=learning_paths.id left JOIN module_reads on module_reads.module_id=modules.id WHERE team_id='$teamId' and module_reads.user_id=$user->id GROUP BY learning_paths.title, month,learning_paths.id ";
        }
        $r = DB::select(DB::raw($query));
        foreach ($r as $item) {
            $a[$item->id]['access'] += $item->mr;
            $this->total += $item->mr;
            if ($item->month == Carbon::now()->month) {
                $a[$item->id]['month'] = (int)$item->mr;
                $this->totalMonth += (int)$item->mr;
                $this->minStep= ($this->totalMonth<=10);
            }
        }
        $this->a = $a;
    }

    public function render()
    {
        return view('livewire.module-read-chart');
    }
}
