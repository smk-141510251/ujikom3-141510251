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
                     <h3><font face="Maiandra GD" color="white">Tunjangan Pegawai</font></h3>
                        <hr class="star-light">
                         <h2><font face="Maiandra GD" color="white">hai <b>{{ Auth::user()->name }}</b> , Anda Memilih Tunjangan Pegawai</font></h2></div>
                    </div>
                    @endif

                        
                </div>
            </div>
        </div>
    </header>
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
<center><h2>Daftar Tunjangan Pegawai</h2></center>
                    <ul class="nav navbar-right panel_toolbox">
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">
                   &nbsp;&nbsp;&nbsp;<a href="{{url('TunjanganP/create')}}" class="btn btn-primary">Tambah Tunjangan Pegawai&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
                   <br>
                   <br>

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr class="bg-danger">
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Kode Tunjangan</center></p></th>
                          <th><p class="center"><center>Nip</center></p></p></th>
                          <th><p class="center"><center>Pegawai</center></p></p></th>
                          <th><p class="center"><center>Besaran Uang</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php $no=1; ?>
                         @foreach ($tp as $data)
                             <tr>
                                 <th><center>{{ $no++ }}</center></th>
                                 <th><center>{{ $data->Tunjangans->Kode_tunjangan }}</center></th>
                                 <th><center>{{ $data->Pegawai->Nip }}</center></th>
                                 <th><center>{{ $data->Pegawai->User->name }}</center></th>

                                
                                       

                                 <th><center>
                                       
                                     <?php
                                       if ( $data->Tunjangans->Jumlah_anak <= '1' )
                                       {       
                                           echo "". $data->Tunjangans->Besaran_uang;
                                       }      

                                       elseif ( $data->Tunjangans->Jumlah_anak == '1' | $data->Tunjangans->Jumlah_anak == '2')
                                       {       
                                           
                                           echo "". $data->Tunjangans->Besaran_uang * $data->Tunjangans->Jumlah_anak;
                                       }

                                       elseif ( $data->Tunjangans->Jumlah_anak >= '2')
                                       {
                                           echo "". $data->Tunjangans->besaran_uang * '2';
                                       } 
                                       
                                       ?>
</th></center>

                                 <th><a href="{{url('TunjanganP',$data->id)}}" class="btn btn-primary">Lihat<i class="fa fa-eye"></i></a></th>
                                 <th><a title="Edit" href="{{route('TunjanganP.edit',$data->id)}}" class="btn btn-warning">Ubah<i class="fa fa-edit"></i></a></th>
                                 <th>
                                   <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus<i class="fa fa-trash"></i></a>
                                  @include('modals.del', [
                                    'url' => route('TunjanganP.destroy', $data->id),
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