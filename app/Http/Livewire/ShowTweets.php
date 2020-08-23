<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowTweets extends Component
{
    public function render()
    {
        return view('livewire.show-tweets', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
