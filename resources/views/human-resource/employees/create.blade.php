@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>New Employee</h1>
@stop

@section('content')

<div class="box box-default">    
    <div class="box-body">
        @include('layouts.error-and-messages')
        <form method="post" action="{{ route('employees.store') }}">
            @csrf
            <div class="form-group">
                <h4>Information</h4>
                <div class="row">
                    <div class="col-md-4 margin-bottom">
                        <label for="emp_id">Employee ID</label>
                        <div class="input-group date" data-provide="datepicker">
                            <div class="input-group-addon">
                                <strong>#</strong>
                            </div>
                            <input type="text" id="emp_id" class="form-control" name="emp_id" value="{{ old('emp_id') }} ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 margin-bottom">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }} ">
                    </div>
                    <div class="col-md-4 margin-bottom">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" class="form-control" name="middle_name" value="{{ old('middle_name') }} ">
                    </div>
                    <div class="col-md-4 margin-bottom">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }} ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 margin-bottom">
                        <label for="date_hire">Date of Hire</label>
                        <input type="text" id="date_hire" class="form-control" name="date_hire" value="{{ old('date_hire') }} ">
                    </div>
                    <div class="col-md-4 margin-bottom">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="">Select Department</option>
                        @foreach(\App\Models\HumanResource\Departments::all() as $key => $department)
                            <option value="{{ $department->id }}">{{ $department->title }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 margin-bottom">
                        <label for="designation">Designation</label>
                        <select name="designation" id="designation" class="form-control">
                            <option value="">Select Designation</option>
                        @foreach(\App\Models\HumanResource\Designations::all() as $key => $designation)
                            <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>

            
            <div class="row form-group">
                <div class="col-md-4">
                    <h4>Account</h4>
                    <?php
                        $random_str = Illuminate\Support\Str::random(8);
                    ?>
                    <div>
                        <div class="margin-bottom">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" name="email" value="<?= $random_str . '@' . config('app.domain') ?>">
                        </div>
                    </div>
                    <div class="">
                        <div class="margin-bottom">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" value="{{ $random_str }}">
                        </div>
                    </div>
                    <div class="">
                        <div class="margin-bottom">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" value="{{ $random_str }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="" style="margin-top:30px">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.theme.min.css">
@stop



@section('js')
    <script src="/js/jquery-ui.min.js"></script>
    <script>
        jQuery('#date_hire').datepicker({
            changeMonth: true,
            changeYear: true,
        });
    </script>
@stop   