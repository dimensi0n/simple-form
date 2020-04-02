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

    public function testFormStart()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Email Address')
		   ->addInput('password', 'password', 'Password')
           ->addSubmit('Submit');

        $this->assertEquals('<form action="" method="POST">', $form->formStart());
    }

    public function testFormEnd()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Email Address')
		   ->addInput('password', 'password', 'Password')
           ->addSubmit('Submit');

        $this->assertEquals('</form>', $form->formEnd());
    }

    public function testFormInput()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Email Address')
		   ->addInput('password', 'password', 'Password')
           ->addSubmit('Submit');

        $this->assertEquals('<label for="password">Password</label><input type="password" name="password" class="form-control" id="password"/>', $form->formInput('password'));
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

    public function testEmptyValue()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Email Address')
		   ->addInput('password', 'password', 'Password')
           ->addSubmit('Submit');

        $POST = array();
        $POST['email'] = '';
        $POST['password'] = ' mysuperpas\swor\d ';
        
        $values = $form->getValues($POST);
        $this->assertEquals(['email'], $values['empty']);
        $this->assertEquals('mysuperpassword', $values['password']);
    }

    public function testEmptyValues()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Email Address')
		   ->addInput('password', 'password', 'Password')
           ->addSubmit('Submit');

        $POST = array();
        $POST['email'] = '';
        $POST['password'] = '';
        
        $values = $form->getValues($POST);
        $this->assertEquals(['email', 'password'], $values['empty']);
    }
}