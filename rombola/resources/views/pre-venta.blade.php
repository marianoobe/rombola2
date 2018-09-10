@extends('adminlte::layouts.app')


@section('seccion1')
<div class="container-fluid spark-screen">

	<div class="row">

		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<!-- 	<h3 class="box-title"></h3>
				     	<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>-->
				</div>

				<div class="box-body">
					<div class="row margenBoot-25">
						<div class="col-xs-12 col-lg-offset-3 col-lg-3">
							<div class="form-group">
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="form-group">
								<input type="text" maxlength="125" class="form-control" id="inp-vendedor" placeholder="">
							</div>
						</div>
					</div>
					<!-- /.row -->
				</div>
			</div>
			<!-- /.box-body -->

		</div>
		<!-- /.box -->

	</div>

	<div class="row">

		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Cliente</h3>
					<!-- 	<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
				</div>-->
				</div>

				<div class="box-body">
					<div class="row margenBoot-25">
						<div class="col-xs-12 col-lg-offset-3 col-lg-3">
							<div class="form-group">
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="form-group">
								<input type="text" maxlength="125" class="form-control" id="inp-vendedor" placeholder="">
							</div>
						</div>
					</div>
					<!-- /.row -->
				</div>
			</div>
			<!-- /.box-body -->

		</div>
		<!-- /.box -->

	</div>

	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Detalle</h3>
					<!-- 	<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>-->
				</div>

				<div class="box-body">
					<div class="form-group">
						<label for="exampleFormControlTextarea3">Rounded corners</label>
						<textarea class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
					</div>
					<!-- /.row -->
				</div>


			</div>

		</div>







		@endsection