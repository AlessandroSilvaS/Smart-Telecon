<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardProject extends Component
{

    public $image;
    public $title;
    public $content;


    public function __construct($image, $title, $content)
    {

        $this->image = $image;
        $this->title = $title;
        $this->content =  $content;
        
    }

    public function render(): View|Closure|string
    {
        return view('components.card-project');
    }
}
