{{--@php--}}
{{--    $links = [--}}
{{--        [--}}
{{--            "text" => "Dashboard",--}}
{{--            "is_multi" => false,--}}
{{--            "href"=>[--}}
{{--            ["href" => "admin.dashboard","text" => "Dashboard","icon"=>"fas fa-fire"],--}}
{{--            --}}
{{--            ]--}}
{{--        ],--}}
{{--    ];--}}

{{--    if(Auth::user()->role=='1'){--}}
{{--        $adda=[--}}
{{--                "text" => "Laos Site",--}}
{{--                "is_multi" => false,--}}
{{--                "href"=>[--}}
{{--                [ "href"=>"admin.mail.index","text" => "Mail","icon"=>"fa fa-envelope"],--}}
{{--                ],--}}
{{--              ];--}}
{{--        array_push($links,$adda);--}}
{{--    }--}}

{{--    if(Auth::user()->currentTeam->personal_team!=1){--}}
{{--        $adda=[];--}}
{{--        foreach (Helper::getLearningPath()->get() as $lp){--}}
{{--            $a =["href" => "admin.lp-module.index","attribute" =>$lp->slug, "text" => "$lp->title"];--}}
{{--            array_push($adda,$a);--}}
{{--        }--}}
{{--        $all=[--}}
{{--            "text" => "Module",--}}
{{--            "is_multi" => true,--}}
{{--            "href"=>[--}}
{{--                [--}}
{{--                    "section_text" => "Module",--}}
{{--                    "section_icon" => "fa fa-book",--}}
{{--                    "section_list" => $adda--}}
{{--                ]--}}
{{--            ],--}}
{{--        ];--}}
{{--        array_push($links,$all);--}}
{{--        if (Auth::user()->hasTeamRole(Auth::user()->currentTeam,'admin') or Auth::user()->hasTeamRole(Auth::user()->currentTeam,'editor')){--}}
{{--            $adda=[];--}}
{{--            $addb=[];--}}
{{--            foreach (Helper::getLearningPath()->get() as $lp){--}}
{{--                $a =["href" => "admin.module.index","attribute" =>$lp->slug, "text" => " $lp->title"];--}}
{{--                $b =["href" => "admin.announcement.index","attribute" =>$lp->slug, "text" => "$lp->title"];--}}
{{--                array_push($adda,$a);--}}
{{--                array_push($addb,$b);--}}
{{--            }--}}
{{--            $all=[--}}
{{--                "text" => "Admin Site ",--}}
{{--                 "is_multi" => true,--}}
{{--                "href"=>[--}}
{{--                    [--}}
{{--                        "section_text" => "Module Site",--}}
{{--                        "section_icon" => "fa fa-book",--}}
{{--                        "section_list" => $adda--}}
{{--                        ],--}}
{{--                    [--}}
{{--                        "section_text" => "Pengumuman Site",--}}
{{--                        "section_icon" => "fas fa-bullhorn",--}}
{{--                        "section_list" => $addb--}}
{{--                    ]--}}
{{--                ],--}}
{{--            ];--}}
{{--            array_push($links,$all);--}}
{{--        }--}}

{{--        if (Auth::user()->hasTeamRole(Auth::user()->currentTeam,'admin')){--}}
{{--            $add = [--}}
{{--                "href" => [--}}
{{--                    [--}}
{{--                        "section_text" => "Learning Path",--}}
{{--                        "section_icon" => "fa fa-chart-area",--}}
{{--                        "section_list" => [--}}
{{--                            ["href" => "admin.lp.index","text" => "List Learning Path"],--}}
{{--                            ["href" => "admin.lp.create", "text" => "Tambah Learning Path"]--}}
{{--                        ]--}}
{{--                    ],--}}
{{--                    [--}}
{{--                        "section_text" => "Event",--}}
{{--                        "section_icon" => "fas fa-calendar-alt",--}}
{{--                        "section_list" => [--}}
{{--                            ["href" => "admin.event.index","text" => "List Event"],--}}
{{--                            ["href" => "admin.event.create", "text" => "Tambah Event"]--}}
{{--                        ]--}}
{{--                    ],--}}
{{--                ],--}}
{{--                "text" => "Admin Learning Path",--}}
{{--                "is_multi" => true,--}}
{{--            ];--}}
{{--            array_push($links, $add);--}}
{{--        }--}}
{{--    }--}}


{{--    $navigation_links = array_to_object($links)--}}
{{--@endphp--}}

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{__('general.dashboard')}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{__('general.dashboard')}}</li>
            <li>
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fire"></i><span>{{__('general.dashboard')}}</span>
                </a>
            </li>
            @if(Auth::user()->role=='1')
                <li class="menu-header">Laos Site</li>
                <li>
                    <a class="nav-link" href="{{route('admin.mail.index')}}">
                        <i class="fa fa-envelope"></i><span>Mail</span>
                    </a>
                </li>

            @endif
            @if(Auth::user()->currentTeam->personal_team!=1)
            <li class="menu-header">{{__('general.learning-site')}}</li>
            <li>
                <a class="nav-link" href="{{route('admin.event-site.index')}}">
                    <i class="fas fa-calendar-alt"></i><span>{{__('general.event')}}</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.announcement-site.index')}}">
                    <i class="fas fa-bullhorn"></i><span>{{__('general.announcement')}}</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-book"></i> <span>{{__('general.module_site')}}</span>
                </a>
                <ul class="dropdown-menu">
                    @foreach (Helper::getLearningPath()->get() as $lp)
                        <li class="">
                            <a class="nav-link" href="{{route('admin.lp-module.index',$lp->slug)}}">{{ $lp->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>

            @if (Auth::user()->hasTeamRole(Auth::user()->currentTeam,'admin') or Auth::user()->hasTeamRole(Auth::user()->currentTeam,'editor'))
            <li class="menu-header">{{__('general.admin_site')}}</li>
            <li>
                <a class="nav-link" href="{{route('admin.event.index')}}">
                    <i class="fas fa-calendar-alt"></i><span>{{__('general.event')}}</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.announcement.index')}}">
                    <i class="fas fa-bullhorn"></i><span>{{__('general.announcement')}}</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-book"></i> <span>{{__('general.module_site')}}</span>
                </a>
                <ul class="dropdown-menu">
                    @foreach (Helper::getLearningPath()->get() as $lp)
                        <li class="">
                            <a class="nav-link" href="{{route('admin.module.index',$lp->slug)}}">{{ $lp->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @endif
            @if (Auth::user()->hasTeamRole(Auth::user()->currentTeam,'admin'))
            <li class="menu-header">{{__('general.super_admin_site')}}</li>
            <li>
                <a class="nav-link" href="{{route('admin.lp.index')}}">
                    <i class="fa fa-bar-chart"></i><span>{{__('general.lp')}}</span>
                </a>
            </li>
            @endif
            @endif
        </ul>
    </aside>
</div>
