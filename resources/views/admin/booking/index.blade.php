@extends('layouts.master')

@push('head-css')
    <style>
        #myTable td{
            padding: 0;
        }

        .status{
            font-size: 80%;
        }

        .booking-selected{
            border: 3px solid var(--main-color);
        }

        .payments a {
            border: 2px solid;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-light">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <select name="" id="filter-status" class="form-control">
                                    <option value="">@lang('app.filter') @lang('app.status'): @lang('app.viewAll')</option>
                                    <option @if($status == 'completed') selected @endif value="completed">@lang('app.completed')</option>
                                    <option @if($status == 'pending') selected @endif value="pending">@lang('app.pending')</option>
                                    <option @if($status == 'in progress') selected @endif value="in progress">@lang('app.in progress')</option>
                                    <option @if($status == 'canceled') selected @endif value="canceled">@lang('app.canceled')</option>
                                </select>
                            </div>
                        </div>
                        @if($user->is_admin)
                        <div class="col-md">
                            <div class="form-group">
                                <select name="" id="filter-customer" class="form-control select2">
                                    <option value="">@lang('modules.booking.selectCustomer'): @lang('app.viewAll')</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ ucwords($customer->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <select name="" id="filter-location" class="form-control select2">
                                    <option value="">@lang('modules.booking.selectLocation'): @lang('app.viewAll')</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ ucwords($location->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="filter_date" id="filter-date" placeholder="@lang('app.booking') @lang('app.date')">
                            </div>
                        </div>
                        @endif
                        <div class="col-md">
                            <div class="form-group">
                                <button type="button" id="reset-filter" class="btn btn-danger"><i class="fa fa-times"></i> @lang('app.reset')</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <form role="form" id="createForm"  class="ajax-form" method="POST">
                        @csrf

                        <div class="row">
                            @if($user->is_admin)
                                <div class="col-md-6">
                                    <div class="row align-items-center">
                                        <div class="col-md mb-3 text-bold">
                                            <span id="selected-booking-count">0</span> @lang('app.booking') @lang('app.selected')
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <select name="change_status" class="form-control">

                                                        <option value="">@lang('modules.booking.selectStatus')</option>
                                                        <option value="completed">@lang('app.completed')</option>
                                                        <option value="pending">@lang('app.pending')</option>
                                                        <option value="in progress">@lang('app.in progress')</option>
                                                        <option value="canceled">@lang('app.canceled')</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md mb-3">
                                            <input type="hidden" name="pending" id="pending" value="{{ $pending }}">
                                            <input type="hidden" name="is_progress" id="is_progress" value="{{ $is_progress }}">
                                            <input type="hidden" name="booking_limit" id="booking_limit" value="{{ $booking_limit->bookings_limit }}">
                                            
                                            <button type="button" id="change-status" disabled class="btn btn-primary">@lang('modules.booking.changeStatus')</button>

                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="row">
                            <div class="col-md-12 alert alert-primary"><i class="fa fa-info-circle"></i> @lang('modules.booking.selectNote')</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">


                                    <table id="myTable" class="table table-borderless w-100">
                                        <thead class="hide">
                                        <tr>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                    </table>

                                </div>

                            </div>

                            <div class="col-md-6 pl-md-5" id="booking-detail">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">You've reach the limit</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <h5 class="font-weight-bold" style="color:#cc0000">* You have reached the maximum number of allowed bookings according to your current subscription, kindly <a id="upgrade" href="/account/settings#plan-settings">upgrade</a> your subscription to allow more bookings.</h5>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
  </div>


@endsection

@push('footer-js')
    @if($credentials->stripe_status == 'active' && !$user->is_admin)
    <script src="https://checkout.stripe.com/checkout.js"></script>
    @endif

    <script>
        $(document).ready(function() {

            $('.select2').select2();

            $('.datepicker').datetimepicker({
                format: 'YYYY-MM-DD',
                allowInputToggle: true,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            }).on("dp.change", function (e) {
                table._fnDraw();
            });

            function updateBooking(currEle) {
                let url = '{{route('admin.bookings.update', ':id')}}';
                url = url.replace(':id', currEle.data('booking-id'));

                $.easyAjax({
                    url: url,
                    container: '#update-form',
                    type: "POST",
                    data: $('#update-form').serialize(),
                    success: function (response) {
                        if (response.status == "success") {
                            $('#booking-detail').hide().html(response.view).fadeIn('slow');
                            table._fnDraw();
                        }
                    }
                })
            }

            $('body').on('click', '#update-booking', function () {
                let cartItems = $("input[name='cart_prices[]']").length;

                if(cartItems === 0){
                    swal('@lang("modules.booking.addItemsToCart")');
                    $('#cart-item-error').html('@lang("modules.booking.addItemsToCart")');
                    return false;
                }
                else {
                    $('#cart-item-error').html('');
                    var updateButtonEl = $(this);
                    console.log($('.fa.fa-money').parent().text().indexOf('cash'))
                    if ($('#booking-status').val() == 'completed' && $('#payment-status').val() == 'pending' && $('.fa.fa-money').parent().text().indexOf('cash') !== -1) {
                        swal({
                            text: '@lang("modules.booking.changePaymentStatus")',
                            closeOnClickOutside: false,
                            buttons: [
                                'NO', 'YES'
                            ]
                        }).then(function (isConfirmed) {
                            if (isConfirmed) {
                                $('#payment-status').val('completed');
                            }
                            updateBooking(updateButtonEl);
                        });
                    }
                    else {
                        updateBooking(updateButtonEl);
                    }
                }

            });

            var table = $('#myTable').dataTable({
                responsive: true,
                // processing: true,
                "searching": false,
                serverSide: true,
                "ordering": false,
                ajax: {'url' : '{!! route('admin.bookings.index') !!}',
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                            "filter_status": $('#filter-status').val(),
                            "filter_customer": $('#filter-customer').val(),
                            "filter_location": $('#filter-location').val(),
                            "filter_date": $('#filter-date').val(),
                        } );
                    }
                },
                language: {
                    "url": "<?php echo __("app.datatable") ?>"
                },
                "fnDrawCallback": function( oSettings ) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                columns: [
                    { data: 'id', name: 'id' }
                ]
            });
            new $.fn.dataTable.FixedHeader( table );

            $('#change-status').click(function () {

                // console.log($('#pending').val());
                // console.log($('#is_progress').val());
                $('#booking_limit').val()

                var limit = parseInt($('#booking_limit').val());

                if($('#pending').val() >= limit || $('#is_progress').val() >= limit && limit != "Unlimited"){
                    $('#myModal').modal('show');
                    console.log("Reached Limit");
                }
                else{
                    console.log("Not yet");
                    $.easyAjax({
                        url: '{{route('admin.bookings.multiStatusUpdate')}}',
                        container: '#createForm',
                        type: "POST",
                        data: $('#createForm').serialize(),
                        success: function(response){
                            table._fnDraw();
                            $('#change-status').attr('disabled', true);
                            location.reload();
                        }
                    })
                }
            });

            $('#upgrade').click(function (){
                @php
                    session(['upgrade' => 'upgradePlan']);
                @endphp
                console.log("sample");
            });

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
                            var url = "{{ route('admin.bookings.destroy',':id') }}";
                            url = url.replace(':id', id);

                            var token = "{{ csrf_token() }}";

                            $.easyAjax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, '_method': 'DELETE'},
                                success: function (response) {
                                    if (response.status == "success") {
                                        $.unblockUI();
                                        table._fnDraw();
                                        $('#booking-detail').html('');
                                    }
                                }
                            });
                        }
                    });
            });

            $('body').on('click', '.cancel-row', function(){
                var id = $(this).data('row-id');
                swal({
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    title: "@lang('errors.areYouSure')",
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var url = "{{ route('admin.bookings.requestCancel',':id') }}";
                            url = url.replace(':id', id);

                            var token = "{{ csrf_token() }}";

                            $.easyAjax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, '_method': 'POST'},
                                success: function (response) {
                                    if (response.status == "success") {
                                        $.unblockUI();
                                        table._fnDraw();
                                        $('#booking-detail').html('');
                                    }
                                }
                            });
                        }
                    });
            });

            $('#myTable').on('click', '.view-booking-detail', function () {
                let bookingId = $(this).data('booking-id');
                let url = '{{ route('admin.bookings.show', ':id') }}';
                url = url.replace(':id', bookingId);

                $.easyAjax({
                    type: 'GET',
                    url: url,
                    success: function (response) {
                        if (response.status == "success") {
                            $('html, body').animate({
                                scrollTop: $("#booking-detail").offset().top-50
                            }, 2000);
                            $('#booking-detail').hide().html(response.view).fadeIn('slow');
                        }
                    }
                });
            });

            $('body').on('click', '.edit-booking', function () {
                let bookingId = $(this).data('booking-id');
                let url = '{{ route('admin.bookings.edit', ':id') }}';
                url = url.replace(':id', bookingId);

                $.easyAjax({
                    type: 'GET',
                    url: url,
                    success: function (response) {
                        if (response.status == "success") {
                            $('#booking-detail').hide().html(response.view).fadeIn('slow');
                        }
                    }
                });
            });

            $('#filter-status, #filter-customer, #filter-location').change(function () {
                table._fnDraw();
            });

            $('#reset-filter').click(function () {
                $('#filter-status, #filter-date').val('');
                $("#filter-customer").val('').trigger('change');
                $("#filter-location").val('').trigger('change');
                table._fnDraw();
            })

            $('body').on('click', '.send-reminder', function () {
                let bookingId = $(this).data('booking-id');

                $.easyAjax({
                    type: 'POST',
                    url: '{{ route("admin.bookings.sendReminder") }}',
                    data: {bookingId: bookingId, _token: '{{ csrf_token() }}'}
                });
            });

        });
    </script>
    @if($user->is_admin)
    <script>
        $('#myTable').on('click', '.booking-div', function(){
            let checkbox = $(this).closest('.row').find('.booking-checkboxes');
            if(checkbox.is(":checked")){
                checkbox.removeAttr('checked');
                $(this).closest('.row').removeClass('booking-selected');
            }
            else{
                checkbox.attr('checked', true);
                $(this).closest('.row').addClass('booking-selected');
            }

            $('#selected-booking-count').html($('[name="booking_checkboxes[]"]:checked').length)
            if($('[name="booking_checkboxes[]"]:checked').length > 0){
                $('#change-status').removeAttr('disabled');
            }
            else{
                $('#change-status').attr('disabled', true);
            }
        })
    </script>
    @endif

@endpush
