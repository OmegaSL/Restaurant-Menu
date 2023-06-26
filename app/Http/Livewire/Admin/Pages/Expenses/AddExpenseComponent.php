<?php

namespace App\Http\Livewire\Admin\Pages\Expenses;

use Livewire\Component;
use Livewire\WithPagination;

class AddExpenseComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $expense_category_id;
    public $name;
    public $description;
    public $amount;
    public $status = 'active';

    public function render()
    {
        return view('livewire.admin.pages.expenses.add-expense-component', [
            'expenses' => \App\Models\Expense::with(['expense_category'])->latest()->paginate(10),
            'expense_categories' => \App\Models\ExpenseCategory::latest()->get(),
        ])->extends('livewire.admin.layouts.master');
    }

    public function resetForm()
    {
        $this->expense_category_id = null;
        $this->name = null;
        $this->description = null;
        $this->amount = null;
        $this->status = 'active';
    }

    public function updateStatus($id)
    {
        $expense = \App\Models\Expense::find($id);
        $expense->status = $expense->status == 'active' ? 'inactive' : 'active';
        $expense->save();

        toastr()->success('Expense status updated successfully.');
        return;
    }

    public function storeExpense()
    {
        $this->validate(
            [
                'expense_category_id' => 'required',
                'name' => 'required|string',
                'description' => 'nullable|string',
                'amount' => 'required|numeric|min:0',
                'status' => 'required|in:active,inactive',
            ],
            [
                'expense_category_id.required' => 'The expense category Field is required'
            ]
        );

        \App\Models\Expense::create([
            'expense_category_id' => $this->expense_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'amount' => $this->amount,
            'status' => $this->status,
        ]);

        $this->dispatchBrowserEvent('closeModal');

        toastr()->success('Expense created successfully.');

        $this->resetForm();
    }
}
