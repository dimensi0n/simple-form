<?php
use PHPUnit\Framework\TestCase;
use SimpleForm\SubmitButton;

class SubmitButtonTest extends TestCase
{
    public function testRenderHTML()
    {
        $button = new SubmitButton('Send', 'submit', '', ['btn', 'btn-primary'], 'send');
        $this->assertEquals('<button type="submit" class="btn btn-primary" id="send">Send</button>', $button->renderHTML());
    }
}