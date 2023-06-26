<!-- Add Modal -->
<div wire:ignore.self id="addExpenseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addExpenseModal"
	aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Expense</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form id="add-expense">
				<div class="modal-body p-4">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="field-1" class="control-label">Category Name</label>
								<input required type="text" class="form-control" placeholder="Expense Title" wire:model.defer='name'>

								@error('name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<td>
									<label for="field-2" class="control-label">Type</label>
									<select class="form-control" wire:model.lazy='status'>
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info waves-effect waves-light" wire:click='storeExpenseCategory'>
						Save New
					</button>
				</div>
			</form>
		</div>
	</div>
</div><!-- /.modal -->
