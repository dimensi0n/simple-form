<?php
namespace SimpleForm;

require './Input.php';
require './SubmitButton.php';

/**
 * Provides a form generator and a data validator
 * @author Erwan ROUSSEL
 */
class Form 
{
    /**
     * Name of the form
     * 
     * @var string
     */
    private $name;

    /**
     * Method of the form (POST, GET, PUT)
     * 
     * @var string
     */
    private $method;

    /**
     * Action of the form
     * 
     * @var string
     */
    private $action;

    /**
     * Added inputs to the form
     * 
     * @var array
     */
    private $inputs = [];

    /**
     * Added submit button to the form
     * 
     * @var SubmitButton
     */
    private $submit;

    /**
     * Initialize the form
     * 
     * @param string $name
     * @param string $method
     * @param string $action
     * 
     * @return void
     */
    public function __construct(string $name, string $method = 'POST', string $action = '')
    {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
    }

    /**
     * Add an input to the form
     * 
     * @param string $name
     * @param string $type
     * @param string $label
     * @param array $class
     * @param string $id
     * 
     * @return void
     */
    public function addInput(string $name, string $type = 'text', string $label = '',  array $class = ['form-control'], string $id = '') : Form
    {
        $this->inputs[] = new Input($name, $type, $label, $class, $id);
        return $this;
    }

    /**
     * Add a submit button to the form
     * 
     * @param string $name
     * @param string $type
     * @param string $label
     * @param array  $class
     * @param string $id
     * 
     * @return void
     */
    public function addSubmit(string $name, string $type = 'text', string $label = '',  array $class = ['btn btn-primary'], string $id = '') : Form
    {
        $this->submit = new SubmitButton($name, $type, $label, $class, $id);
        return $this;
    }

    /**
     * Render the form into HTML 
     * 
     * @return void
     */
    public function renderHTML() : string {
        $html = '<form action="'.$this->action.'" method="'.$this->method.'">';
        foreach ($this->inputs as $input) {
            $html .= $input->renderHTML();
        }
        $html .= $this->submit->renderHTML();
        $html .= '</form>';
        return $html;
    }

    /**
     * Get values of the form
     * 
     * @param array $post
     * 
     * @return void
     */
    public function getValues(array $post) : array
    {
        $values = array();
        foreach ($this->inputs as $input) {
            $name = $input->getName();
            $values[$name] = stripslashes(trim(htmlspecialchars($post[$name])));
        }

        return $values;
    }
}