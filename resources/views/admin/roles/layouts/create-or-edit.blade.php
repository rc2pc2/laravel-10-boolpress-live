@extends('layouts.admin')

@section('head-title')
    @yield('page-title')
@endsection

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            @include('partials.errors')

            {{-- @dump($tags->pluck('name')) --}}

            <form action="@yield('form-action')" method="POST">
                @csrf
                @yield('form-method')

                <div class="mb-3 input-group">
                    <label for="name" class="input-group-text">Role:</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $role->name)}}">
                </div>

                <div class="mb-3 input-group">
                    <label for="level" class="input-group-text">Level:</label>
                    <input class="form-control" type="number" name="level" id="level" value="{{ old('level', $role->level)}}">
                </div>

                <div class="mb-3 input-group">
                    <button type="submit" class="btn btn-xl btn-primary">
                        @yield('page-title')
                    </button>
                    <button type="reset" class="btn btn-xl btn-warning">
                        Reset all fields
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection