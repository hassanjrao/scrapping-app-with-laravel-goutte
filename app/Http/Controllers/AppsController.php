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



        $apps = $crawler->filter('main > div.animation-wrapper > section > div.l-row--peek')->children()->each(function ($node, $i) {
            $href = $node->attr('href');
            $node_html = $node->html();

            return '<a href="' . $href . '">' . $node_html . '</a>';

          
        });
        return view('apps', compact('apps'));
    }
}
