<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Shared\bookings\ViewBooking;
use App\Models\Cash;


class AdminViewBooking extends ViewBooking
{

    public function render()
    {

        $expenses = Cash::where('cash_type_id', '=', Cash::CASH_EXPENSE)
            ->where('booking_id', '=', $this->bookingId)
            ->latest()
            ->paginate(5);
        $incentives = Cash::where('cash_type_id', '=', Cash::CASH_INCENTIVE)
            ->where('booking_id', '=', $this->bookingId)
            ->latest()
            ->paginate(5);
        if (count($expenses)==0){
            $this->resetPage();
            $expenses = Cash::where('cash_type_id', '=', Cash::CASH_EXPENSE)
                ->where('booking_id', '=', $this->bookingId)
                ->latest()
                ->paginate(5);
            $incentives = Cash::where('cash_type_id', '=', Cash::CASH_INCENTIVE)
                ->where('booking_id', '=', $this->bookingId)
                ->latest()
                ->paginate(5);
        }
        $role ='admin';
        return view('livewire.admin.admin-view-booking',[
            'expenses' => $expenses,'incentives'=>$incentives, 'role'=>$role
        ]);
    }
}
