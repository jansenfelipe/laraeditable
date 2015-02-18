## Laraeditable L5

![Demonstration](https://github.com/jansenfelipe/laraeditable/raw/master/demo.gif "Demonstration")

#### How to use

1) Add require in `composer.json`:

    "jansenfelipe/laraeditable": "2.0.*@dev"

2) Add service provider in `config/app.php`:
    
    'providers' => [
        ..
        'JansenFelipe\Laraeditable\LaraeditableServiceProvider'
    ]

3) Publish assets:

    php artisan vendor:publish

4) Add CSS and JS

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="/vendor/jansenfelipe-laraeditable/laraeditable.js"></script>

    <link href="/vendor/jansenfelipe-laraeditable/laraeditable.css" type="text/css" media="screen" rel="stylesheet">

5) Find the element you want to edit in your view.blade. Add an identifier, the name of the view and the class `laraeditable`:

    //index.blade.php
    <div id="foo" view="index" class="laraeditable">Some content</div>

    //foo.blade.php
    <div id="foo" view="foo" class="laraeditable">Some content</div>

  
