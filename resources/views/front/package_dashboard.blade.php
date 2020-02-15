@extends('layouts.front')


@section('content')

<section class="section sp-80 bg-w">

<div class="container">
	<div class="row">
		

		@foreach($plan as $package)

			<div class="col-md-3">
				<div class="card card-dark">
					<div class="card-header text-center">
	                    <span><b>{{ $package->plan_name }} Package</b></span>
	                </div>

	                <div class="card-body text-center">
	                	<div class="row">
	                		
	                		<div class="col-md-12">

	                			@if($package->monthly == 0)
	                				<span><b class="display-3">Free</b></span>
	                			@else
	                				<span><b class="display-3">{{ $package->monthly }}</b> /month</span>
	                			@endif
	                			
	                		</div>

	                		<div class="col-md-12">

	                			@if($package->monthly == 0)
	                				<span>Limited Offer</span><hr>
	                			@else
	                				<span>or billed annually for {{ $package->annual }}</span><hr>
	                			@endif

	                		</div>

	                		<div class="col-md-12">
	                			<a href="{{ route('front.package',$package->id) }}" class="btn btn-success">Get Started</a>
	                			{{-- <button class="btn btn-success">Get Started</button> --}}
	                		</div>


	                		<div class="col-md-12">
	                			<br><p>{{ $package->description }}</p>
	                		</div>

	                		<div class="col-md-12">
	                			<span><b class="display-5">{{ $package->services_limit }}</b> services limit</span>
	                		</div>


	                		<div class="col-md-12">
	                			<span><b class="display-5">{{ $package->bookings_limit }}</b> bookings limit</span>
	                		</div>

	                	</div>
	                	
					   
	                </div>
				</div>
			</div>

		@endforeach
		{{-- <div class="col-md-4">
			<div class="card card-dark">
				<div class="card-header">
                    <span><b>Payts</b></span>
                </div>

                <div class="card-body">
         
                </div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card card-dark">
				<div class="card-header">
                    <span><b>Payts</b></span>
                </div>

                <div class="card-body">
         
                </div>
			</div>
		</div> --}}
	</div>

</div>

	
</section>


@endsection

@push('footer-script')
    <script>

        $('#update-currency').click(function () {
        $.easyAjax({
            // url: '',
            @php
            	// url: '{{ route('front.addMockBusiness') }}',
            @endphp
            container: '#contact_form',
            type: 'POST',
            data: $('#contact_form').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    });

    </script>
@endpush
