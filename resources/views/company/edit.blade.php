@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header">
                    Form edit company
                </div>
                <div class="card-body">
                    <form action="{{ url('company/update') }}/{{ $company->id }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $company->address }}">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ $company->website }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $company->email }}">
                        </div>
                        <div class="form-group">
                            <p>Logo</p>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset($company->logo) }}" width="200" alt="">
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control mt-4" name="logo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection