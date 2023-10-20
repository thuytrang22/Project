@extends('.layouts.master')
@section('content')
<form action="{{ route('create') }}" method="POST">
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('dishes') }}">Quay Lại</a>
    </div>
</form>
<form action="{{route('store')}}" method="post" class="card">
    <div class="card-header">Thêm Món Mới
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

        <div class="mb-3">
            <label for="" class="form-label">Hình Ảnh:</label>
            <input type="file" id="uploadImage" onchange="previewImage()" name="public" value="{{old('public')}}" class="form-control" @error('public') is-invalid @enderror>
            <br>
            <img id="preview" style="max-width: 300px; max-height: 300px;">
            @error('public')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Chi Tiết:</label>
            <input type="text" name="detail" value="{{old('detail')}}" class="form-control" @error('detail') is-invalid @enderror>
            @error('detail')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Giá:</label>
            <input type="text" name="price" value="{{old('price')}}" class="form-control" @error('price') is-invalid @enderror>
            @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-end">
        <button class="btn btn-primary" type="submit">
            Thêm
        </button>
    </div>
</form>

<script src="/js/dishe.js"></script>
@endsection