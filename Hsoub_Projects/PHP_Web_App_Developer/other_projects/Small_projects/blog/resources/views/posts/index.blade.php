{{-- @extends('posts.layout') --}}

{{-- @section('content') --}}
{{-- @endsection --}}
@section("title","All Posts")

<x-layout>
        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <?php foreach ($posts as $post):?>
                    @if($post)
                    <div class="blog-post mb-3">
                      <h2 class="blog-post-title">
                        <a href="/posts/<?=$post->id?>">
                            <?= ($post->title) ?>
                        </a>
                      </h2>
                      <p class="blog-post-meta"> بقلم
                        <a href="#"><?=($post->author)?></a>
                        <?= Carbon\Carbon::parse($post->created_at)->diffForHumans()?>
                      </p>
                    </div>
                    @endif
                    <?php endforeach ?>

                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="#">Older</a>
                        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                    </nav>

                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h4> مبادئ انشاء وتطوير مواقع الانترنت </h4>
                        <p>يمكنك شراء الكتاب بتخفيض 40%. بإمكانك ترك عنوان بريدك لتصلك التفاصيل </p>
                        <form action="/mail" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">ضع ايميلك هنا</label>
                                <input type="email" name="email" id="email" value="mail@example.com">
                                <button class="btn btn-primary" type="submit">ارسال</button>
                            </div>
                        </form>
                        @error('email')
                            <div class="alert alert-danger alert-dismissable fade show" role="alert">{{$message}} 
                                <button class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            </div>
                        @enderror
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">Archives</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="#">March 2014</a></li>
                            <li><a href="#">February 2014</a></li>
                            <li><a href="#">January 2014</a></li>
                            <li><a href="#">December 2013</a></li>
                            <li><a href="#">November 2013</a></li>
                            <li><a href="#">October 2013</a></li>
                            <li><a href="#">September 2013</a></li>
                            <li><a href="#">August 2013</a></li>
                            <li><a href="#">July 2013</a></li>
                            <li><a href="#">June 2013</a></li>
                            <li><a href="#">May 2013</a></li>
                            <li><a href="#">April 2013</a></li>
                        </ol>
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </aside><!-- /.blog-sidebar -->

            </div><!-- /.row -->

        </main><!-- /.container -->

{{-- @endsection --}}
</x-layout>
 