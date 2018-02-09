@extends('admin.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Aplikasi Pelaporan Kerusanan Fasilitas Umum di Lamongan</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="/logout" class="btn btn-danger pull-right" title="Logout"><i class="glyphicon glyphicon-off"></i></a>
		<h2 id="not-found"></h2>
		<table class="table table-striped table-bordered" id="tabel-data" style="display: none">
			<thead class="bg-primary">
				<tr>
					<th width="40">No</th>
					<th>Pengirim</th>
					<th>Lokasi</th>
					<th>Keterangan</th>
          <th>Tanggal Dikirim</th>
          <th>Status</th>
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
				<h4 class="modal-title" id="myModalLabel">Detail Laporan</h4>
			</div>
			<div class="modal-body" id="modalBody">

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
        console.log(datane.length);
        if(datane.length == 0)
        {
            $('#tabel-data > tbody').append(
                "<tr>"+
                "<td colspan=6>Tidak ada data</td>"+
                "</tr>"
            )
        }
        else
        {
        datane.map((x)=>{
        var labele = 'label-warning';
        var teks = 'pending'
        if(x.status == 1) 
        {
            labele = 'label-danger';
            teks = 'tidak valid';
        }
        else if(x.status == 2)
        {
            labele = 'label-success';
            teks = 'terverifikasi';
        }
        $('#tabel-data > tbody').append(
        "<tr>"+
        "<td>"+x.no+"</td>"+
        "<td>"+x.pengirim+"</td>"+
        "<td>"+x.lokasi+"</td>"+
        "<td>"+x.keterangan+"</td>"+
        "<td>"+moment(x.tgl).format('LLL')+"</td>"+
        "<td><span class='label "+labele+"'>"+teks+"</span></td>"+
        "<td>"+
        "<div class='btn-group'>"+
        "<a href='javascript: void(0)' title='Lihat detail' class='btn btn-default btn-sm' onclick='TampilkanModal(\"/api/DetailModal/"+x.id_laporan+"\")'><i class='glyphicon glyphicon-eye-open text-info'></i></a>"+
        "<a href='/laporan/"+x.id_laporan+"/verifikasi' title='Verifikasi' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-ok text-success'></i></a>"+
        "<a href='/laporan/"+x.id_laporan+"/invalid' title='Tidak valid' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-remove text-warning'></i></a>"+
        "<a href='/laporan/"+x.id_laporan+"/hapus' title='Hapus laporan' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-trash text-danger'></i></a>"+
        "</div>"+
        "</td>"+
        "</tr>"
        );
        });
        }
    $('#tabel-data').fadeIn('slow');
    },
    error: function(xhr, error, status) {
        alert(xhr);
    }
    })
    });

    function TampilkanModal(url)
    {
        $.ajax({
            url: url,
            success: function(msg) {
                $('#modalBody').children().remove();
                $('#modalBody').append(msg);
                $('#myModal').modal('show');
            },
            error: function(xhr, stat, cd) {
                console.log(xhr);
            }
        });
    }
</script>
@stop
