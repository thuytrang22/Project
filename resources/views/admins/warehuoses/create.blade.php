@extends('.layouts.master')
@section('content')

<form action="{{route('store')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Thêm Món Mới</h4>
        <a class="btn btn-outline-warning"  href="{{ route('menu') }}">Quay lại</a>
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
            <input type="file" id="uploadImage" onchange="previewImage()" name="public" accept="image/*" value="{{old('public')}}" class="form-control" @error('public') is-invalid @enderror>
            <img id="preview" class="image mt-2">
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
            <label for="option" class="form-label">Loại:</label>
            <select name="option" id="option" class="form-control @error('option') is-invalid @enderror">
                <option value="1">Món ăn</option>
                <option value="2">Đô uống</option>
                <option value="3">Món gọi thân</option>
            </select>
            @error('option')
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
    <div class="card-footer text-end d-flex">
        <button class="btn btn-primary mr-2" type="submit">
            Thêm
        </button>
    </div>
</form>

<script>
    function previewImage() {
        let fileInput = document.getElementById('uploadImage');
        let preview = document.getElementById('preview');
        if (fileInput.files && fileInput.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            preview.src = "";
        }
    }
</script>
@endsection