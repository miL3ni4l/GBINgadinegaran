@section('js')
<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })

    </script>
@stop

@extends('layouts.app')

@section('content')




<div class="row">
            <div class="col-md-12 d-flex align-items-center grid-margin " >
              <div class="row flex-grow">
                <div class="col-12 ">
                  <div class="card">
                    <div class="card-body">
                      
                      <form class="forms-sample">
                    
                      </br> <h3 class="col-md-6" ><b>{{$data->nama}}</b></h3>
                      




                      
                      <div class="form-group">
                            <label for="email" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <img class="product" width="200" height="200" @if($data->gambar) src="{{ asset('images/anggota/'.$data->gambar) }}" @endif />
                            </div>
                            
                        </div>
 
                      <div class="form-group{{ $errors->has('kode_anggota') ? ' has-error' : '' }}">
                            <label for="kode_anggota" class="col-md-4 control-label">Nomor Induk Anggota</label>
                            <div class="col-md-6">
                                <input id="kode_anggota" type="text" class="form-control" name="kode_anggota" value="{{ $data->kode_anggota }}" readonly>
                                @if ($errors->has('kode_anggota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_anggota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('sts_anggota') ? ' has-error' : '' }}">
                            <label for="sts_anggota" class="col-md-4 control-label">Status Anggota</label>
                            <div class="col-md-6">
                                <input id="sts_anggota" type="text" class="form-control" name="sts_anggota" value="{{ $data->sts_anggota }}" readonly>
                                @if ($errors->has('sts_anggota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sts_anggota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Anggota</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" readonly>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label> 
                            <div class="col-md-6">
                                <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ $data->tgl_lahir}}" readonly>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label> 
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat}}" readonly>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        
                        <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
                            <label for="hp" class="col-md-4 control-label">No HP</label> 
                            <div class="col-md-6">
                                <input id="hp" type="text" class="form-control" name="hp" value="{{ $data->hp}}" readonly>
                                @if ($errors->has('hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                      
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection