@section('title', 'Expense Category')

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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Expense Category</a></li>
					</ol>
				</div>
			</div>


			<div class="container-fluid mt--6">
				<!-- Table -->
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-header">
								<h3 class="mb-0">Add Expense</h3>
							</div>
							<!-- ============================================================== -->
							<!-- Start Page Content here -->
							<!-- ============================================================== -->

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
													<h4 class="page-title">Expenses</h4>
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
																<button data-target="#addExpenseModal" data-toggle="modal"
																	class="btn btn-md btn-info  btn-dark waves-effect waves-light float-right add-expense">
																	<i class="mdi mdi-plus-circle"></i> Add New Expense
																</button>
															</div>
														</div><!-- end col-->
													</div> <!-- end row -->
												</div> <!-- end card-box -->
											</div><!-- end col-->
										</div>
										<!-- end row -->

										<div class="row">
											<div class="col-12">
												<div class="card-box">
													<table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
														<thead>
															<tr>
																<th>
																	ID
																</th>
																<th>Expense Name</th>
																<th>Status</th>
																<th>Created_at</th>
															</tr>
														</thead>

														<tbody id="fetch-expenses">
															@forelse ($expense_categories as $expense_category)
																<tr>
																	<td>{{ $loop->iteration }}</td>
																	<td>{{ $expense_category->name }}</td>
																	<td>
																		<div class="btn-group mb-3">
																			@if ($expense_category->status == 'active')
																				<button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown"
																					aria-haspopup="true" aria-expanded="false">Active</button>

																				<div class="dropdown-menu p-0">
																					<a class="dropdown-item" wire:click.prevent='updateStatus({{ $expense_category->id }})'
																						href="#!">Inactive</a>
																				</div>
																			@elseif ($expense_category->status == 'inactive')
																				<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown"
																					aria-haspopup="true" aria-expanded="false">Inactive</button>

																				<div class="dropdown-menu p-0">
																					<a class="dropdown-item" wire:click.prevent='updateStatus({{ $expense_category->id }})'
																						href="#!">Active</a>
																				</div>
																			@endif
																		</div>
																	</td>
																	<td>{{ $expense_category->created_at }}</td>
																	<td class="text-right">
																		<a href="#" data-toggle="modal" data-target="#editExpenseModal"
																			wire:click='editExpenseCategory({{ $expense_category->id }})'
																			class="btn btn-primary shadow btn-xs sharp mr-1">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a href="#" data-toggle="modal" data-target="#deleteExpenseModal"
																			class="btn btn-danger shadow btn-xs sharp"
																			wire:click='deleteExpenseCategory({{ $expense_category->id }})'>
																			<i class="fa fa-trash"></i>
																		</a>
																	</td>
																</tr>
															@empty
																<tr>
																	<td colspan="6" class="text-center">No Expense Category Found</td>
																</tr>
															@endforelse
														</tbody>
													</table>
												</div>
											</div><!-- end col -->

											{{ $expense_categories->links() }}
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

	@include('livewire.admin.modals.expense-categories.create')
	@include('livewire.admin.modals.expense-categories.edit')

	<!-- Delete Modal -->
	<div wire:ignore.self class="modal fade" id="deleteExpenseModal" data-backdrop="static" data-keyboard="false"
		tabindex="-1" aria-labelledby="deleteExpenseModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteExpenseModalLabel">Delete Expense Category</h5>
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close"
						wire:click='resetForm'>
						<i class="las la-times"></i>
					</button>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this expense Category?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='resetForm'>
						No, Don't
					</button>
					<button type="button" class="btn btn-primary" wire:click='destroyExpenseCategory' data-dismiss="modal">
						Yes, Delete
					</button>
				</div>
			</div>
		</div>
	</div>

</div>
