@include('sidebar')
會員基本資料<br>
{{ $current_user->u_id }}<br>
{{ $current_user->name }}<br>
{{ $current_user->birthday }}<br>
{{ $current_user->address }}<br>
{{ $current_user->account }}<br>
{{ $current_user->get_address }}<br>
{{ $current_user->get_phone }}<br>
{{ $current_user->line_id }}<br>
{{ $current_user->email }}<br>
{{ config('map.gender')[$current_user->gender] }}<br>


Deposit預付金<br>
<table>
    <thead>
    <th>儲值日期</th>
    <th>儲值金額(台幣)</th>
    <th>使用匯率</th>
    <th>日幣金額</th>
    <th>備註</th>
    <th>刪除</th>
    </thead>
    <tbody>
    @php
        $store_price = 0;
    @endphp
    @foreach($current_user->deposits as $deposit)
        <tr>
            <td>{{ $deposit->c_date }}</td>
            <td>{{ $deposit->amount }}</td>
            <td>{{ $deposit->rate }}</td>
            <td>{{ $deposit->jpy }}</td>
            <td>{{ $deposit->note }}</td>
            <td>
                <form action="{{ url('deposits/'.$deposit->id) }}" method="post">
                    @method('DELETE')
                    <input type="submit" value="刪除">
                </form>
            </td>
        </tr>
        @php
            /* @var $store_price */
            /* @var $deposit */
            $store_price = $store_price + $deposit->jpy;
        @endphp
    @endforeach
    </tbody>
</table>

Deposit預付金使用紀錄<br>
<table>
    <thead>
    <th>使用日期</th>
    <th>國際貨運追蹤號碼</th>
    <th>購物金額(日幣)</th>
    </thead>
    <tbody>
    @foreach($use_datas as $use_data)
        <tr>
            <td>{{ $use_data['use_date'] }}</td>
            <td>{{ $use_data['order_no'] }}</td>
            <td>{{ $use_data['total'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
您目前的購物餘額{{ $store_price - $total_use }}<br>
入倉履歷<br>
<table>
    <thead>
    <th>入倉日期</th>
    <th>國內運輸公司/取貨地點</th>
    <th>日本國內運輸公司追蹤單號</th>
    <th>刪除</th>
    </thead>
    <tbody>
    @foreach($current_user->stores as $store)
        <tr>
            <td>{{ $store->c_date }}</td>
            <td>{{ $store->location }}</td>
            <td><a href="{{ url('stores/'.$store->id) }}">{{ $store->store_no }}</a></td>
            <td>
                <form action="{{ url('stores/'.$store->id) }}" method="post">
                    @method('DELETE')
                    <input type="submit" value="刪除">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
