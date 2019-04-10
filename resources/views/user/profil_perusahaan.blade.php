<?php $hal = 'Profil Akun' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Akun Perusahaan')
@section('content')
<div class="row" style="margin: 10px">
  <div class="col-lg-3"></div>
  <div class="col-lg-6">
    <div class="contact-form-wrap">
      <div class="box">
        <h1>PROFIL PERUSAHAAN</h1>
        <!-- <p class="lead">Not our registered customer yet?</p> -->
        <!-- <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p> -->
        <!-- <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p> -->
        <hr>
        @if(\Session::has('alert-success-1'))
        <div class="alert alert-success">
          <div>{{Session::get('alert-success-1')}}</div>
        </div>
        @endif
        <form action="{{ url('/userUpdate') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="alamat">Bidang:</label>
            <select class="form-control" required="" name="bidang_id">
              @foreach($list_bidang as $dt)
              <option value="{{ $dt->bidang_id }}">{{ $dt->bidang_nama }}</option>
              @endforeach
            </select>
          </div>
          @foreach($perusahaan as $dt)
          <div class="form-group">
            <label>Nama:</label>
            <input type="text"  class="form-control" value="{{ $dt->perusahaan_nama }}" name="perusahaan_nama" placeholder="Nama Perusahaan" required="">
          </div>
          <div class="form-group">
            <label>Alamat:</label>
            <input type="text" class="form-control" value="{{ $dt->perusahaan_alamat }}" name="perusahaan_alamat" placeholder="Alamat Perusahaan" required="">
          </div>
          <div class="form-group">
            <label>Kelurahan:</label>
            <input type="text" class="form-control" value="{{ $dt->perusahaan_kelurahan }}" name="perusahaan_kelurahan" placeholder="Kelurahan" required="">
          </div>
          <div class="form-group">
            <label>Kecamatan:</label>
            <input type="text" class="form-control" value="{{ $dt->perusahaan_kecamatan }}" name="perusahaan_kecamatan" placeholder="Kecamatan" required="">
          </div>
          <div class="form-group">
            <label>Contact Person:</label>
            <input type="number" class="form-control" value="{{ $dt->perusahaan_contact_person }}" name="perusahaan_contact_person" placeholder="0858xxxxx" required="">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" value="{{ $dt->perusahaan_email }}" name="perusahaan_email" placeholder="perusahaan@gmail.com" required="">
          </div>
          @endforeach
          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="perusahaan_password" placeholder="Password" required="">
          </div>
          <div class="form-group">
            <label>Password Confirmation:</label>
            <input type="password" class="form-control" id="confirmation" name="confirmation" placeholder="Password Confirmation" required="">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-user-md"></i> UPDATE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection