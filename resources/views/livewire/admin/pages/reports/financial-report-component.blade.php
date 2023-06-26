@section('title', 'Financial Report')

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
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashoard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Financial Report</a></li>
					</ol>
				</div>
			</div>

			<div class="content-page">
				<div class="content">
					<div class="container-fluid mt--6">
						<!-- Table -->
						<div class="row">
							<!-- Start Content-->
							<div class="container-fluid">
								<div class="row justify-content-center">
									<div class="col-md-12 col-lg-12 col-sm-12">
										<div class="card">
											<div class="card-body">
												<form method="post">
													<div class="row col-12">
														<div class="form-group mb-3 col-md-6">
															<div class="form-group row">
																<label for="txt_to"> From:</label>
																<div class="col-md-10">
																	<input class="form-control" type="date" placeholder="Search Date from"
																		wire:model="search_date_from">
																</div>
															</div>
														</div>

														<div class="form-group mb-3 col-md-6">
															<div class="form-group row">
																<label for="txt_to">To:</label>
																<div class="col-md-10">
																	<input class="form-control"
																		min="{{ \Carbon\Carbon::parse($this->search_date_from)->addDay()->format('Y-m-d') }}" type="date"
																		placeholder="Search Date to" wire:model="search_date_to">
																</div>
															</div>
														</div>

														{{-- <div class="form-group mb-3 col-md-6" class="row justify-content-center">
															<div class="basic-form">
																<form>
																	<div class="form-group mb-0">
																		<label class="radio-inline mr-3"><input type="radio" name="optradio"> Income</label>
																		<label class="radio-inline mr-3"><input type="radio" name="optradio"> Expense</label>
                                                                    </div>
																</form>
															</div>
														</div> --}}
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<div class="row justify-content-center">
									<div class="col-md-12 col-lg-12 col-sm-12">
										<div class="card">
											<div class="card-body">
												<div class="card-box table-responsive">
													<table class="table table-hover m-0 table-centered dt-responsive nowrap w-100">
														</tbody>
														<tfoot>
															<tr style="background-color: #ace2ac !important;">
																<td colspan="5">
																	<h4>Sub Total</h4>
																</td>
																<td colspan="1">
																	<h3>
																		<span class="badge btn-info">
																			{{ $setting->currency }}
																			{{ $order_items_report->sum('total_amount') }}
																		</span>
																	</h3>
																</td>
															</tr>

															<tr style="background-color: #99bef5">
																<td colspan="5">
																	<h4>Total Discount</h4>
																</td>
																<td colspan="1">
																	<h3>
																		<span class="badge btn-primary">
																			{{ $setting->currency }}{{ $orders_report->sum('discount') }}
																		</span>
																	</h3>
																</td>
															</tr>

															<tr style="background-color: #728090">
																<td colspan="5">
																	<h4>Total Tax</h4>
																</td>
																<td colspan="1">
																	<h3>
																		<span class="badge btn-secondary">
																			{{ $setting->currency }}{{ $orders_report->sum('tax') }}
																		</span>
																	</h3>
																</td>
															</tr>

															<tr style="background-color: #e6baad">
																<td colspan="5">
																	<h4>Total Expenditure</h4>
																</td>
																<td colspan="1">
																	<h3>
																		<span class="badge btn-danger">
																			{{ $setting->currency }}{{ $expenses_report->sum('amount') }}
																		</span>
																	</h3>
																</td>
															</tr>


															<tr style="background-color: #728090">
																<td colspan="5">
																	<h4>Overall Cost Price</h4>
																</td>
																<td colspan="1">
																	<h3>
																		<span class="badge btn-secondary">
																			{{ $setting->currency }}{{ $menu_items_report->sum('price') }}
																		</span>
																	</h3>
																</td>
															</tr>

															<tr style="background-color: #e6baad">
																<td colspan="5">
																	<h4>Gross Sales (<em>Minus overall discount and expenditure</em>)</h4>
																</td>
																<td colspan="1">
																	<h3>
																		<span class="badge btn-danger">
																			{{ $setting->currency }}
																			{{ $order_items_report->sum('subtotal') + $orders_report->sum('tax') }}
																		</span>
																	</h3>
																</td>
															</tr>

															<tr style="background-color: #ace2ac !important;">
																<td colspan="5">
																	<h3>Profit</h3>
																</td>
																<td colspan="1">
																	<h3>
																		<span class="badge btn-info">
																			{{ $setting->currency }}
																			{{ $order_items_report->sum('total_amount') + $orders_report->sum('tax') - $menu_items_report->sum('price') - $orders_report->sum('discount') - $expenses_report->sum('amount') }}
																		</span>
																	</h3>
																</td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div><!-- end col -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!--********************************** Content body end ***********************************-->

	</div>
