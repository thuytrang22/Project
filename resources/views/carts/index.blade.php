@extends('.layouts.main')
@section('content')
<div class="card-header d-flex justify-content-between">
    <h4 class="modal-title">Giỏ hàng của bạn</h4> 
    <a class="btn btn-outline-warning"  href="{{ route('order') }}">Quay lại menu</a>
</div>
<div class="card-body p-0">
    <!-- show all data -->
    <table class="table table-striped table-hover m-0">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Món</th>
                <th>Hình Ảnh</th>
                <th>Số Lượng</th>
                <th>Giá tiền</th>
                <th>Thành Tiền</th>
                <th width="280px">Hoạt Động</th>
            </tr>
        </thead>
        <tbody>
            @if(count($carts) > 0)
            @foreach($carts as $cart)
            <tr>
                <td>{{$cart->id}}</td>
                <td>{{$cart->name}}</td>
                <td>
                    <div class="img-table">
                        @if ($cart->public)
                        <img src="{{ asset('storage/' .substr($cart->public, 7)) }}" alt="Hình ảnh">
                        @endif
                    </div>
                </td>
                <td>{{$cart->detail}}</td>
                <td>{{$cart->option}}</td>
                <td>{{$cart->price}}</td>
                <td>
                <p>Total: {{ Cart::subtotal() }}</p>
                <form action="{{ route('clear') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Clear Cart</button>
                </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">Giỏ hàng không có món nào!!!
                    <a href="{{route('order')}}"> Đến menu </a>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection