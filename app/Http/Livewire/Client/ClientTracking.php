<?php

namespace App\Http\Livewire\Client;

use App\Http\Livewire\Shared\Tracking;

class ClientTracking extends Tracking
{
    public $role = 'tracking';

    public function render()
    {
        return view('livewire.client.client-tracking');
    }
}
