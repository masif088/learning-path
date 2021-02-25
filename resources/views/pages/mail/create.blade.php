<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Surat Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.mail.index') }}">Surat</a></div>
            <div class="breadcrumb-item"><a href="#">Buat Surat Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-mail action="create" />
    </div>
</x-app-layout>
