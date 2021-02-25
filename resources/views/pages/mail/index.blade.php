<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Surat') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Surat</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.mail.index') }}">Data Surat</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="mail" :model="$mail" />
    </div>
</x-app-layout>
