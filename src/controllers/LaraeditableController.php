<?php

namespace JansenFelipe\Laraeditable\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Symfony\Component\DomCrawler\Crawler;

class LaraeditableController extends Controller {

    public function postIndex() {
        $paths = Config::get('view.paths');
        $view = $paths[0]  . DIRECTORY_SEPARATOR . Input::get('view'). '.blade.php';
        
        $crawler = new Crawler(file_get_contents($view));

        
        var_dump($crawler->filter(Input::get('element'))->html()); die;
    }

}
