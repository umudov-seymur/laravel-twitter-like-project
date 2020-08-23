<?php

namespace App\Http\Livewire;

use App\Tweet;
use Livewire\Component;

class PublishTweet extends Component
{
    public $body = '';

    public function render()
    {
        return view('livewire.publish-tweet');
    }

    public function storeTweet()
    {
        $data = $this->validate([
            'body' => 'required|min:10|max:255'
        ]);

        $data['user_id'] = auth()->user()->id;

        Tweet::create($data);

        toast('Post shared succesfull!', 'success');

        $this->body = '';
    }
}
