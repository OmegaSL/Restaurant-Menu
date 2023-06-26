@section('title', 'Frequently Sold')

<div>

	<!--**********************************
												Content body start
								***********************************-->
	<div class="content-body">
		<div class="container-fluid">
			<div class="row page-titles mx-0">
				<div class="col-sm-6 p-md-0">
					<div class="welcome-text">
						<h4>Fast Selling Products</h4>
						<p class="mb-0">Your business dashboard template</p>
					</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashoard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Frequently Sold Report</a></li>
					</ol>
				</div>
			</div>
		</div>


		<div class="container-fluid">
			<div class="row">
				<!-- Column -->
				<div class="col-xl-4">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Best sellers this month</h4>
						</div>
						<div class="card-body">
							<div class="basic-list-group">
								<ul class="list-group">
									<li class="list-group-item active">Meals (Total Sold)</li>
									@forelse ($bestSellingMenuItems as $bestSellingMenuItem)
										<li class="list-group-item">{{ $loop->iteration }}. {{ $bestSellingMenuItem->menu_item->name }}
											({{ $bestSellingMenuItem->total_quantity }} Sold)
										</li>
									@empty
										<li class="list-group-item">No item yet!</li>
									@endforelse
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Column -->
				<div class="col-xl-8">
					<div class="card">
						<div class="card-header d-block">
							<h4 class="card-title">Products </h4>

						</div>
						<div class="card-body">
							@php
								$totalQuantity = 0;
								foreach ($overallBestSellingMenuItems as $overallBestSellingMenuItem) {
								    $totalQuantity += $overallBestSellingMenuItem->total_quantity;
								}
							@endphp
							@forelse ($overallBestSellingMenuItems as $overallBestSellingMenuItem)
								<h6>
									{{ $overallBestSellingMenuItem->menu_item->name }}
								</h6>
								<div class="progress">
									@php
										// Total quantity of all items
										$totalQuantity += $overallBestSellingMenuItem->total_quantity;
										$percentage = ($overallBestSellingMenuItem->total_quantity / $totalQuantity) * 100;
										
										if ($percentage > 100) {
										    $percentage = 100;
										}
										
										$percentage = round($percentage, 2);
										
										// Background colors for progress bar
										$bgColors = ['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger'];
										// randomize bg colors
										shuffle($bgColors);
										
										$bgColorIndex = 0;
										
										$bgColor = $bgColors[$bgColorIndex];
										
										$bgColorIndex++;
										
										if ($bgColorIndex > count($bgColors) - 1) {
										    $bgColorIndex = 0;
										}
									@endphp
									<div class="progress-bar {{ $bgColor }} progress-animated"
										style="width: {{ number_format($percentage, 2) }}%; height:6px;" role="progressbar">
									</div>
								</div>
							@empty
								<h6>
									No item yet!
								</h6>
							@endforelse
						</div>
					</div>
				</div>
				<!-- Column -->
			</div>
		</div>
	</div>

</div>
