@extends('index')
@section('body')
<div class="py-5 container-fluid clear-left clear-right">
      <div class="main-banner">
        <div class="banner-image">
          <img src="{{asset('clients/img/banner2.jpg')}}" alt="banner-image" />
        </div>
      </div>
      <div class="banner-content">
        <h3>Tìm Đồ Thất Lạc Trực Tuyến</h3>
        <div class="banner-tags" style="text-align: center">
          <h5 style="color: white; font-weight: 100">
            Tìm đồ thất lạc của bạn ở bất kỳ nơi đâu
          </h5>
        </div>
      </div>
    </div>
    <!-- (end) main banner -->

    <!-- search section -->
    <div class="container-fluid search-fluid">
      <div class="container">
        <div class="search-wrapper" style="margin-top: -11rem">
          <ul class="nav nav-tabs search-nav-tabs" id="myTab" role="tablist">
            <li class="nav-item search-nav-item">
              <a
                class="nav-link snav-link active"
                id="home-tab"
                data-toggle="tab"
                href="#home"
                role="tab"
                aria-controls="home"
                aria-selected="true"
                >Tìm Kiếm</a
              >
            </li>
            
          </ul>
          <div class="tab-content search-tab-content" id="myTabContent">
            <!-- content tab 1 -->
            <div
              class="tab-pane stab-pane fade show active"
              id="home"
              role="tabpanel"
              aria-labelledby="home-tab"
            >
              <form class="bn-search-form">
                <div class="row">
                  <div class="col-md-10 col-sm-12">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="input-group s-input-group">
                          <input
                            type="text"
                            class="form-control sinput"
                            placeholder="Nhập đồ thất lạc..."
                          />
                          <span><i class="fa fa-search"></i></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <select id="computer-languages">
                          <option value="" selected hidden>Loại</option>
                          <option>Ví/Bóp</option>
                          <option>CMND/CCCD</option>
                          <option>Giấy tờ</option>
                        </select>
                        <i class="fa fa-code sfa" aria-hidden="true"></i>
                      </div>
                      <div class="col-md-3">
                        <select id="s-provinces">
                          <option value="" selected hidden>
                            Tất cả địa điểm
                          </option>
                          <option>Đà Nẵng</option>
                          <option>Hà Nội</option>
                          <option>Hồ Chí Minh</option>
                          <option>Buôn Ma Thuột</option>
                          <option>Quy Nhơn</option>
                          <option>Nha Trang</option>
                        </select>
                        <i class="fa fa-map-marker sfa" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <button
                      type="submit"
                      class="btn btn-primary btn-search col-sm-12"
                    >
                      Tìm kiếm
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <!-- (end) content tab 1 -->
            <!-- content tab 2 -->
            
        </div>
      </div>
    </div>
    
<div class="container-fluid jb-wrapper">
      <div class="container">
        <div class="row">
          <!-- job board -->
          <div class="col-md-12 col-sm-12 col-12">
            <div class="job-board-wrap">
              <h2 class="widget-title" style="text-align: center">
                <span>Bài Đăng</span>
              </h2>
              @foreach ($dsBaiDang as $item)
              <div class="job-group">
                <div class="job pagi">
                  <div class="job-content">
                    <div class="job-logo">
                      <a href="#">
                        <img
                          src="{{asset('clients/img/fpt-logo.png')}}"
                          class="job-logo-ima"
                          alt="job-logo"
                        />
                      </a>
                    </div>

                    <div class="job-desc">
                      <div class="job-title" style="font-weight:bold;font-size:20px ">
                        {{ $item->tieu_de }}
                      </div>
                      <div class="job-company">
                        <a href="#">{{ $item->nguoiDung->ho_ten }}</a> |
                        <a href="#" class="job-address"
                          ><i class="fa fa-map-marker" aria-hidden="true"></i>
                          {{ $item->khuVuc->ten }}</a
                        >
                      </div>

                      <div class="job-inf">
                        <div class="job-main-skill">
                          <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                          <a href="#">Thích</a>
                        </div>
                        <div class="job-salary">
                          <i class="fa fa-comment-o" aria-hidden="true"></i>
                          <a href="#">Bình luận</a>
                        </div>
                        <div class="job-deadline">
                          <span
                            ><i class="fa fa-clock-o" aria-hidden="true"></i>
                            Ngày đăng: <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') == $item->updated_at->format('d/m/Y') ? $item->updated_at->format('H:i') : $item->updated_at->format('d/m/Y') }}</strong></span
                          >
                        </div>
                      </div>
                    </div>
                    <div class="wrap-btn-appl">
                      <a href="{{route('xem-bai-dang',['id' => $item->id])}}" class="btn btn-appl">Xem chi tiết</a>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    

    @endsection
    

    <div class="clearfix"></div>


   