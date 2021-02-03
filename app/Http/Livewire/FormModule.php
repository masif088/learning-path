<?php

namespace App\Http\Livewire;

use App\Models\Module;
use App\Models\ModuleType;
use Illuminate\Support\Str;
use Livewire\Component;

class FormModule extends Component
{
    public $action;
    public $lp;
    public $data;
    public $dataId;
    public $optionType;

    public function mount()
    {
        $this->data['module'] = '';
        $this->data['type'] = '1';
        if ($this->dataId!=null){
            $data=Module::findOrFail($this->dataId);
            $this->data= [
                'title'=>$data->title,
                'type'=>$data->type,
                'level'=>$data->level,
                'slug'=>$data->slug,
                'module'=>$data->module,
            ];
        }
        $this->optionType = eloquent_to_options(ModuleType::get(), 'id', 'title');
    }
    protected function getRules()
    {
        return [
            'data.title'=>'required|max:255',
            'data.level'=>'required|numeric',
            'data.type'=>'required|numeric',
            'data.module'=>'required'
        ];
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->data['learning_path_id']=$this->lp->id;
        $this->data['slug']=Str::slug($this->data['title']);
        Module::create($this->data);

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan module',
        ]);

        $this->emit('redirect', [
            'url' => route('admin.module.index',$this->lp->slug)
        ]);
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->data['slug']=Str::slug($this->data['title']);
        Module::find($this->dataId)->update($this->data);

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengubah module',
        ]);

        $this->emit('redirect', [
            'url' => route('admin.module.index',$this->lp->slug)
        ]);
    }

    public function render()
    {
        return view('livewire.form-module');
    }
}
