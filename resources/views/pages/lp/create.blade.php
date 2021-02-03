<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Learning Path Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.lp.index') }}">Learning Path</a></div>
            <div class="breadcrumb-item"><a href="#">Buat Learning Path Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-learning-path action="create" />
    </div>
</x-app-layout>
