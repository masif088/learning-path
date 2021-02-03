<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah Learning Path') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.lp.index') }}">Learning Path</a></div>
            <div class="breadcrumb-item"><a href="#">Ubah Learning Path Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-learning-path action="update" :dataId="$id" />
    </div>
</x-app-layout>
