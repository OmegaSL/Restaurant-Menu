<?php

namespace App\Http\Livewire\Admin\Pages\Menus;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class MenuCategoryComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id = null;

    public $name;
    public $status = 'active';

    public $updateMode = false;
    public $deleteId = null;

    public function render()
    {
        return view('livewire.admin.pages.menus.menu-category-component', [
            'categories' => \App\Models\MenuCategory::latest()->paginate(10),
        ])->extends('livewire.admin.layouts.master');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->status = 'active';
        $this->updateMode = false;
        $this->deleteId = null;
    }

    public function updateStatus($id)
    {
        $category = \App\Models\MenuCategory::find($id);
        $category->status = $category->status == 'active' ? 'inactive' : 'active';
        $category->save();

        toastr()->success('Menu category status updated successfully.');
        return;
    }

    public function storeMenuCategory()
    {
        $validator = Validator::make($this->all(), [
            'name' => 'required|unique:menu_categories,name',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return;
        }

        $category = new \App\Models\MenuCategory();
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->status = $this->status;
        $category->save();

        $this->resetForm();

        toastr()->success('Menu category created successfully.');
        return;
    }

    public function editMenuCategory($id)
    {
        $category = \App\Models\MenuCategory::find($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->status = $category->status;

        $this->updateMode = true;
    }

    public function updateMenuCategory()
    {
        $validator = Validator::make($this->all(), [
            'name' => 'required|unique:menu_categories,name,' . $this->category_id,
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return;
        }

        $category = \App\Models\MenuCategory::find($this->category_id);
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->status = $this->status;
        $category->save();

        $this->resetForm();

        toastr()->success('Menu category updated successfully.');
        return;
    }

    public function deleteMenuCategory($id)
    {
        $this->deleteId = $id;
    }

    public function destroyMenuCategory()
    {
        $category = \App\Models\MenuCategory::find($this->deleteId);

        // check if any menu item exists in this category
        $menu_items = \App\Models\MenuItem::where('menu_category_id', $category->id)->get();
        if ($menu_items->count() > 0) {
            toastr()->error('You can not delete this menu category. Because it has some menu items.');
            return;
        }

        $category->delete();

        $this->deleteId = null;

        toastr()->success('Menu category deleted successfully.');
        return;
    }
}
