<div id="form-create" class=" card p-4" >
    <form wire:submit.prevent="{{$action}}">
        <x-input type="text" title="Judul module" model="data.title"/>
        <x-input type="number" title="Level" model="data.level"/>
        <x-select :options="$optionType" title="Tipe module" model="data.type" :selected="$data['type']"/>
        <x-summernote title="Materi atau diskripsi tugas" model="data.module"/>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
