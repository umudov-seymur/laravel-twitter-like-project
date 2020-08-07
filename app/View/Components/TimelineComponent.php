<?php

namespace App\View\Components;

use App\Tweet;
use Illuminate\View\Component;

class Timeline extends Component
{
    protected $tweets;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweets)
    {
        $this->tweets = $tweets;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.timeline');
    }
}
