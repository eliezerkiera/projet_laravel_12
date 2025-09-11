<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public string $method;
    public bool $spoofMethod = false;
    /**
     * Create a new component instance.
     */
    public function __construct(string $method = "POST")
    {
        $this->method = strtoupper($method);
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form');
    }
}
