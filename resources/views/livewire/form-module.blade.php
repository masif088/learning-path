<div id="form-create" class=" card p-4" >
    <form wire:submit.prevent="{{$action}}">
        <x-input title="Judul module" model="data.title" type="text"/>
        <x-input title="Level" model="data.level" type="number"/>
        <x-select title="Tipe module" model="data.type" :selected="$data['type']" :options="$optionType"/>
        <x-summernote title="Materi atau diskripsi tugas" model="data.module"/>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
