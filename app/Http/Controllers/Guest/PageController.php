<?php

namespace App\Http\Controllers\Guest;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function main_menu()
    {
        return Inertia::render("Home", [
            "menu_categories" => \App\Models\MenuCategory::with("menu_items")->get()
        ]);
    }

    public function menu_item($slug)
    {
        return Inertia::render("MenuItem", [
            "menu_item" => \App\Models\MenuItem::with("menu_category")->where("slug", $slug)->firstOrFail(),
        ]);
    }

    public function booking()
    {
        return Inertia::render("Booking");
    }

    // submit booking
    public function submit_reservation(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100",
            "email" => "required|email",
            "phone" => "required|numeric|digits_between:10,15",
            "reservation_datetime" => "required",
            "number_of_people" => "required",
            "message" => "nullable|string|max:500",
        ]);

        $reservation = new \App\Models\Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->reservation_datetime = $request->reservation_datetime;
        $reservation->number_of_people = $request->number_of_people;
        $reservation->message = $request->message;
        $reservation->status = "pending";
        $reservation->save();

        // flash()->addSuccess('Your reservation has been submitted successfully. We will contact you soon.');

        return redirect()->back()->with("success", "Your reservation has been submitted successfully. We will contact you soon.");
    }

    public function alpine_work()
    {
        return view("alpine_page");
    }
}
