<?php

namespace JansenFelipe\Laraeditable\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Wa72\HtmlPageDom\HtmlPageCrawler;

class LaraeditableController extends Controller {

    public function postIndex() {

        //Load view paths
        $paths = Config::get('view.paths');

        //Load file view
        $file = $paths[0] . DIRECTORY_SEPARATOR . Input::get('view') . '.blade.php';
        $html = file_get_contents($file);

        //Init crawler and edit node
        $crawler = new HtmlPageCrawler($html);
        $crawler->filter("#" + Input::get('id'))->setInnerHtml(Input::get('html'));

        //write file
        file_put_contents($file, $crawler->saveHTML());
    }

}
