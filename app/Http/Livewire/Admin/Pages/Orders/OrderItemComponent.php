<?php

namespace App\Http\Livewire\Admin\Pages\Orders;

use Livewire\Component;

class OrderItemComponent extends Component
{
    public $order;

    public $sorting = 'quantity';
    public $sortingDirection = 'asc';
    public $search;

    public $deleteId = null;

    public function mount($id)
    {
        $this->order = \App\Models\Order::find($id);
    }

    public function render()
    {
        return view('livewire.admin.pages.orders.order-item-component', [
            'orderItems' => \App\Models\OrderList::with(['menu_item'])
                ->where('order_id', $this->order->id)
                ->orderBy($this->sorting, $this->sortingDirection)
                ->paginate(10),
        ])->extends('livewire.admin.layouts.master');
    }

    public function resetForm()
    {
        $this->deleteId = null;
        $this->sorting = 'quantity';
        $this->sortingDirection = 'asc';
    }

    public function sortQuantityAsc()
    {
        $this->sorting = 'quantity';
        $this->sortingDirection = 'asc';
    }

    public function sortQuantityDesc()
    {
        $this->sorting = 'quantity';
        $this->sortingDirection = 'desc';
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
    }

    // delete order item
    public function deleteOrderItem()
    {
        $orderItem = \App\Models\OrderList::find($this->deleteId);
        $orderItem->delete();

        toastr()->success('Order item deleted successfully.');
    }
}
