<?php
use PHPUnit\Framework\TestCase;
use SimpleForm\SubmitButton;

class SubmitButtonTest extends TestCase
{
    public function testRenderHTML()
    {
        $button = new SubmitButton('Submit', 'submit', '', ['btn', 'btn-primary'], 'submit');
        $this->assertEquals('<button type="submit" class="btn btn-primary" id="submit">Submit</button>', $button->renderHTML());
    }
}