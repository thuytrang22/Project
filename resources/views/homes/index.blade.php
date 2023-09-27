@extends('main')
@section('content')
<div class="home-center">
    <form>
        <h3 class="text-center">Cơm Mẹ Nấu xin chào quý khách!</h3>
        <label>Bạn vui lòng cho nhà hàng biết thông tin của bạn để phục vụ nhanh chóng và chính xác hơn nhé.</lable>
        <div class="form-group">
            <label for="inputName">Tên của bạn:</label>
            <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp" placeholder="Nhập tên">
        </div>
        <div class="form-group">
            <label for="inputPhone">Số điện thoại:</label>
            <input type="number" class="form-control" id="inputPhone" placeholder="Số điện thoại">
        </div>
        <button type="submit" class="btn btn-primary " formaction="{{ route('order') }}">Bắt Đầu</button>
    </form>
</div>
@endsection