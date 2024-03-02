@extends('.layouts.master')
@section('content')

<form action="{{route('morning.store')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Thêm Thực Phẩm Vào Kho</h4>
        <a class="btn btn-outline-warning"  href="{{ route('warehouses') }}">Quay lại</a>
    </div>
    <div class="card-body">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Tên Thực Phẩm:</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" @error('name') is-invalid @enderror>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Số Lượng:</label>
            <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control" @error('quantity') is-invalid @enderror>
            @error('quantity')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Đơn Vị:</label>
            <input type="text" name="measure" value="{{old('measure')}}" class="form-control" @error('measure') is-invalid @enderror>
            @error('measure')
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
@endsection