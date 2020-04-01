# simple-form
Provides a simple form generator and a data validator

## How to use it ?

```php
$form = new Form('Login');
        $form->addInput('email', 'email', 'Email address') // name, type, label
		   ->addInput('password', 'password', 'Mot de passe') // name, type, label
           ->addSubmit('Submit'); // content

echo $form->renderHTML;
```

It will render this :

```html
<form action="" method="POST">
    <label for="email">Email Address</label>
    <input type="email" name="email" class="form-control" id="email"/>
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password"/>
    <button type="submit" class="btn btn-primary" id="Submit">Submit</button>
</form>
```

In order to validate the form and get its value you just have to write this :

```php
$values = $form->getValues($_POST);

echo 'Email : '.$values['email'];
echo 'Password : '.$values['password'];
```