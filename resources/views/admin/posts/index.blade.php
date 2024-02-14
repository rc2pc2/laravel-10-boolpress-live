@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12 p-2 mb-3 text-center">
            <h2>
                These are all our available posts, {{ Auth::user()->name }}!
            </h2>
        </div>
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Date</th>
                        <th scope="col">Content</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $posts as $post )
                        <tr>
                            <th scope="row">
                                {{ $post->id }}
                            </th>
                            <td>
                                <a href="{{ route('admin.posts.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td>
                                {{ $post->user->name }}
                            </td>
                            <td>
                                <span  style="color: {{ $post->category->color }}">
                                    ⬤
                                </span>
                                <span>
                                    {{ $post->category->name }}
                                </span>
                                <span>
                                    <img src="{{ $post->category->categoryDetail->image }}" alt="" style="width:
                                    20px" class="rounded-5">
                                </span>
                            </td>
                            <td>
                                {{ $post->date }}
                            </td>
                            <td>
                                <em>
                                    {{ substr($post->content, 0, 35) }}
                                </em>
                            </td>
                            <td>
                                <a href="{{ route('admin.posts.show', $post) }}" class="text-decoration-none">
                                    <button class="btn btn-sm btn-primary">
                                        View
                                    </button>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-decoration-none">
                                    <button class="btn btn-sm btn-success">
                                        Edit
                                    </button>
                                </a>
                                <!-- Button trigger modal -->
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $post->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Deleting post...</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to delete {{ $post->title }}?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                        <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                There are no posts available
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection