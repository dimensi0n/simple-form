<?php
namespace SimpleForm;


/**
 * Class FormElement
 * @author Erwan ROUSSEL
 */
class FormElement {
    protected $name;
    protected $type;
    protected $label;
    protected $class = [];
    protected $id;

    /**
     * @param string $name
     * @param string $type
     * @param string $label
     * @param array $class
     * @param string $id
     * 
     * @return void
     */
    public function __construct(string $name, string $type = 'text', string $label = '',  array $class = [], string $id = '')
    {
        $this->name = $name;
        $this->type = $type;
        if ($label === '') {
            $this->label = $name;
        } else {
            $this->label = $label;
        }
        $this->class = $class;
        if ($id === '') {
            $this->id = $name;
        } else {
            $this->id = $id;
        }
    }
}

interface FormElementInterface
{
    public function renderHTML() : string;
}