@extends("layout")
@php use Illuminate\Support\Facades\App; @endphp
@section("content")       

            <div class="container p-3 grid grid-cols-1 items-center justify-center gap-5" >
                <div class="overflow-hidden grid gap-5  ">
                    <div class="  grid content-center justify-center ">
                        <div class="">
                            <h1 class="text-center ">{{APP::isLocale('ar') ?  $project->nameAr  : $project->nameEn }} </h1>
                        </div>
                    </div>
                    <img class="w-full " src={{$_ENV["APP_URL"]."/ImagesOfProjects/".$project->image}} alt="image of project">
                    <div class="  grid content-center justify-center  gap-5   ">
                        <div class="">
                            <h2 class="text-justify " >{{APP::isLocale('ar') ? $project->headerAr : $project->headerEn }}</h2>
                        </div>
                        <div class="">
                                <div class=" text-justify ">{{APP::isLocale('ar') ?  $project->descriptionAr : $project->descriptionEn }}</div>
                        </div>
                    </div >
                </div>
            </div>
    

@endsection

    