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
                <button class="btn shipment-add vendor-btn" data-toggle="modal"
                data-target="#shipmentAddModal">新增</button>
                <!-- shipmen add modal -->
                <div class="modal edit-modal" id="shipmentAddModal" tabindex="-1" role="dialog"
                        aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog edit-dialog " role="document">
                        <div class="modal-content edit-content">
                            <div class="modal-header edit-header">
                                <h5 class="edit-title">新增出貨明細</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- shipmen add body -->
                            <div class="modal-body edit-body">
                                <span class="edit-data gold-data">
                                    <p>台灣國內單號</p><input type="text" placeholder="">
                                </span>
                                <span class="edit-data">
                                    <p>包裹總重量 <br> (台幣)</p><input type="number" placeholder="">
                                </span>
                                <span class="edit-data gold-data">
                                    <p>購物金額</p><input type="number" placeholder="">
                                </span>
                                <span class="edit-data gold-data">
                                    <p>運費金額</p><input type="number" placeholder="">
                                </span>
                                <span class="edit-data gold-data">
                                    <p>金額總計	</p><input type="number" placeholder="">
                                </span>
                            </div>
                            <!-- shipmen add submit -->
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
                                    <input type="button" value="編輯" data-toggle="modal" data-target="#shipmentEditModal">
                                    @method('DELETE')
                                    <input type="submit" value="刪除">
                                </form>
                                <!-- shipmen edit modal -->
                                <div class="modal edit-modal" id="shipmentEditModal" tabindex="-1" role="dialog"
                                        aria-labelledby="editModal" aria-hidden="true">
                                    <div class="modal-dialog edit-dialog " role="document">
                                        <div class="modal-content edit-content">
                                            <div class="modal-header edit-header">
                                                <h5 class="edit-title">編輯出貨明細</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- shipmen edit body -->
                                            <div class="modal-body edit-body">
                                                <span class="edit-data gold-data">
                                                    <p>台灣國內單號</p><input type="text" placeholder="{{ $ship->transport_id }}">
                                                </span>
                                                <span class="edit-data">
                                                    <p>包裹總重量 <br> (台幣)</p><input type="number" placeholder="{{ $ship->tw_no }}">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>購物金額</p><input type="number" placeholder="{{ $ship->price_buy }}">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>運費金額</p><input type="number" placeholder="{{ $ship->price_ship }}">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>金額總計	</p><input type="number" placeholder="{{ $ship->price_total }}">
                                                </span>
                                            </div>
                                            <!-- shipmen edit submit -->
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
