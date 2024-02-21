@extends('.layouts.master')
@section('content')

<form action="{{route('categories.store')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <a class="btn btn-outline-warning"  href="{{ route('menus') }}">Quay lại</a>
    </div>
    <div class="card-body">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Tên Món:</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" @error('name') is-invalid @enderror>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-end d-flex">
        <button class="btn btn-primary mr-2" type="submit">
            Add
        </button>
    </div>
</form>
@endsection