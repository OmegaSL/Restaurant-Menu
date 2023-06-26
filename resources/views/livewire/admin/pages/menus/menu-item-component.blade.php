@section('title', 'Menu Item')

<div>

	<!--********************************** Content body start ***********************************-->
	<div class="content-body">
		<div class="container-fluid">
			<div class="row page-titles mx-0">
				<div class="col-sm-6 p-md-0">
					<div class="welcome-text">
						<h4>Hi, welcome back!</h4>
						<p class="mb-0">Your menu item</p>
					</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Menu Item</a></li>
					</ol>
				</div>
			</div>


			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h3 class="mb-0">Add Menu Item</h3>

						</div>
						<div class="content-page">
							<div class="content">

								<!-- Start Content-->
								<div class="container-fluid">

									<!-- start page title -->
									<div class="row">
										<div class="col-12">
											<div class="page-title-box">
												<div class="page-title-right">

												</div>
												<h4 class="page-title"> </h4>
											</div>
										</div>
									</div>
									<!-- end page title -->

									<div class="row">
										<div class="col-12">
											<div class="card-box">
												<div class="row">

													<div class="col-lg-12 text-right">
														<div class="text-lg-right mt-3 mt-lg-0">
															<button data-target="#addMenuItemModal" data-toggle="modal"
																class="btn btn-md btn-info  btn-dark waves-effect waves-light float-right add-expense">
																<i class="mdi mdi-plus-circle"></i> Add New Menu
															</button>
														</div>
													</div><!-- end col-->
													</form>
												</div> <!-- end row -->
											</div> <!-- end card-box -->
										</div><!-- end col-->
									</div>
									<!-- end row -->

									<div class="row mt-3">
										<div class="col-12">
											<div class="card-box">
												<table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
													<thead>
														<tr>
															<th class="my-0 text-black font-w500 fs-20">Items</th>
															<th style="width:20%;" class="my-0 text-black font-w500 fs-20">In Stock</th>
															<th style="width:20%;" class="my-0 text-black font-w500 fs-20">Price</th>
															<th style="width:20%;" class="my-0 text-black font-w500 fs-20">Date Created</th>
															<th>Action</th>
														</tr>
													</thead>

													<tbody id="fetch-categories">
														@forelse ($menu_items as $menu_item)
															<tr>
																<td>
																	<div class="media">
																		@if ($menu_item->image)
																			<img class="mr-3 img-fluid rounded" width="85" src="{{ asset('storage/' . $menu_item->image) }}"
																				alt="Restaurant Food">
																		@endif
																		<div class="media-body">
																			<small class="mt-0 mb-1 text-primary font-w500">MAIN COURSE</small>
																			<h5 class="mt-0 mb-2 text-black mb-4">{{ $menu_item->name }}</h5>
																		</div>
																	</div>
																</td>
																<td>
																	<div class="form-check custom-checkbox mb-3 checkbox-success check-lg">
																		<input type="checkbox" class="form-check-input" id="customCheckBox{{ $menu_item->id }}"
																			wire:click='updateStatus({{ $menu_item->id }})'
																			{{ $menu_item->status == 'active' ? 'checked' : '' }}>
																		<label class="form-check-label" for="customCheckBox8"></label>
																	</div>
																</td>
																<td>
																	<h4 class="my-0 text-secondary font-w600">GHC {{ $menu_item->price }}</h4>
																</td>
																<td>
																	<h4 class="my-0 text-secondary font-w600">{{ $menu_item->created_at->format('dS M, Y') }}</h4>
																</td>
																<td>
																	<div class="dropdown ml-auto">
																		<div class="btn-link" data-toggle="dropdown">
																			<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<circle fill="#000000" cx="5" cy="12" r="2"></circle>
																					<circle fill="#000000" cx="12" cy="12" r="2"></circle>
																					<circle fill="#000000" cx="19" cy="12" r="2"></circle>
																				</g>
																			</svg>
																		</div>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" data-target="#editMenuItemModal" data-toggle="modal"
																				wire:click="editMenuItem({{ $menu_item->id }})">
																				<i class="flaticon-381-edit-1 scale5 text-primarymr-2"></i>
																				Edit Menu
																			</a>
																			<a class="dropdown-item" data-toggle="modal" data-target="#deleteMenuItemModal"
																				wire:click="deleteMenuItem({{ $menu_item->id }})">
																				<i class="las la-times-circle scale5 text-danger mr-2"></i>
																				Delete Menu
																			</a>
																		</div>
																	</div>
																</td>
															</tr>
														@empty
															<tr>
																<td colspan="4" class="text-center">No Menu Item Found</td>
															</tr>
														@endforelse
													</tbody>
												</table>
											</div>
											{{ $menu_items->links() }}
										</div><!-- end col -->
									</div>
									<!-- end row -->

								</div> <!-- container -->

							</div> <!-- content -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--********************************** Content body end ***********************************-->

	@include('livewire.admin.modals.menu-items.create')
	@include('livewire.admin.modals.menu-items.edit')

	<!-- Delete Modal -->
	<div wire:ignore.self class="modal fade" id="deleteMenuItemModal" data-backdrop="static" data-keyboard="false"
		tabindex="-1" aria-labelledby="deleteMenuItemModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteMenuItemModalLabel">Delete Menu Category</h5>
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close"
						wire:click='resetForm'>
						<i class="las la-times"></i>
					</button>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this menu category?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='resetForm'>
						No, Don't
					</button>
					<button type="button" class="btn btn-primary" wire:click='destroyMenuCategory' data-dismiss="modal">
						Yes, Delete
					</button>
				</div>
			</div>
		</div>
	</div>


</div>

@section('scripts')
	<script>
		window.addEventListener('closeModal', event => {
			$("#addMenuItemModal").modal('hide');
		});

		window.addEventListener('closeEditModal', event => {
			$("#editMenuItemModal").modal('hide');
		});

		window.addEventListener('closeDeleteModal', event => {
			$("#deleteMenuItem").modal('hide');
		});
	</script>
@endsection
