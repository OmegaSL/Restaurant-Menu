<!-- Edit Modal -->
<div wire:ignore.self id="editStaffModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editStaffModal"
	aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" wire:click='resetForm'>×</button>
			</div>
			<div class="modal-body p-4">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="field-1" class="control-label">First Name</label>
							<input type="text" class="form-control" wire:model.defer='name' placeholder="John">

							@error('name')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="field-2" class="control-label">Last Name</label>
							<input type="text" class="form-control" wire:model.defer='first_name' placeholder="Doe">

							@error('first_name')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="field-3" class="control-label">Username</label>
							<input type="text" class="form-control" wire:model.defer='last_name' placeholder="Username">

							@error('last_name')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="field-3" class="control-label">Password</label>
							<input type="text" class="form-control" wire:model.defer='password' placeholder="Password">

							@error('password')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="field-4" class="control-label">Email</label>
							<input type="email" class="form-control" wire:model.defer='email' placeholder="test@example.com">

							@error('email')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="field-4" class="control-label">Contact</label>
							<input type="number" class="form-control" wire:model.defer='phone' placeholder="0200000000">

							@error('phone')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<td>
								<label for="field-2" class="control-label">Roles</label>
								<select class="form-control" wire:model.lazy='role'>
									<option value="">Selet Type</option>
									<option value="admin">Admin Assistant</option>
									<option value="staff">Staff</option>
								</select>
							</td>

							@error('role')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<td>
								<label for="field-2" class="control-label">Status</label>
								<select class="form-control" wire:model.lazy='status'>
									<option value="">Selet Status</option>
									<option value="active">Open</option>
									<option value="inactive">Closed</option>
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
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"
					wire:click='resetForm'>Close</button>
				<button type="submit" class="btn btn-info waves-effect waves-light" wire:click='updateStaff'>
					Save changes
				</button>
			</div>
		</div>
	</div>


</div>
