<!--**********************************
												Sidebar start
								***********************************-->
<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li class="{{ request()->routeIs('dashboard') ? 'mm-active' : '' }}">
				<a href="{{ route('dashboard') }}" aria-expanded="false">
					<i class="flaticon-381-networking"></i>
					<span class="nav-text">Dashboard</span>
				</a>

			</li>
			<li class="{{ request()->routeIs('menu.items') ? 'mm-active' : '' }}">
				<a href="{{ route('menu.items') }}" aria-expanded="false">
					<i class="flaticon-381-television"></i>
					<span class="nav-text">Meal Item</span>
				</a>
			</li>

			<li class="{{ request()->routeIs('menu.categories') ? 'mm-active' : '' }}">
				<a href="{{ route('menu.categories') }}" aria-expanded="false">
					<i class="flaticon-381-controls-3"></i>
					<span class="nav-text">Meal Category</span>
				</a>
			</li>

			<li class="{{ request()->routeIs('reservation.list') ? 'mm-active' : '' }}">
				<a href="{{ route('reservation.list') }}" aria-expanded="false">
					<i class="flaticon-381-internet"></i>
					<span class="nav-text">Reservation</span>
					<span class="badge badge-danger">{{ \App\Models\Reservation::count() }}</span>
				</a>
			</li>

			{{-- <li class="{{ request()->routeIs('order.list') ? 'mm-active' : '' }}">
				<a href="{{ route('order.list') }}" aria-expanded="false">
					<i class="flaticon-381-internet"></i>
					<span class="nav-text">Orders</span>
					<span class="badge badge-danger">{{ \App\Models\Order::count() }}</span>
				</a>
			</li> --}}

			<li class="{{ request()->is('reports*') ? 'mm-active' : '' }}">
				<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-heart"></i>
					<span class="nav-text">Reports</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('reports.frequently-sold') }}">Frequently Sold</a></li>
					<li><a href="{{ route('reports.financial-report') }}">Financial Reports</a></li>

				</ul>
			</li>
			<li class="{{ request()->is('expenses*') ? 'mm-active' : '' }}">
				<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-settings-2"></i>
					<span class="nav-text">Expenses</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('add.expenses') }}">Add Expenses</a></li>
					<li><a href="{{ route('expenses.list') }}">Manage Expenses</a></li>
					<li><a href="{{ route('expenses.category.list') }}">Add Expense Category</a></li>
				</ul>
				{{-- staff.list --}}
			</li>

			<li class="{{ request()->routeIs('staff.list') ? 'mm-active' : '' }}">
				<a href="{{ route('staff.list') }}" aria-expanded="false">
					<i class="flaticon-381-notepad"></i>
					<span class="nav-text">Staff</span>
				</a>
			</li>

			<li class="{{ request()->routeIs('setting') ? 'mm-active' : '' }}">
				<a href="{{ route('setting') }}" aria-expanded="false">
					<i class="flaticon-381-network"></i>
					<span class="nav-text">Settings</span>
				</a>
			</li>


			<div class="add-menu-sidebar">
				<img src="{{ asset('assets/images/icon1.png') }}" alt="" />
				<p>Browse your with this QR Code Generator</p>
				<a href="#!" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-block light">+
					QRCode</a>
			</div>

	</div>
</div>
<!--********************************** Sidebar end ***********************************-->

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false"
	tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-fullscreen" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Main Menu QRCode</h5>
			</div>
			<div class="modal-body">
				<div class="visible-print text-center">
					{!! QrCode::size(500)->generate(url('/')) !!}
					{{-- <p>{{ $setting != null ? $setting->site_name : config('app.name') }}</p> --}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				{{-- <button type="button" class="btn btn-primary" onclick="functionPrint()">Print</button> --}}
			</div>
		</div>
	</div>
</div>

@section('scripts')
	<script>
		function functionPrint() {
			window.print();
		}
	</script>
@endsection
