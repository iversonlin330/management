<!-- @include('sidebar')
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
{{ config('map.gender')[$current_user->gender] }}<br> -->


<!-- Deposit預付金<br>
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
</table> -->

<!-- Deposit預付金使用紀錄<br>
您目前的購物餘額{{ $store_price - $total_use }}<br>
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
</table> -->
<!-- 入倉履歷<br>
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
</table> -->

<head>
    <title>會員管理平台</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/member.blade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swap.css') }}">

</head>

<body>
    <!-- member section -->
    <section class="member-section container-fluid">
        <div class="member-main row col-12">
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
            <!-- member body -->
            <div class="member-body col-lg-10">
                <!-- mark -->
                <div class="member-big-mark">
                    <h1>千森株式會社會員管理平台</h1>
                    <div class="member-sort">
                        <p class="member-mark">首頁</p>
                        <p class="vendor-mark">會員管理 / <span class="sort-name">王喜花</span> </p>
                    </div>
                </div>
                <!-- right memeber -->
                <div class="right-memeber row col-lg-12">
                    <!-- member block  -->
                    <div class="member-block member-infro-block col-lg-4">
                        <div class="member-title">
                            <h2>會員基本資料</h2>
                            <button class="btn edit-infro vendor-btn" data-toggle="modal"
                                data-target="#vendorEditModal">編輯</button>
                            <button class="btn edit-infro member-btn" data-toggle="modal"
                                data-target="#memberEditModal">變更密碼</button>
                        </div>
                        <!-- ---edit modal--- -->
                        <!--/ vendor edit modal / -->
                        <div class="modal edit-modal vendor-modal" id="vendorEditModal" tabindex="-1" role="dialog"
                            aria-labelledby="editModal" aria-hidden="true">
                            <div class="modal-dialog edit-dialog " role="document">
                                <div class="modal-content edit-content">
                                    <div class="modal-header edit-header">
                                        <h5 class="edit-title vendor-mark">編輯會員基本基料</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- vendor edit body -->
                                    <div class="modal-body edit-body vendor-modal">
                                        <span class="edit-data">
                                            <p>會員編號</p><span class="member-num">{{ $current_user->u_id }}</span>
                                        </span>
                                        <span class="edit-data">
                                            <p>真實姓名</p><input type="text" name="name" value="{{ $current_user->name }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>出生年月日</p><input type="date" name="birthday" value="{{ $current_user->birthday }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>聯絡地址</p><input type="text" name="address" value="{{ $current_user->address }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>聯絡電話</p><input type="tel" name="account" value="{{ $current_user->account }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>密碼</p><input type="password" name="password" value="{{ $current_user->password }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>收件地址</p><input type="text" name="get_address" value="{{ $current_user->get_address }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>收件人電話</p><input type="tel" name="get_phone" value="{{ $current_user->get_phone }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>LINE ID</p><input type="text" name="line_id" value="{{ $current_user->line_id }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>電子信箱</p><input type="email" name="email" value="{{ $current_user->email }}">
                                        </span>
                                        <span class="edit-data">
                                            <p>性別</p><input type="text" name="gender" value="{{ $current_user->gender }}">
                                        </span>
                                    </div>
                                    <!-- infro edit submit -->
                                    <div class="modal-footer edit-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                        <button type="button" class="btn btn-primary">儲存變更</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ member edit modal / -->
                        <div class="modal edit-modal member-modal" id="memberEditModal" tabindex="-1" role="dialog"
                            aria-labelledby="editModal" aria-hidden="true">
                            <div class="modal-dialog edit-dialog " role="document">
                                <div class="modal-content edit-content">
                                    <div class="modal-header edit-header">
                                        <h5 class="edit-title member-mark">變更密碼</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- member edit body -->
                                    <div class="modal-body edit-body member-modal">
                                        <span class="edit-data member-newpassword">
                                            <input type="password" placeholder="新密碼">
                                        </span>
                                        <span class="edit-data member-newpassword">
                                            <input type="password" placeholder="二次輸入新密碼">
                                        </span>
                                    </div>
                                    <!-- infro edit submit -->
                                    <div class="modal-footer edit-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                        <button type="button" class="btn btn-primary">儲存變更</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ---table menber--- -->
                        <table class="personal-information">
                            <tbody class="infro-body">
                                <tr class="infro-title">
                                    <td>會員編號</td>
                                    <td>{{ $current_user->u_id }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>真實姓名</td>
                                    <td>{{ $current_user->name }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>出生年月日</td>
                                    <td>{{ $current_user->birthday }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>聯絡地址</td>
                                    <td>{{ $current_user->address }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>聯絡電話</td>
                                    <td>{{ $current_user->get_phone }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>密碼</td>
                                    <td>{{ $current_user->account }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>收件地址</td>
                                    <td>{{ $current_user->address }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>收件人電話</td>
                                    <td>{{ $current_user->get_phone }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>LINE ID</td>
                                    <td>{{ $current_user->line_id }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>電子信箱</td>
                                    <td>{{ $current_user->email }}</td>
                                </tr>
                                <tr class="infro-title">
                                    <td>性別</td>
                                    <td>{{ config('map.gender')[$current_user->gender] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Gold block -->
                    <div class="gold-block col">
                        <!-- Gold block-1 -->
                        <div class="gold-flow col">
                            <!-- gold stored -->
                            <div class="member-block">
                                <div class="member-title">
                                    <h2>預付金儲值紀錄</h2>
                                    @if(Auth::user()->role == 99)
                                    <button class="btn member-infro gold-add vendor-btn" data-toggle="modal"
                                        data-target="#goldEditModal">新增</button>
                                    @endif
                                </div>
                                <!-- gold edit modal -->
                                <div class="modal edit-modal" id="goldEditModal" tabindex="-1" role="dialog"
                                    aria-labelledby="editModal" aria-hidden="true">
                                    <div class="modal-dialog edit-dialog " role="document">
                                        <div class="modal-content edit-content">
                                            <div class="modal-header edit-header">
                                                <h5 class="edit-title">編輯預付金紀錄</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- gold edit body -->
                                            <form action="{{ url('deposits') }}" method="post">
                                            <div class="modal-body edit-body">
                                                <span class="edit-data gold-data">
                                                    <p>儲值日期</p><input type="date" name="c_date" placeholder="2021年月14號">
                                                </span>
                                                <span class="edit-data">
                                                    <p>儲值金額 <br> (台幣)</p><input type="number" name="amount" placeholder="10,000">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>使用匯率</p><input type="number" name="rate" placeholder="0.265">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>日幣金額</p><input type="number" name="jpy" placeholder="37,736">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>備註</p><input type="text" name="note" placeholder="說明文字內容">
                                                </span>
                                            </div>
                                            <!-- gold edit submit -->
                                            <div class="modal-footer edit-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">關閉</button>
                                                <button type="submit" class="btn btn-primary">儲存變更</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- table stored -->
                                <div class="stored-table first-stored-block">
                                    <table class="personal-information stored-information">
                                        <tbody class="stored-body">
                                            <!-- title -->
                                            <tr class="stored-table-title infro-title gold-line stored-title">
                                                <td>儲值日期</td>
                                                <td>儲值金額(台幣)</td>
                                                <td>使用匯率</td>
                                                <td>日幣金額</td>
                                                <td>備註</td>
                                            </tr>
                                            <!-- body -->
                                            <!-- gold stored -->
                                            <tbody>
                                                @php
                                                    $store_price = 0;
                                                @endphp
                                                @foreach($current_user->deposits as $deposit)
                                                    <tr class="infro-title stored-title gold-line">
                                                        <td>{{ $deposit->c_date }}</td>
                                                        <td>{{ $deposit->amount }}</td>
                                                        <td>{{ $deposit->rate }}</td>
                                                        <td>{{ $deposit->jpy }}</td>
                                                        <td>{{ $deposit->note }}</td>
                                                        <td class="explanation">
                                                            <div class="explanation-btn vendor-btn">
                                                                <form action="{{ url('deposits/'.$deposit->id) }}" method="post">
                                                                    @method('DELETE')
                                                                    <input type="submit" value="刪除">
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        /* @var $store_price */
                                                        /* @var $deposit */
                                                        $store_price = $store_price + $deposit->jpy;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                            <!-- <tr class="infro-title stored-title gold-line">
                                                <td>2021年5月14號</td>
                                                <td>10,000</td>
                                                <td>0.265</td>
                                                <td>37736</td>
                                                <td class="explanation">說明文字內容
                                                    <div class="explanation-btn vendor-btn">
                                                        <button class="btn">編輯</button>
                                                        <button class="btn">刪除</button>
                                                    </div>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Gold block-2 -->
                        <div class="gold-flow col">
                            <!-- gold stored -->
                            <div class="member-block">
                                <div class="member-title">
                                    <h2>預付金使用紀錄</h2>
                                </div>
                                <!-- table stored -->
                                <div class="stored-table sec-stored-block">
                                    <table class="personal-information stored-information">
                                        <tbody class="stored-body">
                                            <!-- title -->
                                            <tr class="stored-table-title infro-title gold-line stored-title">
                                                <td style="color: #FFC107;">您目前的購物金餘額</td>
                                            </tr>
                                            <tr class="infro-title stored-title gold-line">
                                                <td>{{ $store_price - $total_use }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="personal-information stored-information">
                                        <tbody class="stored-body">
                                            <!-- title -->
                                            <tr class="stored-table-title infro-title gold-line stored-title">
                                                <td>使用日期</td>
                                                <td>國際貨運追蹤號碼</td>
                                                <td>購物金額(日幣)</td>
                                            </tr>
                                            <!-- body -->
                                            <!-- gold stored -->
                                            @foreach($use_datas as $use_data)
                                                <tr class="infro-title stored-title gold-line">
                                                    <td>{{ $use_data['use_date'] }}</td>
                                                    <td>{{ $use_data['order_no'] }}</td>
                                                    <td>{{ $use_data['total'] }}</td>
                                                </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Gold block-3 -->
                        <div class="gold-flow col">
                            <!-- gold stored -->
                            <div class="member-block">
                                <div class="member-title">
                                    <h2>入倉履歷</h2>
                                    <button class="btn member-infro gold-add vendor-btn" data-toggle="modal"
                                        data-target="#goldAddModal">新增</button>
                                </div>
                                <!-- gold edit modal -->
                                <div class="modal edit-modal" id="goldAddModal" tabindex="-1" role="dialog"
                                    aria-labelledby="editModal" aria-hidden="true">
                                    <div class="modal-dialog edit-dialog " role="document">
                                        <div class="modal-content edit-content">
                                            <div class="modal-header edit-header">
                                                <h5 class="edit-title">新增預付金紀錄</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- gold edit body -->
                                            <div class="modal-body edit-body">
                                                <span class="edit-data gold-data">
                                                    <p>儲值日期</p><input type="date" placeholder="">
                                                </span>
                                                <span class="edit-data">
                                                    <p>儲值金額 <br> (台幣)</p><input type="number" placeholder="">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>使用匯率</p><input type="number" placeholder="">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>日幣金額</p><input type="number" placeholder="">
                                                </span>
                                                <span class="edit-data gold-data">
                                                    <p>備註</p><input type="text" placeholder="">
                                                </span>
                                            </div>
                                            <!-- gold edit submit -->
                                            <div class="modal-footer edit-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">關閉</button>
                                                <button type="button" class="btn btn-primary">儲存變更</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- table stored -->
                                <div class="stored-table thr-stored-block">
                                    <table class="personal-information stored-information">
                                        <tbody class="stored-body">
                                            <!-- title -->
                                            <tr class="stored-table-title infro-title gold-line stored-title">
                                                <td>入倉日期</td>
                                                <td>國內運輸公司/取貨地點</td>
                                                <td>日本國內運輸公司追蹤單號</td>
                                            </tr>
                                            <!-- body -->
                                            <!-- gold stored -->
                                            @foreach($current_user->stores as $store)
                                                <tr class="infro-title stored-title gold-line" >
                                                    <td>{{ $store->c_date }}</td>
                                                    <td>{{ $store->location }}</td>
                                                    <td><a href="{{ url('stores/'.$store->id) }}">{{ $store->store_no }}</a></td>
                                                    <td class="explanation">
                                                        <div class="explanation-btn vendor-btn">
                                                            <form action="{{ url('stores/'.$store->id) }}" method="post">
                                                                @method('DELETE')
                                                                <input type="submit" value="刪除">
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
