@extends('admin.roles.layouts.create-or-edit')

@section('page-title', 'Editing role')

@section('form-action')
    {{ route('admin.roles.update', $role) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection
