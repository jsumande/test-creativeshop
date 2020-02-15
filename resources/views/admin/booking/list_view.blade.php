<div class="row mb-3 mr-0 ml-0  rounded">
    <span class="d-none">
        <input type="checkbox" name="booking_checkboxes[]" value="{{ $row->id }}" class="booking-checkboxes" id="booking-{{ $row->id }}">
    </span>
    <div class="py-2 col-md-2
    @if($row->status == 'completed') bg-success @endif
    @if($row->status == 'pending') bg-warning @endif
    @if($row->status == 'in progress') bg-primary @endif
    @if($row->status == 'canceled') bg-danger @endif
     text-center booking-time booking-div rounded-left d-flex align-items-center justify-content-center">
        <div>
            <h5>{{ $row->date_time->format('d M') }}</h5>
            <span class="badge border @if($row->status == 'pending') border-dark @endif font-weight-normal">{{ $row->date_time->format('h:i A') }}</span><br>
            <small class="text-uppercase">@lang('app.booking') # {{ $row->id }}</small>
        </div>
    </div>
    <div class="col-md-9 bg-light-gradient booking-div p-2 text-uppercase">
        <h6 class="font-weight-bold">{{ ucwords($row->user->name) }}</h6>

        <div class="row mb-2">
            @if ($user->is_employee == 1)
            <div class="col-md-12">
                @foreach($businessess as $business)
                    @if($business->id == $row->business_id)
                        <a href='{{ route('front.index',$business->slug) }}' target="_black">
                        <i class="fa fa-briefcase"></i> {{ $business->title }}</a>
                    @endif    
                @endforeach
            </div>
            @endif
            <div class="col-md-5 text-lowercase">
                <i class="fa fa-envelope-o"></i>
                @if(!is_null($row->user->email))
                    @if(strlen($row->user->email) > 17)
                        {{ substr($row->user->email, 0, 18).'...' }}
                    @else
                        {{ $row->user->email }}
                    @endif
                @else -- @endif
            </div>
            <div class="col-md-4">
                <i class="fa fa-phone"></i> {{ $row->user->mobile ? $row->user->formatted_mobile : '--' }}
            </div>
            <div class="col-md-3">
                <span class="badge bg-light small border status
                 @if($row->status == 'completed') border-success @endif
                @if($row->status == 'pending') border-warning @endif
                @if($row->status == 'in progress') border-primary @endif
                @if($row->status == 'canceled') border-danger @endif
                        badge-pill">@lang('app.'.$row->status)</span>
            </div>
        </div>

        @foreach($row->items as $item)
            <span class="small text-primary">{{ $item->businessService->name }} &bull;</span>
        @endforeach
    </div>
    <div class="col-md-1 text-right border-left bg-light rounded-right d-flex align-items-center justify-content-center">
        <button type="button" data-booking-id="{{ $row->id }}" class="btn bg-transparent text-primary p-3 btn-social-icon rounded-right view-booking-detail"><i class="fa fa-chevron-right"></i></button>
    </div>
</div>
