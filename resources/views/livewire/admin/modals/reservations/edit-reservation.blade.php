<!-- Edit Modal -->
<div wire:ignore.self id="editReservationModal" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="editReservationModal" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Reservation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" wire:click='resetForm'>×</button>
			</div>
			<div class="modal-body p-4">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="field-1" class="control-label">Full Name</label>
							<input type="text" class="form-control" wire:model.defer='name' placeholder="John">

							@error('name')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
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
					<div class="col-md-6">
						<div class="form-group">
							<label for="field-4" class="control-label">Contact</label>
							<input type="number" class="form-control" wire:model.defer='phone' placeholder="0200000000">

							@error('phone')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="field-4" class="control-label">Reservation Date</label>
							<input type="datetime-local" class="form-control" wire:model.defer='reservation_datetime'>

							@error('reservation_datetime')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="field-4" class="control-label">Number of People</label>
							<input type="number" class="form-control" wire:model.defer='number_of_people' placeholder="eg. 1">

							@error('number_of_people')
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
									<option value="pending">Pending</option>
									<option value="confirmed">Confirmed</option>
									<option value="cancelled">Cancelled</option>
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
							<label for="field-4" class="control-label">Reservation Note</label>
							<textarea class="form-control" wire:model.defer='message' cols="30" rows="10"></textarea>

							@error('message')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"
					wire:click='resetForm'>Close</button>
				<button type="submit" class="btn btn-info waves-effect waves-light" wire:click='updateReservation'>
					Save changes
				</button>
			</div>
		</div>
	</div>


</div>
