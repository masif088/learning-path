@php
    $links = [
        [
            "href" => "admin.dashboard",
            "text" => "Dashboard",
            "is_multi" => false,
        ],
    ];
if(Auth::user()->currentTeam->personal_team!=1){
    $adda=[];
    foreach (Helper::getLearningPath() as $lp){
        $a =["href" => "admin.lp-module.index","attribute" =>$lp->slug, "text" => "$lp->title"];
        array_push($adda,$a);
    }

    $all=[
                    "text" => "Module",
            "is_multi" => true,
        "href"=>[
            [
                "section_text" => "Module",
                    "section_icon" => "fa fa-microphone-alt",
                    "section_list" => $adda

]
],

        ];
    array_push($links,$all);



    if (Auth::user()->hasTeamRole(Auth::user()->currentTeam,'admin') or Auth::user()->hasTeamRole(Auth::user()->currentTeam,'editor')){
        $adda=[];
        $addb=[];
        foreach (Helper::getLearningPath() as $lp){
            $a =["href" => "admin.module.index","attribute" =>$lp->slug, "text" => " $lp->title"];
            $b =["href" => "admin.announcement.index","attribute" =>$lp->slug, "text" => "$lp->title"];
            array_push($adda,$a);
            array_push($addb,$b);
        }

    $all=[
        "text" => "Admin Site ",
         "is_multi" => true,
        "href"=>[
            [
                "section_text" => "Module Site",
                "section_icon" => "fa fa-microphone-alt",
                "section_list" => $adda
                ],
            [
                "section_text" => "Pengumuman Site",
                "section_icon" => "fa fa-microphone-alt",
                "section_list" => $addb
            ]
        ],
    ];
    array_push($links,$all);
    }

    if (Auth::user()->hasTeamRole(Auth::user()->currentTeam,'admin')){

        $add = [
            "href" => [
                [
                    "section_text" => "Learning Path",
                    "section_icon" => "fa fa-microphone-alt",
                    "section_list" => [
                        ["href" => "admin.lp.index","text" => "List Learning Path"],
                        ["href" => "admin.lp.create", "text" => "Tambah Learning Path"]
                    ]
                ],
            ],
            "text" => "Admin Learning Path",
            "is_multi" => true,
        ];
        array_push($links, $add);
    }
    }


    $navigation_links = array_to_object($links)
@endphp
{{--[--}}
{{--"href" => [--}}
{{--[--}}
{{--"section_text" => "User",--}}
{{--"section_list" => [--}}
{{--["href" => "admin.user.index", "text" => "Data User"],--}}
{{--["href" => "admin.user.create", "text" => "Buat User"]--}}
{{--]--}}
{{--]--}}
{{--],--}}
{{--"text" => "User",--}}
{{--"is_multi" => true,--}}
{{--],--}}
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
            <ul class="sidebar-menu">
                <li class="menu-header">{{ $link->text }}</li>
                @if (!$link->is_multi)
                    <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route($link->href) }}"><i
                                    class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                @else
                    @foreach ($link->href as $section)
{{--                        @php--}}
{{--                            $routes = collect($section->section_list)->map(function ($child) {--}}
{{--                                return Request::routeIs($child->href);--}}
{{--                            })->toArray();--}}

{{--                            $is_active = in_array(true, $routes)--}}
{{--                        @endphp--}}

                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="{{$section->section_icon}}"></i> <span>{{ $section->section_text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ isset($child->attribute)?route($child->href,$child->attribute):route($child->href) }}">{{ $child->text }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endforeach
    </aside>
</div>
