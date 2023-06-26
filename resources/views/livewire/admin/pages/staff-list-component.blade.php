@section('title', 'Staff List')

<div>

	<!--**********************************
												Content body start
								***********************************-->
	<div class="content-body">
		<div class="container-fluid">
			<div class="row page-titles mx-0">
				<div class="col-sm-6 p-md-0">
					<div class="welcome-text">
						<h4>Hi, welcome back!</h4>
						<p class="mb-0">Your business dashboard template</p>
					</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Staff List</a></li>
					</ol>
				</div>
			</div>

			<div class="content-page">
				<div class="content">

					<!-- Start Content-->
					<div class="container-fluid mt--6">
						<div class="card mb-4">
							<!-- Card header -->
							<div class="card-header">
								<h3 class="mb-0">Manage Staff</h3>
							</div>
							<!-- Card body -->
							<div class="content-page">
								<div class="content">

									<!-- Start Content-->
									<div class="container-fluid">

										<!-- start page title -->
										<div class="row">
											<div class="col-12">

											</div>
										</div>
										<!-- end page title -->

										<div class="row">
											<div class="col-12">
												<div class="card-box">
													<button type="button" data-target="#addStaffModal"
														data-toggle="modal"class="btn btn-sm btn-dark btn-info waves-effect waves-light float-right">
														<i class="mdi mdi-plus-circle"></i> Add New User
													</button>

													<table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
														<thead>
															<tr>
																<th>ID</th>
																<th>Full Name</th>
																<th>Username</th>
																<th>Contact</th>
																<th>Job Description</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</thead>

														<tbody class="list">
															@forelse ($staffs as $staff)
																<tr>
																	<th scope="row">
																		<div class="media align-items-center">
																			<div class="media-body">
																				<span class="name mb-0 text-sm">{{ $loop->iteration }}</span>
																			</div>
																		</div>
																	</th>
																	<td class="budget">
																		{{ $staff->full_name }}
																	</td>
																	<td class="budget">
																		{{ $staff->name }}
																	</td>
																	<td class="budget">
																		{{ $staff->phone }}
																	</td>
																	<td class="budget">
																		{{ $staff->role }}
																	</td>
																	<td class="budget">
																		{{ $staff->status }}
																	</td>
																	<td class="text-right">
																		<a href="#" data-toggle="modal" data-target="#editStaffModal"
																			wire:click='editStaff({{ $staff->id }})' class="btn btn-primary shadow btn-xs sharp mr-1">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a href="#" data-toggle="modal" data-target="#deleteStaffModal"
																			wire:click='deleteStaff({{ $staff->id }})' class="btn btn-danger shadow btn-xs sharp">
																			<i class="fa fa-trash"></i>
																		</a>
																	</td>
																</tr>
															@empty
																<tr>
																	<td colspan="8" class="text-center">
																		No Staff Found
																	</td>
																</tr>
															@endforelse
														</tbody>
													</table>
												</div>
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
	</div>
	<!--********************************** Content body end ***********************************-->

	@include('livewire.admin.modals.users.create-user')
	@include('livewire.admin.modals.users.edit-user')

	<!-- Delete Modal -->
	<div wire:ignore.self id="deleteStaffModal" class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="deleteStaffModal" aria-hidden="true" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Delete Staff</h5>
					<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
					</button>
				</div>
				<div class="modal-body">Are you sure you Want to delete staff?</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" wire:click='destroyStaff'>Yes</button>
				</div>
			</div>
		</div>
	</div>

</div>
