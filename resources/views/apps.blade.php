@extends('layouts.app')

@section('page_title', 'Home')

@section('content')


    <div class="content content-boxed">
        <div class="row justify-content-center">


            @foreach ($apps as $app)


                <div class="col-sm-3">

                    <a class="block block-rounded block-link-pop overflow-hidden">
                        <div class="block-content text-center p-5">
                            {!! $app !!}

                        </div>
                    </a>
                </div>
            @endforeach




        </div>

    </div>




@endsection
