<?php
namespace SimpleForm;

require __DIR__.'/FormElement.php';

/**
 * Class SubmitButton
 * @author Erwan ROUSSEL
 */
class SubmitButton extends FormElement implements FormElementInterface
{
    /**
     * @return void
     */
    public function renderHTML() : string
    {
        return '<button type="submit" class="'.join(' ',$this->class).'" id="'.$this->id.'">'.$this->name.'</button>';
    }
}