<!-- Add Modal -->
<div wire:ignore.self id="addExpenseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addExpenseModal"
	aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Expense</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body p-4">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="field-1" class="control-label">Name</label>
							<input required="required" type="text" min-length="0" class="form-control" wire:model.defer='name'
								placeholder="Expense Title">

							@error('name')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="field-2" class="control-label">Category</label>
							<select data-style="btn-outline-success" class="form-control" required wire:model.lazy='expense_category_id'>
								<option value="">Select Category</option>
								@forelse ($expense_categories as $expense_category)
									<option value="{{ $expense_category->id }}">{{ $expense_category->name }}</option>
								@empty
									<option>No Category to Select</option>
								@endforelse
							</select>

							@error('expense_category_id')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="field-2" class="control-label">Amount</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"></div>
								</div>
								<input required type="number" class="form-control" wire:model.defer='amount' placeholder="Amount Involved">
							</div>

							@error('amount')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<td>
								<label for="field-2" class="control-label">Status</label>
								<select class="form-control" required wire:model.lazy='status'>
									<option value="">Selet Status</option>
									<option value="active">Active</option>
									<option value="inactive">Inactive</option>
								</select>
							</td>

							@error('status')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="field-2" class="control-label">Description</label>
							<textarea class="form-control" wire:model.defer='description' cols="30" rows="10"></textarea>

							@error('description')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-info waves-effect waves-light" wire:click='storeExpense'>Save changes</button>
			</div>
		</div>
	</div>
</div><!-- /.modal -->
