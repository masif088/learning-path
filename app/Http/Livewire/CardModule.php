<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;

class CardModule extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $lp;
    public $slug;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = ["deleteItem" => "delete_item"];


    public function get_pagination_data()
    {
        $this->model=Module::class;
        return Module::search($this->search,$this->lp)
            ->orderBy('level', 'asc')->get();
//            ->paginate($this->perPage)
    }


    public function render()
    {
        $modules = $this->get_pagination_data();

        return view('livewire.card-module', compact('modules'));
    }
}
