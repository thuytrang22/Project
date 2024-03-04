@extends('.layouts.master')
@section('content')
<form action="{{route('warehouses.update')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Sửa Thông Tin Thực Phẩm Trong Kho</h4>
        @php
            $route = ($type == 1) ? 'warehouses.import.list' : 'warehouses.export.list';
        @endphp
        <a class="btn btn-outline-warning"  href="{{ route($route) }}">Quay lại</a>
    </div>
    <div class="card-body">
        @method('PUT')
        @csrf
        <input type="hidden" name="type" value="{{$type}}">
        <div class="mb-3" hidden>
            <input type="text" id="id-menu" name="id" value="{{old('id', $warehouse->id)}}" class="form-control" @error('id') is-invalid @enderror>
            @error('id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tên Thực Phẩm:</label>
            <input type="text" name="name" value="{{old('name', $warehouse->name)}}" class="form-control" @error('name') is-invalid @enderror>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Số Lượng:</label>
            <input type="text" name="quantity" value="{{old('quantity', $warehouse->quantity)}}" class="form-control" @error('quantity') is-invalid @enderror>
            @error('quantity')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Đơn Vị:</label>
            <input type="text" name="measure" value="{{old('measure', $warehouse->measure)}}" class="form-control" @error('measure') is-invalid @enderror>
            @error('measure')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Đơn Giá:</label>
            <input type="text" name="price" value="{{old('price', $warehouse->price)}}" class="form-control" @error('price') is-invalid @enderror>
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
@endsection