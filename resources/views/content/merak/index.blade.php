@extends('layouts/contentNavbarLayout')

@section('title', 'Merak - Pages')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">merak/</span> Data merak
</h4> -->
<div class="card-header">
    <button type="button" class="btn btn-sm btn-primary" onclick="window.location ='{{ url('merak/create')}}'">
      Tambah Data
    </button>
  </div>
<!-- Striped Rows -->
@include('sweetalert::alert')
<div class="card">
  <h5 class="card-header">Data Merak</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Merak</th>
          <th>Warna</th>
          <th>Generasi</th>
          <th>Jenis Kelamin</th>
          <th>Actions</th>
        </tr>
      </thead>
    <tbody class="table-border-bottom-0">
      <?php $i = $data->firstItem()?>
      @foreach ($data as $item)
        <tr>
          <td>{{$i}}</td>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->kode_merak}}</strong></td>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->warna->warna}}</strong></td>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->generasi}}</strong></td>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->jenis_kelamin}}</strong></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href={{ url('merak/'.$item->id.'/edit') }}><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <form class='d-inline' action="{{ url('merak/'.$item->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                    <a href="{{ route('merak.destroy', $item->id) }}" class="dropdown-item" data-confirm-delete="true">
                      <i class="bx bx-trash me-1" ></i> Delete
                    </a>
              </form>              
              </div>
            </div>
          </td>
        </tr>
        <?php $i++ ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Striped Rows -->
@endsection
