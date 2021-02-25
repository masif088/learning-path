<x-app-layout>
    <x-slot name="header_content">
        <h1>{{__('general.dashboard')}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">{{__('general.dashboard')}}</a></div>
        </div>
    </x-slot>
    <div>
        @php
        $modules=Helper::getModule();
        $events=Helper::getEvent();
        $announcement=Helper::getAnnouncement();
        @endphp

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('general.n_member')}}</h4>
                        </div>
                        <div class="card-body">
                            {{ \App\Models\TeamUser::whereTeamId(Auth::user()->currentTeam->id)->get()->count()+1 }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-chart-bar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('general.n_lp')}}</h4>
                        </div>
                        <div class="card-body">
                            {{Helper::getLearningPath()->count()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('general.n_module')}}</h4>
                        </div>
                        <div class="card-body">
                            {{ $modules->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('general.n_event')}}</h4>
                        </div>
                        <div class="card-body">
                            {{$events->count()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('general.new_module')}}</h4>
                        <div class="card-header-action">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>{{__('general.lp')}}</th>
                                    <th>{{__('general.name_module')}}</th>
                                    <th>{{__('general.latest_update')}}</th>
                                    <th>{{__('general.action')}}</th>
                                </tr>
                                @foreach($modules->take(6)->sortByDesc('created_at') as $module)
                                <tr>
                                    <td class="font-weight-600">{{$module->title}}</td>
                                    <td>{{$module->learningPath->title}}</td>
                                    <td>{{$module->created_at->format('F d, Y')}}</td>
                                    <td>
                                        <a href="{{route('admin.lp-module.show',[$module->learningPath->slug,$module->slug])}}" class="btn btn-primary">{{__('general.detail')}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <div class="card-description">{{__('general.new_announcement')}}</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            @foreach($announcement->sortByDesc('created_at')->take(3) as $e)
                                <a href="{{route('admin.announcement-site.show',$e->id)}}" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>{{$e->title}}</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div class="bullet"></div>
                                        <div class="text-primary">{{$e->created_at->format('F d, Y')}}</div>
                                    </div>
                                </a>

                            @endforeach
                            <a href="{{route('admin.announcement-site.index')}}" class="ticket-item ticket-more">
                                {{__('general.view_all')}} <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="bg-white">
                    <livewire:module-read-chart/>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <h4>{{$events->where('created_at', '>=', \Carbon\Carbon::now()->startOfDay())->count()}}</h4>
                        <div class="card-description">{{__('general.upcoming_events')}}</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            @foreach($events->where('created_at', '>=', \Carbon\Carbon::now()->startOfDay())->sortBy('created_at')->take(3) as $e)
                                <a href="{{route('admin.event-site.show',$e->id)}}" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>{{$e->title}}</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div class="bullet"></div>
                                        <div class="text-primary">{{$e->created_at->format('F d, Y')}}</div>
                                    </div>
                                </a>
                            @endforeach
                            <a href="{{route('admin.event-site.index')}}" class="ticket-item ticket-more">
                                {{__('general.view_all')}} <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>

</x-app-layout>
