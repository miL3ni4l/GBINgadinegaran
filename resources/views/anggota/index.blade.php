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
                        <a href="{{ route('anggota.create') }}" class="btn btn-primary  btn-fw"><i class="fa fa-plus"></i> Tambah Anggota</a>
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
                            No 
                          </th>
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
                      <?php $no = 0;?>
                      @foreach($anggota as $data)
                      <?php $no++ ;?>
                        <tr>
                        <td>{{ $no }}</td>
                        <td>
                        @if($data->gambar)
                            <img src="{{url('images/user', $data->gambar)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />

                          @endif

                           
                            {{$data->kode_anggota}}
                          
                          </td>

                          <td class="py-1">
                          <a href="{{route('anggota.show', $data->id)}}"> 
                            {{$data->nama}}
                            </a>
                          </td>

                          <td>
                            {{$data->jk}}
                          </td>
     
                          <td>
                            {{$data->gerwil}}
                          </td>

                          <td>
                         
                          @if($data->sts_anggota == 'Jemaat')
                          <label class="badge badge-success">{{$data->sts_anggota}}</label>
                          @else
                          <label class="badge badge-danger">{{$data->sts_anggota}}</label>
                          @endif
                          </td>
                          
                       
                          
                          
                     
                <td>
                
                  <div class="text-center col-lg-12">
                  <a href="{{route('anggota.edit', $data->id)}}" class="btn btn-primary  btn-fw"><i class="fa fa-cog"></i> EDIT</a>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>
                  </div>

                  <!-- Modal -->
                  <form method="POST" action="{{ route('anggota.edit',['id' => $data->id]) }}">
                    <div class="modal fade" id="modalEdit_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
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

                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Tanggal</label>
                              <input type="text" class="form-control datepicker2 py-0" required="required" name="tanggal" value="{{ $data->tanggal }}" style="width: 100%">
                            </div>

                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Jenis</label>
                              <select class="form-control py-0" required="required" name="jenis" style="width: 100%">
                                <option value="">Pilih</option>
                                <option {{ ($data->jenis == "Pemasukan" ? "selected='selected'" : "") }} value="Pemasukan">Pemasukan</option>
                                <option {{ ($data->jenis == "Pengeluaran" ? "selected='selected'" : "") }} value="Pengeluaran">Pengeluaran</option>
                              </select>
                            </div>

                          

                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Nominal</label>
                              <input type="number" class="form-control py-0" required="required" name="nominal" value="{{ $data->nominal }}" style="width: 100%">
                            </div>

                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Keterangan</label>
                              <textarea class="form-control py-0" name="keterangan"  autocomplete="off" placeholder="Masukkan keterangan (Opsional) .." style="width: 100%">{{ $data->keterangan }}</textarea>
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


                  <!-- Modal -->
                  <form method="POST" action="{{ route('anggota.destroy',['id' => $data->id]) }}">
                    <div class="modal fade" id="modalDelete_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">


                          {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <p>Apakah anda yakin ingin menghapus data <b>{{$data->nama}}</b> ?</p>

                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Hapus</button>
                                                   
                            </div>

                        </div>
                      </div>
                    </div>
                  </form>

                </td>



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