@extends('.layouts.main')
@section('content')
    <h1>404 Không tìm thấy</h1>
    <p>Trang bạn đang tìm kiếm không thể được tìm thấy.</p>
    <div class="d-flex"><p>Quay lại trang chủ</p><a href="{{ route('pages') }}">Tại đây</a></div>
@endsection
