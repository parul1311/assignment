@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h4>Details</h4>
            <span>List of Details</span>
            </div>
            <div class="text-right">
                <a href="{{ route('details.create') }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($details->count() > 0)
                            @foreach($details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('details.show', $detail->id) }}" class="btn-link">{{ ucwords($detail->name) }}</a></td>
                                    <td><img src="{{ asset('storage/uploads/details/'.$detail->image) }}" class="image-sm" alt=""></td>
                                    <td>{{ \Str::words($detail->description,10) }}</td>
                                    <td>{{ $detail->user->name }}</td>
                                    <td>
                                        <a href="{{ route('details.edit', $detail->id) }}" target="_blank" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE"> 
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center"> No Data Available </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $details->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
