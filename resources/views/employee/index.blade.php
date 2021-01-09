@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">List employees</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if(Session::has('message'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success">{{ Session::get('message')}}</div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <a href="{{ url('/home') }}" class="btn btn-secondary">Back</a>
                        </div>
                        <div class="col text-right">
                            <a href="{{ url('employee/add') }}" class="btn btn-primary">Add new employee</a>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p>Employees list</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Fullname</th>
                                                <th>Company</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->fullname }}</td>
                                                <td>{{ $employee->company->name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>
                                                    <a href="{{ url('employee/edit') }}/{{ $employee->id }}" class="badge badge-primary">Edit</a>
                                                    <a href="{{ url('employee/delete') }}/{{ $employee->id }}" onclick="return confirm('are you sure?')" class="badge badge-danger">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection