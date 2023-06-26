<?php

namespace App\Http\Livewire\Admin\Pages\Expenses;

use Livewire\Component;
use Livewire\WithPagination;

class ExpenseComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $expense_id = null;

    public $expense_category_id;
    public $name;
    public $description;
    public $amount;
    public $status = 'active';

    public $updateMode = false;
    public $deleteId = null;

    public $updateStatus = [];

    public function render()
    {
        return view('livewire.admin.pages.expenses.expense-component', [
            'expenses' => \App\Models\Expense::with(['expense_category'])->latest()->paginate(10),
            'expense_categories' => \App\Models\ExpenseCategory::latest()->get(),
        ])->extends('livewire.admin.layouts.master');
    }

    public function resetForm()
    {
        $this->expense_id = null;
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
        $this->validate([
            'expense_category_id' => 'required',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        \App\Models\Expense::create([
            'expense_category_id' => $this->expense_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'amount' => $this->amount,
            'status' => $this->status,
        ]);

        toastr()->success('Expense created successfully.');

        $this->resetForm();
    }

    public function editExpense($id)
    {
        $expense = \App\Models\Expense::find($id);

        $this->expense_id = $expense->id;
        $this->expense_category_id = $expense->expense_category_id;
        $this->name = $expense->name;
        $this->description = $expense->description;
        $this->amount = $expense->amount;
        $this->status = $expense->status;

        $this->updateMode = true;
    }

    public function updateExpense()
    {
        $this->validate([
            'expense_category_id' => 'required',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        if ($this->expense_id == null) {
            toastr()->error('Expense not found, close the modal and try again.');
            return;
        }

        $expense = \App\Models\Expense::find($this->expense_id);

        $expense->update([
            'expense_category_id' => $this->expense_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'amount' => $this->amount,
            'status' => $this->status,
        ]);

        toastr()->success('Expense updated successfully.');

        $this->resetForm();
    }

    public function deleteExpense($id)
    {
        $this->deleteId = $id;
    }

    public function destroyExpense()
    {
        $expense = \App\Models\Expense::find($this->deleteId);
        $expense->delete();

        toastr()->success('Expense deleted successfully.');

        $this->deleteId = null;
    }
}
