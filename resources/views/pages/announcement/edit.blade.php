<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah Pengumuman') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.announcement.index') }}">Pengumuman</a></div>
            <div class="breadcrumb-item"><a href="#">Ubah Pengumuman Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-announcement action="update" :dataId="$id" />
    </div>
</x-app-layout>
