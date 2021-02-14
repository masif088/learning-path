<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormEvent extends Component
{
    use WithFileUploads;
    public $data;
    public $dataId;
    public $thumbnail;
    public $action;
    public function mount(){
        if ($this->dataId!=''){
            $data=Event::findOrFail($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'contents'=>$data->message,
                'created_at'=>$data->created_at,
                'thumbnail'=>$data->thumbnail,
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

        $this->data['slug']=Str::slug($this->data['title']);
        $this->data['thumbnail'] = md5(rand()) . '.' . $this->thumbnail->getClientOriginalExtension();
        $this->thumbnail->storeAs('public/content', $this->data['thumbnail']);


        Event::create($this->data);

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan event',
        ]);

        $this->emit('redirect', [
            'url' => route('admin.event.index')
        ]);
    }

    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Event::find($this->dataId)->update($this->data);

        $this->data['slug']=Str::slug($this->data['title_en']);

        if ($this->thumbnail != null) {
            $this->data['thumbnail'] = md5(rand()) . '.' . $this->thumbnail->getClientOriginalExtension();
            $this->thumbnail->storeAs('public/content', $this->data['thumbnail']);
        }

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengubah event',
        ]);

        $this->emit('redirect', [
            'url' => route('admin.event.index')
        ]);
    }

    public function render()
    {
        return view('livewire.form-event');
    }
}
