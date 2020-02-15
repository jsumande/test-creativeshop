@extends('layouts.front')


@section('content')

<section class="section sp-80 bg-w">

<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<div class="card card-dark">
				<div class="card-header">
                    <span><b>Add New Admin/Business</b></span>
                </div>


                <div class="card-body">
                	<form class="contact-form" id="contact_form" method="post">
				    @csrf
				   	<div id="alert"></div>
				    
				    <div class="row">

				    <div class="col-md-12">
				    		<div class="form-group text-center">
					            <h4>Admin Infomation</h4>
				        	</div>
				    </div>

				    <div class="col-md-3">
				    	<div class="form-group">
					        <label>Admin First Name </label>
					        <input type="text" name="fname" id="fname" class="form-control" required>
					        <input type="hidden" name="plan_id" value="{{ $plan->id }}" class="form-control">
					        <input type="hidden" name="plan_name" value="{{ $plan->plan_name }}" class="form-control">
					        <input type="hidden" name="plan_cost" value="{{ $plan->monthly }}" class="form-control">

					        <label id="validated_fname" style="color:red;font-size:13px"></label>
				        </div>
				    </div>

				    <div class="col-md-3">
				    	<div class="form-group">
					        <label>Admin Last Name</label>
					        <input type="text" name="lname" id="lname" class="form-control">
					        <label id="validated_lname" style="color:red;font-size:13px"></label>
				        </div>
				    </div>
				    	
				    <div class="col-md-3">
				       	<div class="form-group">
				            <label>Admin Email</label>
				            <input type="email" name="email" id="email" class="form-control">
				            <label id="validated_email" style="color:red;font-size:13px"></label>
				        </div>
				    </div>

				    <div class="col-md-3">
				       	<div class="form-group">
				            <label>Admin Password</label>
				            <input type="password" name="password" id="password" class="form-control">
				            <label id="validated_password" style="color:red;font-size:13px"></label>
				        </div>
				    </div>

				    <div class="col-md-6">
				    	<div class="form-group">
					        <label>Admin Calling Code</label>
					        {{-- <input type="text" name="calling" id="calling" class="form-control"> --}}
					        <select name="calling" id="calling" class="form-control select2">
					        	<option></option>
                                @foreach ($calling_codes as $code => $value)
                                    <option value="{{ $value['dial_code'] }}">
                                    	{{ $value['dial_code'] . ' - ' . $value['name'] }}
                                    </option>
                                @endforeach
                            </select>
			        		<label id="validated_calling" style="color:red;font-size:13px"></label>
				        </div>
				    </div>
				    	
				    <div class="col-md-6">
				       	<div class="form-group">
				            <label>Admin Mobile No.</label>
				            <input type="number" name="mobile" id="mobile" class="form-control">
				            <label id="validated_mobile" style="color:red;font-size:13px"></label>
				        </div>
				    </div>


				    <div class="col-md-12">
				    		<div class="form-group text-center">
					            <h4>Business Infomation</h4>
				        	</div>
				    </div>

				    <div class="col-md-6">
				    	<div class="form-group">
					        <label>Business Name</label>
					        <input type="text" name="title" id="title" class="form-control">
					        <label id="validated_title" style="color:red;font-size:13px"></label>

					        <input type="hidden" name="slug" id="slug" class="form-control" readonly>
				            <input type="hidden" name="website" id="website" class="form-control" readonly="">
				        </div>
				    </div>
				    	
				    {{-- <div class="col-md-6">
				       	<div class="form-group">
				            <label>Business Slug</label>
				            <input type="text" name="slug" id="slug" class="form-control" readonly>
				        </div>
				    </div> --}}

				    {{-- <div class="col-md-6">
				    	<div class="form-group">
					        <label>Business Email</label>
					        <input type="text" name="B_email" class="form-control">
				        </div>
				    </div> --}}
				    	
				    {{-- <div class="col-md-6">
				       	<div class="form-group">
				            <label>Business Website</label>
				            <input type="hidden" name="website" id="website" class="form-control" readonly="">
				        </div>
				    </div> --}}

				    {{-- <div class="col-md-12">
				    		<div class="form-group text-center">
					            <h4>Card Infomation</h4>
				        	</div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>Account Name</label>
					        <input type="text" name="account" class="form-control">
					        <input type="hidden" name="plan_id" value="{{ $plan->id }}" class="form-control">
				        </div>
				    </div>
				    	
				    <div class="col-md-4">
				       	<div class="form-group">
				            <label>Address</label>
				            <input type="text" name="address" class="form-control">
				        </div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>Country</label>
					        <input type="text" name="country" class="form-control">
				        </div>
				    </div>
				    	
				    <div class="col-md-4">
				       	<div class="form-group">
				            <label>Card Number</label>
				            <input type="text" name="card" class="form-control">
				        </div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>CVV</label>
					        <input type="text" name="cvv" class="form-control">
				        </div>
				    </div>
				    	
				    <div class="col-md-4">
				       	<div class="form-group">
				            <label>Expiration Date.</label>
				            <input type="text" name="exp" class="form-control">
				        </div>
				    </div> --}}


				    <div class="col-md-12">
				    		<div class="form-group text-center">
					            <h4>Billing Infomation</h4>
				        	</div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>Billing Address</label>
					        <input type="text" name="billing" id="billing" class="form-control">
					        <label id="validated_billing" style="color:red;font-size:13px"></label>
				        </div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>City</label>
					        <input type="text" name="city" id="city" class="form-control">
					        <label id="validated_city" style="color:red;font-size:13px"></label>
				        </div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>State</label>
					        <input type="text" name="state" id="state" class="form-control">
					        <label id="validated_state" style="color:red;font-size:13px"></label>
				        </div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>Country</label>
					        <input type="text" name="country" id="b_country" class="form-control">
					        <label id="validated_country" style="color:red;font-size:13px"></label>
				        </div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>Postal Code</label>
					        <input type="number" name="postal" id="postal" class="form-control">
					        <label id="validated_postal" style="color:red;font-size:13px"></label>
				        </div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
					        <label>Reference No.</label>
					        <input type="text" name="reference" id="reference" class="form-control">
					        <label id="validated_reference" style="color:red;font-size:13px"></label>
				        </div>
				    </div>
				    	
			
				       
				    <div class="col-md-12">
				       	<div class="form-group">
				            <button type="button" name="submit" id="update-currency" class="btn btn-custom pull-right">
				            	<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span> Save
				        	</button>

				        </div>	
				    </div>

				    </div>
				    </form>
                </div>
			</div>
		</div>
	</div>

</div>
	
	{{-- <div class="container">

		<div class="row">
                <div class="col-12">
                    <div class="all-title">
                        <h3 class="sec-title">
                            Add New Admin/Business
                        </h3>
                    </div>
                </div>
        </div>


    <form class="contact-form col-md-6" id="contact_form" method="post" action="">
    @csrf
   	<div id="alert"></div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="form-group">
	            <label>Business Name</label>
	            <input type="text" name="title" class="form-control">
        	</div>
    	</div>
    	
       <div class="col-md-12">
       		<div class="form-group">
            	<label>Business Slug</label>
            <input type="email" name="slug" class="form-control">
        </div>
       </div>
       
       <div class="col-md-12">
       		<div class="form-group">
            	<button type="button" name="submit" id="update-currency" class="btn btn-custom">Save</button>
        	</div>	
       </div>

    </div>
    </form>
</div> --}}
	
</section>


@endsection

@push('footer-script')
	
	{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}

	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
	<script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <script>
    	 
    	 // Initialize select2
  		$('.select2').select2();
  		$('#spinner').hide();
    	function createSlug(value) {
            value = value.replace(/\s\s+/g, ' ');
            let slug = value.split(' ').join('-').toLowerCase();
            slug = slug.replace(/--+/g, '-');
            $('#slug').val(slug);
        }

        function createWebsite(value) {
            value = value.replace(/\s\s+/g, ' ');
            let slug = value.split(' ').join('').toLowerCase();
            slug = slug.replace(/--+/g, '-');
            $('#website').val("http://www."+slug+".com");
        }

        $('#title').keyup(function(e) {
            createSlug($(this).val());
            createWebsite($(this).val());
        });

        $('#slug').keyup(function(e) {
            createSlug($(this).val());
        });

        $('#website').keyup(function(e) {
            createWebsite($(this).val());
        });

        // Validation



        $('#update-currency').click(function () {
        	$('#spinner').show();

        	console.log($('#slug').val());
        	console.log($('#website').val());

        	if($('#fname').val() == ''){$('#validated_fname').text("First Name field is required");}
        	else { $('#validated_fname').text(""); }

        	if($('#lname').val() == ''){$('#validated_lname').text("Last Name field is required");}
        	else { $('#validated_lname').text(""); }

        	if($('#email').val() == ''){$('#validated_email').text("Email field is required");}
        	else { $('#validated_email').text(""); }

        	if($('#password').val() == ''){$('#validated_password').text("Password field is required");}
        	else { $('#validated_password').text(""); }

        	if($('#calling').val() == ''){$('#validated_calling').text("Calling Code field is required");}
        	else { $('#validated_calling').text(""); }

        	if($('#mobile').val() == ''){$('#validated_mobile').text("Mobile No. field is required");}
        	else { $('#validated_mobile').text(""); }

        	if($('#title').val() == ''){$('#validated_title').text("Business Name field is required");}
        	else { $('#validated_title').text(""); }

        	if($('#website').val() == ''){$('#validated_website').text("Business Website field is required");}
        	else { $('#validated_website').text(""); }

        	if($('#billing').val() == ''){$('#validated_billing').text("Billing Info. field is required");}
        	else { $('#validated_billing').text(""); }

        	if($('#city').val() == ''){$('#validated_city').text("City Info. field is required");}
        	else { $('#validated_city').text(""); }

        	if($('#state').val() == ''){$('#validated_state').text("State Info. field is required");}
        	else { $('#validated_state').text(""); }

        	if($('#postal').val() == ''){$('#validated_postal').text("Postal Info. field is required");}
        	else { $('#validated_postal').text(""); }

        	if($('#b_country').val() == ''){$('#validated_country').text("Country Info. field is required");}
        	else { $('#validated_country').text(""); }

        	if($('#reference').val() == ''){$('#validated_reference').text("Reference No. field is required");}
        	else { $('#validated_reference').text(""); }

	        $.easyAjax({
	            url: '{{ route('front.addPackageBusiness') }}',
	            container: '#contact_form',
	            type: 'POST',
	            data: $('#contact_form').serialize(),
	            success: function (response) {
	                if(response.status == 'success'){
	                	window.location.replace("/package/verify");
	                }
	            },
	            error: function (error) {
				    console.log("Error");
				    $('#spinner').hide();
				}
	        })
    	});

    </script>
@endpush
