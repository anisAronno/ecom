@extends('Layout.app')
@section('title','Home')
@section('content')


<div class="container">
	<div class="row">

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalVisitor}}</h3>
					<h3 class="count-card-text">Total Visitor</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalProduct}}</h3>
					<h3 class="count-card-text">Total Products</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalCategory}}</h3>
					<h3 class="count-card-text">Total Categories</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalBrand}}</h3>
					<h3 class="count-card-text">Total Brand</h3>
				</div>
			</div>
		</div>
		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalContact}}</h3>
					<h3 class="count-card-text">Total Contacts</h3>
				</div>
			</div>
		</div>
		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalReview}}</h3>
					<h3 class="count-card-text">Total Reviews</h3>
				</div>
			</div>
		</div>

	</div>
</div>	

@endsection