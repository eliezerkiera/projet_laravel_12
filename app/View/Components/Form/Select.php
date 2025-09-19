<?php

namespace App\View\Components\Form;

use App\Traits\HandleFormComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
     use HandleFormComponent;
    /**
     * Create a new component instance.
     */

     public string $name;
     public string $label;

     public bool $isWired;
     public bool $showErrors;

     public string | int  $defaultValue;
     public string | int | null  $value = '';

     public string $id;

         public string|null|array $inputNote;


    /**
     * default [$key1=>$value1, $key2=>$value2]
     *
     */
//     $options = [
//     [
//         'value' => 'Assistance',
//         'children' => [
//             'info' => "Demande d'information",
//             'support' => "Support technique",
//             'bug' => "Signaler un bug"
//         ]
//     ],
//     [
//         'value' => 'Autre',
//         'children' => [
//             'autre' => "Autre sujet",
//             'suggestion' => "Suggestion",
//             'feedback' => "Retour d'expérience"
//         ]
//     ]
// ];
     public array $options;

     public bool $hasError;

     public bool $withOptgroup;
     public string $placeholder;

         public function __construct(
        string $name,
        string $label = '',
        bool $isWired = false,
        bool $showErrors = true,
        array $options = [],
        string | int $defaultValue = '',
        string $placeholder = '',
         string|null|array $inputNote = null
    )
    {
        $this->name = $name;
        $this->label= $label;
        $this->isWired = $isWired;
        $this->showErrors = $showErrors;
        $this->options = $options;
        $this->defaultValue = $defaultValue;
        $this->placeholder = (empty($placeholder))? __('Please select'):$placeholder;
         $this->inputNote = $inputNote;





        $this->id = $this->generateId('select');

        $this->hasError = $this->checkError();
        $this->value = $this->getSelectValue();


        $this->withOptgroup = $this->checkWithOptgroup();



    }

    public function getSelectValue()
    {

        if(!$this->isWired)
        {

            return old($this->name, $this->defaultValue);
        }


    }

    public function checkWithOptgroup()
    {


        foreach($this->options as $key=>$value)
        {
            if(is_array($value))
            {
                return true;
            }
        }

        return false;
    }
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
