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
				<p>Organize your menus through button bellow</p>
				<a href="{{ route('menu.items') }}" class="btn btn-primary btn-block light">+ Add Menus</a>
			</div>

	</div>
</div>
<!--********************************** Sidebar end ***********************************-->
