<?php
use PHPUnit\Framework\TestCase;
use SimpleForm\Form;

class FormTest extends TestCase
{
    public function testRenderHTML()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Addresse Mail')
		   ->addInput('password', 'password', 'Mot de passe')
           ->addSubmit('Envoyer');
           
        $this->assertEquals('<form action="" method="POST"><label for="email">Addresse Mail</label><input type="email" name="email" class="form-control" id="email"/><label for="password">Mot de passe</label><input type="password" name="password" class="form-control" id="password"/><button type="submit" class="btn btn-primary" id="Envoyer">Envoyer</button></form>', $form->renderHTML());
    }
    public function testGetValue()
    {
        $form = new Form('Login');
        $form->addInput('email', 'email', 'Addresse Mail')
		   ->addInput('password', 'password', 'Mot de passe')
           ->addSubmit('Envoyer');

        $POST = array();
        $POST['email'] = '  erwan.roussel@openincubator.tech ';
        $POST['password'] = ' mysuperpas\swor\d ';
        
        $values = $form->getValues($POST);
        $this->assertEquals('erwan.roussel@openincubator.tech', $values['email']);
        $this->assertEquals('mysuperpassword', $values['password']);
    }
}