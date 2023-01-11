@extends('index')
@section('body')
<nav class="navbar navbar-expand-lg navbar-light nav-recuitment">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNava" aria-controls="navbarNava" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse container" id="navbarNava">
    <ul class="navbar-nav nav-recuitment-li">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('xl-trang-ca-nhan')}}">Quản lý hồ sơ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Bài đăng của tôi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Bài đăng đã lưu</a>
      </li>

    </ul>
    <ul class="rec-nav-right">
      <li class="nav-item">
        <a class="nav-link" href="#">Đăng bài</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid published-recuitment-wrapper">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12 recuitment-inner">
        <form class="recuitment-form" action="{{route('xl-dang-bai')}} " method="POST" enctype="multipart/form-data">
          @csrf
          <div class="accordion" id="accordionExample">
            <div class="card recuitment-card">
              <div class="card-header recuitment-card-header" id="headingOne">
                <h2 class="mb-0">
                  <a class="btn btn-link btn-block text-left recuitment-header" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Đăng tin đồ thất lạc
                    <span id="clickc1_advance2" class="clicksd">
                      <i class="fa fa fa-angle-up"></i>
                    </span>
                  </a>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body recuitment-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Tiêu đề<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề" />
                    </div>
                    @error('tieu_de')
                    <div style="padding-left: 280px" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Danh mục<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <select type="text" name="danh_muc" class="form-select" aria-label="Default select example">
                        @foreach ($danhMuc as $item)
                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Thể loại<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <select class="form-select" name="the_loai" aria-label="Default select example">
                        @foreach ($theLoai as $item)
                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Mô tả chi tiết<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <textarea type="text" class="form-control" name="noi_dung" placeholder="Nhập mô tả chi tiết" rows="5"></textarea>
                    </div>
                    @error('noi_dung')
                    <div style="padding-left: 280px" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Địa chỉ<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ" />
                    </div>
                    @error('dia_chi')
                    <div style="padding-left: 280px" class="fst-italic text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right label">Khu vực<span style="color: red" class="pl-2">*</span></label>
                    <div class="col-sm-9">
                      <select class="form-select" name="khu_vuc" aria-label="Default select example">
                        @foreach ($khuVuc as $item)
                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="card recuitment-card">
                    <div class="card-header recuitment-card-header" id="heading4">
                      <h2 class="mb-0">
                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                          Ảnh
                          <span id="clickc1_advance4" class="clicksd">
                            <i class="fa fa fa-angle-up"></i>
                          </span>
                        </a>
                      </h2>
                    </div>
                    <div id="collapse4" class="collapse show" aria-labelledby="heading4" data-parent="#collapse4">
                      <div class="card-body recuitment-body">

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right label">Ảnh</label>
                          <div class="col-sm-9">
                            <div id="drop-area">
                              <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)" />
                              <label style="cursor: pointer" for="fileElem">Tải ảnh lên hoặc kéo thả vào đây</label>
                              <progress id="progress-bar" max="100" value="0" class="d-none"></progress>
                              <div id="gallery"></div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="card recuitment-card">
                    <div class="card-header recuitment-card-header" id="headingThree">
                      <h2 class="mb-0">
                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Thông tin liên hệ
                          <span id="clickc1_advance1" class="clicksd">
                            <i class="fa fa fa-angle-up"></i>
                          </span>
                        </a>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body recuitment-body">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right label">Tên người liên hệ</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="ho_ten" placeholder="Tên người liên hệ" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right label">Email</label>
                          <div class="col-sm-9">
                            <input type="mail" class="form-control" name="email" placeholder="Địa chỉ email" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right label">Điện thoại<span style="color: red" class="pl-2">*</span></label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="dien_thoai" placeholder="Nhập số điện thoại" />
                          </div>
                          @error('dien_thoai')
                          <div style="padding-left: 280px" class="fst-italic text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="rec-submit">
                  <button type="submit" class="btn-submit-recuitment" name="">
                    <i class="fa fa-floppy-o pr-2"></i>Lưu Tin
                  </button>
                </div>
        </form>
      </div>
      <!-- Side bar -->

      <!-- (end) published recuitment -->

      <div class="clearfix"></div>


      @endsection