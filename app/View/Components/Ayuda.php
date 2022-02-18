<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Ayuda extends Component {
 
    
    public $saludo="Saludando";
    /**
     * 
     * @var type
     */
    public $helpBody;

    /**
     * 
     * @var type
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->helpBody = $helpBody;
//        $this->pie= $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('components.ayuda');
    }

}
