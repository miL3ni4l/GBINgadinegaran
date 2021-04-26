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
                  <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">



<div class="col-lg-12 grid-margin stretch-card"  style="margin-top: 20px;">
              <div class="card">

                <div class="card-body">
                  <h1 class="card-title"><b>DATA ANGGOTA</b></h1>

                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                        <th>
                            NO
                          </th>
                        <th>
                            NO ANGGOTA
                          </th>
                          <th>
                            NAMA
                          </th>
                          <th>
                            JK
                          </th>
                         
                         
                          <th>
                            GER-WIL
                          </th>
                          
                          <th>
                            STATUS KEANGGOTAAN
                          </th>
                          <th>
                            ACTION
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
                            <img src="{{url('images/anggota', $data->gambar)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/anggota/default.png')}}" alt="image" style="margin-right: 10px;" />

                          @endif

                           
                            {{$data->kode_anggota}}
                          
                          </td>

                          <td class="py-1">
                          <a href="{{route('anggota.show', $data->id)}}"> 
                            <b>{{$data->nama}}</b>
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
                          <label class="btn btn-success btn-sm">{{$data->sts_anggota}}</label>
                          @elseif($data->sts_anggota == 'Simpatisan')
                          <label class="btn btn-warning btn-sm">{{$data->sts_anggota}}</label>
                          @elseif($data->sts_anggota == 'Tamu')
                          <label class="btn btn-dark btn-sm">{{$data->sts_anggota}}</label>
                          @endif
                          </td>
                          
                       
                          
                          
                     
                <td>
                
                  <a href="{{route('anggota.edit', $data->id)}}" class="btn btn-secondary  btn-sm"><i class="fa fa-cog"></i> </a>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>
                  

                  
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