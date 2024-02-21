@extends('.layouts.master')
@section('content')
<form action="{{route('categories.update')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Edit Item Information</h4>
        <a class="btn btn-outline-warning"  href="{{ route('categories') }}">Back</a>
    </div>
    <div class="card-body">
        @method('PUT')
        @csrf
        <div class="mb-3" hidden>
            <input type="text" id="id-menu" name="id" value="{{old('id', $category->id)}}" class="form-control" @error('id') is-invalid @enderror>
            @error('id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Category Name:</label>
            <input type="text" name="name" value="{{old('name', $category->name)}}" class="form-control" @error('name') is-invalid @enderror>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

    </div>
    <div class="card-footer text-end d-flex">
        <button class="btn btn-primary mr-2" type="submit">
            Save
        </button>
    </div>
</form>
@endsection