@extends('layouts.app')

@section('page_title', 'Home')

@section('css_after')

    <style>
        .we-lockup__copy {}

        .we-lockup__subtitle {

            margin-top: -22px !important;

        }

        .we-artwork__image {
            width: 160px !important;
            height: 160px !important;
            border-radius: 20px !important;
        }


        .games{
            display: flex;
            flex-wrap:nowrap;
            overflow-x: auto
        }


    </style>


@endsection

@section('content')


    <div class="content content-boxed">


        <div class="row ">

            @foreach ($developers as $developer)

                @php

                    $url = 'https://apps.apple.com/us/developer/' . $developer->developer_name . '/' . $developer->developer_id;

                    $apps = [];
                    $client = new Goutte\Client();
                    $crawler = $client->request('GET', $url);

                    $apps = $crawler
                        ->filter('main > div.animation-wrapper > section > div.l-row--peek')
                        ->children()
                        ->each(function ($node, $i) {
                            $href = $node->attr('href');
                            $node_html = $node->html();

                            return '<a href="' . $href . '">' . $node_html . '</a>';
                        });

                @endphp

                <div class="row">

                    <div class="col-lg-12">
                        <h1>{{ $developer->developer_name }}</h1>
                    </div>

                </div>

                <div class="games">

                    @foreach ($apps as $app)


                        <div>

                                <div class="block-content text-center">
                                    {!! $app !!}

                                </div>

                        </div>
                    @endforeach

                </div>
            @endforeach


        </div>
    </div>



    <!-- Story -->

    <!-- END Story -->






@endsection
