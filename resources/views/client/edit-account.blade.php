@extends('index')
@section('body')
<div class="clearfix"></div>

<!-- recuiter Nav -->
<nav class="navbar navbar-expand-lg navbar-light nav-recuitment">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNava" aria-controls="navbarNava" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse container" id="navbarNava">
    <ul class="navbar-nav nav-recuitment-li">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('trang-ca-nhan')}}">Quản lý hồ sơ</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">Bài đăng của tôi</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Đồ thất lạc</a></li>
            <li><a class="dropdown-item" href="#">Đồ nhặt được</a></li>
            
          </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Bài đăng đã lưu</a>
      </li>
      
    </ul>
    <ul class="rec-nav-right">
      <li class="nav-item">
        <a class="nav-link" href="#">Đăng Bài</a>
      </li>
    </ul>
  </div>
</nav>
<!--  recuiter Nav -->


<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12 recuitment-inner">
        <form class="employee-form" action="{{ route('xl-trang-ca-nhan')}}" method="POST">
        @csrf
          <div class="accordion" id="accordionExample">
            <div class="card recuitment-card">
              <div class="card-header recuitment-card-header" id="headingOne">
                <h2 class="mb-0">
                  <a class="btn btn-link btn-block text-left recuitment-header" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Thông tin tài khoản
                    <span id="clickc1_advance2" class="clicksd">
                      <i class="fa fa fa-angle-up"></i>
                    </span>
                  </a>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body recuitment-body row">
                  <div class="col-md-3">
                    <div class="avatar-upload">
                      <div class="avatar-edit">
                          <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                          <label for="imageUpload"></label>
                      </div>
                      <div class="avatar-preview">
                          <div id="imagePreview"  style="background-image: url(https://i.pravatar.cc/500?img=7);">
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Họ tên<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" name="ho_ten" class="form-control" placeholder="Nhập họ và tên" value="{{ $user->ho_ten }}" >
                      @error('ho_ten')
                        <div style="padding-left: .5em" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Số điện thoại<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <input type="number" name="so_dien_thoai" class="form-control" value="{{ $user->so_dien_thoai }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Giới tính<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <select type="text" name="gioi_tinh" class="form-control" id="jobGender">
                        <option value="">Chọn giới tính</option>
                        <option value="1" {{ '1' == $user->gioi_tinh ? 'selected' : '' }}>Nam</option>
                        <option value="2" {{ '2' == $user->gioi_tinh ? 'selected' : '' }}>Nữ</option>
                      </select>
                    </div>
                  </div>
            
          
          <div class="rec-submit">
            <button type="submit" class="btn-submit-recuitment mb-3 ml-3" name="">
              <i class="fa fa-floppy-o pr-2"></i>Lưu Hồ Sơ
            </button>
          </div>
        </form>
        
      </div>
      @endsection