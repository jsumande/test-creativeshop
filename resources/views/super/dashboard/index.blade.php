@extends('layouts.master')



@section('content')
	hello {{ Auth::user()->is_admin }} {{ Auth::user()->name }}
@endsection