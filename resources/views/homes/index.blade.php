@extends('.layouts.main')
@section('content')
<div class="home-center">
    <form action="{{route('infor')}}" method="POST" enctype="multipart/form-data">
        <div class="d-flex" style="align-items: baseline; gap: 5px">
            <h2 class="logo me-auto me-lg-0" style="font-style: italic;"><a href="{{route('pages')}}" style=" color: #cda45e">Hana Sushi  </a></h2>
            <h3 class="text-center">xin chào quý khách!</h3>
        </div>
        <label>Bạn vui lòng cho nhà hàng biết thông tin của bạn để phục vụ nhanh chóng và chính xác hơn nhé.</lable>
        @csrf
            <div class="form-group">
                <label for="inputName">Tên của bạn:</label>
                <input type="text" class="form-control" id="inputName" placeholder="Nhập tên" name="name" value="{{old('name')}}" @error('name') is-invalid @enderror>
                @error('name')
                <span class="text-red-500 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPhone">Số điện thoại:</label>
                <input type="number" class="form-control" id="inputPhone" placeholder="(+84)xxx-xxx-xxx" name="phone" value="{{old('phone')}}" @error('phone') is-invalid @enderror>
                @error('phone')
                <span class="text-red-500 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" value="{{ $table }}" name="table_number" hidden @error('table_number') is-invalid @enderror>
                @error('table_number')
                <span class="text-red-500 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" id="btnHome">Bắt Đầu</button>
            </div>
    </form>
</div>
@endsection