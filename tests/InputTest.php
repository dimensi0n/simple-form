<?php
use PHPUnit\Framework\TestCase;
use SimpleForm\Input;

class InputTest extends TestCase
{
    public function testRenderHTML()
    {
        $input = new Input('email', 'email', 'Email address', ['form-control']);
        $this->assertEquals('<label for="email">Email address</label><input type="email" name="email" class="form-control" id="email"/>', $input->renderHTML());
    }

    public function testGetName()
    {
        $input = new Input('message');
        $this->assertEquals('message', $input->getName());
    }
}