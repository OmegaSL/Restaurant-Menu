<?php

namespace App\Http\Livewire\Admin\Pages\Expenses;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ExpenseCategory;

class ExpenseCategoryComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $status = 'active', $expense_category_id;

    public $deleteId = null;

    public function render()
    {
        return view('livewire.admin.pages.expenses.expense-category-component', [
            'expense_categories' => ExpenseCategory::latest()->paginate(10),
        ])->extends('livewire.admin.layouts.master');
    }

    public function updateStatus($id)
    {
        $expense_category = ExpenseCategory::find($id);
        $expense_category->status = $expense_category->status == 'active' ? 'inactive' : 'active';
        $expense_category->save();

        toastr()->success('Expense category status updated successfully.');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->status = 'active';
        $this->expense_category_id = '';
    }

    public function storeExpenseCategory()
    {
        $this->validate([
            'name' => 'required|unique:expense_categories,name,' . $this->expense_category_id,
        ]);

        ExpenseCategory::create([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        toastr()->success('Expense category created successfully.');

        $this->resetForm();
    }

    public function editExpenseCategory($id)
    {
        $expense_category = ExpenseCategory::find($id);
        $this->name = $expense_category->name;
        $this->status = $expense_category->status;
        $this->expense_category_id = $expense_category->id;
    }

    public function updateExpenseCategory()
    {
        $this->validate([
            'name' => 'required|unique:expense_categories,name,' . $this->expense_category_id,
        ]);

        if ($this->expense_category_id == null) {
            toastr()->error('Something is missing, close the modal and try again.');
            return;
        }

        $expense_category = ExpenseCategory::find($this->expense_category_id);
        $expense_category->name = $this->name;
        $expense_category->status = $this->status;
        $expense_category->save();

        toastr()->success('Expense category updated successfully.');

        $this->resetForm();
    }

    public function deleteExpenseCategory($id)
    {
        $this->deleteId = $id;
    }

    public function destroyExpenseCategory()
    {
        $expense_category = ExpenseCategory::find($this->deleteId);

        // check if any expense exists with this category
        if ($expense_category->expenses()->count() > 0) {
            toastr()->error('Expense category cannot be deleted, because it has some expenses.');
            return;
        }

        $expense_category->delete();

        toastr()->success('Expense category deleted successfully.');

        $this->deleteId = null;
    }
}
