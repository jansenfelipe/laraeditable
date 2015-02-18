<?php

namespace JansenFelipe\Laraeditable\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Wa72\HtmlPageDom\HtmlPageCrawler;

class LaraeditableController extends Controller {

    public function postIndex() {

        //Load view laravel paths
        $paths = Config::get('view.paths');

        //Load file view
        $file = $paths[0] . DIRECTORY_SEPARATOR . Input::get('view') . '.blade.php';
        $html = file_get_contents($file);

        //Init crawler
        $crawler = new HtmlPageCrawler($html);

        //Set filter
        $filter = '#' . Input::get('id');

        //Edit node
        $crawler->filter($filter)->setInnerHtml(Input::get('html'));
        
        $newHTML = html_entity_decode($crawler->saveHTML());
        
        $newHTML = str_replace('%7B%7B', '{{', $newHTML);
        $newHTML = str_replace('%7D%7D', '}}', $newHTML);
        $newHTML = str_replace('%24', '$', $newHTML);
        $newHTML = str_replace('%20', ' ', $newHTML);
        $newHTML = str_replace('%7C', '|', $newHTML);
                
        //write file
        file_put_contents($file, $newHTML);
    }

}
