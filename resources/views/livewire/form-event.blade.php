<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-input type="text" title="Judul Event" model="data.title"/>
        <x-summernote title="Isi Event" model="data.contents"/>
        <x-date title="Tanggal Kegiatan" model="data.created_at" type="datetimepicker"/>
        <x-input type="file" title="Thumbnail Event" model="thumbnail"/>
        <div wire:loading wire:target="thumbnail">
            Proses upload
        </div>

        @if($action=='create')
            @if($thumbnail)
                <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
            @endif
        @else
            @if($thumbnail)
                <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
            @else
                <img src="{{ asset('storage/content/'.$this->data['thumbnail']) }}" alt="" style="max-height: 300px">
            @endif
        @endif
        <br>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
