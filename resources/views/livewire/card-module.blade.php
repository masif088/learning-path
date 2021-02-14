<div class="container">
    <div x-data="window.__controller.dataTableMainController()" x-init="setCallback();" class="section-body">
        <div class="card pt-4">
            <div class="row ">
                {{--                <div class="col form-inline">--}}
                {{--                    Per Page: &nbsp;--}}
                {{--                    <select wire:model="perPage" class="form-control">--}}
                {{--                        <option>10</option>--}}
                {{--                        <option>20</option>--}}
                {{--                        <option>30</option>--}}
                {{--                        <option>100</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}

                <div class="col">
                    <input wire:model="search" class="form-control" type="text" placeholder="Pencarian...">
                    {{$search}}
                </div>
            </div>
        </div>
        @php($level=-1)
        @php($levelup=-1)
        @foreach($modules as $module)
            @if($level<$module->level)
                @php($levelup=$module->level)
    </div>
    @endif
    @if($level<$module->level)
        @php($level=$module->level)
        <h2 class="section-title">Materi Tingkat {{$level}}</h2>
        <div class="row">
            @endif


            <div class="col-12 col-sm-6 col-md-6 col-lg-4 ">
                <article class="article article-style-b border border-gray-100">
                    <div class="article-header">
                        <div class="" data-background="">
                            <img class="article-image" src="{{asset('img13.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h2><a href="#">{{$module->title}}</a></h2>
                        </div>
                        <div class="row">
                            {{--                            <p>{!! Str::words($module->module,40, '...')!!}</p>--}}
                        </div>
                        <div class="article-cta">
                            <a href="{{route('admin.lp-module.show',[$module->learningPath->slug,$module->slug])}}">Read
                                More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
            <div id="table_pagination" class="py-3">
                {{--            {{ $modules->links() }}--}}
            </div>
        </div>
</div>