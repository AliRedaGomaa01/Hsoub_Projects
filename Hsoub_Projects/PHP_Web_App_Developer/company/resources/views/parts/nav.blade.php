@php 
    use Illuminate\Support\Facades\App;
    $URL= isset($_SESSION["lang"]) ?$_ENV["APP_URL"].$_SESSION["lang"]:$_ENV["APP_URL"]."/home" ;
    $lang1= APP::isLocale("en")? "/en":"/ar" ; 
    $lang2= APP::isLocale("en")?"/ar":"/en" ; 
@endphp 
{{-- {{$URL}} {{$lang1}} {{$lang2}} --}}
<nav id="nav">
    @Auth
    <div  class= ' nav flex md:flex flex-col p-3 pb-0 shadow-md'>
        <ul class="grid grid-cols-1 justify-center content-center " >
            <div class="grid grid-cols-2 md:grid-cols-4  gap-2 m-2 justify-items-center items-center">
                <li ><a href={{'/profile'.$lang1}} class="nav-item nav-link">{{__("Profile")}}</a></li>
                <li><a href={{"/user/create".$lang1}}  class="nav-item nav-link">{{__("Register")}}</a></li>
                <li ><a href={{'/p/manage'.$lang1}} class="nav-item nav-link">{{__("Projects Management")}}</a></li>
                <li ><a href={{'/e/create'.$lang1}} class="nav-item nav-link">{{__("Create an Email")}}</a></li>
            </div>
        </ul>
    </div>
    @endAuth       
    <div  class= 'nav flex md:flex flex-col p-3 pb-0 shadow-md'>
        <ul class="grid grid-cols-1 justify-center content-center " >
            <div class= " grid grid-cols-2 md:grid-cols-4  gap-2 md:gap-6 m-2  justify-items-center items-center" >
                <li ><a href={{'/home'.$lang1}}  class="nav-item nav-link"> {{__("Home")}}</a></li>
                <li ><a href="https://www.arianerealestate.com/"  class="nav-item nav-link">{{__("Our Company")}} </a></li>
                @Auth
                <form action="/logout" method="POST">
                    @csrf
                    <li><a href="#" onclick="event.preventDefault();this.closest('form').submit();"  class="nav-item nav-link">{{__("Logout")}}</a></li>
                </form>
                @endAuth
                @Guest
                <li><a href="{{'/login'.$lang1}}"  class="nav-item nav-link">{{__("Log in")}}</a></li>
                @endGuest
                <li><a href={{$URL.$lang2}}  id="lang" class="nav-item nav-link">{{__("Language")}}</a></li>
            </div>
        </ul>       
    </div>
</nav>
