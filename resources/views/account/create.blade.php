@extends('layouts.app')

@section('content')

	<div class="col-md-10 col-md-offset-1">
		<div class="card">
			<div class="card-body">
				@if (session('status'))
				<div class="alert alert-success" role="alert">
				{{ session('status') }}
				</div>
				@endif
				<br>
				<div class="panel panel-info">
					<div class="panel-heading ">
						<div class="panel-title " >Account Registration</div>
					</div>
					<div class="panel-body ">

						<form class="form-horizontal form-material" method="POST" action="{{ route('insert-account') }}">
							@csrf
							<div class="row">
								<div class="col-md-6 ">
									<div class="form-group">
										<label class="col-md-3">First Name(s)</label>
										<div class="col-md-9">
											<input type="text" placeholder="eg: Suleiman Salum" class="form-control form-control-line @error('first_name') is-invalid @enderror" required name="first_name" value="{{ old('first_name') }}"> 
											@error('first_name')
	                                        <span class="invalid-feedback text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3">Last Name</label>
										<div class="col-md-9">
											<input type="text" placeholder="eg: Mohamed" class="form-control form-control-line   @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required name="last_name" >
											@error('last_name')
	                                        <span class="invalid-feedback text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3">Gender</label>
										<div class="col-md-9">
										<select class="form-control form-control-line  @error('first_name') is-invalid @enderror" name="gender">
										<option selected disabled>choose gender</option>
										<option value="MALE">MALE</option>
										<option value="FEMALE">FEMALE</option>
										</select>
										@error('gender')
	                                        <span class="invalid-feedback text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                            </span>
	                                    @enderror
										</div>
									</div>
								</div>

								<div class="col-md-6 ">
									<div class="form-group">
										<label class="col-md-3">Phone</label>
										<div class="col-md-9">
											<input type="text" value="{{ old('phone') }}" placeholder="eg: 0628027368"  class="form-control form-control-line  @error('phone') is-invalid @enderror" required name="phone" max="10" maxlength="10">
											@error('phone')
	                                        <span class="invalid-feedback text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror 
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3">Category</label>
										<div class="col-md-9">
										<select class="form-control form-control-line  @error('role') is-invalid @enderror" name="role">
										<option selected disabled>choose role</option>
										@foreach($roles as $role)
										<option value="{{$role->name}}">{{$role->name}}</option>
										@endforeach
										</select>
										@error('role')
	                                        <span class="invalid-feedback text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                            </span>
	                                    @enderror
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3">Email</label>
										<div class="col-md-9">
										<input type="email" value="{{ old('email') }}" placeholder="eg: sele.znz@gmail.com " class="form-control form-control-line  @error('email') is-invalid @enderror" required name="email">
										@error('email')
	                                        <span class="invalid-feedback text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                            </span>
                                    	@enderror
										</div>
									</div>
								</div>
							<div class="col-md-10 col-md-offset-1 ">
								<div class="form-group">
								<div class="box-footer ">
								<button type="submit" name="register" class="btn btn-success btn-group-justified" >Create Account</button>
								</div>
								</div> 
							</div>             
							</div>
						</form> 
					</div>
				</div>
			</div>
		</div>
	</div>
   
@endsection