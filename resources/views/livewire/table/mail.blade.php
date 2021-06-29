<div>
    <x-data-table :data="$data" :model="$mails">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prmail="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prmail="sortBy('title')" role="button" href="#">
                    Judul Surat
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prmail="sortBy('no')" role="button" href="#">
                        Nomer Surat
                        @include('components.sort-icon', ['field' => 'no'])
                    </a></th>
                <th><a wire:click.prmail="sortBy('type')" role="button" href="#">
                        Jenis Surat
                        @include('components.sort-icon', ['field' => 'type'])
                    </a></th>
                <th><a wire:click.prmail="sortBy('created_at')" role="button" href="#">
                        Tangal surat in/out
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>

                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($mails as $mail)
                <tr x-data="window.__controller.dataTableController({{ $mail->id }})">
                    <td>{{ $mail->id }}</td>
                    <td>{{ $mail->title }}</td>
                    <td>{{ $mail->no }}</td>
                    <td>{{ $mail->mailType->title }}</td>
                    <td>{{ $mail->created_at->format('F d, Y') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.mail.edit',$mail->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
