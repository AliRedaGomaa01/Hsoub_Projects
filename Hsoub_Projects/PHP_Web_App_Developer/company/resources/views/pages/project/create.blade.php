@extends("layout")
@section("content")
        <div class="container grid grid-col-1 gap-5">
            <div class="grid justify-center content-center">
                <h3>{{__("pCreate header")}}</h1>
            </div>
            <div class="grid grid-cols-1">
                <div class="container">
                    <form class=" grid grid-cols-1 gap-6 py-5 mx-20 " action="/p/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include("pages.project.form")
                        <div class="grid content-center justify-end">
                            <div class="grid grid-rows-2 gap-2 my-2">
                                <button type="reset" vlaue="Reset" class="  text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">{{__("Reset")}}</button>
                                <button  type="submit" vlaue="Submit" class=" text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"> {{__("Submit")}}  </button>                       
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection