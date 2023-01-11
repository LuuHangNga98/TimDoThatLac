<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Tìm đồ thất lạc</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Roboto Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet" />

  <!-- bootstrap css -->
  <link rel="stylesheet" type="text/css" href="{{asset('clients/css/bootstrap.min.css')}}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

  <!-- select 2 css -->
  <link rel="stylesheet" href="{{asset('clients/css/select2.min.css')}}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="{{asset('clients/css/owlcarousel/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('clients/css/owlcarousel/owl.theme.default.min.css')}}" />
  <!-- main css -->
  <link rel="stylesheet" type="text/css" href="{{asset('clients/css/style.css')}}" />
</head>

<body>
  <!-- main nav -->
  <div class="container-fluid fluid-nav">
    <div class="container cnt-tnar">
      <nav class="navbar navbar-expand-lg navbar-light bg-light tjnav-bar py-3">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <a href="#" class="nav-logo">
          <img src="{{asset('clients/img/Logo.png')}}" />
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto my-2 my-lg-0 tnav-right tn-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fa fa-search" style="color: black !important" aria-hidden="true"></i>
                <span class="hidden-text">Tìm kiếm</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-employers" href="{{ (Auth::id() == null ? route('trang-chu') : Auth::user()->admin == 0) ? route('trang-chu') : route('trang-chu-admin') }}">Trang chủ</a>
            </li>
            @if (Auth::id() != null)
            <div class="dropdown">
              <button class="nav-link btn-employers" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $user->ho_ten }}
                
              </button>
              @if (Auth::user()->admin == 0)
              <ul class="dropdown-menu mt-1 shadow" >
                <li class="hover">
                  <a class="dropdown-item text" href="{{ route('xl-trang-ca-nhan', ['id' => Auth::id()]) }}">Cá
                    nhân</a>
                </li>
                <li class="hover">
                  <a class="dropdown-item text" href="{{ route('dang-xuat') }}">Đăng xuất</a>
                </li>
              </ul>
              @endif
            </div>
            @else
            <a href="{{ route('xl-dang-nhap') }}" class="btn btn-success" style="width: 7em;margin-left:20px;">Đăng
              nhập</a>
            @endif

            <li class="nav-item">
              <a class="nav-link btn-employers" href="{{ (Auth::id() == null ? '/dang-nhap' : Auth::user()->admin == 0) ? '/dang-bai' : '#' }}" tabindex="-1" aria-disabled="true">Đăng bài</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- (end) main nav -->

  <div class="clearfix"></div>
  @yield('body')
  @yield('content')
  <!-- main banner -->

  <!-- (end) news -->

  <!-- footer -->


  <footer class="container-fluid copyright-wrap">
    <div class="container copyright">
      <p class="copyright-content" style="text-align: center;">
        Copyright © 2020 <a href="#"> Tech<b>Job</b></a>. All Right Reserved.
      </p>
    </div>
  </footer>

  <!-- (end) footer -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{asset('clients/js/readmore.js')}}"></script>
  <script type="text/javascript">
    $(".catelog-list").readmore({
      speed: 75,
      maxHeight: 150,
      moreLink: '<a href="#">Xem thêm<i class="fa fa-angle-down pl-2"></i></a>',
      lessLink: '<a href="#">Rút gọn<i class="fa fa-angle-up pl-2"></i></a>',
    });
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{asset('clients/js/jquery-3.4.1.slim.min.js')}}"></script>
  <script src="{{asset('clients/js/popper.min.js')}}"></script>
  <script src="{{asset('clients/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('clients/js/select2.min.js')}}"></script>
  <script src="{{asset('clients/js/jobdata.js')}}"></script>

  <!-- <script type="text/javascript" src="{{asset('clients/js/pagination.js"></script> -->
  <!-- Owl Stylesheets Javascript -->

  <!-- Read More Plugin -->
</body>

</html>