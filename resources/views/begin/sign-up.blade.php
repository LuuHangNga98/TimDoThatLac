@extends('begin/header-footer')
@section('content')
<div class="padding-top-90"></div>

<!-- login main -->
<div class="login-main">
	<div class="w-login m-auto">
		<div class="row">
			<!-- login main descriptions -->
			<div class="col-md-6 col-sm-12 col-12 login-main-left">
				<img src="{{asset('clients/img/banner-login.png')}}">
			</div>
			<!-- login main form -->
			<div class="col-md-6 col-sm-12 col-12 login-main-right">

				<form class="login-form reg-form" action="{{ route('xl-dang-ky')}}" method="POST">
					@csrf
					<div class="login-main-header">
						<h3>Đăng Ký</h3>
					</div>
					<div class="input-div one">
						<div class="div lg-lable">
								
							<input type="text" name="ho_ten" class="input form-control-lgin" placeholder="Họ và tên *" value="{{old('ho_ten')}}">
						</div>
						@error('ho_ten')
						<div class="fst-italic text-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="input-div one">
						<div class="div lg-lable">
							
							<input type="text" name="email" class="input form-control-lgin" placeholder="Email *" value="{{old('email')}}">
						</div>
						@error('email')
						<div class="fst-italic text-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="input-div one">
						<div class="div lg-lable">
							
							<input type="text" name="so_dien_thoai" class="input form-control-lgin" placeholder="Số điện thoại" value="{{old('so_dien_thoai')}}" >
						</div>
					</div>

					<div class="input-div one">
						<div class="div lg-lable">
							
							<input type="password" name="password" class="input form-control-lgin" placeholder="Password *" >
						</div>
						@error('password')
						<div class="fst-italic text-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="input-div one">
						<div class="div lg-lable">
							
							<input type="password" name="confirm_password" class="input form-control-lgin" placeholder="Confirm-Password *" >
						</div>
						@error('confirm_password')
						<div class="fst-italic text-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group d-block frm-text">
						<a href="#" class="fg-login d-inline-block"></a>
						<a href="{{ route('xl-dang-nhap')}}" class="fg-login float-right d-inline-block">Bạn đã có tài khoản? Đăng Nhập</a>
					</div>
					<button type="submit" class="btn btn-primary float-right btn-login d-block w-100">Đăng Ký</button>
					<div class="form-group d-block w-100 mt-5">
						<div class="text-or text-center">
							<span>Hoặc</span>
						</div>

						<div class="row">
							<div class="col-sm-6 col-12 pr-7">
								<button class="btn btn-secondary btn-login-facebook btnw w-100 float-left">
									<i class="fa fa-facebook" aria-hidden="true"></i>
									<span>Đăng nhập bằng Facebook</span>
								</button>
							</div>
							<div class="col-sm-6 col-12 pl-7">
								<button class="btn btn-secondary btn-login-google btnw w-100 float-left">
									<i class="fa fa-google" aria-hidden="true"></i>
									<span>Đăng nhập bằng Google</span>
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- (end) login main -->
</div>
@endsection