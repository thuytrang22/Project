@php
    $total = 0;
@endphp
<table>
    <thead>
        <tr>
            <td colspan="5"><strong>Phiếu nhập kho</strong></td>
        </tr>
        <tr>     
            <th>STT</th>
            <th>Tên</th>
            <th>Số lượng</th>
            <th>Đơn vị</th>
            <th>Ngày nhập</th>
        </tr>
    </thead>
    <tbody>
        @foreach($warehouses as $warehouse)
        <tr class="text-center">
            <td>{{$warehouse->id}}</td>
            <td>{{$warehouse->name}}</td>
            <td>{{$warehouse->quantity}}</td>
            <td>{{$warehouse->measure}}</td>
            <td>{{$warehouse->created_at}}</td>
        </tr>
        {{$total += $warehouse->quantity}}
        @endforeach
    </tbody>
    <tfoot>
        <tr></tr>
        <tr>
            
        </tr>
    </tfoot>
</table>