@extends("admin_dashboard.layouts.app")
@section("style")
	
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

@endsection
		
@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tài khoản</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sửa tài khoản</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Sửa tài khoản: {{ $user->name }}</h5>
					  <hr/>
					<form action="{{ route('admin.users.update', $user) }}" method="POST"  enctype="multipart/form-data" >
						@csrf
						@method('PATCH')

                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">

										<div class="mb-3">
											<label for="input_name" class="form-label">Họ Tên</label>
											<input name="name" type="text"  class="form-control" id="input_name" value='{{ old("name", $user->name ) }}'>
										
											@error('name')
												<p class="text-danger">{{ $message }}</p>
											@enderror
										</div>

										<div class="mb-3">
											<label for="input_email" class="form-label">Email</label>
											<input name="email" type="email" class="form-control" id="input_email" value='{{ old("email", $user->email) }}'>
										
											@error('email')
												<p class="text-danger">{{ $message }}</p>
											@enderror
										</div>

										<div class="mb-3">
													<label for="input_password" class="form-label">Mật khẩu</label>
													<input name="password" type="password"  class="form-control" id="input_password">
												
													@error('password')
														<p class="text-danger">{{ $message }}</p>
													@enderror
												</div>

										<div class="row">
											<div class="col-md-8">
												<div class="mb-3">
													<label for="input_image" class="form-label">Ảnh đai diện</label>
													<input name="image" type="file" class="form-control" id="input_image" >
												
													@error('image')
														<p class="text-danger">{{ $message }}</p>
													@enderror
												</div>
											</div>
											<div class="col-md-4">
												<div class="user_image">
													<img class="img_admn--user img-avatar" width="220px" height="220px" style="border-radius: 50%; margin: auto; background-size: cover ;  background-image: url({{ $user->image ?  asset('storage/' . $user->image->path) : asset('storage/placeholders/user_placeholder.jpg') }})" alt="">
												</div>
											</div>
										</div>

										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Quyền tài khoản</label>
												<div class="card">
													<div class="card-body">
														<div class="p-3 rounded">
															<div class="mb-3">
																<select name="role_id" required class="single-select">
																	@foreach( $roles as $key => $role )
																	<option {{ $user->role_id === $key ? "selected" : '' }} value="{{ $key }}">{{ $role }}</option>
																	@endforeach
																</select>

																@error('role_id')
																	<p class="text-danger">{{ $message }}</p>
																@enderror

															</div>
														</div>
													</div>
												</div>
										</div>

										<button class="btn btn-primary" type="submit">Sửa tài khoản</button>

										<a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete_user_{{ $user->id }}').submit();" 
										href="#">Xóa tài khoản</a>

									</div>
								</div>
							</div>
						</div>
					</form>

					<form id="delete_user_{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}"  method="post">
						@csrf
						@method('DELETE')
					</form>

				  </div>
			  </div>


			</div>
		</div>
		<!--end page wrapper -->
@endsection
	
@section("script")
	<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			// $('#image-uploadify').imageuploadify();

			$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
			});

		setTimeout(()=>{
				$(".general-message").fadeOut();
		},5000);

		});


	</script>

@endsection