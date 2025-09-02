<?php

namespace App\View\Components\Form;

use App\Traits\HandleFormComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    use HandleFormComponent;


    public string $name;
    public string $label;
    public string $id;
    public string|int|null $defaultValue;

    public bool $isWired;
    public bool $hasError;
    public bool $showErrors;

    public string|int|null  $value;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $label = '',
        bool $isWired = false,
        bool $showErrors = true,
        string|int|null $defaultValue = null
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->isWired = $isWired;
        $this->showErrors = $showErrors;
        $this->defaultValue = $defaultValue;

        $this->id = $this->generateId('textarea');
        $this->value = $this->getValue();
        $this->hasError = $this->checkError();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
