<?php

namespace App\View\Components\Form;

use App\Traits\HandleFormComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{


    use HandleFormComponent;
    /**
     * Create a new component instance.
     */

     public string $name;
    public string $label;
    public string $id;
    public string|int|null $defaultValue;

    public bool $isWired;
    public bool $hasError;
    public bool $showErrors;

    public string|int|null  $value;
    public bool $isChecked;

    public function __construct(
        string $name,
        string $label = '',
        bool $isWired = false,
        bool $showErrors = true,
        string|int|null $defaultValue = null,
        string |int $value = 1
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->isWired = $isWired;
        $this->showErrors = $showErrors;
        $this->defaultValue = $defaultValue;

        $this->id = $this->generateId('checkbox');
        $this->value = $value;
        $this->hasError = $this->checkError();

        $getValue = $this->getValue();

        $this->isChecked = ($getValue == $this->value);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox');
    }
}
