<x-admin>
    @push('css')
        <!-- Custom styles for this page -->
        <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">List of Users</h1>

        <!-- DataTales Example -->
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                {{-- <h6 class="font-weight-bold text-primary m-0">List of Users</h6> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create At</th>
                                <th>Update At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create At</th>
                                <th>Update At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

    </div>
    @push('javascript')
        <!-- Page level plugins -->
        <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->

        <script defer>
            $(function() {
                var table = $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('user.index') }}",
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email',
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },

                    ],
                });
            });
            // $(document).ready(function() {
            //     console.log("{{ route('user.index') }}")
            //     let table = $('#datatable').DataTable({
            //         serverSide: true,
            //         responsive: true,
            //         ajax: "{{ route('user.index') }}",
            //         columns: [{
            //                 data: 'row_count',
            //                 name: 'row_count'
            //             },
            //             {
            //                 data: 'name',
            //                 name: 'name'
            //             },
            //             {
            //                 data: 'email',
            //                 name: 'email'
            //             },
            //             {
            //                 data: 'created_at',
            //                 name: 'created_at'
            //             },
            //             {
            //                 data: 'updated_at',
            //                 name: 'updated_at'
            //             },
            //         ],
            //     });
            // });
        </script>
    @endpush
</x-admin>
