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
                <button class="btn transport-add vendor-btn" data-toggle="modal"
                data-target="#transportAddModal">新增</button>
                <!-- transport add modal -->
                <div class="modal edit-modal" id="transportAddModal" tabindex="-1" role="dialog"
                        aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog edit-dialog " role="document">
                        <div class="modal-content edit-content">
                            <div class="modal-header edit-header">
                                <h5 class="edit-title">新增運輸紀錄</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- transport add body -->
                            <div class="modal-body edit-body">
                                <span class="edit-data gold-data">
                                    <p>已入倉項目</p><input type="text" placeholder="">
                                </span>
                                <span class="edit-data">
                                    <p>JAN CODE <br> (台幣)</p><input type="number" placeholder="">
                                </span>
                                <span class="edit-data gold-data">
                                    <p>單價</p><input type="number" placeholder="">
                                </span>
                                <span class="edit-data gold-data">
                                    <p>重量</p><input type="number" placeholder="">
                                </span>
                                <span class="edit-data gold-data">
                                    <p>數量</p><input type="text" placeholder="">
                                </span>
                                <span class="edit-data gold-data">
                                    <p>金額小計</p><input type="text" placeholder="">
                                </span>                                            
                                <span class="edit-data gold-data">
                                    <p>重量小計</p><input type="text" placeholder="">
                                </span>                                            
                                <span class="edit-data gold-data">
                                    <p>預計離倉時間</p><input type="text" placeholder="">
                                </span>                                            
                                <span class="edit-data gold-data">
                                    <p>國際貨運箱號</p><input type="text" placeholder="">
                                </span>                                            
                                <span class="edit-data gold-data">
                                    <p>國際貨運追蹤號碼</p><input type="text" placeholder="">
                                </span>
                            </div>
                            <!-- transport add submit -->
                            <div class="modal-footer edit-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">關閉</button>
                                <button type="button" class="btn btn-primary">新增</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <input type="button" value="編輯" data-toggle="modal"
                                data-target="#transportEditModal">
                                @method('DELETE')
                                <input type="submit" value="刪除">
                            </form>
                            <!-- transport edit modal -->
                            <div class="modal edit-modal" id="transportEditModal" tabindex="-1" role="dialog"
                                    aria-labelledby="editModal" aria-hidden="true">
                                <div class="modal-dialog edit-dialog " role="document">
                                    <div class="modal-content edit-content">
                                        <div class="modal-header edit-header">
                                            <h5 class="edit-title">編輯運輸紀錄</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- transport edit body -->
                                        <div class="modal-body edit-body">
                                            <span class="edit-data gold-data">
                                                <p>已入倉項目</p><input type="text" placeholder="{{ $transport->name }}">
                                            </span>
                                            <span class="edit-data">
                                                <p>JAN CODE <br> (台幣)</p><input type="number" placeholder="{{ $transport->jan_code }}">
                                            </span>
                                            <span class="edit-data gold-data">
                                                <p>單價</p><input type="number" placeholder="{{ $transport->price }}">
                                            </span>
                                            <span class="edit-data gold-data">
                                                <p>重量</p><input type="number" placeholder="{{ $transport->weight }}">
                                            </span>
                                            <span class="edit-data gold-data">
                                                <p>數量</p><input type="text" placeholder="{{ $transport->amount }}">
                                            </span>
                                            <span class="edit-data gold-data">
                                                <p>金額小計</p><input type="text" placeholder="{{ $transport->price_total }}">
                                            </span>                                            
                                            <span class="edit-data gold-data">
                                                <p>重量小計</p><input type="text" placeholder="{{ $transport->weight_total }}">
                                            </span>                                            
                                            <span class="edit-data gold-data">
                                                <p>預計離倉時間</p><input type="text" placeholder="{{ $transport->out_date }}">
                                            </span>                                            
                                            <span class="edit-data gold-data">
                                                <p>國際貨運箱號</p><input type="text" placeholder="{{ $transport->box_no }}">
                                            </span>                                            
                                            <span class="edit-data gold-data">
                                                <p>國際貨運追蹤號碼</p><input type="text" placeholder="{{ $transport->transport_no }}">
                                            </span>
                                        </div>
                                        <!-- transport edit submit -->
                                        <div class="modal-footer edit-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">關閉</button>
                                            <button type="button" class="btn btn-primary">儲存變更</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

