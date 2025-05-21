<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialButton extends Component
{
    public $icon;
    public $nameOfSocialMidia;
    public $width;
    public $backgroundColor;

    public function __construct($icon = null, $nameOfSocialMidia = null, $width = null,  $backgroundColor = null)
    {
        $this->icon = $icon;
        $this->nameOfSocialMidia = $nameOfSocialMidia;
        $this->width = $width;
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.social-button');
    }
}
