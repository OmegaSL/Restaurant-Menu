<?php

namespace App\Http\Livewire\Admin\Pages\Reports;

use Livewire\Component;

class FinancialReportComponent extends Component
{
    public $search_date_from;
    public $search_date_to;

    public function render()
    {
        return view('livewire.admin.pages.reports.financial-report-component', [
            'order_items_report' => \App\Models\OrderList::with(['order', 'menu_item'])
                ->whereBetween('created_at', [$this->search_date_from, $this->search_date_to])
                ->get(),
            'orders_report' => \App\Models\Order::whereBetween('created_at', [$this->search_date_from, $this->search_date_to])
                ->get(),
            'expenses_report' => \App\Models\Expense::with(['expense_category'])
                ->whereBetween('created_at', [$this->search_date_from, $this->search_date_to])
                ->get(),
            'menu_items_report' => \App\Models\MenuItem::with(['menu_category'])
                ->whereHas('order_list', function ($query) {
                    $query->whereBetween('created_at', [$this->search_date_from, $this->search_date_to]);
                })
                ->get(),
        ])->extends('livewire.admin.layouts.master');
    }
}
