@extends('admin.roles.layouts.create-or-edit')

@section('page-title', 'Create new role')

@section('form-action')
    {{ route('admin.roles.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection
