<table>
    <thead>
        <tr>
            <td colspan="5" style="text-align: center; font-size: 20px;"><strong>Chi phí vận hành</strong></td>
        </tr>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Số Tiền</th>
            <th>Loại</th>
            <th>Ngày</th>
        </tr>
    </thead>
    <tbody>
        @if(count($maintenanceCosts) > 0)
        @foreach($maintenanceCosts as $key => $maintenanceCost)
        <tr class="text-center">
        <td>{{$key + 1}}</td>
        <td>{{$maintenanceCost->name}}</td>
        <td>{{number_format($maintenanceCost->expense)}}đ</td>
        <td>{{$types[$maintenanceCost->type]}}</td>
        <td>{{date('d/m/Y', strtotime($maintenanceCost->created_at))}}</td>
        </tr>
        @endforeach
        @else
        <tr>
        <td colspan="7" class="text-center">Không có chi phí nào.</td>
        </tr>
        @endif
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