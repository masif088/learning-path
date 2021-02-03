<?php

namespace App\Http\Livewire;

use App\Models\LearningPath;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class FormLearningPath extends Component
{
    public $data;
    public $dataId;
    public $action;

    protected function getRules()
    {
        return ['data.title'=>'required'];
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
        $this->data['team_id']=Auth::user()->currentTeam->id;
        $this->data['slug']=Str::slug($this->data['title']);
        LearningPath::create($this->data);

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan learning path',
        ]);

        $this->emit('redirect', [
            'url' => route('admin.lp.index')
        ]);
    }

    public function update(){
        $this->validate();
        $this->resetErrorBag();
        $this->data['slug']=Str::slug($this->data['title']);
        LearningPath::find($this->dataId)->update($this->data);

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengubah learning path',
        ]);

        $this->emit('redirect', [
            'url' => route('admin.lp.index')
        ]);
    }

    public function render()
    {
        return view('livewire.form-learning-path');
    }
}
