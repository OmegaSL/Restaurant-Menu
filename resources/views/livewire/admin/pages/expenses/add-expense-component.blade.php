@section('title', 'Add Expense')

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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Expense</a></li>
					</ol>
				</div>
			</div>


			<div class="container-fluid mt--6">
				<!-- Table -->
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-header">
								<h3 class="mb-0">Add Expenditure</h3>

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
														</form>
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
																<th>Category</th>
																<th>Amount</th>
																<th>Status</th>
																<th>Created By</th>
																<th>Date</th>
															</tr>
														</thead>

														<tbody id="fetch-expenses">
															@forelse ($expenses as $expense)
																<tr>
																	<td>{{ $loop->iteration }}</td>
																	<td>{{ $expense->expense_category->name }}</td>
																	<td>{{ $expense->amount }}</td>
																	<td>
																		<div class="form-check custom-checkbox mb-3 checkbox-success check-lg">
																			<input type="checkbox" class="form-check-input" id="customCheckBox{{ $expense->id }}"
																				wire:click='updateStatus({{ $expense->id }})' {{ $expense->status == 'active' ? 'checked' : '' }}>
																			<label class="form-check-label" for="customCheckBox8"></label>
																		</div>
																	</td>
																	<td>By Someone</td>
																	<td>{{ $expense->created_at->format('dS M, Y') }}</td>
																</tr>
															@empty
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

	@include('livewire.admin.modals.expenses.create')

</div>
@section('scripts')
	<script>
		window.addEventListener('closeModal', event => {
			$("#addExpenseModal").modal('hide');
		});
	</script>
@endsection
