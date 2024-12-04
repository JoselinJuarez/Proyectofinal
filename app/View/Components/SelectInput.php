<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $options;
    public $selected;

    public function __construct($name, $label, $options = [], $selected = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
        $this->selected = old($name, $selected);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-input');
    }
}
