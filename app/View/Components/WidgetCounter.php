<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WidgetCounter extends Component
{

    public $header;
    public $count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header, $count)
    {
        $this->header = $header;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget-counter');
    }
}
