@extends('welcome')
@section('content')
<div class="container p-3">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row mb-0 text-right">
        <div class="col-md-8">
            <a href="{{ route('Customer') }}" class="btn btn-primary">
                {{ __('New Customer') }}
            </a>
        </div>
    </div>
    <div class="row justify-content-center p-3">
        <div class="card">
            <div class="card-header">{{ __('List of Customer') }}</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Document</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>2101099543</td>
                            <td>Otto</td>
                            <td>Copla</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection