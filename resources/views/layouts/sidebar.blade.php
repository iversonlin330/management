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
