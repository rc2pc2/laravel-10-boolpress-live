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
                        <th scope="col">Name</th>
                        <th scope="col">Level</th>
                        <th scope="col">Number of users</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $roles as $role )
                        <tr>
                            <th scope="row">
                                {{ $role->id }}
                            </th>
                            <td>
                                <a href="{{ route('admin.roles.show', $role) }}">
                                    {{ $role->name }}
                                </a>
                            </td>
                            <td>
                                {{ $role->level }}
                            </td>
                            <td>
                                {{-- {{  }} --}}
                                n
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.show', $role) }}" class="text-decoration-none">
                                    <button class="btn btn-sm btn-primary">
                                        View
                                    </button>
                                </a>
                                <a href="{{ route('admin.roles.edit', $role) }}" class="text-decoration-none">
                                    <button class="btn btn-sm btn-success">
                                        Edit
                                    </button>
                                </a>
                                <!-- Button trigger modal -->
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $role->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $role->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Deleting role...</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to delete {{ $role->name }}?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                        <form class="d-inline-block" action="{{ route('admin.roles.destroy', $role) }}" method="POST">
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