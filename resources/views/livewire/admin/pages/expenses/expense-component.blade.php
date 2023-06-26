@section('title', 'Expense')

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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Expense</a></li>
					</ol>
				</div>
			</div>


			<div class="container-fluid mt--6">
				<div class="row">
					<div class="col">
						<div class="card">
							<!-- Card header -->
							<div class="card-header border-0">
								<h3 class="mb-0">Manage Expenses</h3>
							</div>
							<!-- Light table -->
							<div class="table-responsive">
								<table class="table align-items-center table-flush">
									<thead class="thead-light">
										<tr>
											<th scope="col" class="sort" data-sort="name">Expense Title</th>
											<th scope="col" class="sort" data-sort="name">Expense Category</th>
											<th scope="col" class="sort" data-sort="budget">Amount Spent</th>
											<th scope="col" class="sort" data-sort="status">Date</th>
											<th scope="col" class="text-right">Action</th>
										</tr>
									</thead>
									<tbody class="list">
										@forelse ($expenses as $expense)
											<tr>
												<th scope="row">
													<div class="media align-items-center">
														<div class="media-body">
															<span class="name mb-0 text-sm">{{ Str::title($expense->name) }}</span>
														</div>
													</div>
												</th>
												<td class="budget">
													{{ Str::title($expense->expense_category->name) ?? 'N/A' }}
												</td>
												<td>
													GHC{{ $expense->amount }}
												</td>
												<td>
													{{ $expense->created_at->format('d M, Y') }}
												</td>
												<td class="text-right">
													<a href="#" data-toggle="modal" data-target="#editExpenseModal"
														wire:click="editExpense({{ $expense->id }})" class="btn btn-primary shadow btn-xs sharp mr-1">
														<i class="fa fa-pencil"></i>
													</a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp" data-toggle="modal"
														data-target="#deleteExpenseModal" wire:click='deleteExpense({{ $expense->id }})'>
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
										@empty
											<tr>
												<td colspan="5" class="text-center">No Expense Found</td>
											</tr>
										@endforelse
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--********************************** Content body end ***********************************-->

	@include('livewire.admin.modals.expenses.edit')

	<!-- Delete Modal -->
	<div wire:ignore.self class="modal fade" id="deleteExpenseModal" data-backdrop="static" data-keyboard="false"
		tabindex="-1" aria-labelledby="deleteExpenseModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteExpenseModalLabel">Delete Expense</h5>
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close"
						wire:click='resetForm'>
						<i class="las la-times"></i>
					</button>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this expense?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='resetForm'>
						No, Don't
					</button>
					<button type="button" class="btn btn-primary" wire:click='destroyExpense' data-dismiss="modal">
						Yes, Delete
					</button>
				</div>
			</div>
		</div>
	</div>

</div>
