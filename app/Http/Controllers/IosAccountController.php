<?php

namespace App\Http\Controllers;

use App\Models\Ios_account;
use Illuminate\Http\Request;
use Goutte\Client;

class IosAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iosAccounts = Ios_account::all();
        return view('ios_accounts.index', compact('iosAccounts'));
    }

    public function list()
    {
        $iosAccounts = Ios_account::all();
        return view('ios_accounts.list', compact('iosAccounts'));
    }

    public function apps($id)
    {
        $iosAccount = Ios_account::find($id);
        $url = 'https://apps.apple.com/us/developer/'.$iosAccount->username.'/'.$iosAccount->userid."#see-all/i-phonei-pad-apps";

        $apps = [];
        $client = new Client();
        $crawler = $client->request('GET', $url);
        //print_r($crawler->filter('main > div.animation-wrapper > section > div.l-row--peek > a')->attr('class'));
        $apps = $crawler->filter('main > div.animation-wrapper > section > div.l-row--peek')->children()->each(function($node, $i) {
            $href = $node->attr('href');
            $node_html = $node->html();

            return '<a href="'.$href.'">'.$node_html.'</a>';

            //print $node->attr('href')."\n";
            //print $node->filter('picture > img')->attr('src');
            //print $node->filter('div.we-clamp')->text();
            //print $node->text()."\n";
        });
        return view('ios_accounts.apps', compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ios_accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'userid' => 'required',
        ]);

        ios_account::create($request->all());

        return redirect()->route('ios_accounts.index')
                        ->with('success','IOS Account added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ios_account  $ios_account
     * @return \Illuminate\Http\Response
     */
    public function show(Ios_account $ios_account)
    {
        return view('ios_accounts.show', compact('ios_account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ios_account  $ios_account
     * @return \Illuminate\Http\Response
     */
    public function edit(Ios_account $ios_account)
    {
        return view('ios_accounts.edit', compact('ios_account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ios_account  $ios_account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ios_account $ios_account)
    {
        $request->validate([
            'username' => 'required',
            'userid' => 'required',
        ]);

        $ios_account->update($request->all());

        return redirect()->route('ios_accounts.index')
                        ->with('success','IOS Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ios_account  $ios_account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ios_account $ios_account)
    {
        $ios_account->delete();

        return redirect()->route('ios_accounts.index')
                        ->with('success','IOS Account deleted successfully');
    }
}
