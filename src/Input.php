<?php
namespace SimpleForm;

require_once __DIR__.'/FormElement.php';

/**
 * Class Input
 * @author Erwan ROUSSEl
 */
class Input extends FormElement implements FormElementInterface
{
    /**
     * @return void
     */
    public function renderHTML() : string 
    {
        return '<label for="'.$this->id.'">'.$this->label.'</label><input type="'.$this->type.'" name="'.$this->name.'" class="'.join(' ',$this->class).'" id="'.$this->id.'"/>';
    }

    /**
     * @return void
     */
    public function getName() : string
    {
        return $this->name;
    }
}