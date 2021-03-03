@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('anggota.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Anggota</h4>
                      
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
                              <label for="gerwil" class="col-md-2 control-label">Gereja Wilayah    :</label>
                              
                                <label>
                                    <input type="radio" name="gerwil" value="Tengah" required>
                                    Tengah
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="gerwil" value="Timur" required>
                                    Timur
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="gerwil" value="Barat" required>
                                    Barat
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="gerwil" value="Selatan" required>
                                    Selatan
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="gerwil" value="Utara" required>
                                    Utara
                                </label>
                        </div>


                        
                        <div class="form-group{{ $errors->has('sts_anggota') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-2 control-label">Status Anggota    </label>
                              
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

                      
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Ubah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection