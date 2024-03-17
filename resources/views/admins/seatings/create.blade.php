@extends('.layouts.master')
@section('content')

<form action="{{route('seating.store')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Thêm Bàn</h4>
        <a class="btn btn-outline-warning"  href="{{ route('seating.manager') }}">Quay lại</a>
    </div>
    <div class="card-body">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Tên Bàn:</label>
            <input type="text" name="table_number" value="{{old('table_number')}}" class="form-control" @error('table_number') is-invalid @enderror>
            @error('table_number')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="empty_table" checked>
            <label class="form-check-label">
                Bàn trống
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="pending">
            <label class="form-check-label">
                Đã đặt
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="working">
            <label class="form-check-label">
                Đang sử dụng
            </label>
        </div>
    </div>
    <div class="card-footer text-end d-flex">
        <button class="btn btn-primary mr-2" type="submit">
            Thêm
        </button>
    </div>
</form>
@endsection