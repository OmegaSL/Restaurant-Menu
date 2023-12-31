@section('title', $order->name . ' Items')

<div>

	<!--**********************************
												Content body start
								***********************************-->
	<div class="content-body">
		<!-- row -->
		<div class="container-fluid">
			<div class="form-head d-flex mb-3 align-items-start">
				<div class="mr-auto d-none d-lg-block">
					<h2 class="text-black font-w600 mb-0">Order ID #{{ $order->order_number }}</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="#!">Order Detaills</a></li>
					</ol>
				</div>
				<div class="dropdown mb-md-3 mb-2 ml-auto">
					<div class="btn btn-success dropdown-toggle" data-toggle="dropdown">
						<svg width="22" class="mr-2" height="28" viewBox="0 0 22 28" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.16647 27.9558C9.25682 27.9856 9.34946 28.0001 9.44106 28.0001C9.71269 28.0001 9.97541 27.8732 10.1437 27.6467L21.5954 12.2248C21.7926 11.9594 21.8232 11.6055 21.6746 11.31C21.526 11.0146 21.2236 10.8282 20.893 10.8282H13.1053V0.874999C13.1053 0.495358 12.8606 0.15903 12.4993 0.042327C12.1381 -0.0743215 11.7428 0.0551786 11.5207 0.363124L0.397278 15.7849C0.205106 16.0514 0.178364 16.403 0.327989 16.6954C0.477614 16.9878 0.77845 17.1718 1.10696 17.1718H8.56622V27.125C8.56622 27.5024 8.80816 27.8373 9.16647 27.9558ZM2.81693 15.4218L11.3553 3.58389V11.7032C11.3553 12.1865 11.7471 12.5782 12.2303 12.5782H19.1533L10.3162 24.479V16.2968C10.3162 15.8136 9.92444 15.4218 9.44122 15.4218H2.81693Z"
								fill="#fff" />
						</svg>
						<span>ON DELIVERY</span>
					</div>
					<div class="dropdown-menu dropdown-menu-left">
						<a class="dropdown-item" href="#!" wire:click='sortQuantityAsc'>Low to High List</a>
						<a class="dropdown-item" href="#!" wire:click='sortQuantityDesc'>High To Low List</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-xxl-3 col-lg-12 col-md-12">
					<div class="row">
						<div class="col-xl-12 col-lg-6 ">
							<div class="card h-auto">
								<div class="card-body text-center">
									@php
										$hash = md5(strtolower(trim($order->email)));
										$hash = "https://www.gravatar.com/avatar/$hash";
									@endphp
									<img src="{{ $hash }}" width="150" class="rounded-circle mb-4" alt="" />
									<h4 class="mb-3 text-black font-w600">{{ $order->name }}</h4>
									<a href="#" class="btn btn-primary light btn-xs">Customer</a>
								</div>
								<div class="card bg-secondary sticky mb-0">
									<div class="card-header border-0 pb-0">
										<h5 class="card-title text-white mt-2">User Address</h5>
									</div>
									<div class="card-body pt-3">
										<p class="fs-14 op7 text-white">
											{{ $order->address }}
										</p>
									</div>
									<div class="card-footer border-0 py-4 bg-warning rounded-xl">
										<div class="media align-items-center">
											<img class="mr-3 img-fluid rounded-circle" width="50" src="{{ asset('assets/images/delivery.png') }}"
												alt="DexignZone">
											<div class="media-body">
												<h5 class="my-0 text-white">
													{{ $order->delivery_address }}
												</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						{{-- <div class="col-xl-12 col-lg-6">
							<div class="card">
								<div class="card-header border-0 pb-0">
									<h4 class="card-title">Disease History</h4>
								</div>
								<div class="card-body">
									<div class="widget-timeline-icon">
										<ul class="timeline">
											<li>
												<div class="icon bg-primary"></div>
												<a class="timeline-panel text-muted" href="#">
													<h4 class="mb-2">Order Delivered</h4>
													<p class="fs-15 mb-0 ">Wait..</p>
												</a>
											</li>
											<li>
												<div class="icon bg-primary"></div>
												<a class="timeline-panel text-muted" href="#">
													<h4 class="mb-2">On Delivery</h4>
													<p class="fs-15 mb-0 ">Sat, 23 Jul 2020, 01:24 PM</p>
												</a>
											</li>
											<li>
												<div class="icon bg-primary"></div>
												<a class="timeline-panel text-muted" href="#">
													<h4 class="mb-2">Payment Success</h4>
													<p class="fs-15 mb-0 ">Fri, 22 Jul 2020, 10:44 AM</p>
												</a>
											</li>
											<li>
												<div class="icon bg-primary"></div>
												<a class="timeline-panel text-muted" href="#">
													<h4 class="mb-2">Order Created</h4>
													<p class="fs-15 mb-0 ">Thu, 21 Jul 2020, 11:49 AM</p>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
				<div class="col-xl-9 col-xxl-9 col-lg-12 col-md-12">
					<div class="row">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-body pt-2">
									<div class="table-responsive ">
										<table class="table items-table">
											<tr>
												<th class="my-0 text-black font-w500 fs-20">Items</th>
												<th style="width:10%;" class="my-0 text-black font-w500 fs-20">Qty</th>
												<th style="width:10%;" class="my-0 text-black font-w500 fs-20">Price</th>
												<th class="my-0 text-black font-w500 fs-20">Total Price</th>
												<th></th>
											</tr>
											@forelse ($orderItems as $orderItem)
												<tr>
													<td>
														<div class="media">
															@if ($orderItem->menu_item->image != null)
																<img class="mr-3 img-fluid rounded" width="85"
																	src="{{ asset('storage/' . $orderItem->menu_item->image) }}" alt="Restaurant">
															@endif
															<div class="media-body">
																<small class="mt-0 mb-1 text-primary font-w500">MAIN COURSE</small>
																<h5 class="mt-0 mb-2 text-black mb-4">{{ $orderItem->menu_item->name }}r</h5>
																{{-- <div class="star-review fs-14">
																	<i class="fa fa-star text-orange"></i>
																	<i class="fa fa-star text-orange"></i>
																	<i class="fa fa-star text-orange"></i>
																	<i class="fa fa-star text-gray"></i>
																	<i class="fa fa-star text-gray"></i>
																	<span class="ml-3 text-dark">451 reviews</span>
																</div> --}}
															</div>
														</div>
													</td>
													<td>
														<h4 class="my-0 text-secondary font-w600">{{ $orderItem->quantity }}x</h4>
													</td>
													<td>
														<h4 class="my-0 text-secondary font-w600">GHC{{ number_format($orderItem->unit_price, 2) }}</h4>
													</td>
													<td>
														<h4 class="my-0 text-secondary font-w600">GHC{{ number_format($orderItem->total_amount, 2) }}</h4>
													</td>
													<td>
														<a href="#" class="ti-close fs-28 text-danger las la-times-circle"
															data-target="#deleteOrderItemModal" data-toggle="modal"
															wire:click='deleteConfirm({{ $orderItem->id }})'></a>
													</td>
												</tr>
											@empty
												<tr>
													<td colspan="5" class="text-center">No Items Found</td>
												</tr>
											@endforelse
										</table>
									</div>
								</div>
							</div>
						</div>
						{{-- <div class="col-xl-12">
							<div class="card">
								<div class="card-body">
									<div class="full-map-area mb-4">
										<img src="images/map-2.png" alt="">
										<a href="javascript:void(0);" class="btn btn-danger btn-xs">View in Fullscreen</a>
										<i class="flaticon-381-location-4"></i>
									</div>
									<div class="row mx-0">
										<div class="media align-items-center col-md-4 col-lg-6 px-0 mb-3 mb-md-0">
											<img class="mr-3 img-fluid rounded-circle" width="65" src="./images/avatar/3.jpg" alt="DexignZone">
											<div class="media-body">
												<h4 class="my-0 text-black">Kevin Hobs Jr.</h4>
												<small>ID 412455</small>
											</div>
										</div>
										<div class="iconbox col-md-4 col-lg-3 mb-3 mb-md-0">
											<i class="las la-phone"></i>
											<small>Telepon</small>
											<p>+12 345 5662 66</p>
										</div>
										<div class="iconbox col-md-4 col-lg-3 mb-md-0">
											<i class="las la-shipping-fast"></i>
											<small>Delivery Time</small>
											<p>12:52 AM</p>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--********************************** Content body end ***********************************-->

	<!-- Delete Modal -->
	<div wire:ignore.self class="modal fade" id="deleteOrderItemModal" data-backdrop="static" data-keyboard="false"
		tabindex="-1" aria-labelledby="deleteOrderItemModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteOrderItemModalLabel">Delete Order Item</h5>
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close"
						wire:click='resetForm'>
						<i class="las la-times"></i>
					</button>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this order item?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='resetForm'>
						No, Don't
					</button>
					<button type="button" class="btn btn-primary" wire:click='deleteOrderItem' data-dismiss="modal">
						Yes, Delete
					</button>
				</div>
			</div>
		</div>
	</div>

</div>
