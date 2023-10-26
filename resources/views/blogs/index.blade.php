@extends('layouts.dashbord')

@section('content')

@include('client.partials.header')

<div class="mt-4">
    &nbsp;
</div>
<div class="mt-4">
    &nbsp;
</div>

<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li>Blog</li>
        </ol>
        <h2>BLOG</h2>
    </div>
</section>


<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 entries">

                @foreach($posts as $post)
                <article class="entry">

                    <div class="entry-img">
                        <img src="{{ asset('storage/'.$post->images) }}" alt="" class="img-fluid">
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
                                        datetime="00-00-0000">{{ $post->created_at->format('d/m/y') }}</time></a></li>
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

                </article>
                @endforeach

                <div class="row">
                    <div class="">
                        <li><a href="#">{{ $posts->links('vendor.pagination.bootstrap-5') }}</a></li>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection