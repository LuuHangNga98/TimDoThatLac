@extends('begin/header-footer')
@section('content')
<div class="padding-top-90"></div>

  <h3 class="text-center">Quên mật khẩu</h3>
  <hr>
     <form class="form-lable" method="POST" action="" >
          <label class="control-label " >Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email">     
         <div class="text-center pt-3 pb-1">
          <button type="submit" class="btn btn-success">Gửi mail</button>
         </div>
     </form> 
     @endsection