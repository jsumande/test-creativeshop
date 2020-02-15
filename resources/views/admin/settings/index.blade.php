@extends('layouts.master')

@push('head-css')
    <style>
        .dropify-wrapper, .dropify-preview, .dropify-render img {
            background-color: var(--sidebar-bg) !important;
        }

        #carousel-image-gallery .card .img-holder {
            height: 150px;
            overflow: hidden;
        }

        #carousel-image-gallery .card .img-holder img {
            height: 100%;
            object-fit: cover;
            object-position: top;
        }

        .note-group-select-from-files {
            display: none;
        }
    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-12 col-md-2 mb-4 mt-3 mb-md-0 mt-md-0">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                 aria-orientation="vertical">
                <a class="nav-link active" href="#general" data-toggle="tab">@lang('menu.general')</a>
                <a class="nav-link" href="#times" data-toggle="tab">@lang('menu.bookingTimes')</a>
                <a class="nav-link" href="#tax" data-toggle="tab">@lang('app.tax') @lang('menu.settings')</a>
                <a class="nav-link" href="#currency" data-toggle="tab">@lang('app.currency') @lang('menu.settings')</a>
                {{-- <a class="nav-link" href="#language" data-toggle="tab">@lang('app.language') @lang('menu.settings')</a> --}}
                {{-- <a class="nav-link" href="#email" data-toggle="tab">@lang('app.email') @lang('menu.settings')</a> --}}
                <a class="nav-link" href="#admin-theme" data-toggle="tab">@lang('menu.adminThemeSettings')</a>
                <a class="nav-link" href="#front-theme" data-toggle="tab">@lang('menu.frontThemeSettings')</a>
                <a class="nav-link" href="#front-pages" data-toggle="tab">@lang('menu.pages')</a>
                {{-- <a class="nav-link" href="#payment-card" data-toggle="tab">Payment Card</a> --}}
                <a class="nav-link" href="#plan-settings" data-toggle="tab">Plan Settings</a>
                <a class="nav-link" href="#payment-history" data-toggle="tab">Payment History</a>
                {{-- <a class="nav-link" href="#payment"
                   data-toggle="tab">@lang('app.paymentCredential') @lang('menu.settings')</a> --}}
                {{-- <a class="nav-link" href="#sms-settings"
                   data-toggle="tab">@lang('app.smsCredentials') @lang('menu.settings')</a> --}}
                {{-- <a class="nav-link" href="#update" data-toggle="tab">
                    @lang('menu.updateApp')
                    @if($newUpdate == 1)
                        <span class="badge badge-success">{{ $lastVersion }}</span>
                    @endif

                </a> --}}
            </div>
        </div>
        <div class="col-12 col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="active tab-pane" id="general">

                                    <form class="form-horizontal ajax-form" id="general-form" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">@lang('app.company') @lang('app.name')</label>

                                                    <input type="text" class="form-control  form-control-lg"
                                                           id="company_name" name="company_name"
                                                           value="{{ $settings->company_name }}">
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">@lang('app.company') @lang('app.email')</label>

                                                    <input type="text" class="form-control  form-control-lg"
                                                           id="company_email" name="company_email"
                                                           value="{{ $settings->company_email }}">
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">@lang('app.company') @lang('app.phone')</label>

                                                    <input type="text" class="form-control  form-control-lg"
                                                           id="company_phone" name="company_phone"
                                                           value="{{ $settings->company_phone }}">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">@lang('app.logo')</label>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <input type="file" id="input-file-now" name="logo"
                                                                   accept=".png,.jpg,.jpeg" class="dropify"
                                                                   data-default-file="{{ $settings->logo_url }}"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">@lang('app.address')</label>
                                                    <textarea class="form-control form-control-lg" name="address" id=""
                                                              cols="30" rows="5">{!! $settings->address !!}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">@lang('app.company') @lang('app.website')</label>

                                                    <input type="text" class="form-control form-control-lg" id="website"
                                                           name="website" value="{{ $settings->website }}">
                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">@lang('app.timezone')</label>

                                                    <select name="timezone" id="timezone"
                                                            class="form-control  form-control-lg select2">
                                                        @foreach($timezones as $tz)
                                                            <option @if($settings->timezone == $tz) selected @endif>{{
                                                                $tz }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">@lang('app.currency')</label>

                                                    <select name="currency_id" id="currency_id"
                                                            class="form-control  form-control-lg">
                                                        @foreach($currencies as $currency)
                                                            <option
                                                                @if($currency->id == $settings->currency_id) selected
                                                                @endif
                                                                value="{{ $currency->id }}">{{ $currency->currency_symbol.' ('.$currency->currency_code.')' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">@lang('app.language')</label>

                                                    <select name="locale" id="locale"
                                                            class="form-control form-control-lg">
                                                        <option @if($settings->locale == "en") selected
                                                                @endif value="en">English
                                                        </option>
                                                        @foreach($enabledLanguages as $language)
                                                            <option value="{{ $language->language_code }}"
                                                                    @if($settings->locale == $language->language_code) selected @endif >
                                                                {{ $language->language_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button id="save-general" type="button" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane table-responsive" id="times">
                                    <table class="table table-condensed">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>@lang('app.day')</th>
                                            <th>@lang('modules.settings.openTime')</th>
                                            <th>@lang('modules.settings.closeTime')</th>
                                            <th>@lang('modules.settings.allowBooking')?</th>
                                            <th>@lang('app.action')</th>
                                        </tr>
                                        @foreach($bookingTimes as $key=>$bookingTime)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>@lang('app.'.$bookingTime->day)</td>
                                                <td>{{ $bookingTime->start_time }}</td>
                                                <td>{{ $bookingTime->end_time }}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" class="time-status"
                                                               data-row-id="{{ $bookingTime->id }}"
                                                               @if($bookingTime->status == 'enabled') checked @endif
                                                        >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <a href="javascript:;" data-row-id="{{ $bookingTime->id }}"
                                                       class="btn btn-primary btn-rounded btn-sm edit-row"><i
                                                            class="icon-pencil"></i> @lang('app.edit')</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="tax">
                                    <form class="form-horizontal ajax-form" id="tax-form" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">@lang('app.tax') @lang('app.name')</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="tax_name" name="tax_name"
                                                           value="{{ $tax->tax_name }}" readonly="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="percent"
                                                           class="control-label">@lang('app.percent')</label>

                                                    <input type="number" min="0" step="0.01" value="{{ $tax->percent }}"
                                                           class="form-control form-control-lg" id="percent"
                                                           name="percent" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="percent"
                                                           class="control-label">@lang('app.status')</label>

                                                    <select name="status" id="status"
                                                            class="form-control form-control-lg">
                                                        <option
                                                            @if($tax->status == 'active') selected @endif
                                                        value="active">@lang('app.active')</option>
                                                        <option
                                                            @if($tax->status == 'deactive') selected @endif
                                                        value="deactive">@lang('app.deactive')</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button id="save-tax" type="button" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>

                                            </div>

                                        </div>

                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="currency">
                                    <h4>@lang('app.add') @lang('app.currency')</h4>
                                    <form class="form-horizontal ajax-form" id="currency-form" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        class="control-label">@lang('app.currency') @lang('app.name')</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="currency_name" name="currency_name">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">@lang('app.currencySymbol')</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="currency_symbol" name="currency_symbol">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">@lang('app.currencyCode')</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="currency_code" name="currency_code">
                                                </div>

                                                <div class="form-group">
                                                    <button id="save-currency" type="button" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>
                                            </div>

                                        </div>


                                    </form>

                                    <h4 class="mt-4">@lang('app.currency')</h4>
                                    <div class="row">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>@lang('app.currency') @lang('app.name')</th>
                                                    <th>@lang('app.currencySymbol')</th>
                                                    <th>@lang('app.currencyCode')</th>
                                                    <th><i class="fa fa-gear"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($currencies as $key=>$currency)
                                                    <tr id="currency-{{ $currency->id }}">
                                                        <td>{{ ($key+1) }}</td>
                                                        <td>{{ ucwords($currency->currency_name) }}</td>
                                                        <td>{{ $currency->currency_symbol }}</td>
                                                        <td>{{ $currency->currency_code }}</td>
                                                        <td>
                                                            <button data-row-id="{{ $currency->id }}"
                                                                    class="btn btn-sm btn-primary  edit-currency"
                                                                    type="button"><i
                                                                    class="fa fa-edit"></i> @lang('app.edit')</button>
                                                            <button data-row-id="{{ $currency->id }}"
                                                                    class="btn btn-sm btn-danger  delete-currency"
                                                                    type="button"><i
                                                                    class="fa fa-times"></i> @lang('app.delete')
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="language">
                                    @include('admin.language.index')
                                </div>

                                {{-- <div class="tab-pane" id="payment-card">
                                    <form class="form-horizontal ajax-form" id="card-form" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Account Name</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="account_name" name="account_name"
                                                           value="{{ $payment_card->account_name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Address</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="address" name="address"
                                                           value="{{ $payment_card->address }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Country</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="country" name="country"
                                                           value="{{ $payment_card->country }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Card Number</label>

                                                    <input type="number" class="form-control form-control-lg"
                                                           id="card_number" name="card_number"
                                                           value="{{ $payment_card->card_number }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">CVV</label>

                                                    <input type="number" class="form-control form-control-lg"
                                                           id="cvv" name="cvv"
                                                           value="{{ $payment_card->cvv }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Exp. Date</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="exp" name="exp"
                                                           value="{{ $payment_card->exp }}">
                                                </div>

                                                <div class="form-group">
                                                    <button id="save-card" type="button" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>

                                            </div>

                                        </div>

                                    </form>
                                </div> --}}

                                <div class="tab-pane" id="plan-settings">
                                    <form class="form-horizontal ajax-form" id="plan-form" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tax_name" class="control-label">Plan Name</label>

                                                    <select name="plan_name" id="plan_name" class="form-control form-control-lg">
                                                        @foreach($plan_list as $list)
                                                            <option 
                                                            @if($plan->plan_name == $list->plan_name) selected
                                                            @endif
                                                            value="{{ $list->id }}">{{ $list->plan_name }}</option>
                                                        @endforeach

                                                        
                                                        {{-- @foreach($planx as $x)
                                                        <option 
                                                            value="{{ $x->id }}">{{ $x->plan_name }}</option>
                                                        @endforeach --}}
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Payment Recurring</label>

                                                    <input type="hidden" class="form-control form-control-lg"
                                                           id="recuring" name="recuring" readonly 
                                                           value="{{ $plan->recuring_payment }}">


                                                    <select name="payment" id="payment" class="form-control form-control-lg">
                                                            <option 
                                                            @if($plan->recuring_payment == 'Monthly') selected @endif 
                                                            value="Monthly">Monthly</option>
                                                            <option 
                                                            @if($plan->recuring_payment == 'Annual') selected @endif 
                                                            value="Annual">Annual</option>
                                                    </select>

                                                </div>
                                            </div>

                                            {{-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Description</label>

                                                    <textarea class="form-control form-control-lg" name="address" id=""
                                                    readonly cols="30" rows="5">{{ $plan->description }}</textarea>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tax_name" 
                                                           class="control-label">Last Payment:</label>

                                                    <input type="text" class="form-control form-control-lg" readonly value="{{
                                                            date('M-d-Y', strtotime($plan->last_payment)) }}">

                                                    <input type="hidden" id="last_payment" name="last_payment"
                                                    value="{{ $plan->last_payment }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Next Payment:</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                        readonly value="{{
                                                            date('M-d-Y', strtotime($plan->next_payment)) }}">

                                                    <input type="hidden" id="next_payment" name="next_payment"
                                                    value="{{ $plan->next_payment }}"
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Amount</label>

                                                    <input type="hidden" id="plan_id" name="plan_id"
                                                    value="{{ $plan->plan_id }}">

                                                    <input type="hidden" id="business_id" name="business_id"
                                                    value="{{ $plan->business_id }}">

                                                    <input type="hidden" id="subscription_id" name="subscription_id"
                                                    value="{{ $plan->subscription_id }}">

                                                    <input type="hidden" id="monthly" name="monthly"
                                                    value="{{ $plan->monthly }}">

                                                    <input type="hidden" id="annual" name="annual"
                                                    value="{{ $plan->annual }}">

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="amount_check" name="amount_check"
                                                           @if($plan->recuring_payment == 'Monthly')
                                                           value="{{ $plan->monthly }}"
                                                           @else
                                                           value="{{ $plan->annual }}"
                                                           @endif readonly
                                                           >
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Services Limit</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="services_limit" name="services_limit"
                                                           value="{{ $plan->services_limit }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tax_name"
                                                           class="control-label">Booking Limit</label>

                                                    <input type="text" class="form-control form-control-lg"
                                                           id="bookings_limit" name="bookings_limit"
                                                           value="{{ $plan->bookings_limit }}" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    @if(Session::get('upgrade') == 'upgradePlan')
                                                        <button id="save-plan" type="button" class="btn btn-success"><i class="fa fa-check"></i> Upgrade Plan</button>
                                                    @else
                                                        <button id="save-plan" type="button" class="btn btn-success"><i class="fa fa-check"></i> Change Plan</button>
                                                    @endif
                                                    
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>

                                <div class="tab-pane" id="payment-history">
                                    <table class="table table-condensed">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Payment</th>
                                            <th>Plan Name</th>
                                            <th>Transaction ID</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Card no.</th>
                                        </tr>
                                        @foreach($payment_table as $key=>$payment)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $payment->last_payment }}</td>
                                                <td>
                                                    @foreach($plan_list as $list)
                                                   
                                                        @if($payment->plan_id == $list->id) 
                                                            {{ $list->plan_name }}
                                                        @endif
                                                           
                                                    @endforeach
                                                </td>
                                                <td>{{ $payment->transaction_id }}</td>
                                                <td>{{ number_format((float)$payment->amount, 2, '.', '') }} </td>
                                                <td>{{ $payment->currency }}</td>
                                                <td>
                                                    XXXX{{ $payment->card_last_number }}
                                                    {{-- @php
                                                        echo substr($payment->card_number,12)
                                                    @endphp --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <!-- /.tab-pane -->

                                {{-- <div class="tab-pane" id="email">
                                    <h4>@lang('app.email') @lang('menu.settings')</h4>
                                    <form class="form-horizontal ajax-form" id="email-form" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div id="alert">
                                            @if($smtpSetting->mail_driver =='smtp')
                                                @if($smtpSetting->verified)
                                                    <div
                                                        class="alert alert-success">{{__('messages.smtpSuccess')}}</div>
                                                @else
                                                    <div class="alert alert-danger">{{__('messages.smtpError')}}</div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>@lang("modules.emailSettings.mailDriver")</label>
                                                    <div class="form-group">
                                                        <label class="radio-inline"><input type="radio"
                                                                                           class="checkbox"
                                                                                           onchange="getDriverValue(this);"
                                                                                           value="mail"
                                                                                           @if($smtpSetting->mail_driver == 'mail') checked
                                                                                           @endif name="mail_driver"> Mail</label>
                                                        <label class="radio-inline pl-lg-2"><input type="radio"
                                                                                                   onchange="getDriverValue(this);"
                                                                                                   value="smtp"
                                                                                                   @if($smtpSetting->mail_driver == 'smtp') checked
                                                                                                   @endif name="mail_driver"> SMTP</label>


                                                    </div>
                                                </div>
                                                <div id="smtp_div">
                                                    <div class="form-group">
                                                        <label>@lang("modules.emailSettings.mailHost")</label>
                                                        <input type="text" name="mail_host" id="mail_host"
                                                               class="form-control form-control-lg"
                                                               value="{{ $smtpSetting->mail_host }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>@lang("modules.emailSettings.mailPort")</label>
                                                        <input type="text" name="mail_port" id="mail_port"
                                                               class="form-control form-control-lg"
                                                               value="{{ $smtpSetting->mail_port }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>@lang("modules.emailSettings.mailUsername")</label>
                                                        <input type="text" name="mail_username" id="mail_username"
                                                               class="form-control form-control-lg"
                                                               value="{{ $smtpSetting->mail_username }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="control-label">@lang("modules.emailSettings.mailPassword")</label>
                                                        <input type="password" name="mail_password"
                                                               id="mail_password"
                                                               class="form-control form-control-lg"
                                                               value="{{ $smtpSetting->mail_password }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="control-label">@lang("modules.emailSettings.mailEncryption")</label>
                                                        <select class="form-control form-control-lg"
                                                                name="mail_encryption"
                                                                id="mail_encryption">
                                                            <option
                                                                @if($smtpSetting->mail_encryption == 'none') selected @endif>
                                                                none
                                                            </option>
                                                            <option
                                                                @if($smtpSetting->mail_encryption == 'tls') selected @endif>
                                                                tls
                                                            </option>
                                                            <option
                                                                @if($smtpSetting->mail_encryption == 'ssl') selected @endif>
                                                                ssl
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="control-label">@lang("modules.emailSettings.mailFrom")</label>
                                                    <input type="text" name="mail_from_name" id="mail_from_name"
                                                           class="form-control form-control-lg"
                                                           value="{{ $smtpSetting->mail_from_name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        class="control-label">@lang("modules.emailSettings.mailFromEmail")</label>
                                                    <input type="text" name="mail_from_email" id="mail_from_email"
                                                           class="form-control form-control-lg"
                                                           value="{{ $smtpSetting->mail_from_email }}">
                                                </div>


                                                <div class="form-group">
                                                    <button id="save-email" type="button" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>


                                            </div>

                                            <!--/span-->
                                        </div>

                                    </form>
                                </div> --}}
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="admin-theme">
                                    <h4>@lang('menu.adminThemeSettings')</h4>
                                    <section class="mt-3 mb-3">
                                        <form class="form-horizontal ajax-form" id="theme-form" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <h6 class="col-md-12">@lang('modules.theme.subheadings.colorPallette')</h6>
                                                <div class="col-md-2 ">
                                                    <div class="form-group">
                                                        <label>@lang('modules.theme.primaryColor')</label>
                                                        <input type="text" class="form-control color-picker"
                                                               name="primary_color"
                                                               value="{{ $themeSetting->primary_color }}">
                                                        <div
                                                            style="background-color: {{ $themeSetting->primary_color }}"
                                                            class=" border border-light">&nbsp;
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-2 ">
                                                    <div class="form-group">
                                                        <label>@lang('modules.theme.secondaryColor')</label>
                                                        <input type="text" class="form-control color-picker"
                                                               name="secondary_color"
                                                               value="{{ $themeSetting->secondary_color }}">
                                                        <div
                                                            style="background-color: {{ $themeSetting->secondary_color }}"
                                                            class=" border border-light">&nbsp;
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-3 ">
                                                    <div class="form-group">
                                                        <label>@lang('modules.theme.sidebarBgColor')</label>
                                                        <input type="text" class="form-control color-picker"
                                                               name="sidebar_bg_color"
                                                               value="{{ $themeSetting->sidebar_bg_color }}">
                                                        <div
                                                            style="background-color: {{ $themeSetting->sidebar_bg_color }}"
                                                            class=" border border-light">&nbsp;
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-2 ">
                                                    <div class="form-group">
                                                        <label>@lang('modules.theme.sidebarTextColor')</label>
                                                        <input type="text" class="form-control color-picker"
                                                               name="sidebar_text_color"
                                                               value="{{ $themeSetting->sidebar_text_color }}">
                                                        <div
                                                            style="background-color: {{ $themeSetting->sidebar_text_color }}"
                                                            class="border border-light">&nbsp;
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-2 ">
                                                    <div class="form-group">
                                                        <label>@lang('modules.theme.topbarTextColor')</label>
                                                        <input type="text" class="form-control color-picker"
                                                               name="topbar_text_color"
                                                               value="{{ $themeSetting->topbar_text_color }}">
                                                        <div
                                                            style="background-color: {{ $themeSetting->topbar_text_color }}"
                                                            class="border border-light">&nbsp;
                                                        </div>
                                                    </div>

                                                </div>


                                                <!--/span-->
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button id="save-theme" type="button" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="front-theme">
                                    <h4>@lang('menu.frontThemeSettings')</h4>
                                    <section class="mt-3 mb-3">
                                        <form class="form-horizontal ajax-form" id="front-theme-form" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <h6 class="col-md-12">@lang('modules.theme.subheadings.colorPallette')</h6>
                                                <div class="col-md-2 ">
                                                    <div class="form-group">
                                                        <label>@lang('modules.theme.primaryColor')</label>
                                                        <input type="text" class="form-control color-picker"
                                                               name="primary_color"
                                                               value="{{ $frontThemeSetting->primary_color }}">
                                                        <div
                                                            style="background-color: {{ $frontThemeSetting->primary_color }}"
                                                            class=" border border-light">&nbsp;
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-2 ">
                                                    <div class="form-group">
                                                        <label>@lang('modules.theme.secondaryColor')</label>
                                                        <input type="text" class="form-control color-picker"
                                                               name="secondary_color"
                                                               value="{{ $frontThemeSetting->secondary_color }}">
                                                        <div
                                                            style="background-color: {{ $frontThemeSetting->secondary_color }}"
                                                            class=" border border-light">&nbsp;
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="col-md-12">@lang('app.logo')</h6>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{--<label for="exampleInputPassword1">@lang('app.logo')</label>--}}
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <input type="file" id="front-input-file-now"
                                                                           name="front_logo"
                                                                           accept=".png,.jpg,.jpeg" class="dropify"
                                                                           data-default-file="{{ $frontThemeSetting->logo_url }}"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button id="save-front-theme" type="button" class="btn btn-success">
                                                        <i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <section class="mt-3 mb-3">
                                        <h6>@lang('modules.theme.subheadings.carouselImages')</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form id="theme-carousel-form">
                                                    @csrf
                                                    <div class="form-group">
                                                        {{--<label for="carousel-images">@lang('app.logo')</label>--}}
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <input type="file" id="carousel-images" name="images[]"
                                                                       accept=".png,.jpg,.jpeg" class="dropify"
                                                                       {{--@if($images->count() > 0) data-default-file="{{ asset('user-uploads/carousel-images/'.$images->first()->file_name) }}" @endif--}}
                                                                       data-allowed-formats="landscape"
                                                                       multiple
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <h6 class="text-danger">@lang('modules.theme.recommendedResolutionNote')</h6>
                                        <div id="carousel-image-gallery" class="row">
                                            @include('partials.carousel_images')
                                        </div>
                                    </section>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="front-pages">
                                    @include('admin.page.index')
                                </div>
                                <!-- /.tab-pane -->

                                {{-- <div class="tab-pane" id="payment">
                                    <h4>@lang('app.paymentCredential') @lang('menu.settings')</h4>
                                    <br>
                                    <form class="form-horizontal ajax-form" id="payment-form" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <h5 class="text-primary">@lang('app.offlinePaymentMethod')</h5>
                                                <div class="form-group">
                                                    <label
                                                        class="control-label">@lang("modules.paymentCredential.allowOfflinePayment")</label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" name=""
                                                               @if($credentialSetting->offline_payment == 1) checked
                                                               @endif  class="offline-payment">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                                <hr>
                                                <br>
                                                <h5 class="text-info">@lang('app.paypalCredential') </h5>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        @lang("modules.paymentCredential.paypalCredentialStatus")
                                                    </label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" name="paypal_status" id="paypal_status"
                                                                @if($credentialSetting->paypal_status == 'active')
                                                                    checked
                                                                @endif  value='active' onchange="toggle('#paypal-credentials');">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                                <div id="paypal-credentials">
                                                    <div class="form-group">
                                                        <label>@lang("modules.paymentCredential.paypalClientID")</label>
                                                        <input type="text" name="paypal_client_id" id="paypal_client_id"
                                                               class="form-control form-control-lg"
                                                               value="{{ $credentialSetting->paypal_client_id }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>@lang("modules.paymentCredential.paypalSecret")</label>
                                                        <input type="password" name="paypal_secret" id="paypal_secret"
                                                               class="form-control form-control-lg"
                                                               value="{{ $credentialSetting->paypal_secret }}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <br>
                                                <h5 class="text-warning">@lang('app.stripeCredential') </h5>

                                                <div class="form-group">
                                                    <label class="control-label">
                                                        @lang("modules.paymentCredential.stripeCredentialStatus")
                                                    </label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" name="stripe_status" id="stripe_status"
                                                                @if($credentialSetting->stripe_status == 'active')
                                                                    checked
                                                                @endif value="active" onchange="toggle('#stripe-credentials');">
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <input type="hidden" name="offline_payment"
                                                            @if($credentialSetting->offline_payment == 1) value="1"
                                                            @else value="0" @endif id="offlinePayment">

                                                </div>

                                                <div id="stripe-credentials">
                                                    <div class="form-group">
                                                        <label>@lang("modules.paymentCredential.stripelClientID")</label>
                                                        <input type="text" name="stripe_client_id" id="stripe_client_id"
                                                                class="form-control form-control-lg"
                                                                value="{{ $credentialSetting->stripe_client_id }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>@lang("modules.paymentCredential.stripeSecret")</label>
                                                        <input type="password" name="stripe_secret" id="stripe_secret"
                                                                class="form-control form-control-lg"
                                                                value="{{ $credentialSetting->stripe_secret }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button id="save-payment" type="button" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>
                                            </div>

                                            <!--/span-->
                                        </div>

                                    </form>
                                </div> --}}
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->

                                {{-- <div class="tab-pane" id="sms-settings">
                                    <h4>@lang('app.smsCredentials') @lang('menu.settings')</h4>
                                    <br>
                                    <form class="form-horizontal ajax-form" id="sms-setting-form" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <h5 class="text-info">@lang('app.nexmoCredential') </h5>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                            @lang("modules.nexmoCredential.status")
                                                    </label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" name="nexmo_status" id="nexmo_status"
                                                                @if($smsSetting->nexmo_status == 'active')
                                                                    checked
                                                                @endif value="active" onchange="toggle('#nexmo-credentials');">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                                <div id="nexmo-credentials">
                                                    <div class="form-group">
                                                        <label>@lang("modules.nexmoCredential.key")</label>
                                                        <input type="text" name="nexmo_key" id="nexmo_key"
                                                               class="form-control form-control-lg"
                                                               value="{{ $smsSetting->nexmo_key }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>@lang("modules.nexmoCredential.secret")</label>
                                                        <input type="password" name="nexmo_secret" id="nexmo_secret"
                                                               class="form-control form-control-lg"
                                                               value="{{ $smsSetting->nexmo_secret }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>@lang("modules.nexmoCredential.from")</label>
                                                        <input type="text" name="nexmo_from" id="nexmo_from"
                                                               class="form-control form-control-lg"
                                                               value="{{ $smsSetting->nexmo_from }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button id="save-sms-settings" type="button" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')</button>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </form>
                                </div> --}}
                                <!-- /.tab-pane -->

                                {{-- <div class="tab-pane" id="update">
                                    <h4>@lang('menu.updateApp')</h4>
                                    @include('vendor.froiden-envato.update.update_blade')


                                    <hr>
                                @include('vendor.froiden-envato.update.changelog')
                                <!--/row-->
                                </div> --}}
                                <!-- /.tab-pane -->
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>

    </div>
@endsection

@push('footer-js')
    <script src="{{ asset('/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $(function () {
            $('#paypal_status').is(':checked') ? $('#paypal-credentials').show() : $('#paypal-credentials').hide();
            $('#stripe_status').is(':checked') ? $('#stripe-credentials').show() : $('#stripe-credentials').hide();
            $('#nexmo_status').is(':checked') ? $('#nexmo-credentials').show() : $('#nexmo-credentials').hide();

            $('#v-pills-tab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
                $("html, body").scrollTop(0);
            });

            // store the currently selected tab in the hash value
            $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
                var id = $(e.target).attr("href").substr(1);
                window.location.hash = id;
            });

            // on load of the page: switch to the currently selected tab
            var hash = window.location.hash;
            $('#v-pills-tab a[href="' + hash + '"]').tab('show');
        });

        // var str = $('#card_number').val();
        // $("#card_number").html(str.substring(12, 16));
        // console.log(str.substring(12, 16));

        $('.edit-row').click(function () {
            var id = $(this).data('row-id');
            var url = '{{ route('admin.booking-times.edit', ':id')}}';
            url = url.replace(':id', id);

            $('#modelHeading').html('@lang('app.edit') @lang('menu.bookingTimes')');
            $.ajaxModal('#application-modal', url);
        });

        $('.dropify').dropify({
            messages: {
                default: '@lang("app.dragDrop")',
                replace: '@lang("app.dragDropReplace")',
                remove: '@lang("app.remove")',
                error: '@lang('app.largeFile')'
            }
        });

        $('.color-picker').colorpicker({
            format: 'hex'
        });

        $('.time-status').change(function () {
            var id = $(this).data('row-id');
            var url = "{{route('admin.booking-times.update', ':id')}}";
            url = url.replace(':id', id);

            if ($(this).is(':checked')) {
                var status = 'enabled';
            } else {
                var status = 'disabled';
            }

            $.easyAjax({
                url: url,
                type: "POST",
                data: {'_method': 'PUT', '_token': "{{ csrf_token() }}", 'status': status}
            })
        });

        $('.offline-payment').change(function () {

            if ($(this).is(':checked')) {
                $('#offlinePayment').val(1);
            } else {
                $('#offlinePayment').val(0);
            }
        });

        function toggle(elementBox) {
            var elBox = $(elementBox);
            elBox.slideToggle();
        }

        $('#save-general').click(function () {
            $.easyAjax({
                url: '{{route('admin.settings.update', $settings->id)}}',
                container: '#general-form',
                type: "POST",
                file: true,
                data: $('#general-form').serialize()
            })
        });

        $('#save-tax').click(function () {
            $.easyAjax({
                url: '{{route('admin.tax-settings.update', $tax->id)}}',
                container: '#tax-form',
                type: "POST",
                data: $('#tax-form').serialize()
            })
        });


        // $('#save-card').click(function () {
        //     $.easyAjax({
        //         url: '',
        @php
            // {{route('admin.payment-card.update', $payment_card->id)}}
        @endphp
        //         container: '#card-form',
        //         type: "POST",
        //         data: $('#card-form').serialize()
        //     })
        // });

        $('#plan_name').change(function () {

            // $('#amount_check').val('1000');
            // $('#services_limit').val('1001');
            // $('#bookings_limit').val('1002');

            var id = $('#plan_name').val();
            var url = '{{route('admin.fetch.edit', ':id')}}';
            url = url.replace(':id', id);
            console.log(url);
            $.ajax({
                url: url,
                type : 'GET',
                dataType: 'JSON',
                success: function(response){
                    console.log($('#payment').val());

                    if($('#payment').val() == 'Monthly')
                        $('#amount_check').val(response['monthly']);
                    else
                        $('#amount_check').val(response['annual']);

                    $('#services_limit').val(response['services_limit']);
                    $('#bookings_limit').val(response['bookings_limit']);
                },
                error: function(){
                    console.log('empty');
                }
            });



        });

        $('#settings').click(function (){
            @php
                Session::forget('upgrade');
            @endphp
        });

        $('#save-plan').click(function () {
            $.easyAjax({
                url: '{{route('admin.subscription.update', $subscription_id->id)}}',
                container: '#plan-form',
                type: "POST",
                data: $('#plan-form').serialize()
            })
        });



        $('#save-currency').click(function () {
            $.easyAjax({
                url: '{{route('admin.subscription.store')}}',
                container: '#currency-form',
                type: "POST",
                data: $('#currency-form').serialize()
            })
        });


        $('#save-payment').click(function () {
            $.easyAjax({
                url: '{{route('admin.credential.update', $credentialSetting->id)}}',
                container: '#payment-form',
                type: "POST",
                data: $('#payment-form').serialize()
            })
        });

        // $('#save-sms-settings').click(function () {
        //     $.easyAjax({
        //         url :
        //         container: '#sms-setting-form',
        //         type: "POST",
        //         data: $('#sms-setting-form').serialize()
        //     })
                @php
                    //url: '{{route('admin.sms-settings.update', $smsSetting->id)}}',
                @endphp

        // });

        $('#save-theme').click(function () {
            $.easyAjax({
                url: '{{route('admin.theme-settings.update', $themeSetting->id)}}',
                container: '#theme-form',
                type: "POST",
                data: $('#theme-form').serialize()
            })
        });

        $('#save-front-theme').click(function () {
            $.easyAjax({
                url: '{{route('admin.front-theme-settings.update', $frontThemeSetting->id)}}',
                container: '#front-theme-form',
                type: "POST",
                file: true,
                data: $('#front-theme-form').serialize()
            })
        });

        $('#carousel-images').change(function (e) {
            $.easyAjax({
                url: '{{route('admin.front-theme-settings.store')}}',
                container: '#theme-carousel-form',
                type: "POST",
                file: true,
                success: function (response) {
                    $('#carousel-image-gallery').html(response.view);
                }
            });
        });

        $('body').on('click', '.delete-carousel-row', function () {
            var id = $(this).attr('id');
            swal({
                icon: "warning",
                buttons: true,
                dangerMode: true,
                title: "@lang('errors.areYouSure')",
                text: "@lang('errors.deleteWarning')",
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var url = "{{ route('admin.front-theme-settings.destroy',':id') }}";
                        url = url.replace(':id', id);

                        var token = "{{ csrf_token() }}";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.unblockUI();
                                    $('#carousel-image-gallery').html(response.view);
                                }
                            }
                        });
                    }
                });
        });

        $('body').on('click', '.delete-currency', function () {
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
                        var url = "{{ route('admin.currency-settings.destroy',':id') }}";
                        url = url.replace(':id', id);

                        var token = "{{ csrf_token() }}";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.unblockUI();
                                    $('#currency-' + id).remove();
                                }
                            }
                        });
                    }
                });
        });


        $('.edit-currency').click(function () {
            var id = $(this).data('row-id');
            var url = '{{ route('admin.currency-settings.edit', ':id')}}';
            url = url.replace(':id', id);

            $('#modelHeading').html('@lang('app.edit') @lang('menu.currency')');
            $.ajaxModal('#application-modal', url);
        });

        /*$('#save-email').click(function () {

            $.easyAjax({
                url: 'route('admin.email-settings.update', $smtpSetting->id)',
                container: '#email-form',
                type: "POST",
                data: $('#email-form').serialize(),
                messagePosition: "inline",
                success: function (response) {
                    if (response.status == 'error') {
                        $('#alert').prepend('<div class="alert alert-danger">php $('#alert')</div>')
                    } else {
                        $('#alert').show();
                    }
                }
            })

            @php
                //$('#alert').prepend('<div class="alert alert-danger">{{__('messages.smtpError')}}</div>')
                //url: '{{route('admin.email-settings.update', $smtpSetting->id)}}',
            @endphp
        });*/

        // $('#send-test-email').click(function () {
        //     $('#testMailModal').modal('show')
        // });
        // $('#send-test-email-submit').click(function () {
        //     $.easyAjax({
        //         url: 'route('admin.email-settings.sendTestEmail')',
        //         type: "GET",
        //         messagePosition: "inline",
        //         container: "#testEmail",
        //         data: $('#testEmail').serialize()
        @php
            // url: '{{route('admin.email-settings.sendTestEmail')}}',
        @endphp
        //     })
        // });


        function getDriverValue(sel) {
            if (sel.value == 'mail') {
                $('#smtp_div').hide();
                $('#alert').hide();
            } else {
                $('#smtp_div').show();
                $('#alert').show();
            }
        }

        @if ($smtpSetting->mail_driver == 'mail')
        $('#smtp_div').hide();
        $('#alert').hide();
        @endif
    </script>
    <script>
        var table = langTable = '';
        $(document).ready(function() {
            // pages table
            table = $('#myTable').dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.pages.index') !!}',
                language: {
                    "url": "<?php echo __("app.datatable") ?>"
                },
                "fnDrawCallback": function( oSettings ) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                order: [[0, 'DESC']],
                columns: [
                    { data: 'DT_RowIndex'},
                    { data: 'title', name: 'title' },
                    { data: 'slug', name: 'slug' },
                    { data: 'action', name: 'action', width: '20%' }
                ]
            });
            new $.fn.dataTable.FixedHeader( table );

            $('body').on('click', '.edit-page', function () {
                var slug = $(this).data('slug');
                var url = '{{ route('admin.pages.edit', ':slug')}}';
                url = url.replace(':slug', slug);

                $('#modelHeading').html('@lang('app.edit') @lang('menu.page')');
                $.ajaxModal('#application-lg-modal', url);
            });

            $('body').on('click', '#create-page', function () {
                var url = '{{ route('admin.pages.create') }}';

                $('#modelHeading').html('@lang('app.createNew') @lang('menu.page')');
                $.ajaxModal('#application-lg-modal', url);
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
                            var url = "{{ route('admin.pages.destroy',':id') }}";
                            url = url.replace(':id', id);

                            var token = "{{ csrf_token() }}";

                            $.easyAjax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, '_method': 'DELETE'},
                                success: function (response) {
                                    if (response.status == "success") {
                                        $.unblockUI();
                                        // swal("Deleted!", response.message, "success");
                                        table._fnDraw();
                                    }
                                }
                            });
                        }
                    });
            });

            // language table
            langTable = $('#langTable').dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.language-settings.index') !!}',
                language: {
                    "url": "<?php echo __("app.datatable") ?>"
                },
                "fnDrawCallback": function( oSettings ) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                order: [[1, 'ASC']],
                columns: [
                    { data: 'DT_RowIndex'},
                    { data: 'name', name: 'name' },
                    { data: 'code', name: 'code' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', width: '20%' }
                ]
            });
            new $.fn.dataTable.FixedHeader( langTable );

            $('body').on('click', '.edit-language', function () {
                var id = $(this).data('row-id');
                var url = '{{ route('admin.language-settings.edit', ':id')}}';
                url = url.replace(':id', id);

                $('#modelHeading').html('@lang('app.edit') @lang('menu.language')');
                $.ajaxModal('#application-modal', url);
            });

            $('body').on('click', '#create-language', function () {
                var url = '{{ route('admin.language-settings.create') }}';

                $('#modelHeading').html('@lang('app.createNew') @lang('menu.language')');
                $.ajaxModal('#application-modal', url);
            });

            $('body').on('click', '.delete-language-row', function(){
                var id = $(this).data('row-id');
                const lang = {!! $languages !!}.filter(language => language.id == id);

                swal({
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    title: "@lang('errors.areYouSure')",
                    text: "@lang('errors.deleteWarning')",
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var url = "{{ route('admin.language-settings.destroy',':id') }}";
                        url = url.replace(':id', id);

                        var token = "{{ csrf_token() }}";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.unblockUI();
                                    // swal("Deleted!", response.message, "success");
                                    langTable._fnDraw();

                                    if (lang[0].status == 'enabled') {
                                        location.reload();
                                    }
                                }
                            }
                        });
                    }
                });
            });

            $('body').on('change', '.lang_status', function () {
                const id = $(this).data('lang-id');

                let url = '{{ route('admin.language-settings.changeStatus', ':id') }}'
                url = url.replace(':id', id);

                let status = '';
                if ($(this).is(':checked')) {
                    status = 'enabled';
                }
                else {
                    status = 'disabled';
                }

                $.easyAjax({
                    url: url,
                    type: 'POST',
                    container: '#langTable',
                    data: {
                        id: id,
                        status: status,
                        _method: 'PUT',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.status == 'success') {
                            location.reload();
                        }
                    }
                });
            });
        } );
    </script>
    @include('vendor.froiden-envato.update.update_script')

@endpush
