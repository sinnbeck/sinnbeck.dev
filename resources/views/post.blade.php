@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <article class="prose max-w-none">
        <h1 class="text-3xl mb-2 ">
            {{{$post->title}}}
        </h1>
        <div >
            {!! $post->markdown !!}
        </div>
    </article>
@endsection
