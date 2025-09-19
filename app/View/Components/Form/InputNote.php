<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputNote extends Component
{

    public string|null|array $inputNote;
    /**
     * Create a new component instance.
     */
    public function __construct(string|null|array $inputNote = null)
    {
        $this->inputNote = $inputNote;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-note');
    }
}
