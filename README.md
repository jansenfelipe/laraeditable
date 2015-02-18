## Laraeditable L4.2


#### How to

1) Add require:

    "jansenfelipe/laraeditable": "1.0.*@dev"

2) Add service provider:

    'JansenFelipe\Laraeditable\LaraeditableServiceProvider'

3) Publish assets:

    php artisan asset:publish jansenfelipe/laraeditable

4) Add CSS and JS

		<link rel="stylesheet" href="packages/jansenfelipe/laraeditable/laraeditable.css" type="text/css" media="screen" />
		<script type="text/javascript" src="packages/jansenfelipe/laraeditable/laraeditable.js"></script>

5) Find the element you want to edit in your view.blade. Add an identifier, the name of the view and the class `laraeditable`:

    //index.blade.php
    <div id="foo" view="index" class="laraeditable">Some content</div>

    //foo.blade.php
    <div id="foo" view="foo" class="laraeditable">Some content</div>

  
