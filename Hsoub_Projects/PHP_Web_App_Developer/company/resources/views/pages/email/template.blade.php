<!DOCTYPE html>
@php use Illuminate\Support\Facades\App; @endphp
<html {!! APP::isLocale('ar')?"lang='ar' dir='rtl'": "lang='en' dir='ltr'" !!}>
    <body style="">
        <div style="background: white">
            <header style="display: grid;  justify-content:center; align-content:center;">
                <div style="display: grid;  justify-content:center; align-content:center; text-align:center; box-shadow: 1px 1px 5px 1px gray; height:70px; width:97.5vw; margin:-10px auto 0 ;padding:10px 0;">
                    <a href={{asset("/")}} >
                        <img src={{App::isLocale("ar")?"https://www.arianerealestate.com/wp-content/themes/houzez-child/logo-main-ar.png":"https://www.arianerealestate.com/wp-content/uploads/2021/09/logo-main.png"}}
                        class='mx-2' width="200px" height='50px' 
                        alt="logo">
                    </a>
                </div>
            </header>
            <main style="display: grid;  justify-content:center; align-content:center; margin:5vh; padding:10px;">
                <div style="display: grid; align-content:center;width:80vw;min-height:60vh; padding:40px; color:black;line-height:2;">
                    {{-- @php  $message = "<ppp> <divvv> <h1> test </h1> <p> test </p> <//p//>" @endphp --}}
                    @if (isset($emessage))
                        {!! $emessage !!}
                    @endif    
                </div>
            </main>
            {{-- @php
                $recipient = "alyredagomaa@gmail.com"
            @endphp --}}
            <footer style="display: grid; justify-content:center; align-content:center;margin:0 auto -10px">
                    <div style="display: grid; justify-content:center; align-content:center; text-align:center; background: #e5e7eb;height:80px;width:97.5vw;padding:10px 0px;">
                        {{-- @if(isset($recipient))
                        <form action="{{asset('e/delete/'.$recipient)}}" method="Post"> --}}
                        @if(isset($slug))
                                {{-- <form action="{{asset('e/delete/'.$slug)}}" method="Post" >
                                    @csrf
                                    @method("DELETE")
                                    <div class="grid justify-center justify-items-center">
                                        <button type="submit" onclick="return confirm('Are you sure?')" style="padding:10px 50px;border:#0d6efd ; border-radius:20px; background:#0d6efd;color:white;font-size:1.2rem;">{{__('Unsubscribe')}}</button>
                                    </div>
                                </form> --}}
                                <a href="{{asset('e/delete/'.$slug)}}" onclick="return confirm('Are you sure?')" style="padding:10px 50px;border-radius:20px;color:#0d6efd;font-size:1.2rem;">{{__('Unsubscribe')}}</a>
                            @endif 
                    </div>  
            </footer>
        </div>

    </body>
</html>