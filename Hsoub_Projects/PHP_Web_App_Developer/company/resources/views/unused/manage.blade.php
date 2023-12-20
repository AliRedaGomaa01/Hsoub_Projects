@php use Illuminate\Support\Facades\App; $lang1= APP::isLocale("en")?"/en":"/ar" ; @endphp 
@extends("layout")
@section("content")
        <div class="container grid grid-col-1 gap-5">
            <div class="grid justify-center content-center">
                <h3>{{__("eManage header")}}</h1>
            </div>
            
            <ul class="grid justify-start content-center gap-4">
                <li>
                    <div class="grid justify-start content-center">
                        <h3>- {{__("eNew header")}}  <a href={{'/e/create'.$lang1}}>{{__("eNew page")}}</a> </h1>  
                    </div>
                </li>
                <li>
                    <div class="grid justify-start content-center">
                        <h3>- {{__("eModify header")}} </h1>  
                    </div>
                </li>
            </ul>

            <div class="container grid grid-cols-1">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                        <table class="w-full text-sm text-gray-500 dark:text-gray-400 text-center" >
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 text-center">
                                <tr>
                                    <th scope="col-2" class="w-3/4 px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        {{__("ProjectName")}}
                                    </th>
                                    <th scope="col" class="w-1/4 px-6 py-3">
                                        {{__("Show")}}
                                    </th>
                                </tr>
                            </thead>
                            @if (isset($messages))
                            <tbody class="text-center">
                                @foreach ($messages as $message)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row" class=" text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                         $message->message
                                    </th>
                                    <td class=" px-6 py-4">
                                        <a href={{"/e/show/".$message->slug.$lang1}} class="grid justify-items-center">{{__("Show")}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
        </div>
@endsection