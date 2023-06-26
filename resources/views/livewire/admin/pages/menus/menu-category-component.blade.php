@section('title', 'Menu Category')

<div>

	<!--********************************** Content body start ***********************************-->
	<div class="content-body">
		<div class="container-fluid">
			<div class="row page-titles mx-0">
				<div class="col-sm-6 p-md-0">
					<div class="welcome-text">
						<h4>Hi, welcome back!</h4>
						<p class="mb-0">Your menu category</p>
					</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Menu Category</a></li>
					</ol>
				</div>
			</div>


			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h3 class="mb-0">Add Menu Category</h3>

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
												<div class="row" wire:ignore.self>
													@if ($this->updateMode)
														<form class="form-inline" wire:submit.prevent='updateMenuCategory'>
														@else
															<form class="form-inline" wire:submit.prevent='storeMenuCategory'>
													@endif
													<div class="col-lg-6">
														<div class="form-group">
															<label for="categoryName" class="sr-only">Category Name</label>
															<input type="text" name="setCategoryName" required class="form-control" id="setCategoryName"
																placeholder="Category Name" wire:model.defer='name'>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="text-lg-right mt-3 mt-lg-0">
															<button type="submit" class="btn btn-md btn-dark btn-info waves-effect waves-light float-right">
																<i class="mdi mdi-plus-circle"></i> {{ $this->updateMode ? 'Update' : 'Add New' }} Category
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
															<th>ID</th>
															<th>Category Name</th>
															<th>Status</th>
															<th>Date Created</th>
															<th>Action</th>
														</tr>
													</thead>

													<tbody id="fetch-categories">
														@forelse ($categories as $key => $category)
															<tr>
																<td>{{ $loop->iteration }}</td>
																<td>{{ $category->name }}</td>
																<td>
																	<div class="btn-group mb-3">
																		@if ($category->status == 'active')
																			<button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown"
																				aria-haspopup="true" aria-expanded="false">Active</button>

																			<div class="dropdown-menu p-0">
																				<a class="dropdown-item" wire:click.prevent='updateStatus({{ $category->id }})'
																					href="#!">Inactive</a>
																			</div>
																		@elseif ($category->status == 'inactive')
																			<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown"
																				aria-haspopup="true" aria-expanded="false">Inactive</button>

																			<div class="dropdown-menu p-0">
																				<a class="dropdown-item" wire:click.prevent='updateStatus({{ $category->id }})'
																					href="#!">Active</a>
																			</div>
																		@endif
																	</div>
																</td>
																<td>{{ $category->created_at->format('dS M, Y') }}</td>
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
																			<a wire:click='editMenuCategory({{ $category->id }})' class="dropdown-item"
																				data-target="#modal-form" data-toggle="modal">
																				<i class="flaticon-381-edit-1 scale5 text-primarymr-2"></i>
																				Edit Menu
																			</a>
																			<a href="#!" class="dropdown-item" wire:click='deleteMenuCategory({{ $category->id }})'
																				data-toggle="modal" data-target="#deleteMenuCategory">
																				<i class="las la-times-circle scale5 text-danger mr-2"></i>
																				Delete Menu
																			</a>
																		</div>
																	</div>
																</td>
															</tr>
														@empty
															<tr>
																<td colspan="5" class="text-center">No Menu Category Found</td>
															</tr>
														@endforelse
													</tbody>
												</table>
											</div>
											{{ $categories->links() }}
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

	<!-- Modal -->
	<div wire:ignore.self class="modal fade" id="deleteMenuCategory" data-backdrop="static" data-keyboard="false"
		tabindex="-1" aria-labelledby="deleteMenuCategoryLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteMenuCategoryLabel">Delete Menu Category</h5>
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
