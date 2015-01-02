<?php
Route::controller('laraeditable', 'JansenFelipe\Laraeditable\Controllers\LaraeditableController');
View::composer('*', function($view){
    View::share('view_name', $view->getName());
});