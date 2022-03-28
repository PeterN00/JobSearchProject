<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Industry;
class nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $Industries;
    public function __construct()
    {
        //
        $this->Industries= Industry::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }
}
