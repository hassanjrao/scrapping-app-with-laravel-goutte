@extends("layouts.admin-backend")
@section('content')


    <!-- Page Content -->
    <div class="content content-boxed">

        <a href="{{ route('admin.developers.index') }}" class="btn btn-primary push">Back to all</a>


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">developer</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.developers.update', $developer->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-5">

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="label">Developer Name</label>
                                    <input required type="text" class="form-control" id="label" name="developer_name"
                                        value="{{ $developer->developer_name }}">
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="label">Developer Id</label>
                                    <input required type="text" class="form-control" id="label" name="developer_id"
                                        value="{{ $developer->developer_id }}">
                                </div>
                            </div>


                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->


@endsection
