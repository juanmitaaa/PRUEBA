<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class DashboardSection extends Component
{
    public $link;
    public $text;
    public $icon;
    public $color;
    public $canaccess = false; //comprobar acceso a componente
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link, $text, $icon, $color = '', $type = '')
    {
        $this->link = $link;
        $this->text = $text;
        $this->icon = $icon;
        $this->color = $color;
        $this->type = $type;
        $this->canaccess = $this->checkAccess();
    }

    public function checkAccess(){         
        return Auth::user()->can('read',$this->type)?1:0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.dashboard-section');
    }
}
