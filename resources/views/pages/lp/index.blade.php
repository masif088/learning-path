<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Learning Path') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Learning Path</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.lp.index') }}">Data Learning Path</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="lp" :model="$lp" />
    </div>
</x-app-layout>
