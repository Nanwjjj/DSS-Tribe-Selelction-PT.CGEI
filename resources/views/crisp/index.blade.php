@extends('layout.app')
@section('title', $title)
@section('content')
{{ show_msg() }}
<div class="card card-primary card-outline">
	<div class="card-header">
		<form class="row row-cols-lg-auto g-1">
			<div class="form-group mr-1">
				<input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="Pencarian..." />
			</div>
			<div class="form-group mr-1">
				<button class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
			</div>
			<div class="form-group mr-1" {{ is_hidden('crisp.create') }}>
				<a class="btn btn-primary" href="{{ route('crisp.create') }}"><i class="fa fa-plus"></i> Tambah</a>
			</div>
			<div class="form-group mr-1" {{ is_hidden('crisp.cetak') }}>
				<a class="btn btn-secondary" href="{{ route('crisp.cetak') }}" target="_blank"><span class="fa fa-print"></span> Cetak</a>
			</div>
		</form>
	</div>
	<div class="card-body p-0 table-responsive">
		<table class="table table-bordered table-hover table-striped m-0">
			<thead>
				<th>No</th>
				<th>Kriteria</th>
				<th>Nama Sub</th>
				<th>Bobot</th>
				<th>Aksi</th>
			</thead>
			@foreach($rows as $key => $row)
			<tr>
				<td>{{ ($rows->currentPage() - 1) * $limit + $key + 1}}</td>
				<td>{{ $row->nama_kriteria }}</td>
				<td>{{ $row->nama_crisp }}</td>
				<td>{{ round($row->bobot_crisp, 4) }}</td>
				<td>
					<a class="btn btn-sm btn-info" href="{{ route('crisp.edit', $row) }}" {{ is_hidden('crisp.edit') }}><i class="fa fa-edit"></i> Ubah</a>
					<form action="{{ route('crisp.destroy', $row) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Hapus Data?')" {{ is_hidden('crisp.destroy') }}>
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	@if ($rows->hasPages())
	<div class="card-footer">
		{{ $rows->links() }}
	</div>
	@endif
</div>
@endsection
