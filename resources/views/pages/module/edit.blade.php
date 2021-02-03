<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah Module') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.module.index',$lp->slug) }}">Module</a></div>
            <div class="breadcrumb-item"><a href="#">Ubah Module</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-module action="update" :dataId="$id" :lp="$lp" />
    </div>
</x-app-layout>
