@extends('layouts.dashbord')

@section('content')

@include('client.partials.header')

<div class="mt-4">
    &nbsp;
</div>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li>Blog</li>
        </ol>
        <h2>BLOG</h2>
    </div>
</section>
<!-- End Breadcrumbs -->



<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 entries">

                @foreach($posts as $post)
                <article class="entry">

                    <div class="entry-img">
                        <img src="{{ asset('storage/'. $post->images) }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="{{ route('blog.show', $post->id) }}">{{ $post->titre }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                    href="{{ url('/')}}">FASHS-UAC</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                    href="{{ url('/')}}"><time
                                        datetime="2020-01-01">{{ $post->created_at->format('d/m/y') }}</time></a></li>
                            <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                    href="blog-single.html">12 Comments</a></li> -->
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                            {{ \Illuminate\Support\Str::limit($post->sujet, $limit=350, $end = '...') }}
                        </p>
                        <div class="read-more">
                            <a href="{{ route('blog.show', $post->id) }}">Lire plus</a>
                        </div>
                    </div>

                </article><!-- End blog entry -->
                @endforeach

                <div class="row">
                    <div class="">
                        <li><a href="#">{{ $posts->links('vendor.pagination.bootstrap-5') }}</a></li>
                    </div>
                </div>
                <!-- <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li><a href="#">{{ $posts->links('vendor.pagination.bootstrap-4') }}</a></li>
                    </ul>
                </div> -->

            </div>

            <!-- <div class="col-lg-4">

                <div class="sidebar">

                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                        <form action="">
                            <input type="text">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>

                    <h3 class="sidebar-title">Categories</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            <li><a href="#">General <span>(25)</span></a></li>
                            <li><a href="#">Lifestyle <span>(12)</span></a></li>
                            <li><a href="#">Travel <span>(5)</span></a></li>
                            <li><a href="#">Design <span>(22)</span></a></li>
                            <li><a href="#">Creative <span>(8)</span></a></li>
                            <li><a href="#">Educaion <span>(14)</span></a></li>
                        </ul>
                    </div>

                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                        <div class="post-item clearfix">
                            <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                            <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                            <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                            <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/blog/blog-recent-4.jpg" alt="">
                            <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/blog/blog-recent-5.jpg" alt="">
                            <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>

                    </div>

                    <h3 class="sidebar-title">Tags</h3>
                    <div class="sidebar-item tags">
                        <ul>
                            <li><a href="#">App</a></li>
                            <li><a href="#">IT</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Mac</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Office</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Studio</a></li>
                            <li><a href="#">Smart</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>
                    </div>

                </div>

            </div> -->

        </div>

    </div>
</section>
@endsection