@extends('layouts.admin')

@section('content')

	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>FORM EDIT MAHASISWA</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
							<li class="breadcrumb-item active" aria-current="page">Form Edit Data Mahasiswa</li>
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
					<h4 class="text-blue h4">Form Input Mahasiswa</h4>
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

			<form action="{{ route('mahasiswa.update',['id' => $mahasiswa->id]) }}" method="POST">
				@csrf
                @method('PUT')
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">NIM</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" type="text" placeholder="Masukkan NIM" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" placeholder="Nama Lengkap" type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-12 col-md-10">
						<select class="custom-select col-12" name="jenis_kelamin">
							<option value="">Pilih Jenis Kelamin</option>
							<option value="Laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
							<option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Tempat Lahir</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" placeholder="Tempat Lahir" type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" placeholder="Masukkan Tanggal Lahir" type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Alamat Lengkap</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" placeholder="Alamat Lengkap" type="text" name="alamat" value="{{ old('alamat', $mahasiswa->alamat) }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">No HP</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" placeholder="Nomor Handphone" type="text" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Email</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email', $mahasiswa->email) }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Jurusan</label>
					<div class="col-sm-12 col-md-10">
						<select class="custom-select col-12" name="jurusan">
							<option value="">Pilih Jurusan</option>
							<option value="Teknik Informatika" {{ old('jurusan', $mahasiswa->jurusan) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
							<option value="Teknik Mesin" {{ old('jurusan', $mahasiswa->jurusan) == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
							<option value="Teknik Administrasi Niaga" {{ old('jurusan', $mahasiswa->jurusan) == 'Teknik Administrasi Niaga' ? 'selected' : '' }}>Teknik Administrasi Niaga</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Program Studi</label>
					<div class="col-sm-12 col-md-10">
						<select class="custom-select col-12" name="prodi">
							<option value="">Pilih Program Studi</option>
							<option value="Rekayasa Perangkat Lunak" {{ old('prodi', $mahasiswa->prodi) == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
							<option value="Teknologi Informasi" {{ old('prodi', $mahasiswa->prodi) == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
							<option value="Teknik Komputer" {{ old('prodi', $mahasiswa->prodi) == 'Teknik Komputer' ? 'selected' : '' }}>Teknik Komputer</option>
						</select>
					</div>
				</div>

				<button type="submit" class="btn btn-primary">
					Simpan
				</button>
			</form>
		</div>
	</div>
@endsection
