@extends('.layouts.master')
@section('content')

<form action="{{ route('menus.store', ['category' => $category->id]) }}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Thêm Món</h4>
        <a class="btn btn-outline-warning"  href="{{ route('category.menus', ['category' => $category->id]) }}">Back</a>
    </div>
    <div class="card-body">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Tên Món Ăn:</label>
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
            <label for="id_category" class="form-label">Danh Mục:</label>
            <input type="text" name="id_category" value="{{ $category->id }}" class="form-control" hidden @error('id_category') is-invalid @enderror>
            <input type="text" name="name_category" value="{{ $category->name }}" class="form-control" readonly>
            @error('id_category')
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
    <div class="card-footer text-end d-flex" style="margin-bottom: 50px;">
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