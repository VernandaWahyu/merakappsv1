@extends('layouts/contentNavbarLayout')

@section('title', ' Add - Forms')

@section('content')
{{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4> --}}

  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambah Data Hasil Perkawinan</h5> <small class="text-muted float-end">Form - Input</small>
      </div>
      <div class="card-body">
        <form action='{{url('hasil')}}' method="post">
            @csrf
            @include('sweetalert::alert')
          <div class="row mb-3">
            <label for="hasil" class="col-sm-2 col-form-label">Hasil Perkawinan</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" class="form-control" name="hasil" id="hasil" value="{{ Session::get('hasil') }}"placeholder="F0,F1,F2...."  aria-describedby="basic-icon-default-fullname2" />
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
