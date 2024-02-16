@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7 text-center text-uppercase">
            <h2>
                {{ $role->name }}
            </h2>
        </div>

        {{-- @dump($role->tags) --}}
        {{-- @dump($role->tags()->attach([1,2,3])) --}}

        <div class="col-7 text-center">
            <h4 scope="row  justify-content-center">
                {{ $role->id }} -- Level: {{ $role->level }}
            </h4>

            <a href="{{ route('admin.roles.edit', $role) }}" class="text-decoration-none">
                <button class="btn btn-sm btn-success">
                    Edit
                </button>
            </a>
        </div>
    </div>
</div>
@endsection