@extends('layouts.admin')

@section('content')

	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>FORM INPUT JURUSAN</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
							<li class="breadcrumb-item active" aria-current="page">Form Data Jurusan</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-secondary" href="#" role="button" data-toggle="dropdown">
							January 2018
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Default Basic Forms Start -->
		<div class="pd-20 card-box mb-30">
			<div class="clearfix">
				<div class="pull-left">
					<h4 class="text-blue h4">Form Input Prodi</h4>
					<p class="mb-30">Silahkan diisi</p>
				</div>
			</div>

			@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif

			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form action="{{ route('prodi.store') }}" method="POST">
				@csrf
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Nama Prodi</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" placeholder="Nama Prodi" type="text" name="nama_prodi" value="{{ old('nama_prodi') }}">
					</div>
				</div>

				<button type="submit" class="btn btn-primary">
					Simpan
				</button>
			</form>
		</div>
	</div>
@endsection
