@extends('layouts.main')

@section('title','運輸紀錄')

@section('topBar')
<p class="member-mark">首頁</p>
    @if(Auth::user() ->role == 99)
    <p class="vendor-mark">會員管理 / <span class="transport-name">王喜花</span> / <span class="sort-name">運輸紀錄</span></p>
    @endif
@endsection

@section('content')
    <!-- transport record -->
    <div class="transport-record row col-lg-12">
        <!-- transport block  -->
        <div class="transport-block col-lg-12">
            <div class="transport-title">
                <h2>運輸紀錄： <span class="transport-num">{{ $store->store_no }}</span></h2>
                @if(Auth::user()->role == 99)
                <button class="btn transport-add vendor-btn">新增</button>
                @endif
            </div>
            <!-- table transport -->
            <table class="stored-table transport-information">
                <tbody class="infro-body">
                    <tr class="stored-title infro-title gold-line transport-header">
                        <td>已入倉項目</td>
                        <td>JAN CODE</td>
                        <td>單價</td>
                        <td>重量</td>
                        <td>數量</td>
                        <td>金額小計</td>
                        <td>重量小計</td>
                        <td>預計離倉時間</td>
                        <td>國際貨運箱號</td>
                        <td>國際貨運追蹤號碼</td>
                    </tr>
                    <!-- transport data -->
                    @foreach($store->transports as $transport)
                        <tr class="stored-title infro-title gold-line">
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
                            @if(Auth::user() -> role==99)
                                <td class="transport-btn vendor-btn">
                                    <form action="{{ url('transports/'.$transport->id) }}" method="post">
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

