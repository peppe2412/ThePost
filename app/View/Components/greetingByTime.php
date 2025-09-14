<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class greetingByTime extends Component
{

    public $saluto;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {

        date_default_timezone_set('Europe/Rome');
        $time = date('G');

        if ($time >= 6 && $time <= 8) {
            $this->saluto = 'Buongiornissimo';
        } elseif ($time >= 9 && $time <= 11) {
            $this->saluto = 'Buongiorno';
        } elseif ($time >= 12 && $time <= 13) {
            $this->saluto = 'Buon pranzo';
        } elseif ($time >= 14 && $time <= 17) {
            $this->saluto = 'Buon pomeriggio';
        } elseif ($time >= 18 && $time <= 22) {
            $this->saluto = 'Buonasera';
        } else {
            $this->saluto = 'Ancora svegli?';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.greeting-by-time');
    }
}
