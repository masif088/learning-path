<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;

class CardAnnouncement extends Component
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
        $this->model=Announcement::class;
        return Announcement::search($this->search)
            ->orderBy('created_at', 'desc')->get();
//            ->paginate($this->perPage)
    }


    public function render()
    {
        $announcements = $this->get_pagination_data();

        return view('livewire.card-announcement', compact('announcements'));
    }
}
