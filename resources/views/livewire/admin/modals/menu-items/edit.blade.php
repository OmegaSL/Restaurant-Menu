<!-- Add Modal -->
<div wire:ignore.self id="editMenuItemModal" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="editMenuItemModal" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Menu </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form id="add-expense">
				<div class="modal-body p-4">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="field-1" class="control-label">Meal Name </label>
								<input required type="text" class="form-control" placeholder="Eg: Banku & Tilapia" wire:model.defer='name'>

								@error('name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							@if ($this->show_image != null)
								<img src="{{ asset('storage/' . $this->show_image) }}" width="120" alt="Meal Image" class="img-fluid">
							@endif
							<div class="form-group">
								<label for="field-1" class="control-label">Meal Image </label>
								<input type="file" class="form-control" wire:model.defer='image'>

								@error('image')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								@if ($this->show_additional_images != null)
									@foreach ($this->show_additional_images as $image)
										<img src="{{ asset('storage/' . $image) }}" width="120" alt="Meal Image" class="img-fluid">
									@endforeach
								@endif
								<br>
								<br>
								<label for="field-1" class="control-label">Meal Multiple Images </label>
								<input type="file" multiple class="form-control" wire:model.defer='additional_images'>

								@error('additional_images')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="field-2" class="control-label">Meal Category</label>
								<select data-toggle="select" data-style="btn-outline-success" class="form-control" required
									wire:model.lazy='menu_category_id'>
									<option selected>Select Menu Category</option>
									@forelse ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@empty
										<option>No Menu Category Found</option>
									@endforelse
								</select>

								@error('menu_category_id')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="field-2" class="control-label">Meal Size (optional)</label>
								<select data-toggle="select" data-style="btn-outline-success" class="form-control" required
									wire:model.lazy='size'>
									<option selected>Select Meal Size</option>
									<option value="small">Small</option>
									<option value="medium">Medium</option>
									<option value="large">Large</option>
									<option value="extra-large">Extra-Large</option>
								</select>

								@error('size')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">GHC</span>
									<span class="input-group-text">0.00</span>
								</div>
								<input type="number" class="form-control" wire:model.defer='price'>
							</div>

							@error('price')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="basic-form">
								<form>
									<div class="form-group">
										<label for="field-2" class="control-label">Description</label>
										<textarea class="form-control" rows="4" id="comment"></textarea>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info waves-effect waves-light" wire:click='updateMenuItem'>
						Save changes
					</button>
				</div>
			</form>
		</div>
	</div>
</div><!-- /.modal -->
