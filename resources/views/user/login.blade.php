<?php $hal = 'Login' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Login')
@section('content')
<!-- Main Section -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="box">
            <div class="contact-form-wrap" style="margin: 10px;">
                <div class="box text-center">
                    <h1>Login</h1>
                    <p class="lead">Sudah Punya Akun Perusahaan?</p>
                    <div class="alert alert-danger" role="alert">
                        <strong>Warning !!</strong> Silahkan Login Terlebih Dahulu
                    </div>
                    @if(\Session::has('alert'))
                    <div class="alert alert-warning">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                    @endif
                    @if(\Session::has('alert-danger'))
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert-danger')}}</div>
                    </div>
                    @endif
                    <hr>
                    <form action="{{ url('loginPost2') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!-- <label for="email">Email</label> -->
                            <input id="email" type="text" class="form-control" required="" name="perusahaan_email" placeholder="perusahaan@gmail.com">
                        </div>
                        <div class="form-group">
                            <!-- <label for="password">Password</label> -->
                            <input id="password" type="password" class="form-control" required="" name="perusahaan_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </div>
                        Tidak Terdaftar Akun Perusahaan? <a href="{{url('user_reg')}}"> Daftar Sekarang</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<!-- /.main-section -->
@endsection