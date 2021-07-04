<div>
    <x-data-table :data="$data" :model="$announcements">
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
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($announcements as $announcement)
                <tr x-data="window.__controller.dataTableController({{ $announcement->id }})">
                    <td>{{ $announcement->id }}</td>
                    <td>{{ $announcement->title }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.announcement.edit',$announcement->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" wire:click.prevent="deleteItem({{ $announcement->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
