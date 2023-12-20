@extends("layout")
@php use Illuminate\Support\Facades\App; @endphp
@php $lang1= APP::isLocale("en")? "/en":"/ar" ; @endphp 
@section("content") 
    @if(isset($projects))
        @php $count= $projects->count() ; $count1=$count @endphp    
        <div class="container p-3 grid grid-cols-1 md:grid-cols-2 justify-center gap-5" >
            @foreach ($projects as $project)
                <div class="overflow-hidden grid gap-5">
                        <div class="  grid  justify-center ">
                            <div class="">
                                <a href="{{$_ENV["APP_URL"]."/projects/".$project->slug.$lang1}}"><h1 class="text-center ">{{APP::isLocale('ar') ?  $project->nameAr  : $project->nameEn }} </h1></a>
                            </div>
                        </div>
                        <img class="max-h-100 overflow-hidden" src={{$_ENV["APP_URL"]."/ImagesOfProjects/".$project->image}} alt="image of project">

                    @if (($count != 1 && $count1 % 2 != 0) || ($count > 2 && $count1 % 2 == 0))   
                        <div class="grid items-end h-full">
                            <div class=" grid h-[2px] bg-slate-400 left-0"></div>
                        </div>
                    @endif
                </div>
                @php $count-- @endphp
            @endforeach
        </div>
    @endif
@endsection

    