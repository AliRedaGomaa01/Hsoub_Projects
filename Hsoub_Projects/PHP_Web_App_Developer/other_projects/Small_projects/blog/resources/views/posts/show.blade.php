@section('title', $post->title )
<x-layout>
<x-post :post='$post' :comments='$comments' class="any calsses here && {{ $attributes }} there" />
<a class="btn btn-primary" href="/posts/{{$post->id}}/edit">تعديل المقالة</a>
<h3>اضف تعليقا</h3>
<x-create-comment :post='$post' />
</x-layout>