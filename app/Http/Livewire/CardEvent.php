<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;

class CardEvent extends Component
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
        return Event::search($this->search)
            ->orderBy('created_at', 'desc')->get();
//            ->paginate($this->perPage)
    }


    public function render()
    {
        $events = $this->get_pagination_data();

        return view('livewire.card-event', compact('events'));
    }
}
