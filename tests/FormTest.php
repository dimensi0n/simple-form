<?php
use PHPUnit\Framework\TestCase;
use SimpleForm\Form;

class FormTest extends TestCase
{
    public function testRenderHTML()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Email Address')
		   ->addInput('password', 'password', 'Password')
           ->addSubmit('Submit');
           
        $this->assertEquals('<form action="" method="POST"><label for="email">Email Address</label><input type="email" name="email" class="form-control" id="email"/><label for="password">Password</label><input type="password" name="password" class="form-control" id="password"/><button type="submit" class="btn btn-primary" id="Submit">Submit</button></form>', $form->renderHTML());
    }
    public function testGetValue()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Email Address')
		   ->addInput('password', 'password', 'Password')
           ->addSubmit('Submit');

        $POST = array();
        $POST['email'] = '  erwan.roussel@openincubator.tech ';
        $POST['password'] = ' mysuperpas\swor\d ';
        
        $values = $form->getValues($POST);
        $this->assertEquals('erwan.roussel@openincubator.tech', $values['email']);
        $this->assertEquals('mysuperpassword', $values['password']);
    }
}