<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Module') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Module</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.module.index',$lp->slug) }}">Data Module</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="module" :model="$module" type="{{$lp->id}}" slug="{{$lp->slug}}" />
    </div>
</x-app-layout>
