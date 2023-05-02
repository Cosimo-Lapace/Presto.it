<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class locale extends Component
{
    public $lang;
    /**
     * Create a new component instance.
     */
    public function __construct($lang)
    {
        $this->lang  = $lang;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.locale');
    }
}
