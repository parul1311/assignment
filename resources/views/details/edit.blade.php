@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-9 mx-auto">
            <form action="{{ route('details.update',$detail->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h4>Edit #{{ $detail->id }}</h4>
                            <span>Update existing record of detail</span>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('details.index') }}" class="btn btn-primary btn-sm">View All</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input required type="text" name="name" minlength="8" class="form-control" value="{{ @$detail->name }}" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image_file" class="form-control" accept="image/*" >
                                    @if(@$detail->image)
                                    <img src="{{ asset('storage/uploads/details/'.$detail->image) }}" class="image-sm mt-2" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Description" cols="30" rows="5">{{ @$detail->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection