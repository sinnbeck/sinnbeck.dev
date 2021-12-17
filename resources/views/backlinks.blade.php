@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <article class="">
        <h1 class="text-3xl mb-2 ">
            Backlinks
        </h1>
        <h2 class="text-xl mb-2">Here is a small list of software used in the creation of this blog</h2>
        <ul >
            @foreach($backlinks as $backlink)
                <li class="">
                    <a href="{{$backlink['url']}}" class="text-indigo-500 hover:text-indigo-700 hover:underline" target="_blank">
                        {{$backlink['name']}}
                    </a>
                </li>
            @endforeach
        </ul>
    </article>
@endsection
