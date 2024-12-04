<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modalDialog extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $title;
    public $content;
    public $idDelete;
    public $route;

    public function __construct($id, $title, $content, $idDelete, $route)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->idDelete = $idDelete;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-dialog');
    }
}
