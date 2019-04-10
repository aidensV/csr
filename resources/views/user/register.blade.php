<?php $hal = 'Login' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Akun Perusahaan')
@section('content')
<div class="contact-form-wrap" style="margin: 10px">
  <div class="row">
    <div class="col-lg-6">
      <div class="box">
        <h1>New account</h1>
        <p class="lead">Tidak Terdaftar Akun Perusahaan?</p>
        <!-- <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p> -->
        <!-- <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p> -->
        <hr>
        @if(\Session::has('alert-success-1'))
        <div class="alert alert-success">
          <div>{{Session::get('alert-success-1')}}</div>
        </div>
        @endif
        <form action="{{ url('/registerPost') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="alamat">Bidang:</label>
            <select class="form-control" required="" name="bidang_id">
              @foreach($list_bidang as $dt)
              <option value="{{ $dt->bidang_id }}">{{ $dt->bidang_nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Nama:</label>
            <input type="text"  class="form-control" name="perusahaan_nama" placeholder="Nama Perusahaan" required="">
          </div>
          <div class="form-group">
            <label>Alamat:</label>
            <input type="text" class="form-control" name="perusahaan_alamat" placeholder="Alamat Perusahaan" required="">
          </div>
          <div class="form-group">
            <label>Kelurahan:</label>
            <input type="text" class="form-control" name="perusahaan_kelurahan" placeholder="Kelurahan" required="">
          </div>
          <div class="form-group">
            <label>Kecamatan:</label>
            <select id="perusahaan_kecamatan" class="form-control" name="perusahaan_kecamatan">
              <option value="">-- Pilih --</option>

              <option value="Kecamatan Kota"> Kecamatan Kota </option>
              <option value="Mojoroto"> Mojoroto</option>
              <option value="Pesantren"> Pesantren </option>

            </select>
          </div>
          <div class="form-group">
            <label>Contact Person:</label>
            <input type="number" class="form-control" name="perusahaan_contact_person" placeholder="0858xxxxx" required="">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="perusahaan_email" placeholder="perusahaan@gmail.com" required="">
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="perusahaan_password" placeholder="Password" required="">
          </div>
          <div class="form-group">
            <label>Password Confirmation:</label>
            <input type="password" class="form-control" id="confirmation" name="confirmation" placeholder="Password Confirmation" required="">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-md btn-success"><i class="fa fa-users"></i> Register</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="box">
        <h1>Login</h1>
        <p class="lead">Sudah Punya Akun Perusahaan?</p>
        <!-- <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p> -->
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
        @if(\Session::has('alert-success'))
        <div class="alert alert-success">
          <div>{{Session::get('alert-success')}}</div>
        </div>
        @endif
        <hr>
        <form action="{{ url('loginPost') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="text" class="form-control" name="perusahaan_email" placeholder="customer@gmail.com" required="">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="perusahaan_password" placeholder="Password" required="">
            <input type="hidden" class="form-control" name="redirect_to" value="{{$_SERVER['HTTP_REFERER']}}">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Log in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
