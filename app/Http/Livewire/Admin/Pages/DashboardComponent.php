<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Order;
use Livewire\Component;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class DashboardComponent extends Component
{
    public function render()
    {
        $orderTrend = Trend::model(Order::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        $orderTrend = $orderTrend->map(fn (TrendValue $value) => $value->aggregate);
        // dd($orderTrend);

        return view('livewire.admin.pages.dashboard-component', [
            'menu_categories' => \App\Models\MenuCategory::where('status', 'active')->count(),
            'menu_items' => \App\Models\MenuItem::where('status', 'active')->count(),
            'staff' => \App\Models\User::where('role', 'staff')->count(),

            'orderTrend' => $orderTrend,
        ])->extends('livewire.admin.layouts.master');
    }
}
