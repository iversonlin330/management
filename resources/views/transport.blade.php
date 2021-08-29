<!-- @include('layouts.sidebar')
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
</table> -->

<head>
    <title>出貨明細</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/transport.blade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swap.css') }}">

</head>

<body>
    <!-- shipment section -->
    <section class="shipment-section container-fluid">
        <div class="shipment-main row col-12">
            <!-- sidebar -->
            <div class="sidebar col-lg-2">
                <div class="sidebar-logo">
                    <img src="{{ asset('css/image/login-logo.png') }}" alt="">
                </div>
                @if(Auth::user() ->role ==99)
                <!--/ vendor sidebar-card /-->
                <div id="accordion" class="sidebar-accordion vendor-sidebar">
                    <!--sidebar-card-->
                    <div class="sidebar-card">
                        <div class="sidebar-header sidebar-line" id="headingOne">
                            <h5 class="mb-0 sidebar-title">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <img src="{{ asset('css/image/sidebar-img-01.png') }}" alt="">
                                    <a href="{{ url('admin') }}">會員管理</a>
                                </button>
                            </h5>
                        </div>
                    </div>
                    <!--sidebar-card-->
                    <div class="sidebar-card">
                        <div class="sidebar-header" id="headingTwo">
                            <h5 class="mb-0 sidebar-title">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    <img style="margin-left:5px" src="{{ asset('css/image/sidebar-img-02.png') }}" alt="">
                                    資料匯入
                                    <div class="sidebar-down">
                                        <img src="{{ asset('css/image/sidebar-img-03.png') }}" alt="">
                                    </div>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                            data-parent="#accordion">
                            <div class="card-body">
                                <ul class="sidebar-list">
                                    <li onclick='$("#store_input").click()'>匯入入倉履歷</li>
                                    <li onclick='$("#transport_input").click()'>匯入運輸紀錄</li>
                                    <li onclick='$("#ship_input").click()'>匯入出貨明細</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @else

                @endif
                <!--/ member sidebar-card /-->
                <div id="accordion" class="sidebar-accordion member-sidebar">
                    <!--sidebar-card-->
                    <div class="sidebar-card">
                        <div class="sidebar-header" id="headingTwo">
                            <h5 class="mb-0 sidebar-title">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    <img style="margin-left:5px" src="{{ asset('css/image/sidebar-img-02.png') }}" alt="">
                                    首頁
                                    <div class="sidebar-down">
                                        <img src="{{ asset('css/image/sidebar-img-03.png') }}" alt="">
                                    </div>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                            data-parent="#accordion">
                            <div class="card-body">
                                <ul class="sidebar-list">
                                    <li>個人基本資料</li>
                                    <li>預付金紀錄</li>
                                    <li>入倉履歷</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- form data -->
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
            </div>
            <!-- shipment body -->
            <div class="shipment-body col-lg-10">
                <!-- mark -->
                <div class="shipment-big-mark">
                    <h1>千森株式會社會員管理平台</h1>
                    <div class="shipment-sort">
                        <p class="member-mark">首頁 /  <span class="shipment-name">運輸紀錄</span> /
                            <span class="sort-name">出貨明細</span>
                        </p>
                        @if(Auth::user()->role == 99)
                        <p class="vendor-mark">會員管理 / <span class="shipment-name">王喜花</span> / <span class="shipment-name">運輸紀錄</span> /
                            <span class="sort-name">出貨明細</span>
                        </p>
                        @endif
                    </div>
                </div>
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
                                                <form style="margin-bottom:0px" action="{{ url('attachments/'.$attachment->id) }}" method="post">
                                                    @method('DELETE')
                                                    @if(Auth::user()->role==99)
                                                        <input style="background-color: unset;font-size: 10px;color: #000;border: unset;border-radius: 4px;" type="submit" value="X">
                                                    @endif
                                                </form>
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
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
