@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

                        <div class="col-lg-2">
                        <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Anggota</a>
                        </div>
                        </br> </br>
                 
                  <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">


            <div class="col-md-4 col-sm-4 col-xs-4">
             <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jemaat</p>
                      <div class="fluid-container">
                      <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Jemaat')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
             <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Simpatisan</p>
                      <div class="fluid-container">
                      <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Simpatisan')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
             <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tamu</p>
                      <div class="fluid-container">
                      <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Tamu')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh Tamu
                  </p>
                </div>
              </div>
            </div>


<div class="col-lg-12 grid-margin stretch-card"  style="margin-top: 20px;">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Anggota</h4>

                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                        <th>
                            No Anggota
                          </th>
                          <th>
                            Nama
                          </th>
                          <th>
                            JK
                          </th>
                         
                         
                          <th>
                            Gerwil
                          </th>
                          
                          <th>
                            Status Keanggotaan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($anggota as $data)
                        <tr>
                        <td>
                          <a href="{{route('anggota.show', $data->id)}}"> 
                            {{$data->kode_anggota}}
                          </a>
                          </td>
                          <td class="py-1">
                         
                            {{$data->nama}}
                          </td>

                          <td>
                            {{$data->jk}}
                          </td>
     
                          <td>
                            {{$data->gerwil}}
                          </td>

                          <td>
                            {{$data->sts_anggota}}
                          </td>
                          


                          @if(Auth::user()->level == 'admin')
                          <td>    

                  @if($data->id != 1)
                  <div class="text-center">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#edit_user_{{ $data->id }}">
                      <i class="fa fa-cog"></i>
                    </button>

                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_user_{{ $data->id }}">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                  @endif

                  <form action="{{ route('anggota.edit', $data->id) }}" method="post">
                    <div class="modal fade" id="edit_user_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Anggota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                          {{ csrf_field() }}
                          {{ method_field('put') }}

                          <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Anggota</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('sts_klrg') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-2 control-label">Status Keluarga    </label>
                              
                                <label>
                                
                                    <input type="radio" name="sts_klrg" value="Suami">
                                    Suami
                                </label>   &nbsp; &nbsp; 
                                <label>
                                <input type="radio" name="sts_klrg" value="Istri">
                                    Istri
                                </label>   &nbsp; &nbsp; 
                                <label> 
                                <input type="radio" name="sts_klrg" value="Anak">
                                    Anak
                                </label>  &nbsp;&nbsp;
                                <label>
                                <input type="radio" name="sts_klrg" value="Lainnya">
                                    Lainnya
                                </label>
                        </div>

                          <div class="form-group{{ $errors->has('pernikahan') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-2 control-label">Status </label>
                              
                                <label>
                                    <input type="radio" name="pernikahan" value="Belum Menikah">
                                    Belum Menikah
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pernikahan" value="Menikah">
                                    Menikah
                                </label>  &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pernikahan" value="Janda">
                                    Janda
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pernikahan" value="Duda">
                                    Duda
                                </label>
                        </div>
                         
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gerwil') ? ' has-error' : '' }}">
                            <label for="gerwil" class="col-md-4 control-label">Gerakan Wilayah</label>
                            <div class="col-md-6">
                            
                            <select class="form-control" name="gerwil" required="">
                                <option value="Tengah">Tengah</option>
                                <option value="Timur">Timur</option>
                                <option value="Barat">Barat</option>
                                <option value="Selatan">Selatan</option>
                                <option value="Utara">Utara</option>
                                
                            </select>
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('sts_anggota') ? ' has-error' : '' }}">
                            <label for="sts_anggota" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="sts_anggota" required="">
                                <option value="Jemaat">Jemaat</option>
                                <option value="Simpatisan">Simpatisan</option>
                                <option value="Tamu">Tamu</option>
                            </select>
                            </div>
                        </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Simpan</button>
                          </div>


                        </div>
                      </div>
                    </div>
                  </form>

                  <!-- modal hapus -->

                  
                  <form method="POST" action="{{ route('anggota.destroy', $data->id) }}">
                    <div class="modal fade" id="hapus_user_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <p>Yakin ingin menghapus data ini ?</p>

                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Ya, Hapus</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>


                </td>

              @endif


                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection