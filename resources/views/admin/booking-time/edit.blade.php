<div class="modalheader">
    <h4 class="modaltitle">@lang('app.edit') @lang('menu.bookingTimes')</h4>
    <button type="button" class="close" datadismiss="modal" ariahidden="true"></button>
</div>
<div class="modalbody">
    <form id="createProjectCategory" class="ajaxform" method="POST" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="formbody">
            <div class="row">
                <div class="colsm12 ">
                    <div class="formgroup">
                        <h4 class="formcontrolstatic">@lang('app.'.$bookingTime>day)</h4>
                    </div>

                    <div class="formgroup">
                        <label>@lang('modules.settings.openTime')</label>

                        <div class="inputgroup date timepicker">
                            <input type="text" class="formcontrol" name="start_time" value="{{ $bookingTime>start_time }}">
                            <span class="inputgroupappend inputgroupaddon">
                                <button type="button" class="btn btninfo"><span class="fa faclocko"></span></button>
                            </span>
                        </div>
                    </div>

                    <div class="formgroup">
                           <label>@lang('modules.settings.closeTime')</label>

                        <div class="inputgroup date timepicker">
                            <input type="text" class="formcontrol" name="end_time" value="{{ $bookingTime>end_time }}">
                            <span class="inputgroupappend inputgroupaddon">
                                <button type="button" class="btn btninfo"><span class="fa faclocko"></span></button>
                            </span>
                        </div>
                    </div>

                    <div class="formgroup">
                        <label>@lang('modules.settings.slotDuration')</label>

                        <div class="inputgroup justifycontentcenter alignitemscenter">
                            <input id="slot_duration" type="number" class="formcontrol" name="slot_duration" value="{{ $bookingTime>slot_duration }}" min="1">
                            <span class="ml3">
                                @lang('app.minutes')
                            </span>
                        </div>
