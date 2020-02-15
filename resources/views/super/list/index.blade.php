@extends('layouts.master')

@push('head-css')
    <style>
        .link-stats{
            cursor: pointer;
        }

        #account_name{
        	color: green;
        	font-size: 15px;
        }
    </style>
@endpush

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="card-header">
                        <h3 class="card-title">Payment List</h3>
                    </div><br>
                    <div class="table-responsive">
                        <table id="myTable" class="table w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Business Name</th>
                                    <th>Plan Name</th>
                                    <th>Admin Email</th>
                                    <th>Last Payment</th>
                                    <th>Next Payment</th>
                                    <th>Recuring Payment</th>
                                    <th>Payment Status</th>
                                    {{-- <th>@lang('app.action')</th> --}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->

@endsection



@push('footer-js')
    <script>
        $(document).ready(function() {
            var table = $('#myTable').dataTable({
                responsive: true,
                // processing: true,
                serverSide: true,
                ajax: '{!! route('super.list.index') !!}',
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
                    { data: 'plan', name: 'plan' },
                    { data: 'email', name: 'email' },
                    { data: 'last_payment', name: 'last_payment' },
                    { data: 'next_payment', name: 'next_payment' },
                    { data: 'recuring_payment', name: 'recuring_payment' },
                    { data: 'payment_status', name: 'payment_status', width: '20%' }
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
                             
                             @php
                             //     var url = "{{ route('super.plan.destroy',':id') }}";
                                // url = url.replace(':id', id);

                                // var token = token = "{{ csrf_token() }}";
                             @endphp
                             // $.easyAjax({
                             //     type: 'POST',
                             //     url: url,
                             //     data: {'_token': token, '_method': 'DELETE'},
                             //     success: function (response) {
                             //        if (response.status == "success") {
                             //             $.unblockUI();
                             //        swal("Deleted!", response.message, "success");
                             //           table._fnDraw();
                             //        }
                             //     }
                             // });
                        }
                    });
            });
        } );
    </script>
@endpush