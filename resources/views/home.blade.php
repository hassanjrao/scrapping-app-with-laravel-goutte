@extends('layouts.app')

@section('page_title', 'Home')

@section('content')


    <div class="content content-boxed">
        <div class="row">



            <div class="col-lg-8">

                <div class="row ">

                    @foreach ($developers as $developer)

                        <div class="col-lg-4">

                            <a class="block block-rounded block-link-pop overflow-hidden"
                                href="{{ route('apps.show', [$developer->id, $developer->slug]) }}">
                                <div class="block-content text-center">
                                    <h4 class="mb-1">
                                        {{ $developer->developer_name }}
                                    </h4>
                                    <p class="fs-sm fw-medium mb-2">
                                        {{ $developer->developer_id }}
                                    </p>

                                </div>
                            </a>
                        </div>

                    @endforeach


                </div>
            </div>



            <!-- Story -->

            <!-- END Story -->


        </div>

    </div>




@endsection
