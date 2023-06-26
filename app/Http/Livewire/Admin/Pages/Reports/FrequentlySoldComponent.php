<?php

namespace App\Http\Livewire\Admin\Pages\Reports;

use Livewire\Component;

class FrequentlySoldComponent extends Component
{
    public function render()
    {
        // best selling menu items this month
        $bestSellingMenuItems = \App\Models\OrderList::with(['menu_item', 'order'])
            ->selectRaw('menu_item_id, sum(quantity) as total_quantity')
            ->whereHas('order', function ($query) {
                $query->whereMonth('created_at', date('m'));
            })
            ->groupBy('menu_item_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        // overall best selling menu items
        $overallBestSellingMenuItems = \App\Models\OrderList::with(['menu_item', 'order'])
            ->selectRaw('menu_item_id, sum(quantity) as total_quantity')
            ->groupBy('menu_item_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();
        // dd($bestSellingMenuItems, $overallBestSellingMenuItems);

        return view('livewire.admin.pages.reports.frequently-sold-component', [
            'bestSellingMenuItems' => $bestSellingMenuItems,
            'overallBestSellingMenuItems' => $overallBestSellingMenuItems,
        ])->extends('livewire.admin.layouts.master');
    }
}
