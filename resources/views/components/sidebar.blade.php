@php
    $links = [
        [
            "href" => "admin.dashboard",
            "text" => "Dashboard",
            "is_multi" => false,
        ],
    ];


    if (Auth::user()->hasTeamRole(Auth::user()->currentTeam,'admin') or Auth::user()->hasTeamRole(Auth::user()->currentTeam,'editor')){

        foreach (Helper::getLearningPath() as $lp){

        $add = [
            "href" => [
                [
                    "section_text" => "Module",
                    "section_icon" => "fa fa-microphone-alt",
                    "section_list" => [
                        ["href" => "admin.module.index","attribute" =>$lp->slug, "text" => "List Module"],
                        ["href" => "admin.module.create","attribute" =>$lp->slug, "text" => "Tambah Module"]
                    ]
                ],
            ],
            "text" => "Learning Path - $lp->title",
            "is_multi" => true,
        ];
        array_push($links, $add);
        }

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
