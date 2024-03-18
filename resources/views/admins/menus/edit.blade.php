@extends('.layouts.master')
@section('content')
<form action="{{route('menus.update', ['category' => $category->id])}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Sửa Món Ăn</h4>
        <a class="btn btn-outline-warning"  href="{{ route('category.menus', ['category' => $category->id]) }}">Quay lại</a>
    </div>
    <div class="card-body">
        @method('PUT')
        @csrf
        <div class="mb-3" hidden>
            <input type="text" id="id-menu" name="id" value="{{old('id', $menu->id)}}" class="form-control" @error('id') is-invalid @enderror>
            @error('id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tên Món:</label>
            <input type="text" name="name" value="{{old('name', $menu->name)}}" class="form-control" @error('name') is-invalid @enderror>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Hình Ảnh:</label>
            <input type="file" id="updateImage" name="public" accept="image/*" class="form-control" @error('public') is-invalid @enderror>
            <input type="hidden" name="old_public" accept="image/*" value="{{old('public', $menu->public)}}" class="form-control" @error('public') is-invalid @enderror>
            @if ($menu->public)
            <img id="changeImage-{{ $menu->id }}" data-id="{{ $menu->id }}" class="img-show" src="{{ asset('storage/' .substr($menu->public, 7)) }}" alt="Hình ảnh">
            @endif
            @error('public')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Chi Tiết:</label>
            <input type="text" name="detail" value="{{old('detail', $menu->detail)}}" class="form-control" @error('detail') is-invalid @enderror>
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
            <input type="text" name="price" value="{{old('price', $menu->price)}}" class="form-control" @error('price') is-invalid @enderror>
            @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-end d-flex">
        <button class="btn btn-primary mr-2" type="submit">
            Lưu
        </button>
    </div>
</form>
<script >
    $('#updateImage').on('change', function () {
        let input = this;
        let dataId = $(".minus-button").data("id");
        if (dataId) {
            let image = $('#changeImage-'+ dataId);

            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    image.attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                image.attr('src', '');
            }
        }
    });
</script>
@endsection