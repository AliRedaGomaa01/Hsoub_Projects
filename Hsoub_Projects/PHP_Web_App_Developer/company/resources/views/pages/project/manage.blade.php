@php use Illuminate\Support\Facades\App; $lang1= APP::isLocale("en")?"/en":"/ar" ; @endphp 
@extends("layout")
@section("content")
        <div class="container grid grid-col-1 gap-5">
            <div class="grid justify-center content-center">
                <h3>{{__("pManage header")}}</h1>
            </div>
            
            <ul class="grid justify-start content-center gap-4">
                <li>
                    <div class="grid justify-start content-center">
                        <h3>- {{__("pNew header")}}  <a href={{'/p/create'.$lang1}}>{{__("pNew page")}}</a> </h1>  
                    </div>
                </li>
                <li>
                    <div class="grid justify-start content-center">
                        <h3>- {{__("pModify header")}} </h1>  
                    </div>
                </li>
            </ul>

            <div class="container grid grid-cols-1">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                        <table class="w-full text-sm text-gray-500 dark:text-gray-400 text-center">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 text-center">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        {{__("ProjectName")}}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{__("Edit")}}
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        {{__("Delete")}}                                </th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($projects as $project)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row" class=" text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{App::isLocale("ar")? $project->nameAr : $project->nameEn}}
                                    </th>
                                    <td class=" px-6 py-4">
                                        <a href={{"/p/edit/".$project->slug.$lang1}} class="grid justify-items-center"><img src={{$_ENV["APP_URL"]."/projectImages/pen.png"}} alt="Edit Icon" width="20 px" height="20 px"></a>
                                    </td>
                                    <td class="  px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        <form action={{'/p/delete/' . $project->slug}} method="post" id="fDelete" class="grid justify-items-center">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit"  onclick="return confirm('Are you sure?')"> 
                                                <img onclick="this.parentNode.submit();" src={{$_ENV["APP_URL"]."/projectImages/bin.png"}} alt="Delete Icon" width="20 px" height="20 px">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
@endsection