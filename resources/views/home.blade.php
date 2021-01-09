@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Companies</div>

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
                            <a href="{{ url('company/add') }}" class="btn btn-primary">Add new company</a>
                        </div>
                        <div class="col text-right">
                            <a href="{{ url('employee/') }}" class="btn btn-success">See employees</a>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p>Companies list</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Website</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($companies as $company)
                                            <tr>
                                                <td>
                                                    <img src="{{ $company->logo }}" class="img-fluid" width="100" alt="">
                                                </td>
                                                <td>{{$company->name}}</td>
                                                <td>{{$company->address}}</td>
                                                <td>{{$company->website}}</td>
                                                <td>{{$company->email}}</td>
                                                <td>
                                                    <a href="{{ url('company/edit') }}/{{ $company->id }}" class="badge badge-primary">Edit</a>
                                                    <a href="{{ url('company/delete') }}/{{ $company->id }}" class="badge badge-danger">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        {{ $companies->links() }}
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