@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<style>
		.btn-squared-default
		{
			width: 100px !important;
			height: 100px !important;
			font-size: 10px;
		}
	
			.btn-squared-default:hover
			{
				border: 3px solid white;
				font-weight: 800;
			}
	
		.btn-squared-default-plain
		{
			width: 100px !important;
			height: 100px !important;
			font-size: 10px;
		}
	
			.btn-squared-default-plain:hover
			{
				border: 0px solid white;
			}
	</style>
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Bienvenidos al Sistema de venta RA Group</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div align="center" class="box-body">
						<!--
					<img align="center" id="empresa-logo" src="/img/logogrande.png" width="900" height="400">
				-->
					<div class="container text-xs-center">
							<div class="row">
								<div class="col-lg-12">
									<h2>Square buttons - press effect</h2>
									<p>
										<a href="#" class="btn btn-squared-default btn-primary">
											<i class="fa fa-key fa-5x"></i>
											<br />
											primary
											<br />
											Button
										</a>
										<a href="#" class="btn btn-squared-default btn-success">
											<i class="fa fa-money fa-5x"></i>
											<br />
											success
											<br />
											Button
										</a>
										<a href="#" class="btn btn-squared-default btn-warning">
											<i class="fa fa-mobile fa-5x"></i>
											<br />
											warning
											<br />
											Button
										</a>
										<a href="#" class="btn btn-squared-default btn-danger">
											<i class="fa fa-barcode fa-5x"></i>
											<br />
											danger
											<br />
											Button
										</a>
										<a href="#" class="btn btn-squared-default btn-info">
											<i class="fa fa-bell fa-5x"></i>
											<br />
											info 
											<br />
											Button
										</a>
									</p>
								</div>
							</div>
						
							<div class="row">
								<div class="col-lg-12">
									<h2>Square buttons - plain</h2>
									<p>
										<a href="#" class="btn btn-squared-default-plain btn-primary">
											<i class="fa fa-android fa-5x"></i>
											<br />
											primary
											<br />
											Button
										</a>
										<a href="#" class="btn btn-squared-default-plain btn-success">
											<i class="fa fa-laptop fa-5x"></i>
											<br />
											success
											<br />
											Button
										</a>
										<a href="#" class="btn btn-squared-default-plain btn-info">
											<i class="fa fa-compass fa-5x"></i>
											<br />
											info 
											<br />
											Button
										</a>
										<a href="#" class="btn btn-squared-default-plain btn-warning">
											<i class="fa fa-pencil fa-5x"></i>
											<br />
											warning
											<br />
											Button
										</a>
										<a href="#" class="btn btn-squared-default-plain btn-danger">
											<i class="fa fa-car fa-5x"></i>
											<br />
											danger
											<br />
											Button
										</a>
									</p>
								</div>
							</div>
						</div>
						


				
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</div>
	</div>
</div>
@endsection