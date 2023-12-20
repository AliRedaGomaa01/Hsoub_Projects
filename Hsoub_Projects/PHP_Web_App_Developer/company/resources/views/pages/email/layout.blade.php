<!DOCTYPE html>
@php use Illuminate\Support\Facades\App; @endphp
<html {!! APP::isLocale('ar')?"lang='ar' dir='rtl'": "lang='en' dir='ltr'" !!}>
    @yield("head")
    <body class="bg-white">
        <header class="mb-5 vw-98">
            <div class='flex flex-row items-center justify-center shadow-md py-3 px-4'>
        <a href={{$_ENV["APP_URL"]}} class="flex md:flex-row md:justify-center">
            <img src={{App::isLocale("ar")?$_ENV["APP_URL"].'/projectImages/logoAr.png':$_ENV["APP_URL"].'/projectImages/logoEn.png'}}
                    class='mx-2' width="150" height='30'
                    alt="logo">
                </a>
            </div>
            @yield("nav")
        </header>

        <main class="my-5 py-5 px-3 min-h-[60vh] grid content-center items-center">
            @yield('emailContent')
        </main>

        <footer>
                <div class='bg-gray-300 vw-98'>
                    <div class="container py-3 grid px-3">
                        @if(isset($recipient))
                            <form action="{{'email/delete'.$email->email}}" method="Post">
                                @csrf
                                @method("DELETE")
                                <div class="grid justify-center justify-items-center">
                                    <button type="submit" class="btn btn-primary bg-blue-600 w-[200px] rounded-full">{{__('Unsubscribe')}}</button>
                                </div>
                            </form>
                        @else
                        @yield("button")
                        @endif
                    </div>
                </div>  
        </footer>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
        <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>