<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Goutte\Client;

class AppsController extends Controller
{

    public function show($id)
    {

        $developer = Developer::findorfail($id);

        $url = 'https://apps.apple.com/us/developer/' . $developer->developer_name . '/' . $developer->developer_id;

        $apps = [];
        $client = new Client();
        $crawler = $client->request('GET', $url);

        //print_r($crawler->filter('main > div.animation-wrapper > section > div.l-row--peek > a')->attr('class'));





        $apps = $crawler->filter('main > div.animation-wrapper > section > div.l-row--peek')->children()->each(function ($node, $i) {
            $href = $node->attr('href');
            $node_html = $node->html();

            return '<a href="' . $href . '">' . $node_html . '</a>';

            //print $node->attr('href')."\n";
            //print $node->filter('picture > img')->attr('src');
            //print $node->filter('div.we-clamp')->text();
            //print $node->text()."\n";
        });
        return view('apps', compact('apps'));
    }
}
