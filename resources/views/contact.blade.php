@extends('main_layouts.master')

@section('title','HUTECH NEWS | Liên hệ')

@section('content')
<div class="colorlib-contact">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-12 animate-box">
						<h2>Thông Tin Liên Hệ</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="contact-info-wrap-flex">
									<div class="con-info">
										<p><span><i class="icon-location-2"></i></span> E1, Khu Công Nghệ Cao, <br>Hiệp Phú, TP. Thủ Đức</p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">(+84) 392 766 630</a></p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-paperplane"></i></span> <a href="mailto:hutechnews@gmail.com">hutechnews@gmail.com</a></p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-globe"></i></span> <a href="#">hutechnews.com</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Liên hệ với chúng tôi</h2>
					</div>

					<x-blog.message :status="'success'" />

					<div class="col-md-6">
						<form autocomplete="off" method="POST" action="{{ route('contact.store')}}">
							@csrf
							<div class="row form-group">
								<div class="col-md-6">
									<x-blog.form.input value='{{ old("first_name")}}' placeholder="Họ của bạn" name="first_name"/>
								</div>
								<div class="col-md-6">
									<x-blog.form.input value='{{ old("last_name")}}'  placeholder="Tên của bạn"  name="last_name"/>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<x-blog.form.input value='{{ old("email")}}'  type="email" placeholder="Địa chỉ Email" name="email"/>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<x-blog.form.input value='{{ old("subject")}}'  required='true' placeholder="Tiêu đề"  name="subject"/>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<x-blog.form.textarea value='{{ old("message")}}'  placeholder="Nội dung bạn muốn nói về chúng tôi"  name="message"/>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Gửi đi" class="btn btn-primary">
							</div>
						</form>		

						<!-- <x-blog.message :status="'success'" /> -->

					</div>
					<div class="col-md-6">
						<div id="map" class="colorlib-map"></div>
					</div>
				</div>
			</div>
		</div>
@endsection