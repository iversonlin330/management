<!-- @extends('layouts.main') -->
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swap.css') }}">
</head>
@if(Auth::user->role==99)
    @section('title','管理員登入')
@endif

@section('title','會員登入')

<body>
    <!-- section -->
    <section class="login-section">
        <div class="login-body">
            <div class="logo-image">
                <img src="{{ asset('css/image/login-logo.png')}}" alt="">
            </div>
            @if(Auth::user()->role == 99)
            <!-- login block -->
            <div id="loginBlock" class="login-block">
                <h2 class="login-title">管理員登入</h2>
                <form class="login-check" action="{{ url('login') }}" method="post">
                    <div class="login-input">
                        <img src="{{ asset('css/image/login-input-01.png')}}" alt="">
                        <input type="text" name="account" placeholder="帳號/手機">
                    </div>
                    <div class="login-input">
                        <img src="{{ asset('css/image/login-input-02.png')}}" alt="">
                        <input type="text" name="password" placeholder="密碼">
                    </div>
                    <div class="login-admin">
                        <input type="submit" value="登入" ></input>
                    </div>
                </form>
            </div>
            @endif
            <!-- member login -->
            <div class="member-login">
                <!-- member login block -->
                <div id="loginBlock" class="login-block">
                    <h2 class="login-title">會員登入</h2>
                    <div class="login-check">
                        <div class="login-input">
                            <img src="{{ asset('css/image/login-input-01.png')}}" alt="">
                            <input type="text" placeholder="帳號/手機">
                        </div>
                        <div class="login-input">
                            <img src="{{ asset('css/image/login-input-02.png')}}" alt="">
                            <input type="text" placeholder="密碼">
                        </div>
                    </div>
                    <div class="login-admin">
                        <input type="submit" value="登入" style="border:none;"></input>
                    </div>
                    <div class="password-edit">
                        <button class="btn">忘記密碼</button>
                        <button class="btn">註冊會員</button>
                    </div>
                </div>
                <!-- member register block -->
                <div id="registerBlock" class="login-block register-block">
                    <h2 class="login-title">會員註冊</h2>
                    <!-- member edit body -->
                    <div class="modal-body register-body">
                        <span class="register-data">
                            <p>真實姓名</p><input type="text" placeholder="" required>
                        </span>
                        <span class="register-data">
                            <p>出生年月日</p><input type="date" placeholder="" required>
                        </span>
                        <span class="register-data">
                            <p>聯絡地址</p><input type="text" placeholder="" required>
                        </span>
                        <span class="register-data">
                            <p>聯絡電話</p><input type="tel" placeholder="即為登入帳號" required>
                        </span>
                        <span class="register-data">
                            <p>密碼</p><input type="password" placeholder="" required>
                        </span>
                        <span class="register-data">
                            <p>收件地址</p><input type="text" placeholder="（若與聯絡地址相同，無需填寫）">
                        </span>
                        <span class="register-data">
                            <p>收件人電話</p><input type="tel" placeholder="（若與聯絡地址相同，無需填寫）">
                        </span>
                        <span class="register-data">
                            <p>LINE ID</p><input type="text" placeholder="">
                        </span>
                        <span class="register-data">
                            <p>電子信箱</p><input type="email" placeholder="">
                        </span>
                        <span class="register-data">
                            <p>性別</p><input type="text" placeholder="">
                        </span>
                    </div>
                    <div class="login-admin">
                        <button class="btn">註冊</button>
                    </div>
                </div>
                <!-- member check block -->
                <div id="checkBlock" class="login-block check-block">
                    <h2 class="login-title">已發送驗證信件，至您的信箱</h2>
                    <p>系統已自動發送驗證信件至您的聯絡信箱，請至信箱點擊連結來完成資料驗證。</p>
                </div>
            </div>
        </div>
    </section>
    <!-- member terms block -->
    <div class="terms-block member-btn">
        <button class="btn"> <a href="">隱私權政策</a></button>
        <button class="btn"> <a href="">服務條款</a></button>
    </div>

</body>