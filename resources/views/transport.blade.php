@extends('layouts.main')

@section('title','出貨明細')

@section('topBar')
    <p class="member-mark">首頁 /  <span class="shipment-name">運輸紀錄</span> /
        <span class="sort-name">出貨明細</span>
    </p>
    @if(Auth::user()->role == 99)
    <p class="vendor-mark">會員管理 / <span class="shipment-name">王喜花</span> / <span class="shipment-name">運輸紀錄</span> /
        <span class="sort-name">出貨明細</span>
    </p>
    @endif
@endsection

@section('content')
    <!-- shipment details -->
    <div class="shipment-details row col-lg-12">
        <!-- shipment block  -->
        <div class="shipment-block col-lg-12">
            <div class="shipment-title">
                <h2>運輸紀錄： <span class="shipment-num">{{ $transport->transport_no }}</span></h2>
                @if(Auth::user()->role == 99)
                <button class="btn shipment-add vendor-btn">新增</button>
                @endif
            </div>
            <!-- table shipment -->
            <table class="stored-table shipment-information">
                <tbody class="infro-body">
                    <tr class="infro-title gold-line shipment-header">
                        <td>台灣國內單號</td>
                        <td>包裹總重量</td>
                        <td>購物金額</td>
                        <td>運費金額</td>
                        <td>金額總計</td>
                        <td>附件查詢</td>
                    </tr>
                    <!-- shipment data -->
                    @foreach($transport->ships as $ship)
                        <tr class="infro-title gold-line">
                            <td>{{ $ship->transport_id }}</td>
                            <td>{{ $ship->tw_no }}</td>
                            <td>{{ $ship->price_buy }}</td>
                            <td>{{ $ship->price_ship }}</td>
                            <td>{{ $ship->price_total }}</td>
                            <td>
                                @foreach($ship->attachments as $attachment)
                                    <div class="shipment-delete" style="display: flex;align-items:center;">
                                    <a href="{{ asset('storage/'.$attachment->path)  }}" target="_blank">{{ $attachment->name }}</a>
                                    @if(Auth::user()->role==99)
                                        <form style="margin-bottom:0px" action="{{ url('attachments/'.$attachment->id) }}" method="post">
                                            @method('DELETE')
                                            <input style="background-color: unset;font-size: 10px;color: #000;border: unset;border-radius: 4px;" type="submit" value="X">
                                        </form>
                                    @endif
                                    </div>
                                <br>
                                @endforeach
                                @if(Auth::user() ->role ==99)
                                    <a onclick='$(this).parent().find("[name=\"file\"]").click()'>上傳</a>
                                    <form action="{{ url('/attachments/upload?ship_id='.$ship->id) }}" method="post" enctype="multipart/form-data" hidden>
                                        <input type="file" name="file" onchange="$(this).parent().submit()">
                                        <input type="submit">
                                    </form>
                                @endif
                            </td>
                            @if(Auth::user()->role==99)
                                <td class="shipment-btn vendor-btn">
                                    <form action="{{ url('ships/'.$ship->id) }}" method="post">
                                        <input type="button" value="編輯">
                                        @method('DELETE')
                                        <input type="submit" value="刪除">
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
