@extends('admin.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Hello admin</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="/logout" class="btn btn-danger">Logout</a>
		<h2 id="not-found"></h2>
		<table class="table table-striped table-bordered" id="tabel-data" style="display: none">
			<thead class="bg-primary">
				<tr>
					<th width="40">No</th>
					<th>Pengirim</th>
					<th>Lokasi</th>
					<th>Keterangan</th>
					<th>Tanggal Dikirim</th>
					<th width="150">Aksi</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
</div>
<div id="myModal" class="modal fade-scale" tabindex="-1" role="dialog" aria-lalelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Judul</h4>
			</div>
			<div class="modal-body">
				hello
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		moment.locale('id');
		$.ajax({
			url: '/api/data-pelaporan',
			dataType: 'JSON',
			success: function(datane) {
				// console.log(datane);
				datane.map((x)=>{
					$('#tabel-data > tbody').append(
						"<tr>"+
							"<td>No</td>"+
							"<td>"+x.pengirim+"</td>"+
							"<td>"+x.lokasi+"</td>"+
							"<td>"+x.keterangan+"</td>"+
							"<td>"+moment(x.tgl).format('LLL')+"</td>"+
							"<td>"+
							"<div class='btn-group'>"+
						"<a href='#' title='Lihat detail' class='btn btn-default btn-sm' data-toggle='modal' data-target='#myModal'><i class='glyphicon glyphicon-eye-open text-info'></i></a>"+
						"<a href='#' title='Verifikasi' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-ok text-success'></i></a>"+
						"<a href='#' title='Tidak valid' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-remove text-warning'></i></a>"+
						"<a href='#' title='Hapus laporan' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-trash text-danger'></i></a>"+
					"</div>"+
							"</td>"+
						"</tr>"
					);
				});

				$('#tabel-data').fadeIn('slow');
			},
			error: function(xhr, error, status) {
				alert(error);
			}
		})
	});
	function ajaxLoadToModal(alamat)
	{
		$('.modal-body').load('/api/data-pelaporan');
	}
</script>
@stop