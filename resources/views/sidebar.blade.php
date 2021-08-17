<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@if(Auth::user()->role == 99)
<ul>
    <li><a href="{{ url('admin') }}">會員管理</a></li>
    <li onclick='$("#store_input").click()'>匯入入倉履歷</li>
    <li onclick='$("#transport_input").click()'>匯入運輸紀錄</li>
    <li onclick='$("#ship_input").click()'>匯入出貨明細</li>
</ul>
<form action="{{ url('/stores/import') }}" method="post" enctype="multipart/form-data" hidden>
    入倉履歷匯入
    <input id="store_input" type="file" name="file" onchange="$(this).parent().submit()">
    <input type="submit">
</form>

<form action="{{ url('/transports/import') }}" method="post" enctype="multipart/form-data" hidden>
    運輸紀錄匯入
    <input id="transport_input" type="file" name="file" onchange="$(this).parent().submit()">
    <input type="submit">
</form>

<form action="{{ url('/ships/import') }}" method="post" enctype="multipart/form-data" hidden>
    出貨明細匯入
    <input id="ship_input" type="file" name="file" onchange="$(this).parent().submit()">
    <input type="submit">
</form>
@else

@endif
