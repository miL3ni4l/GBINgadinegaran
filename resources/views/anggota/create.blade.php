@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("gerwil_judul").value = $(this).attr('data-gerwil_judul');
                document.getElementById("gerwil_id").value = $(this).attr('data-gerwil_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_ayah', function (e) {
                document.getElementById("ayah_judul").value = $(this).attr('data-ayah_judul');
                document.getElementById("ayah_id").value = $(this).attr('data-ayah_id');
                $('#myModal2').modal('hide');
            });

            $(document).on('click', '.pilih_ibu', function (e) {
                document.getElementById("ibu_judul").value = $(this).attr('data-ibu_judul');
                document.getElementById("ibu_id").value = $(this).attr('data-ibu_id');
                $('#myModal3').modal('hide');
            });

            $(document).on('click', '.pilih_keluarga1', function (e) {
                document.getElementById("sts_keluarga").value = $(this).attr('data-sts_keluarga');
                document.getElementById("sts_keluarga").value = $(this).attr('data-sts_keluarga');
                $('#myModal4').modal('hide');
            });
            

            $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">

<div class="col-md-6 d-flex align-items-stretch grid-margin">
<div class="row flex-grow">
                <div class="card-body">
            
                  <div class="card">
                    <div class="card-body">
                      

                    <h3 class="col-md-6">Anggota Baru</h3>
                    &nbsp; 

                    



                        <div class="form-group{{ $errors->has('kode_anggota') ? ' has-error' : '' }}">
                        
                            <label for="kode_anggota" class="col-md-7 control-label">Kode Anggota</label>
                            <div class="col-md-12">
                                <input id="kode_anggota" type="text" class="form-control" name="kode_anggota" value="{{ $kode }}" required readonly="">
                                @if ($errors->has('kode_anggota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_anggota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>

                        <div class="form-group{{ $errors->has('sts_anggota') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-5 control-label">Status Anggota    </label>
                              
                                <label>
                                    <input type="radio" name="sts_anggota" value="Jemaat">
                                    Jemaat
                                </label>   &nbsp; &nbsp; 
                                <label>
                                <input type="radio" name="sts_anggota" value="Simpatisan">
                                    Simpatisan
                                </label>   &nbsp; &nbsp; 
                                <label>
                                <input type="radio" name="sts_anggota" value="Tamu">
                                    Tamu
                                </label>
                        </div>


                        </br>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-12">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                            <div class="col-md-12">
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                            <div class="col-md-12">
                                <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                              <label for="jk" class="col-md-5 control-label">Jenis Kelamin  </label>
                              
                                <label>
                                    <input type="radio" name="jk" value="Pria" required>
                                    Pria
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="jk" value="Wanita" required>
                                Wanita
                                </label>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-12">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
                        <div class="form-group{{ $errors->has('kota') ? ' has-error' : '' }}">
                            <label for="kota" class="col-md-4 control-label">Kota</label>
                            <div class="col-md-12">
                                <input id="kota" type="text" class="form-control" name="kota" value="{{ old('kota') }}" required>
                                @if ($errors->has('kota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                            <label for="kelurahan" class="col-md-4 control-label">Kelurahan</label>
                            <div class="col-md-12">
                                <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="{{ old('kelurahan') }}" required>
                                @if ($errors->has('kelurahan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelurahan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>





            <div class="col-md-6 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                <div class="card-body">
            
                  <div class="card">
                    <div class="card-body">
                    &nbsp; 
                    </br> </br>
                        <div class="form-group{{ $errors->has('gerwil') ? ' has-error' : '' }}">
                            <label for="gerwil" class="col-md-12 control-label">Gerakan Wilayah</label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="gerwil" required="">
                            <option value=""></option>    
                            <option value="Tengah">Tengah</option>
                                <option value="Timur">Timur</option>
                                <option value="Barat">Barat</option>
                                <option value="Selatan">Selatan</option>
                                <option value="Utara">Utara</option>
                                
                            </select>
                            </div>
                        </div>
                        </br>
                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            <label for="pekerjaan" class="col-md-12 control-label">Pekerjaaan</label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="pekerjaan" required="">
                            <option value=""></option>        
                            <option value="wiraswasta">Wiraswasta</option>
                                <option value="PNS">PNS</option>
                                <option value="Guru/Dosen/Instruktur">Guru/Dosen/Instruktur</option>
                                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                
                                
                            </select>
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
                            <label for="hp" class="col-md-4 control-label">No HP</label>
                            <div class="col-md-12">
                                <input id="hp" type="number" maxlength="4" class="form-control" name="hp" value="{{ old('hp') }}" required>
                                @if ($errors->has('hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nij') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('sts_keluarga') ? ' has-error' : '' }}">
                            <label for="sts_keluarga" class="col-md-12 control-label">Silsilah Keluarga (Jika tidak ada isi - )</label>
                            <div class="col-md-12">
                                <div class="input-group"  >
                                <input id="sts_keluarga" type="text" class="form-control"     >
                                <input id="sts_keluarga" type="hidden" multiple="multiple" name="sts_keluarga" value="{{ old('sts_keluarga') }}" readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal4"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('sts_keluarga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sts_keluarga') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>

                        </br>
                        <div class="form-group">
                            <label for="email" class="col-md-12 control-label">Gambar</label>
                            <div class="col-md-6">
                                <img class="product" width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                            </div>
                        </div>
                        </br> </br>
                        <div class="col-md-12">
                       <button type="submit" class="btn btn-primary col-md-3" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger col-md-3">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                        </br>

                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>


</form>


 
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari ayah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                     <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggotas as $data)
                        <tr class="pilih_keluarga1" data-sts_keluarga="<?php echo $data->nama; ?>" data-sts_keluarga="<?php echo $data->nama; ?>" >
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->sts_anggota}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection