<?php

namespace App\Http\Livewire\Admin\Pages\Orders;

use Livewire\Component;
use Livewire\WithPagination;

class OrderListComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $status;

    public function render()
    {
        return view('livewire.admin.pages.orders.order-list-component', [
            'orders' => \App\Models\Order::where(function ($query) {
                if ($this->status) {
                    $query->where('status', $this->status);
                }
            })
                ->orderBy('created_at', 'DESC')
                ->paginate(10),
        ])->extends('livewire.admin.layouts.master');
    }

    public function sortStatus($status)
    {
        $this->status = $status;
    }

    // public function updateStatus($id, $status)
    // {
    //     dd($id, $status);
    //     $order = \App\Models\Order::find($id);
    //     $order->status = $status;
    //     $order->save();
    //     session()->flash('success', 'Order status updated successfully.');
    // }

    // update status to processing
    public function processing($id)
    {
        $order = \App\Models\Order::find($id);
        $order->status = 'processing';
        $order->save();
        session()->flash('success', 'Order accepted and processing.');
    }

    // update status to completed
    public function completed($id)
    {
        $order = \App\Models\Order::find($id);
        $order->status = 'completed';
        $order->save();
        session()->flash('success', 'Order marked as completed.');
    }

    // update status to declined or cancelled
    public function declined($id)
    {
        $order = \App\Models\Order::find($id);
        $order->status = 'declined';
        $order->save();
        session()->flash('success', 'Order has been declined.');
    }

    public function viewOrderItems($id)
    {
        $order = \App\Models\Order::find($id);

        return redirect()->route('order.items', $order->id);
    }
}
