@extends('.layouts.master')
@section('content')
<form action="{{route('morning.update')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Sửa Thông Tin Thực Phẩm</h4>
        <a class="btn btn-outline-warning"  href="{{ route('warehouses') }}">Quay lại</a>
    </div>
    <div class="card-body">
        @method('PUT')
        @csrf
        <div class="mb-3" hidden>
            <input type="text" id="id-menu" name="id" value="{{old('id', $mwarehouse->id)}}" class="form-control" @error('id') is-invalid @enderror>
            @error('id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tên Thực Phẩm:</label>
            <input type="text" name="name" value="{{old('name', $mwarehouse->name)}}" class="form-control" @error('name') is-invalid @enderror>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Số Lượng:</label>
            <input type="text" name="quantity" value="{{old('quantity', $mwarehouse->quantity)}}" class="form-control" @error('quantity') is-invalid @enderror>
            @error('quantity')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Đơn Vị:</label>
            <input type="text" name="measure" value="{{old('measure', $mwarehouse->measure)}}" class="form-control" @error('measure') is-invalid @enderror>
            @error('measure')
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