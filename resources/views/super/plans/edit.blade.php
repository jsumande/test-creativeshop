@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">@lang('app.edit') Plan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" id="createForm"  class="ajax-form" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $plan->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Plan Name</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ $plan->name }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('app.description')</label>
                                    <textarea name="description" cols="30" id="description" 
                                    class="form-control-lg form-control" rows="5">
                                        {{ $plan->description }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Monthly Price</label>
                                    <input type="number" name="monthly" id="monthly" class="form-control form-control-lg" value="{{ $plan->monthly }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Annual Price</label>
                                    <input type="number" name="annual" id="annual" class="form-control form-control-lg" value="{{ $plan->annual }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Services Limit</label>
                                    <input type="text" name="services" id="services" class="form-control form-control-lg" value="{{ $plan->services_limit }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bookings Limit</label>
                                    <input type="text" name="bookings" id="bookings" class="form-control form-control-lg" value="{{ $plan->bookings_limit }}">
                                </div>
                            </div>

                            <div class="col-md-12">
        
                                <div class="form-group">
                                    <button type="button" id="save-form" class="btn btn-success btn-light-round"><i
                                                class="fa fa-check"></i> @lang('app.save')</button>
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
        $('.dropify').dropify({
            messages: {
                default: '@lang("app.dragDrop")',
                replace: '@lang("app.dragDropReplace")',
                remove: '@lang("app.remove")',
                error: '@lang('app.largeFile')'
            }
        });

        function createSlug(value) {
            value = value.replace(/\s\s+/g, ' ');
            let slug = value.split(' ').join('-').toLowerCase();
            slug = slug.replace(/--+/g, '-');
            $('#slug').val(slug);
        }

        $('#name').keyup(function(e) {
            createSlug($(this).val());
        });

        $('#description').keyup(function(e) {
            createSlug($(this).val());
        });

        $('#monthly').keyup(function(e) {
            createSlug($(this).val());
        });

        $('#annual').keyup(function(e) {
            createSlug($(this).val());
        });

        $('#services').keyup(function(e) {
            createSlug($(this).val());
        });

        $('#bookings').keyup(function(e) {
            createSlug($(this).val());
        });

        $('#save-form').click(function () {

            $.easyAjax({
                url: '{{route('super.plan.update', $plan->id)}}',
                container: '#createForm',
                type: "POST",
                redirect: true,
                file:true,
                data: $('#createForm').serialize()
            })
        });
    </script>

@endpush

