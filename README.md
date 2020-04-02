# simple-form

![PHP Composer](https://github.com/dimensi0n/simple-form/workflows/PHP%20Composer/badge.svg)

Provides a simple form generator and a data validator

## How to use it ?

Install it :

```
composer require dimensi0n/simple-form
```

This :

```php
$form = new \SimpleForm\Form('Login');
        $form->addInput('email', 'email', 'Email address') // name, type, label
		   ->addInput('password', 'password', 'Mot de passe') // name, type, label
           ->addSubmit('Submit'); // content

echo $form->renderHTML;
```

Will render this :

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
$values = $form->getValues($_POST); // check if all fields are filled, also applies trim(), stripslashes() and htmlspecialchars()

if (isset($values['empty'])) {
    foreach($values['empty'] as $empty_value) {
        echo $empty_value.' is empty'; // 'Name of the empty field' is empty
    }
} else {
    echo 'Email : '.$values['email'];
    echo 'Password : '.$values['password'];
}
```

## Custom Rendering

Example with bootstrap :

```php
$form = new \SimpleForm\Form('Login');
        $form->addInput('email', 'email', 'Email address') // name, type, label
		   ->addInput('password', 'password', 'Mot de passe') // name, type, label
           ->addSubmit('Submit'); // content

<div class="container">
    <?= $form.formStart() ?>
    <div class="form-group">
        <?= $form.formInput('email') ?> // Will render label and input
    </div>
    <div class="form-group">
        <?= $form.formInput('password') ?> // Will render label and input
    </div>
    <?= $form.formEnd() ?>
</div>
```


For further information check the API docs : [https://dimensi0n.github.com/simple-form/api](https://dimensi0n.github.com/simple-form/api)
