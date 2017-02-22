@extends('layouts.app2')

@section('content')
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                
                 @if (Auth::guest())
                   
                    <div class="intro-text">
               
                        <hr class="star-light">
                        <h2><font face="Maiandra GD" color="white">Anda Tidak Meiliki Hak Akses , Anda Harus Login/Registrasi Terlebih Dahulu!</font></h2>
                    </div>
                    @else
                
                    <div class="intro-text">
                     <h3><font face="Maiandra GD" color="white">Lembur Pegawai</font></h3>
                        <hr class="star-light">
                         <h2><font face="Maiandra GD" color="white">hai <b>{{ Auth::user()->name }}</b> , Anda Memilih Lembur Pegawai</font></h2></div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </header>
<br>
<br>
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
   <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                 <h3><font face="Maiandra GD" color="white"><center>Data Lembur Pegawai</center></font></h3>
                 <hr>
                  <div class="x_content">
 &nbsp;&nbsp;&nbsp;<a href="{{url('Lembur/create')}}" class="btn btn-primary">Tambah Lembur Pegawai&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>

 <br><br>

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                    <tr class="bg bg-danger">
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Kode Lembur</center></p></th>
                          <th><p class="center"><center>NIP</center></p></th>
                          <th><p class="center"><center>Pegawai</center></p></p></th>
                          <th><p class="center"><center>Jumlah Jam</center></p></p></th>
                          <th><p class="center"><center>Besaran Uang</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php $no=1; ?>
                         @foreach ($lembur as $data)
                             <tr>
                                 <th><center>{{ $no++ }}</center></th>
                                 <th><center>{{ $data->Kategori_lembur->Kode_lembur }}</center></th>
                                 <th><center>{{ $data->Pegawai->Nip}}</center></th>
                                 <th><center>{{ $data->Pegawai->User->name}}</center></th>
                                 <th><center>{{ $data->Jumlah_jam }}</center></th>
                                 <th><center><?php echo 'Rp.'. number_format($data->Kategori_lembur->Besaran_uang*$data->Jumlah_jam, 2,",","."); ?></center></th>
                                 <th><a href="{{url('Lembur',$data->id)}}" class="btn btn-primary">lihat</i></a></th>

                                 <th><a title="Edit" href="{{route('Lembur.edit',$data->id)}}" class="btn btn-warning">ubah</a></th>
                                 
                                 <th>
                                   <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete">hapus</a>
                                  @include('modals.del', [
                                    'url' => route('Lembur.destroy', $data->id),
                                    'model' => $data
                                  ])
                                 </th>
                             </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection