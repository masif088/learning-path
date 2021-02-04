<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-input type="text" title="Judul Pengumuman" model="data.title"/>
        <x-textarea title="Isi Pengumuman" model="data.message"/>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
