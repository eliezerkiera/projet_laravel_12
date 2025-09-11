<?php

namespace App\Traits;

use Str;

trait HandleFormComponent
{
    public function getValue()
    {
        if(!$this->isWired)
        {
            return old($this->name, $this->defaultValue);
        }
    }


    public function generateId($type='')
    {
        $random=Str::random(4);
        return "form-input-".$type."-".$this->name."-".$random;
    }

    public function checkError()
    {
        $errors = session()->get('errors');

        if($errors)
        {
            if($errors->has($this->name))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
