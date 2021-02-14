<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-input type="text" title="Judul Surat" model="data.title"/>
        <x-input type="text" title="Nomer Surat" model="data.no"/>
        <x-select title="Tipe Surat" model="data.type" :selected="$data['type']" :options="$optionType"/>
        <x-textarea title="keterangan" model="data.note"/>
        <x-date title="Tanggal Masuk atau Keluar" model="data.created_at" type="datetimepicker"/>
        <x-input type="file" title="File Surat" model="thumbnail"/>
        <div wire:loading wire:target="thumbnail">
            Proses upload
        </div>
        <br>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
