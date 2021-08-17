@include('sidebar')
運輸紀錄{{ $store->store_no }}<br>
<table>
    <thead>
    <th>客戶編號</th>
    <th>姓名</th>
    <th>狀態</th>
    <th>刪除</th>
    </thead>
    <tbody>
    @foreach($store->transports as $transport)
        <tr>
            <td>{{ $transport->name }}</td>
            <td>{{ $transport->jan_code }}</td>
            <td>{{ $transport->price }}</td>
            <td>{{ $transport->weight }}</td>
            <td>{{ $transport->amount }}</td>
            <td>{{ $transport->price_total }}</td>
            <td>{{ $transport->weight_total }}</td>
            <td>{{ $transport->out_date }}</td>
            <td>{{ $transport->box_no }}</td>
            <td><a href="{{ url('transports/'.$transport->id) }}">{{ $transport->transport_no }}</a></td>
            <td>編輯X
                <form action="{{ url('transports/'.$transport->id) }}" method="post">
                    @method('DELETE')
                    <input type="submit" value="刪除">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
