@extends('layouts/contentNavbarLayout')

@section('title', ' Add - Forms')

@section('content')
{{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4> --}}

  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambah Data Merak</h5> <small class="text-muted float-end">Form - Input</small>
      </div>
      <div class="card-body">
        <form action='{{url('riwayat')}}' method="post">
            @csrf
            @include('sweetalert::alert')
          <div class="row mb-3">
            <label for="merak_id" class="col-sm-2 col-form-label">Kode Merak</label>
            <div class="col-sm-10">
              <select id="merak_id" name="merak_id"  id="merak_id" class="form-select">
                <option>Pilih Kode Merak</option>
                @foreach ($mer as $item)
                <option value="{{$item->id}}">{{$item->kode_merak}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="status_hidup" class="col-sm-2 col-form-label">Status Hidup</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" class="form-control" name="status_hidup" id="status_hidup" value="{{ Session::get('status_hidup') }}"placeholder="Hidup,Sakit...."  aria-describedby="basic-icon-default-fullname2" />
              </div>
            </div>
          </div>
          <div>
            <div class="row mb-3">
              <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
              <div class="col-sm-10">
                <div>
                  <textarea class="form-control"name="keterangan" id="keterangan"{{ Session::get('keterangan') }}" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div>
              <div class="row mb-3">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <div>
                    <input class="form-control" type="datetime-local" name="tanggal" id="tanggal" />
                  </div>
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
<script>
  // Mendapatkan tanggal dan waktu saat ini
  const now = new Date();

  // Mendapatkan waktu dalam format YYYY-MM-DDTHH:MM
  const year = now.getFullYear();
  const month = String(now.getMonth() + 1).padStart(2, '0');
  const day = String(now.getDate()).padStart(2, '0');
  const hours = String(now.getHours()).padStart(2, '0');
  const minutes = String(now.getMinutes()).padStart(2, '0');
  
  const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

  // Mengatur nilai input datetime-local
  document.getElementById('tanggal').value = formattedDateTime;
</script>

@endsection
