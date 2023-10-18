@extends('.layouts.main')
@section('content')
<div class="home-center">
    <form>
        <div class="d-flex">
            <img src="images/logo.png" alt="">
            <h3 class="text-center">xin chào quý khách!</h3>
        </div>
        <label>Bạn vui lòng cho nhà hàng biết thông tin của bạn để phục vụ nhanh chóng và chính xác hơn nhé.</lable>
        @csrf
        <div class="form-group">
            <label for="inputName">Tên của bạn:</label>
            <input type="text" class="form-control" id="inputName" placeholder="Nhập tên"
             name="name" value="{{old('name')}}" @error('name') is-invalid @enderror >
            @error('name')
            <span class="text-red-500 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputPhone">Số điện thoại:</label>
            <input type="number" class="form-control" id="inputPhone" placeholder="(+84)xxx-xxx-xxx"
            name="phone" value="{{old('phone')}}" @error('phone') is-invalid @enderror >
            @error('phone')
            <span class="text-red-500 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputTableNumber">Số bàn:</label>
            <select class="form-control" id="inputTableNumber" name="table_number">
                <option value="">Chọn số bàn của bạn</option>
                <option value="B1" {{ old('table_number') == '1' ? 'selected' : '' }}>B1</option>
                <option value="B2" {{ old('table_number') == '2' ? 'selected' : '' }}>B2</option>
                <option value="B3" {{ old('table_number') == '3' ? 'selected' : '' }}>B3</option>
                <option value="B4" {{ old('table_number') == '4' ? 'selected' : '' }}>B4</option>
                <option value="B5" {{ old('table_number') == '5' ? 'selected' : '' }}>B5</option>
                <option value="B6" {{ old('table_number') == '6' ? 'selected' : '' }}>B6</option>
                <option value="B7" {{ old('table_number') == '7' ? 'selected' : '' }}>B7</option>
                <option value="B8" {{ old('table_number') == '8' ? 'selected' : '' }}>B8</option>
                <option value="B9" {{ old('table_number') == '9' ? 'selected' : '' }}>B9</option>
                <option value="B10" {{ old('table_number') == '10' ? 'selected' : '' }}>B10</option>
            </select>
            @error('table_number')
            <span class="text-red-500 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" id="btnHome">Bắt Đầu</button>
    </form>
</div>
<script src="js/home.js"></script>
@endsection