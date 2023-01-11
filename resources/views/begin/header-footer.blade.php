<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Tìm đồ thất lạc</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Roboto Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap"
      rel="stylesheet"
    />

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('clients/css/bootstrap.min.css')}}" />

    <!-- Font Awesome -->
    <link
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />

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
<div class="container-fluid login-fluid clear-left clear-right">
	<div class="login-container">
		<!-- login header -->
		<div class="login-header">
			<div class="w-login m-auto">
				<div class="login-logo">
					<h3>
						<!-- <a href="#">Tech<span class="txb-logo">Jobs.</span></a> -->
						<a href="#">
							<img src="{{asset('clients/img/Logo.png')}}" alt="TechJobs">
						</a>
					</h3>
					<span class="login-breadcrumb"><em>/</em> Đăng Nhập</span>
				</div>
				<div class="login-right">
					<a href="{{ route('trang-chu') }}" class="btn btn-return">Return Home</a>
				</div>
			</div>
		</div>
		<!-- (end) login header -->

		<div class="clearfix"></div>

		@yield('content')
		<!-- (end) login main -->
	</div>
</div>
<footer class="container-fluid copyright-wrap">
      <div class="container copyright">
        <p class="copyright-content" style="text-align: center;">
          Copyright © 2020 <a href="#"> Tech<b>Job</b></a
          >. All Right Reserved.
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
        moreLink:
          '<a href="#">Xem thêm<i class="fa fa-angle-down pl-2"></i></a>',
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
