@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Update Designation</h1>
@stop

@section('content')

<div class="box box-default">    
    <div class="box-body">
        @include('layouts.error-and-messages')
        <form method="post" action="{{ route('designations.update', $designation->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" name="title" value="{{ $designation->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description">{{ $designation->description }}</textarea>
            </div>
            <div class="form-group" style="margin-top:30px">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop



@section('js')