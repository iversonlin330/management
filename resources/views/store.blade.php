<!-- @include('sidebar')
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
</table> -->

<head>
    <title>運輸紀錄</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/store.blade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swap.css') }}">
</head>

<body>
    <!-- transport section -->
    <section class="transport-section container-fluid">
        <div class="transport-main row col-12">
            <!-- sidebar -->
            @if(Auth::user()->role == 99)

            <div class="sidebar col-lg-2">
                <div class="sidebar-logo">
                    <img src="{{ asset('css/image/login-logo.png') }}" alt="">
                </div>
                <!--/ vendor sidebar-card /-->
                <div id="accordion" class="sidebar-accordion vendor-sidebar">
                    <!--sidebar-card-->
                    <div class="sidebar-card">
                        <div class="sidebar-header sidebar-line" id="headingOne">
                            <h5 class="mb-0 sidebar-title">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <img src="{{ asset('css/image/siderbar-img-01.png') }}" alt="">
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
                                    <img style="margin-left:5px" src="{{ asset('css/image/siderbar-img-02.png') }}" alt="">
                                    資料匯入
                                    <div class="sidebar-down">
                                        <img src="{{ asset('css/image/siderbar-img-03.png') }}" alt="">
                                    </div>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                            data-parent="#accordion">
                            <div class="card-body">
                                <ul class="siderbar-list">
                                    <li onclick='$("#store_input").click()'>匯入入倉履歷</li>
                                    <li onclick='$("#transport_input").click()'>匯入運輸紀錄</li>
                                    <li onclick='$("#ship_input").click()'>匯入出貨明細</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ member sidebar-card /-->
                <div id="accordion" class="sidebar-accordion member-sidebar">
                    <!--sidebar-card-->
                    <div class="sidebar-card">
                        <div class="sidebar-header" id="headingTwo">
                            <h5 class="mb-0 sidebar-title">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    <img style="margin-left:5px" src="/management-master/public/css/image/siderbar-img-02.png" alt="">
                                    首頁
                                    <div class="sidebar-down">
                                        <img src="/management-master/public/css/image/siderbar-img-03.png" alt="">
                                    </div>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                            data-parent="#accordion">
                            <div class="card-body">
                                <ul class="siderbar-list">
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
            @else

            @endif
            <!-- transport body -->
            <div class="transport-body col-lg-10">
                <!-- mark -->
                <div class="transport-big-mark">
                    <h1>千森株式會社會員管理平台</h1>
                    <div class="transport-sort">
                        <p class="member-mark">首頁 / <span class="sort-name">運輸紀錄</span> </p>
                        <p class="vendor-mark">會員管理 / <span class="transport-name">王喜花</span> / <span
                                class="sort-name">運輸紀錄</span> </p>
                    </div>
                </div>
                <!-- transport record -->
                <div class="transport-record row col-lg-12">
                    <!-- transport block  -->
                    <div class="transport-block col-lg-12">
                        <div class="transport-title">
                            <h2>運輸紀錄： <span class="transport-num">{{ $store->store_no }}</span></h2>
                            <button class="btn transport-add vendor-btn">新增</button>
                        </div>
                        <!-- table transport -->
                        <table class="stored-table transport-information">
                            <tbody class="infro-body">
                                <tr class="infro-title gold-line transport-header">
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
                                    <tr class="infro-title gold-line">
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
                                        <td class="transport-btn vendor-btn">
                                            <form action="{{ url('transports/'.$transport->id) }}" method="post">
                                                <input type="button" value="編輯">
                                                @method('DELETE')
                                                <input type="submit" value="刪除">
                                            </form>
                                        </td>
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

