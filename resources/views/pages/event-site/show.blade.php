<x-app-layout>
    <x-slot name="header_content">
        <h1>{{$event->title}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('admin.event-site.index')}}">Pengumuman</a></div>
            <div class="breadcrumb-item">{{$event->title}}</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl ">

        <div class="p-5">
            <div class="row" >
                {!! $event->contents !!}
            </div>
        </div>
    </div>

</x-app-layout>
