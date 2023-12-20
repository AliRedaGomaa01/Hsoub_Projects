@extends("layout")
@section("content")
    <div class="h-70 grid content-center justify-content-center ">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        <div class="flash-message  text-center">
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        </div>
        @endforeach
    </div>
@endsection