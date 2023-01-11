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

				<form class="login-form" action="{{ route('xl-dang-nhap')}} " method="POST">
					@csrf
					<div class="login-main-header">
						<h3>Đăng Nhập</h3>
					</div>
					<div class="input-div one">
						<div class="div lg-lable">
							
							<input type="text" name="email" class="input form-control-lgin" placeholder="Email" value="{{old('email')}}">
						</div>
						@error('email')
						<div class="fst-italic text-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="input-div pass">
						<div class="div lg-lable">
							
							<input type="password" name="password" class="input form-control-lgin" placeholder="Password" >
						</div>
						@error('password')
						<div class="fst-italic text-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group d-block frm-text">
						<a href="{{route('quen-mat-khau')}}" class="fg-login d-inline-block">Quên mật khẩu</a>
						<a href="{{ route('dang-ky') }}" class="fg-login float-right d-inline-block">Bạn chưa có tài khoản? Đăng ký</a>
					</div>
					<button type="submit" class="btn btn-primary float-right btn-login d-block w-100">Đăng Nhập</button>
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
@endsection