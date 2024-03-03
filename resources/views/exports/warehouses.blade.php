<table>
    <thead>
        <tr>
            <td colspan="5" style="text-align: center; font-size: 20px;"><strong>Phiếu nhập kho</strong></td>
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
        @foreach($warehouses as $key => $warehouse)
        <tr class="text-center">
            <td>{{$key + 1}}</td>
            <td>{{$warehouse->name}}</td>
            <td>{{$warehouse->total}}</td>
            <td>{{$warehouse->measure}}</td>
            <td>{{date('d/m/Y', strtotime($warehouse->created_at))}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr></tr>
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>....., ngày .... tháng .... năm ....</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="3" style="text-align: center;"><strong>Nhân viên</strong></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="3" style="text-align: center; font-size: 10px;"><i>(Ký và ghi rõ họ tên)</i></td>
        </tr>
    </tfoot>
</table>