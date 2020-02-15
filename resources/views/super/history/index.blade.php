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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">History</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            @forelse($payment_history as $history)
                                <tr>
                                    <td>
                                        <a class="text-uppercase" id="account_name">{{ ucwords($history->account_name)  }}</a><br>
                                        <i class="fa fa-address-card"></i> {{ $history->address }}<br>
                                        <i class="fa fa-globe"></i> {{ $history->country }}
                                    </td>
                                    
                                    <td class="text-muted">
                                        <i class="fa fa-credit-card"></i> {{ $history->card_number }}<br>
                                        <i class="fa fa-lock"></i> {{ $history->cvv }}<br>
                                        <i class="fa fa-calendar"></i> {{ $history->exp }}
                                    </td>
                                    <td>
                                        <i class="fa fa-briefcase"></i> {{ $history->title }}<br>
                                        <i class="fa fa-clipboard"></i> {{ $history->plan_name }}<br>
                                        <i class="fa fa-envelope"></i> {{ $history->email }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>@lang('messages.noRecordFound')</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.row -->

@endsection