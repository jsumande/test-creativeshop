@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center justify-content-md-end mb-3">
                        <a href="{{ route('super.plan.create') }}" class="btn btn-rounded btn-primary mb-1"><i class="fa fa-plus"></i> @lang('app.createNew')</a>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Monthly Fee</th>
                                    <th>Annual Fee</th>
                                    <th>Services Limit</th>
                                    <th>Bookings Limit</th>
                                    <th>@lang('app.action')</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('footer-js')
    <script>
        $(document).ready(function() {
            var table = $('#myTable').dataTable({
                responsive: true,
                // processing: true,
                serverSide: true,
                ajax: '{!! route('super.plan.index') !!}',
                language: {
                    "url": "<?php echo __("app.datatable") ?>"
                },
                "fnDrawCallback": function( oSettings ) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                columns: [
                	{ data: 'DT_RowIndex'},
                    { data: 'name', name: 'name' },
                    { data: 'monthly', name: 'monthly' },
                    { data: 'annual', name: 'annual' },
                    { data: 'services_limit', name: 'services_limit' },
                    { data: 'bookings_limit', name: 'bookings_limit' },
                    { data: 'action', name: 'action', width: '20%' }
                ]
            });
            new $.fn.dataTable.FixedHeader( table );

            $('body').on('click', '.delete-row', function(){
                var id = $(this).data('row-id');
                swal({
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    title: "@lang('errors.areYouSure')",
                    text: "@lang('errors.deleteWarning')",
                })
                    .then((willDelete) => {
                        if (willDelete) {
                             var url = "{{ route('super.plan.destroy',':id') }}";
                             url = url.replace(':id', id);

                             var token = token = "{{ csrf_token() }}";
                             
                             $.easyAjax({
                                 type: 'POST',
                                 url: url,
                                 data: {'_token': token, '_method': 'DELETE'},
                                 success: function (response) {
                                    if (response.status == "success") {
                                         $.unblockUI();
                                    swal("Deleted!", response.message, "success");
                                       table._fnDraw();
                                    }
                                 }
                             });
                        }
                    });
            });
        } );
    </script>
@endpush