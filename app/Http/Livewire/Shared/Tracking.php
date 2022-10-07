<?php
namespace App\Http\Livewire\Shared;


use App\Models\Booking;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Tracking extends Component{

    public $bookingId;
    public $fromLatitude;
    public $fromLongitude;
    public $toLatitude;
    public $toLongitude;

    public $booking;

    protected $listeners = ['refreshComponent' => 'reload'];

    public function mount(Booking $booking){
        $this->bookingId = $booking->id;
        $this->booking = $booking;
        $this->fromLatitude = $booking->from_latitude;
        $this->fromLongitude = $booking->from_longitude;
        $this->toLatitude = $booking->to_latitude;
        $this->toLongitude = $booking->to_longitude;
    }

    public function reload(){
        return Redirect::route('admin.tracking', $this->bookingId);
    }

}