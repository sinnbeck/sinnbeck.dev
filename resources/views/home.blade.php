@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    @foreach ($posts as $post)
        <article>
            <h1 class="text-2xl">
                <a href="/posts/{{$post->slug}}" class="hover:underline hover:text-yellow-100">
                    {{$post->title}}
                </a>
            </h1>
            <em class="italic text-gray-900 text-sm">Published at: {{$post->published_at->toDateString()}}</em>
            <p class="py-2 text-gray-100">
                {{$post->summary}}
            </p>
        </article>
    @endforeach
@endsection
