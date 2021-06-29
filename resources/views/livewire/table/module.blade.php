<div>
    <x-data-table :data="$data" :model="$modules">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Title
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('level')" role="button" href="#">
                        Level
                        @include('components.sort-icon', ['field' => 'Level'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('type')" role="button" href="#">
                        module type
                        @include('components.sort-icon', ['field' => 'type'])
                    </a></th>

                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($modules as $module)
                <tr x-data="window.__controller.dataTableController({{ $module->id }})">
                    <td>{{ $module->id }}</td>
                    <td>{{ $module->title }}</td>
                    <td>{{ $module->level }}</td>
                    <td>{{ $module->moduleType->title }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.module.edit',[$module->learningPath->slug,$module->id]) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" wire:click="deleteItem({{$module->id}})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
