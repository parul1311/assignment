@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4>Show #{{ $detail->id }}</h4>
                        <span>Detail of #{{ $detail->id }}</span>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('details.index') }}" class="btn btn-primary btn-sm">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{ @$detail->name }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img src="{{ asset('storage/uploads/details/'.@$detail->image) }}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ @$detail->desription }}</td>
                            </tr>
                            <tr >
                                <th>Created by</th>
                                <td>{{ @$detail->user->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection