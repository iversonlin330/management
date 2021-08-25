<!-- @include('sidebar')
會員清單
<table>
    <thead>
    <th>客戶編號</th>
    <th>姓名</th>
    <th>狀態</th>
    <th>刪除</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->u_id }}</td>
            <td><a href="{{ url('/setMember?user_id='.$user->id) }}">{{ $user->name }}</td>
            <td>{{ ($user->email_verified_at == null)? '未開通' : '已開通' }}</td>
            <td>
                <form action="{{ url('users/'.$user->id) }}" method="post">
                    @method('DELETE')
                    <input type="submit" value="刪除">
                </form>
                {{--                <a href="{{ url('users/'.$user->id) }}">刪除</a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table> -->
<head>
    <title>會員管理</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.blade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swap.css') }}">
</head>

<body>
    <!-- member index section -->
    <section class="member-index-section container-fluid">
        <div class="member-index-main row col-12">
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
            <!-- member index body -->
            <div class="member-index-body col-lg-10">
                <!-- mark -->
                <div class="member-index-big-mark">
                    <h1>千森株式會社會員管理平台</h1>
                    <div class="member-index-sort">
                        <p>會員管理</p>
                    </div>
                </div>
                <hr>
                <!-- member index record -->
                <div class="member-index-record row col-lg-12">
                    <!-- member index block  -->
                    <div class="member-index-block col-lg-12">
                        <div class="member-index-title input-group rounded">
                            <span class="input-group-text border-0" id="search-addon">
                                <img src="{{ asset('css/image/search.png') }}" alt="">
                            </span>
                            <input type="search" class="form-control rounded member-search" placeholder="搜尋客戶姓名..."
                                aria-label="Search" aria-describedby="search-addon" />
                        </div>
                        <!-- table member index -->
                        <table class="stored-table member-index-information">
                            <tbody class="infro-body">
                                <tr class="infro-title gold-line member-index-header">
                                    <td>客戶編號</td>
                                    <td>客戶姓名</td>
                                    <td>狀態</td>
                                </tr>
                                <!-- member index data-01 -->
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="infro-title gold-line">
                                        <td>{{ $user->u_id }}</td>
                                        <td><a href="{{ url('/setMember?user_id='.$user->id) }}">{{ $user->name }}</td>
                                        <td>{{ ($user->email_verified_at == null)? '未開通' : '已開通' }}</td>
                                        <td class="member-index-btn">
                                            <form action="{{ url('users/'.$user->id) }}" method="post">
                                                @method('DELETE')
                                                <input type="submit" value="刪除">
                                            </form>
                                            {{--<a href="{{ url('users/'.$user->id) }}">刪除</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
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
