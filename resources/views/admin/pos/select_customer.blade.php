<div class="modal-header">
    <h4 class="modal-title">@lang('modules.booking.customerDetails')</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <form id="createProjectCategory" class="ajax-form" method="POST" autocomplete="off">
        @csrf
        <div class="form-body">
            <div class="row">
                <div class="col-sm-12">

                    <div class="form-group">
                        <label>@lang('app.name')</label>

                        <input type="text" class="form-control form-control-lg" id="username" name="name">
                    </div>

                    <div class="form-group">
                        <label>@lang('app.mobile')</label>
                        <input type="text" class="form-control form-control-lg" name="mobile" >
                    </div>

                    <div class="form-group">
                        <label>@lang('app.email')</label>

                        <input type="text" class="form-control form-control-lg" name="email" >
                    </div>

                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-category" class="btn btn-success">@lang('app.continue') <i class="fa fa-arrow-right"></i></button>
        </div>
    </form></div>


<script>

    $('#save-category').click(function () {

        let username = $('#username').val();
        $.easyAjax({
            url: '{{route('admin.customers.store')}}',
            container: '#createProjectCategory',
            type: "POST",
            data: $('#createProjectCategory').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    var $newOption = $("<option></option>").val(response.user_id).text(username);
                    $("#user_id").append($newOption).trigger('change');
                    customerDetails(response.user_id);

                    $('#application-modal').modal('hide');
                }
            }
        })
    });
</script>