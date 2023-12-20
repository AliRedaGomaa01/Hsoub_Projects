@extends("pages.email.layout")

@section("head")
    @include('pages.email.head')
@endsection

@section('nav')
    <div class="write">
        @include("parts.nav")
    </div>
@endsection

@section('emailContent')
    <div class="write grid grid-cols-1">
        <div class="container">
            <form class=" grid grid-cols-1 gap-6 py-5 mx-20 " action="/e/create" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-3">
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("The subject of the email")}}</label>
                    <input type="text" id="subject" name="subject" class="@error('subject') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __("The subject of the email") }}">
                        @error('subject') <div class="alert alert-danger">{{ $message }}</div> @enderror 
                </div>
                <div class="grid grid-cols-1 gap-3">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("The html text of the email")}}</label>
                    <textarea id="message" name="message" rows="7" class="@error('message') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __("The html text of the email") }}" ></textarea>
                        @error('message') <div class="alert alert-danger">{{ $message }}</div> @enderror 
                </div>
                <div class="grid content-center justify-end">
                    <div class="">
                        <button type="reset" vlaue="Reset" class="  text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">{{__("Reset")}}</button>
                        <button type="submit" vlaue="Submit"   class=" text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{__("Submit")}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="txt" class="test grid hidden" >
            {{-- @php  $message = "<ppp> <divvv> <h1> test </h1> <p> test </p> <//p//>" @endphp --}}
    </div>
@endsection

@section('button')
     <div class="container py-2 grid px-3">
            <div class="write grid justify-center justify-items-center">
                <button id="testbtn" class="btn btn-primary bg-blue-600 w-[200px] rounded-full">{{__('Test Mode')}}</button>
            </div>
            <div class="test grid justify-center justify-items-center hidden">
                <button class=" btn btn-primary bg-blue-600 w-[200px] rounded-full">{{__('Unsubscribe')}}</button>
            </div>
            <div  id="writebtn" class="test fixed top-20 left-20 hidden">
                <button class=" btn btn-primary bg-blue-600 w-[200px] rounded-full">{{__('Write Mode')}}</button>
            </div>
    </div>   
@endsection

@section('script')
    <script>
    $(document).ready(()=>{
        $("#testbtn").click(function (e) { 
                e.preventDefault();
                let message = $("#message").val();
                console.log(message);
                $("#txt").html(`${message}`);
                for(let i=0;i<6;i++){
                $(`.test:nth-of-type(${i})`).toggleClass("hidden");
                }
                for(let i=0;i<6;i++){
                    $(`.write:nth-of-type(${i})`).toggleClass("hidden");
                }
            });
            $("#writebtn").click(function (e) { 
                e.preventDefault();
                for(let i=0;i<6;i++){
                    $(`.test:nth-of-type(${i})`).toggleClass("hidden");
                }
                for(let i=0;i<6;i++){
                    $(`.write:nth-of-type(${i})`).toggleClass("hidden");
                }
            });
    })    
    </script>   
@endsection