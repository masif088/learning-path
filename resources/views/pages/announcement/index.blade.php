<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pengumuman') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Pengumuman</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.announcement.index') }}">Data Pengumuman</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="announcement" :model="$announcement" />
    </div>
</x-app-layout>
