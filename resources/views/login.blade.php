@extends('layouts.main')

@section('title','管理員登入')
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