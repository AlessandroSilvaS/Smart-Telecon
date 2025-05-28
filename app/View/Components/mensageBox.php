<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mensageBox extends Component
{
    
    public $title;
    public $text;
    public $typeMensage;
    public $includeButton;
    public $duration;
    public $widthDimension;

    public function __construct($title=null, $text =null, $typeMensage=null, $includeButton=null, $duration=null, $widthDimension=null)
    {
        
        $this->title = $title;
        $this->text = $text;
        $this->typeMensage = $typeMensage;
        $this->includeButton = $includeButton;
        $this->duration = $duration;
        $this->widthDimension = $widthDimension;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mensage-box');
    }
}