<x-admin>
    @push('css')
        <!-- Custom styles for this page -->
        {{-- <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
    @endpush
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">List of Users</h1>

        <form action="{{ route('user.store') }}" id="store-user" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Mr Smart">
            </div>
            <div class="mb-3">
                <label for="email">Email address</label>
                <input class="form-control" id="email" name="email" type="email">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>
    @push('javascript')
        <!-- Page level plugins -->
        {{-- <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}

        <!-- Page level custom scripts -->

        <!-- Javascript Requirements -->
        {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> --}}

        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

        {!! JsValidator::formRequest('App\Http\Requests\StoreUserRequest', '#store-user') !!}
        <script defer></script>
    @endpush
</x-admin>
