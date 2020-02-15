@extends('layouts.front')


@section('content')



<section class="section sp-80 bg-w">

	<div class="container">
		<div class="row">

			<div class="col-md-5 offset-md-3">
			<div class="card card-dark">
				<div class="card-header text-center">
                    <span><b>Verify</b></span>
                </div>


                <div class="card-body">

                	<div class="row">
                		
                		<div class="col-md-5"><label>Name :</label></div>
                		<div class="col-md-7"><label>{{Session::get('name')}}</label></div>

                		<div class="col-md-5"><label>Email :</label></div>
                		<div class="col-md-7"><label>{{Session::get('email')}}</label></div>

                		<div class="col-md-5"><label>Business Title :</label></div>
                		<div class="col-md-7"><label>{{Session::get('b_title')}}</label></div>


                	</div>

                	<a class="btn btn-dark pull-right" href={{ Session::get('payment_url') }}> Proceed to Payment </a>
                </div>
			</div>
		</div>

		</div>
	</div>
    {{-- <p>{{ Session::get('payment_url') }}</p> --}}
</section>


@endsection