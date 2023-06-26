<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;

class LoginComponent extends Component
{
    public $email = "";
    public $password = "";
    public $remember_me = false;

    public function mount()
    {
        if (auth()->check()) {
            return redirect()->route("dashboard");
        }
    }

    public function render()
    {
        return view('livewire.admin.auth.login-component')->extends('livewire.admin.layouts.auth');
    }

    public function login()
    {
        $this->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        if (auth()->attempt(["email" => $this->email, "password" => $this->password], $this->remember_me)) {
            return redirect()->intended('/admin/dashboard')->with("success", "You are logged in successfully.");
        } else {
            toastr()->error('Oops! Invalid credentials.');
        }
    }
}
