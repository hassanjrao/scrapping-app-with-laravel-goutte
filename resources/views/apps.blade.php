@extends('layouts.app')

@section('page_title', 'Home')

@section('css_after')

    <style>
        .we-lockup__copy {}

        .we-lockup__subtitle {

            margin-top: -22px !important;

        }

        .we-artwork__image {
            width: 200px !important;
            height: 200px !important;
            border-radius: 20px !important;
        }

    </style>


@endsection

@section('content')


    <div class="content content-boxed">
        <div class="row">

            @foreach ($apps as $app)


                <div class="col-sm-3">

                    <a class="block block-rounded block-link-pop ">
                        <div class="block-content text-center">
                            {!! $app !!}

                        </div>
                    </a>
                </div>
            @endforeach


        </div>


    </div>

    <br><br>



@endsection
