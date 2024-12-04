<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextAreaInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $placeholder;
    public $value;
    public $disabled;

    public function __construct($name, $label, $placeholder = null, $value = null, $disabled = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = old($name, $value);
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-area-input');
    }
}