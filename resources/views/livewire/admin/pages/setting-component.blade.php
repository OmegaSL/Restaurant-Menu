@section('title', 'Setting')

<div>

	<!--********************************** Content body start ***********************************-->
	<div class="content-body">
		<div class="container-fluid">
			<div class="row page-titles">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item  active"><a href="javascript:void(0)">Setting</a></li>
				</ol>
			</div>
			<!-- row -->
			<div class="row">
				<div class="col-xl-12 col-xxl-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">App Setting Field</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">App Name<span class="required">*</span></label>
										<input type="text" wire:model.defer='site_name' class="form-control" placeholder="Restaurant Name"
											required>

										@error('site_name')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">App Description</label>
										<textarea class="form-control" wire:model.defer='site_description' cols="30" rows="10"></textarea>

										@error('site_description')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-6 mb-2">
									<div class="form-group">
										<label class="form-label">App Logo</label>
										<input type="file" class="form-control" wire:model.defer='site_logo' required>

										@error('site_logo')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-6 mb-2">
									<div class="form-group">
										<label class="form-label">App Favicon</label>
										<input type="file" class="form-control" wire:model.defer='site_favicon' required>

										@error('site_favicon')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">Location Address</label>
										<input type="email" class="form-control" wire:model.defer='site_address' placeholder="Restaurant Location"
											required>

										@error('site_address')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								<div class="col-lg-6 mb-2">
									<div class="form-group">
										<label class="form-label">Email Address<span class="required">*</span></label>
										<input type="email" class="form-control" wire:model.defer='site_email' placeholder="example@example.com.com"
											required>


										@error('site_email')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-6 mb-2">
									<div class="form-group">
										<label class="form-label">Phone Number<span class="required">*</span></label>
										<input type="number" wire:model.defer='site_phone' class="form-control" placeholder="(+1)408-657-9007"
											required>

										@error('site_phone')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								<div class="col-lg-6 mb-2">
									<div class="form-group">
										<label class="form-label">Discount (%)<span class="required">*</span></label>
										<input type="number" class="form-control" wire:model.defer='products_discount_percent'
											placeholder="Discount for the whole item on store, not more than 100%" required>


										@error('products_discount_percent')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-6 mb-2">
									<div class="form-group">
										<label class="form-label">Tax (%)<span class="required">*</span></label>
										<input type="number" wire:model.defer='products_tax_percent' class="form-control"
											placeholder="Tax for the whole item on store, not more than 100%" required>

										@error('products_tax_percent')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								{{-- <div class="col-lg-12 mb-3">
									<div class="form-group">
										<label class="form-label">Where are you from<span class="required">*</span></label>
										<input type="text" name="place" class="form-control" required>
									</div>
								</div> --}}
							</div>
						</div>

						<hr>

						<div class="card-header">
							<h4 class="card-title">Socail Media Links</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">Facebook Link<span class="required">*</span></label>
										<input type="text" wire:model.defer='site_facebook_link' class="form-control"
											placeholder="Facebook account link" required>

										@error('site_facebook_link')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">Twitter Link</label>
										<input type="text" wire:model.defer='site_twitter_link' class="form-control"
											placeholder="Twitter account link" required>

										@error('site_twitter_link')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">Instagram Link</label>
										<input type="text" wire:model.defer='site_instagram_link' class="form-control"
											placeholder="Instagram account link" required>

										@error('site_instagram_link')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">LinkedIn Link</label>
										<input type="text" wire:model.defer='site_linkedin_link' class="form-control"
											placeholder="Instagram account link" required>

										@error('site_linkedin_link')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">Youtube Link</label>
										<input type="text" wire:model.defer='site_youtube_link' class="form-control"
											placeholder="Youtube Channel link" required>

										@error('site_youtube_link')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-12 mb-2">
									<div class="form-group">
										<label class="form-label">WhatsApp Phone</label>
										<input type="text" wire:model.defer='site_whatsapp_number' class="form-control"
											placeholder="WhatsApp contact number" required>

										@error('site_whatsapp_number')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div>
						</div>

						<hr>
						<button type="button" class="btn btn-primary" wire:click.prevent='updateSetting'>Save Changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--********************************** Content body end ***********************************-->

</div>
