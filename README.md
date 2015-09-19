## Laraeditable

![Demonstration](https://github.com/jansenfelipe/laraeditable/raw/master/demo.gif "Demonstration")

#### How to use

1) Add library:

```sh
$ composer require jansenfelipe/laraeditable
```

2) Add service provider in `config/app.php`:
    
```php
// file START ommited
    'providers' => [
        // other providers ommited
        \Laraerp\Providers\LaraerpServiceProvider::class,
    ],
// file END ommited

3) Publish assets:

```shell
$ php artisan vendor:publish
```

4) Add CSS and JS

```html
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="/vendor/jansenfelipe-laraeditable/laraeditable.js"></script>

<link href="/vendor/jansenfelipe-laraeditable/laraeditable.css" type="text/css" media="screen" rel="stylesheet">
```

5) Find the element you want to edit in your view.blade. Add an identifier, the name of the view and the class `laraeditable`:

Ex: index.blade.php

```html
<div id="foo" view="index" class="laraeditable">Some content</div>
```
Ex: foo.blade.php

```html
<div id="foo" view="foo" class="laraeditable">Some content</div>
```
