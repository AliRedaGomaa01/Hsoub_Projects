<header class="mb-5 vw-100">
    <div class='flex flex-row items-center justify-between md:justify-center shadow-md py-3 px-4'>
        <a href={{$_ENV["APP_URL"]}} class="flex md:flex-row md:justify-center">
            <img src={{App::isLocale("ar")?$_ENV["APP_URL"].'/projectImages/logoAr.png':$_ENV["APP_URL"].'/projectImages/logoEn.png'}}
            class='mx-2' width="150" height='30'
            alt="logo">
        </a>
        <img src={{$_ENV["APP_URL"].'/projectImages/hamburger.png'}} width='30'
        class='mx-2 md:hidden' onclick="$('#nav').toggleClass('hidden');" 
        alt="hamburger">
    </div>
    @include("parts.nav")
</header>