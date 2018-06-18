@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Designations</h1>
@stop

@section('content')

    <div class="box box-default">
        <div class="col-md-12 margin">
            @can('create designations')
                <a class="btn btn-success btn-sm" href="{{ route('designations.create') }}"><i class="fa fa-plus"></i>&nbsp; New designation</a>
            @endcan
        </div>
        
        <div class="box-body">
            <div class="col-md-12">
                @include('layouts.error-and-messages')
                @if(Auth::check())
                    <!-- Table -->
                    @if(sizeof($designations) > 0)
                    <table class="table table-sm table-transparent table-hover">
                        <tr>
                            <th>Designation</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                        @foreach($designations as $key => $designation)
                            <tr>
                                <td>{{ $designation->title }}</td>
                                <td>{{ $designation->description }}</td>
                                <td>
                                    <a href="{{ route('designations.edit', $designation->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                        </tr>
                    </table>
                    @else
                    <div class="bg-warning pad">No designations</div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
@stop



@section('js')
    {{-- <script src="/app.js"></script> --}}
@stop