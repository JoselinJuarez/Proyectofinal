<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageUploader extends Component
{
    /**
     * Create a new component instance.
     */
    public $defaultImage;
    public $width;
    public $height;
    public $label;

    public function __construct($defaultImage, $width, $height, $label)
    {
        $this->defaultImage = $defaultImage;
        $this->width = $width;
        $this->height = $height;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-uploader');
    }
}