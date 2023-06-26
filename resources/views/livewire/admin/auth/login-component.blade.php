@section('title', 'Login')

<div>

	<div class="container h-100">
		<div class="row justify-content-center h-100 align-items-center">
			<div class="col-xl-12 mt-xl-5">
				<div class="row align-items-center ">
					<div class="card login-card">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-6">
									<div class="text-center my-5">
										<a href="{{ url('/') }}">
											<img
												src="{{ $setting->site_logo != null ? asset('storage/' . $setting->site_logo) : asset('assets/auth/images/logo-full.png') }}"
												alt="">
										</a>
									</div>
									<div class="media-login">
										<img src="{{ asset('assets/auth/images/svg/student.svg') }}" class="w-100" alt="">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="auth-form">
										<h3 class="text-start mb-4 font-w600">Login to Davur</h3>
										<form wire:submit.prevent='login'>
											<div class="form-group">
												<label class="mb-1 text-black">Email<span class="required">*</span></label>
												<input type="email" class="form-control" placeholder="hello@example.com" wire:model.defer='email'>

												@error('email')
													<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-group">
												<label class="mb-1 text-black">Password<span class="required">*</span></label>
												<input type="password" class="form-control" placeholder="Password" wire:model.defer='password'>

												@error('password')
													<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-row d-flex justify-content-between mt-4 mb-2">
												<div class="form-group">
													{{-- <div class=" form-check ms-1 mb-2">
														<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
														<label class="custom-control-label ms-1" for="basic_checkbox_1">I agree with Davur <a
																href="javascript:void(0);">Terms & Conditions</a></label>
													</div> --}}
													<div class=" form-check ms-1">
														<input type="checkbox" class="form-check-input" id="remeber_me" wire:model.lazy='remember_me'>
														<label class="custom-control-label ms-1" for="remeber_me">Remember my preference</label>
													</div>
												</div>
											</div>
											<div class="text-center">
												<button type="submit" class="btn btn-primary btn-block">Sign In</button>
											</div>
										</form>
										<div class="new-account mt-3 d-flex align-items-center justify-content-between flex-wrap">
											<small class="mb-0">
												{{-- Don't have an account?
												<a class="text-primary" href="page-register.html">
													Sign up
												</a> --}}
											</small>
											<small href="page-forgot-password.html">Forgot Password?</small>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
