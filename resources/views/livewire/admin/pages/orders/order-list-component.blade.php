@section('title', 'Order List')

<div>

	<!--**********************************
												Content body start
								***********************************-->
	<div class="content-body">
		<!-- row -->
		<div class="container-fluid">
			<div class="form-head d-flex mb-3 align-items-start">
				<div class="mr-auto d-none d-lg-block">
					<h2 class="text-black font-w600 mb-0">Orders</h2>
					<p class="mb-0">Here is your order list data</p>
				</div>
				<div class="dropdown custom-dropdown">
					<button type="button" class="btn btn-primary light d-flex align-items-center svg-btn" data-toggle="dropdown"
						aria-expanded="false">
						<svg width="16" class="scale5" height="16" viewBox="0 0 22 28" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.16647 27.9558C9.25682 27.9856 9.34946 28.0001 9.44106 28.0001C9.71269 28.0001 9.97541 27.8732 10.1437 27.6467L21.5954 12.2248C21.7926 11.9594 21.8232 11.6055 21.6746 11.31C21.526 11.0146 21.2236 10.8282 20.893 10.8282H13.1053V0.874999C13.1053 0.495358 12.8606 0.15903 12.4993 0.042327C12.1381 -0.0743215 11.7428 0.0551786 11.5207 0.363124L0.397278 15.7849C0.205106 16.0514 0.178364 16.403 0.327989 16.6954C0.477614 16.9878 0.77845 17.1718 1.10696 17.1718H8.56622V27.125C8.56622 27.5024 8.80816 27.8373 9.16647 27.9558ZM2.81693 15.4218L11.3553 3.58389V11.7032C11.3553 12.1865 11.7471 12.5782 12.2303 12.5782H19.1533L10.3162 24.479V16.2968C10.3162 15.8136 9.92444 15.4218 9.44122 15.4218H2.81693Z"
								fill="#2F4CDD" />
						</svg>
						<span class="fs-16 ml-3">All Status</span>
						<i class="fa fa-angle-down scale5 ml-3"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						{{-- pending, processing, completed, declined, cancelled, refunded, failed, on-hold --}}
						<a class="dropdown-item" href="#" wire:click='sortStatus("{{ 'pending' }}")'>Pending</a>
						<a class="dropdown-item" href="#" wire:click='sortStatus("{{ 'processing' }}")'>Processing</a>
						<a class="dropdown-item" href="#" wire:click='sortStatus("{{ 'completed' }}")'>Completed</a>
						<a class="dropdown-item" href="#" wire:click='sortStatus("{{ 'declined' }}")'>Declined</a>
						<a class="dropdown-item" href="#" wire:click='sortStatus("{{ 'cancelled' }}")'>Cancelled</a>
						<a class="dropdown-item" href="#" wire:click='sortStatus("{{ 'refunded' }}")'>Refunded</a>
						<a class="dropdown-item" href="#" wire:click='sortStatus("{{ 'failed' }}")'>Failed</a>
						<a class="dropdown-item" href="#" wire:click='sortStatus("{{ 'on-hold' }}")'>On-hold</a>
					</div>
				</div>
				<div class="dropdown custom-dropdown ml-3">
					<button type="button" class="btn btn-primary light d-flex align-items-center svg-btn" data-toggle="dropdown"
						aria-expanded="false">
						<svg width="16" height="16" class="scale5" viewBox="0 0 28 28" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z"
								fill="#2F4CDD" />
						</svg>
						<span class="fs-16 ml-3">Today</span>
						<i class="fa fa-angle-down scale5 ml-3"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#">Monday</a>
						<a class="dropdown-item" href="#">Tuesday</a>
						<a class="dropdown-item" href="#">Wednesday</a>
						<a class="dropdown-item" href="#">Thursday</a>
						<a class="dropdown-item" href="#">Friday</a>
						<a class="dropdown-item" href="#">Saturday</a>
						<a class="dropdown-item" href="#">Sunday</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">
						<table id="example5" class="table" style="min-width: 845px;">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Customer Name</th>
									<th>Location</th>
									<th>Amount</th>
									<th>Status Order</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($orders as $order)
									<tr>
										<td>#{{ $order->order_number }}</td>
										<td>
											{{-- 26 March 2020, 12:42 AM --}}
											{{ $order->created_at->format('d F Y, H:i A') }}
										</td>
										<td>{{ $order->name }}</td>
										<td>{{ $order->delivery_address }}</td>
										<td>GHC{{ number_format($order->total_amount, 2) }}</td>
										<td>
											@if ($order->status == 'pending' || $order->status == 'on-hold')
												<span class="btn btn-sm light btn-warning fs-16">{{ Str::title($order->status) }}</span>
											@elseif($order->status == 'processing' || $order->status == 'refunded')
												<span class="btn btn-sm light btn-primary fs-16">{{ Str::title($order->status) }}</span>
											@elseif($order->status == 'completed')
												<span class="btn btn-sm light btn-success fs-16">{{ Str::title($order->status) }}</span>
											@elseif($order->status == 'declined' || $order->status == 'failed' || $order->status == 'cancelled')
												<span class="btn btn-sm light btn-danger fs-16">{{ Str::title($order->status) }}</span>
											@endif
										</td>
										<td>
											<div class="dropdown ml-auto text-right">
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
													<a class="dropdown-item" href="#!" wire:click='viewOrderItems({{ $order->id }})'>
														<i class="las la-eye scale5 text-primary mr-2"></i>
														View Order
													</a>

													@if ($order->status == 'pending')
														<a class="dropdown-item" href="#!" wire:click='processing({{ $order->id }})'>
															<i class="las la-check-square scale5 text-primary mr-2"></i>
															Accept Order
														</a>
													@endif

													@if ($order->status == 'pending')
														<a class="dropdown-item" href="#!" wire:click='declined({{ $order->id }})'>
															<i class="las la-times-circle scale5 text-danger mr-2"></i>
															Reject Order
														</a>
													@endif

													@if ($order->status == 'processing')
														<a class="dropdown-item" href="#!" wire:click='completed({{ $order->id }})'>
															<i class="las la-check-double scale5 text-primary mr-2"></i>
															Mark as Completed
														</a>
													@endif
												</div>
											</div>
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="7" class="text-center">No Data</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>

					{{ $orders->links() }}
				</div>
			</div>
		</div>
	</div>
	<!--********************************** Content body end ***********************************-->

</div>
