<?php

use App\Http\Controllers\Guest\PageController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Auth\LoginComponent;
use App\Http\Livewire\Admin\Pages\DashboardComponent;
use App\Http\Livewire\Admin\Pages\Expenses\AddExpenseComponent;
use App\Http\Livewire\Admin\Pages\Expenses\ExpenseCategoryComponent;
use App\Http\Livewire\Admin\Pages\Expenses\ExpenseComponent;
use App\Http\Livewire\Admin\Pages\Menus\MenuCategoryComponent;
use App\Http\Livewire\Admin\Pages\Menus\MenuItemComponent;
use App\Http\Livewire\Admin\Pages\Orders\OrderItemComponent;
use App\Http\Livewire\Admin\Pages\Orders\OrderListComponent;
use App\Http\Livewire\Admin\Pages\Reports\FinancialReportComponent;
use App\Http\Livewire\Admin\Pages\Reports\FrequentlySoldComponent;
use App\Http\Livewire\Admin\Pages\ReservationComponent;
use App\Http\Livewire\Admin\Pages\SettingComponent;
use App\Http\Livewire\Admin\Pages\StaffListComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'main_menu'])->where('any', '.*')->name('main.menu');
Route::get('/menu_item/{slug}', [PageController::class, 'menu_item'])->where('any', '.*')->name('menu.item');
Route::get('/booking', [PageController::class, 'booking'])->where('any', '.*')->name('booking');
Route::post('/make-reservation', [PageController::class, 'submit_reservation'])->where('any', '.*')->name('submit.reservation');

// Route::get('/alpine_work', [PageController::class, 'alpine_work'])->where('any', '.*')->name('alpine_work');

Route::prefix('admin')->group(function () {
    Route::get('/login', LoginComponent::class)->name('login');
    // logout route
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', DashboardComponent::class)->name('dashboard');

        Route::get('/menu-categories', MenuCategoryComponent::class)->name('menu.categories');
        Route::get('/menu-items', MenuItemComponent::class)->name('menu.items');

        Route::get('/reservation-list', ReservationComponent::class)->name('reservation.list');

        // Route::get('/order-list', OrderListComponent::class)->name('order.list');
        // Route::get('/order-items/{id}', OrderItemComponent::class)->name('order.items');

        Route::get('/reports-frequently-sold', FrequentlySoldComponent::class)->name('reports.frequently-sold');
        Route::get('/reports-financial-report', FinancialReportComponent::class)->name('reports.financial-report');

        Route::get('/expenses-list', ExpenseComponent::class)->name('expenses.list');
        Route::get('/expenses-create', AddExpenseComponent::class)->name('add.expenses');
        Route::get('/expenses-category-list', ExpenseCategoryComponent::class)->name('expenses.category.list');

        Route::get('/staff', StaffListComponent::class)->name('staff.list');

        Route::get('/setting', SettingComponent::class)->name('setting');
    });
});
