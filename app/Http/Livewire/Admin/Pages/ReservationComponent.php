<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;

class ReservationComponent extends Component
{
    public $reservation_id = null;
    public $deleteId = null;

    public $name;
    public $email;
    public $phone;
    public $reservation_datetime;
    public $number_of_people = 1;
    public $message;
    public $status = 'pending';

    public function render()
    {
        return view('livewire.admin.pages.reservation-component', [
            'reservations' => \App\Models\Reservation::orderBy('id', 'desc')->paginate(10),
        ])->extends('livewire.admin.layouts.master');
    }

    // resetForm
    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->reservation_datetime = '';
        $this->number_of_people = 1;
        $this->message = '';
        $this->status = 'pending';

        $this->reservation_id = null;
        $this->deleteId = null;
    }

    // storeReservation
    public function storeReservation()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'reservation_datetime' => 'required',
            'number_of_people' => 'required',
            'message' => 'required',
            'status' => 'required',
        ]);

        $reservation = new \App\Models\Reservation();
        $reservation->name = $this->name;
        $reservation->email = $this->email;
        $reservation->phone = $this->phone;
        $reservation->reservation_datetime = $this->reservation_datetime;
        $reservation->number_of_people = $this->number_of_people;
        $reservation->message = $this->message;
        $reservation->status = $this->status;
        $reservation->save();

        session()->flash('message', 'Reservation has been created successfully!');
        $this->resetForm();
    }

    // editReservation
    public function editReservation($id)
    {
        $reservation = \App\Models\Reservation::findOrFail($id);
        $this->reservation_id = $reservation->id;
        $this->name = $reservation->name;
        $this->email = $reservation->email;
        $this->phone = $reservation->phone;
        $this->reservation_datetime = $reservation->reservation_datetime;
        $this->number_of_people = $reservation->number_of_people;
        $this->message = $reservation->message;
        $this->status = $reservation->status;
    }

    // updateReservation
    public function updateReservation()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,12',
            'reservation_datetime' => 'required',
            'number_of_people' => 'required|numeric|min:1',
            'message' => 'required|string|max:500',
            'status' => 'required|string|in:confirmed,pending,cancelled',
        ]);

        $reservation = \App\Models\Reservation::findOrFail($this->reservation_id);
        $reservation->name = $this->name;
        $reservation->email = $this->email;
        $reservation->phone = $this->phone;
        $reservation->reservation_datetime = $this->reservation_datetime;
        $reservation->number_of_people = $this->number_of_people;
        $reservation->message = $this->message;
        $reservation->status = $this->status;
        $reservation->save();

        $this->resetForm();

        toastr()->success('Reservation has been updated successfully!');
    }

    // deleteReservation
    public function deleteReservation($id)
    {
        $this->deleteId = $id;
    }

    // destroyReservation
    public function destroyReservation()
    {
        $reservation = \App\Models\Reservation::findOrFail($this->deleteId);
        $reservation->delete();

        $this->deleteId = null;

        toastr()->success('Reservation has been deleted successfully!');
    }
}
