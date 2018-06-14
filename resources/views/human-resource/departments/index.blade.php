@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Departments</h1>
@stop

@section('content')

<div class="box box-default">
        <div class="col-md-12 margin">
            @can('create departments')
                <a class="btn btn-success btn-sm" href="{{ route('departments.create') }}"><i class="fa fa-plus"></i>&nbsp; New department</a>
            @endcan
        </div>
        
        <div class="box-body">
            <div class="col-md-12">
                @include('layouts.error-and-messages')
                @if(Auth::check())
                    <!-- Table -->
                    @if(sizeof($departments) > 0)
                    <table class="table table-sm table-transparent table-hover">
                        <tr>
                            <th>Department</th>
                            <th>Lead</th>
                            <th></th>
                        </tr>
                        @foreach($departments as $key => $department)
                            <tr>
                                <td>{{ $department->title }}</td>
                                <td>
                                    @if(true)
                                    
                                    @endif
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                        </tr>
                    </table>
                    @else
                    <div class="bg-warning pad">No departments</div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @component('components.btn-modal', [ 'modal_id' => 'sa' ])
        Launch modal
    @endcomponent
    @component('components.modal', [ 'modal_id' => 'sa'])
        @slot('title')
            Modal title
        @endslot

        <p>Modal body text goes here.</p>

        @slot('footer')
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        @endslot
    @endcomponent
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
@stop



@section('js')
    {{-- <script src="/app.js"></script> --}}
@stop