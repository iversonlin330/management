@include('sidebar')
出貨明細:{{ $transport->transport_no }}<br>
<table>
    <thead>
    <th>台灣國內單號</th>
    <th>包裹總重量</th>
    <th>購物金額</th>
    <th>運費金額</th>
    <th>金額總計</th>
    <th>附件查詢</th>
    <th>刪除</th>
    </thead>
    @foreach($transport->ships as $ship)
        <tr>
            <td>{{ $ship->transport_id }}</td>
            <td>{{ $ship->tw_no }}</td>
            <td>{{ $ship->price_buy }}</td>
            <td>{{ $ship->price_ship }}</td>
            <td>{{ $ship->price_total }}</td>
            <td>
                @foreach($ship->attachments as $attachment)
                    <a href="{{ asset('storage/'.$attachment->path)  }}" target="_blank">{{ $attachment->name }}</a>
                    <form action="{{ url('attachments/'.$attachment->id) }}" method="post">
                        @method('DELETE')
                        <input type="submit" value="刪除">
                    </form>
                    <br>
                @endforeach
                <a onclick='$(this).parent().find("[name=\"file\"]").click()'>上傳</a>
                <form action="{{ url('/attachments/upload?ship_id='.$ship->id) }}" method="post" enctype="multipart/form-data" hidden>
                    <input type="file" name="file" onchange="$(this).parent().submit()">
                    <input type="submit">
                </form>
            </td>
            <td>編輯X
                <form action="{{ url('ships/'.$ship->id) }}" method="post">
                    @method('DELETE')
                    <input type="submit" value="刪除">
                </form>
            </td>
        </tr>
    @endforeach
</table>
