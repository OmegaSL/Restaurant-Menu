<?php

namespace App\Http\Livewire\Admin\Pages\Menus;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class MenuItemComponent extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $menu_item_id = null;

    public $menu_category_id;
    public $name;
    public $description;
    public $show_image;
    public $show_additional_images = [];
    public $image;
    public $additional_images = [];
    public $price;
    public $size;
    public $status = 'active';

    public $updateMode = false;
    public $deleteId = null;

    public $updateStatus = [];

    public function render()
    {
        return view('livewire.admin.pages.menus.menu-item-component', [
            'menu_items' => \App\Models\MenuItem::latest()->paginate(10),
            'categories' => \App\Models\MenuCategory::latest()->get(),
        ])->extends('livewire.admin.layouts.master');
    }

    public function resetForm()
    {
        $this->menu_item_id = null;
        $this->menu_category_id = null;
        $this->name = null;
        $this->description = null;
        $this->image = null;
        $this->additional_images = [];
        $this->price = null;
        $this->size = null;
        $this->status = 'active';
    }

    public function updateStatus($id)
    {
        $menu_item = \App\Models\MenuItem::find($id);
        $menu_item->status = $menu_item->status == 'active' ? 'inactive' : 'active';
        $menu_item->save();

        toastr()->success('Menu item status updated successfully.');
        return;
    }

    public function storeMenuItem()
    {
        $this->validate([
            'menu_category_id' => 'required|in:' . \App\Models\MenuCategory::where('status', 'active')->pluck('id')->implode(','),
            'name' => 'required|unique:menu_items,name',
            'description' => 'nullable|min:10',
            'price' => 'required|numeric|min:0',
            'size' => 'nullable|in:small,medium,large,extra-large',
            'status' => 'required|in:active,inactive',
        ], [
            'menu_category_id.required' => 'The menu category field is required.',
            'menu_category_id.in' => 'The selected menu category is invalid.',
        ]);

        // check if image is updated
        if ($this->image != null) {
            $this->validate([
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            $this->image = $this->image->store('menu-items', 'public');
        }

        // check if additional images are updated
        if ($this->additional_images != null) {
            $this->validate([
                'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            foreach ($this->additional_images as $key => $image) {
                $this->additional_images[$key] = $image->store('menu-items', 'public');
            }
        }

        \App\Models\MenuItem::create([
            'menu_category_id' => $this->menu_category_id,
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'image' => $this->image,
            'additional_images' => $this->additional_images,
            'price' => $this->price,
            'size' => $this->size,
            'status' => $this->status,
        ]);

        $this->resetForm();

        $this->dispatchBrowserEvent('closeModal');

        toastr()->success('Menu item created successfully.');
    }

    public function editMenuItem($id)
    {
        $menu_item = \App\Models\MenuItem::findOrFail($id);

        $this->menu_item_id = $menu_item->id;
        $this->menu_category_id = $menu_item->menu_category_id;
        $this->name = $menu_item->name;
        $this->description = $menu_item->description;
        $this->show_image = $menu_item->image;
        $this->show_additional_images = $menu_item->additional_images;
        $this->price = $menu_item->price;
        $this->size = $menu_item->size;
        $this->status = $menu_item->status;

        $this->updateMode = true;
    }

    public function updateMenuItem()
    {
        $this->validate([
            'menu_category_id' => 'required|in:' . \App\Models\MenuCategory::pluck('id')->implode(','),
            'name' => 'required|unique:menu_items,name,' . $this->menu_item_id,
            'description' => 'nullable|min:10',
            'price' => 'required|numeric|min:0',
            'size' => 'nullable|in:small,medium,large,extra-large',
            'status' => 'required|in:active,inactive',
        ], [
            'menu_category_id.required' => 'The menu category field is required.',
            'menu_category_id.in' => 'The selected menu category is invalid.',
        ]);

        if ($this->menu_item_id == null) {
            toastr()->error('Record not found. Close the modal and try again.');
            return;
        }

        // check if image is updated
        if ($this->image != null) {
            $this->validate([
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            $this->image = $this->image->store('menu-items', 'public');
        }

        // check if additional images are updated
        if ($this->additional_images != null) {
            $this->validate([
                'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            foreach ($this->additional_images as $key => $image) {
                $this->additional_images[$key] = $image->store('menu-items', 'public');
            }
        }

        $menu_item = \App\Models\MenuItem::findOrFail($this->menu_item_id);

        $menu_item->update([
            'menu_category_id' => $this->menu_category_id,
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'image' => $this->image ? $this->image : $menu_item->image,
            'additional_images' => $this->additional_images ? $this->additional_images : $menu_item->additional_images,
            'price' => $this->price,
            'size' => $this->size,
            'status' => $this->status,
        ]);

        $this->resetForm();

        $this->dispatchBrowserEvent('closeEditModal');

        $this->updateMode = false;

        toastr()->success('Menu item updated successfully.');
    }

    public function deleteMenuItem($id)
    {
        $this->deleteId = $id;
    }

    public function destroyMenuItem()
    {
        $menu_item = \App\Models\MenuItem::findOrFail($this->deleteId);

        $menu_item->delete();

        $this->deleteId = null;

        toastr()->success('Menu item deleted successfully.');
    }
}
