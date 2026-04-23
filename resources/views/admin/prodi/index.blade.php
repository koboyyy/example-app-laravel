@extends('layouts.admin')

@section('content')
<div class="min-height-200px">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Data Prodi</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Prodi
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary" href="{{url('/admin/prodi/create')}}">
						Tambah Data Prodi
					</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Data Prodi with Export Buttons</h4>
        </div>

        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">No</th>
                        <th>Nama Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                   <tbody>
                    @foreach($prodi as $index => $data)
                    <tr>
                    <td class="table-plus">{{ $index + 1 }}</td>
                    <td>{{$data->nama_prodi}}</td>
                    <td>
                    <a href="" class="btn btn-warning btn-sm" title="Edit">
                    <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('prodi.delete', ['id' => $data->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus data?')"
                    title="Hapus">
                    <i class="fa fa-trash"></i>
                    </button>
                    </form>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection