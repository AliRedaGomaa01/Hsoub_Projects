{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" 
    integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" 
    crossorigin="anonymous">

</head>
<body> --}}

@section("title","Create a Post")
<x-layout>
    <div class="container">
        {{-- @include('posts.form') --}}
        <form action="/posts" method="POST">
        <x-form />
        <button type="submit" class="btn btn-primary">حفظ</button>
        </form>  
    </div>
</x-layout>

{{-- </body>
</html> --}}