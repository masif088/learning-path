<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Mail;
use App\Models\MailType;
use App\Models\ModuleType;
use Faker\Provider\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormMail extends Component
{
    use WithFileUploads;
    public $data;
    public $dataId;
    public $thumbnail;
    public $action;
    public $optionType;
    public function mount(){
        $this->data['type']='in';
        $this->optionType = eloquent_to_options(MailType::get(), 'id', 'title');
        if ($this->dataId!=''){
            $data=Mail::findOrFail($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'note'=>$data->note,
                'created_at'=>$data->created_at,
                'file'=>$data->file,
            ];
        }
    }

    protected function getRules()
    {
        if ($this->action == "update") {
            return [
                'data.title' => 'required|max:255',
                'data.no' => 'required|max:255',
                'data.type'=>'required|numeric',
                'data.created_at'=>'required',
                'thumbnail'=>'mimes:pdf,doc,docx,odt'
            ];
        } else {
            return [
                'data.title' => 'required|max:255',
                'data.no' => 'required|max:255',
                'data.type'=>'required|numeric',
                'data.created_at'=>'required',
                'thumbnail'=>'mimes:pdf,doc,docx,odt|required'
            ];
        }
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
//        $this->data['team_id']=Auth::user()->currentTeam->id;

//        $this->data['slug']=Str::slug($this->data['title']);
        $this->data['file'] = md5(rand()) . '.' . $this->thumbnail->getClientOriginalExtension();
        $this->thumbnail->storeAs('public/content', $this->data['file']);


        File::create($this->data);

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
        return view('livewire.form-mail');
    }
}
