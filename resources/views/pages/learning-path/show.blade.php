<x-app-layout>
    <x-slot name="header_content">
        <h1>{{$module->title}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('admin.lp-module.index',$module->learningPath->slug)}}">{{$module->learningPath->title}}</a></div>
            <div class="breadcrumb-item">{{$module->title}}</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl ">

        <div class="p-5">
            <div class="row summernotea" >
                {!! $module->module !!}
            </div>
        </div>
    </div>

</x-app-layout>
