<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\User;
use Livewire\Component;

class StaffListComponent extends Component
{
    public $staff_id = null;

    public $name;
    public $first_name;
    public $last_name;
    public $email;
    public $phone = '233';
    public $password;
    public $role = 'staff';
    public $status = 'active';

    public $deleteId = null;

    public function render()
    {
        return view('livewire.admin.pages.staff-list-component', [
            'staffs' => User::latest()->where('role', '!=', 'super-admin')->where('status', 'active')->get(),
        ])->extends('livewire.admin.layouts.master');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '233';
        $this->password = '';
        $this->role = 'staff';
        $this->status = 'active';
    }

    public function storeStaff()
    {
        $this->validate(
            [
                'name' => 'required|min:3',
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'phone' => 'required|digits:12',
                'password' => 'required|min:6',
                'role' => 'required',
                'status' => 'required',
            ],
            [
                'phone.digits' => 'The phone number must be 12 digits. eg: 233xxxxxxxxx',
            ]
        );

        User::create([
            'name' => $this->name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => strtolower($this->email),
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
            'role' => $this->role,
            'status' => $this->status,
        ]);

        $this->resetForm();

        toastr()->success('Staff created successfully');
    }

    public function editStaff($id)
    {
        $staff = User::findOrFail($id);

        $this->staff_id = $staff->id;
        $this->name = $staff->name;
        $this->first_name = $staff->first_name;
        $this->last_name = $staff->last_name;
        $this->email = $staff->email;
        $this->phone = $staff->phone;
        // $this->password = $staff->password;
        $this->role = $staff->role;
        $this->status = $staff->status;
    }

    public function updateStaff()
    {
        $this->validate(
            [
                'name' => 'required|min:3',
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,' . $this->staff_id,
                'phone' => 'required|digits:12',
                'password' => 'nullable|min:6',
                'role' => 'required',
                'status' => 'required',
            ],
            [
                'phone.digits' => 'The phone number must be 12 digits. eg: 233xxxxxxxxx',
            ]
        );

        if ($this->staff_id == null) {
            toastr()->error('Staff not found, close modal and try again');
            return;
        }

        $staff = User::findOrFail($this->staff_id);

        $staff->update([
            'name' => $this->name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => strtolower($this->email),
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
            'role' => $this->role,
            'status' => $this->status,
        ]);

        $this->resetForm();

        toastr()->success('Staff updated successfully');
    }

    public function deleteStaff($id)
    {
        $this->deleteId = $id;
    }

    public function destroyStaff()
    {
        if ($this->deleteId == null) {
            toastr()->error('Staff not found, close modal and try again');
            return;
        }

        $staff = User::findOrFail($this->deleteId);

        $staff->delete();

        $this->deleteId = null;

        toastr()->success('Staff deleted successfully');
    }
}
