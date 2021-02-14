<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah Event') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.event.index') }}">Event</a></div>
            <div class="breadcrumb-item"><a href="#">Ubah Event Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-event action="update" :dataId="$id" />
    </div>
</x-app-layout>
