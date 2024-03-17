@extends('.layouts.master')
@section('content')
<form action="{{route('seating.update')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Chỉnh Sửa Tên Danh Mục</h4>
        <a class="btn btn-outline-warning"  href="{{ route('seating.manager') }}">Quay lại</a>
    </div>
    <div class="card-body">
        @method('PUT')
        @csrf
        <div class="mb-3" hidden>
            <input type="text" id="id-menu" name="id" value="{{old('id', $seating->id)}}" class="form-control" @error('id') is-invalid @enderror>
            @error('id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tên Danh Mục:</label>
            <input type="text" name="table_number" value="{{old('name', $seating->table_number)}}" class="form-control" @error('table_number') is-invalid @enderror>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="seating_status" value="empty_table" {{ $seating->empty_table ? 'checked' : '' }}>
            <label class="form-check-label">
                Bàn trống
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="seating_status" value="pending" {{ $seating->pending ? 'checked' : '' }}>
            <label class="form-check-label">
                Đã đặt
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="seating_status" value="working" {{ $seating->working ? 'checked' : '' }}>
            <label class="form-check-label">
                Đang sử dụng
            </label>
        </div>
    </div>
    <div class="card-footer text-end d-flex">
        <button class="btn btn-primary mr-2" type="submit">
            Lưu
        </button>
    </div>
</form>
@endsection