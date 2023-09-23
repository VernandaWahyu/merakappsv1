@extends('layouts/contentNavbarLayout')

@section('title', ' Edit - Forms')

@section('content')
{{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4> --}}

  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Edit Data Merak</h5> <small class="text-muted float-end">Form - Edit</small>
      </div>
      <div class="card-body"> 
        <form action='{{url('merak/'.$data->id)}}' method="post">
            @csrf
            @method('PUT')
            @include('sweetalert::alert')
            <div class="row mb-3">
              <label for="kode_merak" class="col-sm-2 col-form-label">Kode Merak</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control" name="kode_merak" id="kode_merak" value="{{$data->kode_merak}}"placeholder="A01234...."  aria-describedby="basic-icon-default-fullname2" />
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="warna_id" class="col-sm-2 col-form-label">Warna</label>
              <div class="col-sm-10">
                <select id="warna_id" name="warna_id"  id="warna_id" class="form-select">
                  <option disabled>Pilih Warna</option>
                  <option  hidden value="{{$data->warna_id}}">{{$data->warna->warna}}</option>
                  @foreach ($war as $item)
                  <option value="{{$item->id}}">{{$item->warna}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="generasi" class="col-sm-2 col-form-label">Generasi</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control" name="generasi" id="generasi" value="{{$data->generasi}}"placeholder="Milenial...."  aria-describedby="basic-icon-default-fullname2" />
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="J" {{$data->jenis_kelamin === 'J' ? 'checked' : '' }}>
                      <label class="form-check-label" for="generasi_ja">J</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="B" {{$data->jenis_kelamin === 'B' ? 'checked' : '' }}>
                      <label class="form-check-label" for="jenis_kelamin">B</label>
                  </div>
              </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection