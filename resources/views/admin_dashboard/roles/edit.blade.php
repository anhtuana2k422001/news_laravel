@extends("admin_dashboard.layouts.app")
@section("style")
	<style>
		.permission{
			background-color: while;
			padding: 5px 10px;
			display: inline-block;
			font-size: 15px;
			margin: 2px 10px;
			cursor: pointer;
			color: green;
		}
	</style>
@endsection

@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Phân quyền</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sửa quyền</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Sửa quyền: {{ $role->name }}</h5>
					  <hr/>
					<form action="{{ route('admin.roles.update', $role) }}" method="POST">
						@csrf
						@method('PATCH')

                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Tên quyền</label>
											<input type="text" value=' {{ old("name", $role->name ) }}' name="name" required  class="form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">
										
											@error('name')
												<p class="text-danger">{{ $message }}</p>
											@enderror
										</div>

										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Chức năng cho phép</label>
											
											<div class="row">

												@php 
													$the_count = count($permissions);
													$start = 0;
												@endphp
											
												@for($j = 1 ; $j <= 3; $j++) 
													@php 
														$end = round($the_count * ($j / 3) );
													@endphp

													<div class="col-md-4">
														@for($i = $start ; $i < $end ; $i++)
															<label class="permission">
																<input {{ $role->permissions->contains($permissions[$i]->id) ? 'checked' : '' }}  type="checkbox" name="permissions[]" value="{{ $permissions[$i]->id }}"></input>
																{{ $permissions[$i]->name}}
															</label>	
														@endfor
													</div>

													@php 
														$start = $end;
													@endphp
												@endfor

											</div>

										
										</div>

										<button class="btn btn-primary" type="submit">Sửa quyền</button>
										
										<a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete_role_{{ $role->id }}').submit();" 
										href="#">Xóa quyền</a>


									</div>
								</div>
							</div>
						</div>

					</form>

					<form id="delete_role_{{ $role->id }}" action="{{ route('admin.roles.destroy', $role) }}"  method="post">
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
	<script>
		$(document).ready(function () {

			setTimeout(()=>{
					$(".general-message").fadeOut();
			},5000);

		});


	</script>

@endsection