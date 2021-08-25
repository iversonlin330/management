<!-- <form action="{{ url('login') }}" method="post">
    <input type="text" name="account">
    <input type="text" name="password">
    <input type="submit">
</form> -->
<head>
    <title>管理員登入</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>

<body>
    <!-- section -->
    <section class="login-section">
        <div class="login-body">
            <div class="logo-image">
                <img src="{{ asset('css/image/login-logo.png')}}" alt="">
            </div>
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