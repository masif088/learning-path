<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormAnnouncement extends Component
{
    public $data;
    public $dataId;
    public $action;
    public function mount(){
        if ($this->dataId!=''){
            $data=Announcement::findOrFail($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'message'=>$data->message,
            ];
        }
    }

    protected function getRules()
    {
        return ['data.title'=>'required'];
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
        $this->data['team_id']=Auth::user()->currentTeam->id;
        Announcement::create($this->data);

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan Pengumuman',
        ]);

        $this->emit('redirect', [
            'url' => route('admin.announcement.index')
        ]);
    }

    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Announcement::find($this->dataId)->update($this->data);

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengubah pengumuman',
        ]);

        $this->emit('redirect', [
            'url' => route('admin.announcement.index')
        ]);
    }

    public function render()
    {
        return view('livewire.form-announcement');
    }
}
