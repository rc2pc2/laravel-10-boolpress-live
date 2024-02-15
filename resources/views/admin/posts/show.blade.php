@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7 text-center text-uppercase">
            <h2>
                {{ $post->title }}
            </h2>
        </div>
        <div class="col-7 text-center">
            <h4 scope="row  justify-content-center">
                {{ $post->id }} -- Category: {{ $post->category->name }}
            </h4>

            <img src="{{ $post->post_image }}" alt="">

            {{-- @dump($post->user) --}}

            <p>
                {{ $post->user->name }}
            </p>
            <p>
                {{ $post->date }}
            </p>
            <div class="p-5 text-start">
                <p>
                    <em>
                        {{ $post->content}}
                    </em>
                </p>
            </div>
            <a href="{{ route('admin.posts.edit', $post) }}" class="text-decoration-none">
                <button class="btn btn-sm btn-success">
                    Edit
                </button>
            </a>
        </div>

        <div class="col-6 pt-5">
            <h3>
                Piu' informazioni su {{ $post->user->name }}
            </h3>
            <div class="mb-3">
                Born in : {{ $post->user->userDetail->birth_year }}
            </div>
            <div class="mb-3">
                Bio : {{ $post->user->userDetail->bio }}
            </div>
        </div>
        <div class="col-6 pt-5">
            <h3>
                Altri post di {{ $post->user->name }}
            </h3>
            <div class="mb-3">
                <ul>
                    @foreach ($post->user->posts as $otherPost)
                        <li>
                            <a href="{{ route('admin.posts.show', $otherPost) }}">
                                {{ $otherPost->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection