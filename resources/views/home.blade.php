<style type="text/css">
	.home-section{
		height: 300px;
	}
	.title-section{
		font-size: 36px;
		/*color: #ffffff;*/
		
	}
	.text-section{
		font-size: 30px;
		/*color: #ffffff;*/
		
	}
	.section{
		margin-bottom: 10px;
	}
	.left-content-section{
		margin-left: 10%;
		color: #ffffff;
		text-align: left;
	}
	.right-content-section{
		margin-right: 10%;
		text-align: right;
		color: #000000;
	}
</style>
@extends('frontend.layout.master')

@section('content')

<div class="columns is-multiline">
	<div class="column is-12 section" style="background-image: url('img/urban-homepage-bike-web_2048x.jpg');background-position: 50% 20%;background-size: cover;">
	<div class="left-content-section">
		<div class="home-section">
		<p class="title-section">
Hybrid Doesn't Do It Justice</p><br>
<p class="text-section">Slip through your city like a shadow. Your perfect urban commuter is right here.</p>

<button class="button is-large" style="background-color: transparent;margin-left: 10%;color: #ffffff;">Button</button>
	</div>
	</div>
	</div>

	<div class="column is-12 section" style="background-image: url('img/homepage-roadbike_2048x.jpg');background-position: 50% 20%;background-size: cover;">
	<div class="right-content-section">
		<div class="home-section">
		<p class="title-section">
Hybrid Doesn't Do It Justice</p><br>
<p class="text-section">Slip through your city like a shadow. Your perfect urban commuter is right here.</p>

<button class="button is-large" style="background-color: #ab9a6f;margin-left: 10%;color: #ffffff;">Button</button>
	</div>
	</div>
	</div>


</div>

@endsection