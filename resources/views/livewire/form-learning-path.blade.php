<div id="form-create" class=" card p-4" >
    <form wire:submit.prevent="{{$action}}">
        <x-input type="text" title="Judul learning path" model="data.title"/>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
