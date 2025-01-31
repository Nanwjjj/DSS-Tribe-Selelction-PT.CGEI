@extends('layout.print')
@section('title', $title)
@section('content')
<table class="table table-bordered table-hover table-striped m-0">
	<thead>
		<th>No</th>
		<th>Kode</th>
		<th>Nama alternatif</th>
		<th>Keterangan</th>
	</thead>
	<?php $no = 1 ?>
	@foreach($rows as $key => $row)
	<tr>
		<td>{{ $no++ }}</td>
		<td>{{ $row->kode_alternatif }}</td>
		<td>{{ $row->nama_alternatif }}</td>
		<td>{{ $row->keterangan }}</td>
	</tr>
	@endforeach
</table>
@endsection