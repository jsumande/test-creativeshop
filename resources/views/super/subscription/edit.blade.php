@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">@lang('app.edit') Subscription</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" id="createForm"  class="ajax-form" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Business Title</label>
                                    <select name="business" id="business" class="form-control form-control-lg">
                                        <option></option>
                                        @foreach($business as $businesses)
                                                <option 

                                                @if($businesses->id == $subscription->business_id) selected @endif 
                                                value="{{ $businesses->id }}">{{ $businesses->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Plan Name</label>
                                    <select name="plan" id="plan" class="form-control form-control-lg">
                                        <option></option>
                                        @foreach($plan as $plans)
                                                <option
                                                @if($plans->id == $subscription->plan_id) selected @endif
                                                value="{{ $plans->id }}">{{ $plans->plan_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" id="save-form" class="btn btn-success btn-light-round">
                                        <i class="fa fa-check"></i> @lang('app.save')</button>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


@push('footer-js')

    <script>
        // $('.dropify').dropify({
        //     messages: {
        //         default: '@lang("app.dragDrop")',
        //         replace: '@lang("app.dragDropReplace")',
        //         remove: '@lang("app.remove")',
        //         error: '@lang('app.largeFile')'
        //     }
        // });

        function createSlug(value) {
            value = value.replace(/\s\s+/g, ' ');
            let slug = value.split(' ').join('-').toLowerCase();
            slug = slug.replace(/--+/g, '-');
            $('#slug').val(slug);
        }

        $('#business').keyup(function(e) {
            createSlug($(this).val());
        });

        $('#plan').keyup(function(e) {
            createSlug($(this).val());
        });


        $('#save-form').click(function () {

            $.easyAjax({
                url: '{{route('super.subscription.update', $subscription->id)}}',
                container: '#createForm',
                type: "POST",
                redirect: true,
                file:true,
                data: $('#createForm').serialize()
            })
        });

    </script>

@endpush

