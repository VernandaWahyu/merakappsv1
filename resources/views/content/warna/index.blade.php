@extends('layouts/contentNavbarLayout')

@section('title', 'Warna - Pages')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Warna/</span> Data Warna
</h4> -->
<div class="card-header">
    <button type="button" class="btn btn-sm btn-primary" onclick="window.location ='{{ url('warna/create')}}'">
      Tambah Data
    </button>
  </div>
<!-- Striped Rows -->
@include('sweetalert::alert')
<div class="card">
  <h5 class="card-header">Data Warna</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Warna</th>
          <th>Actions</th>
        </tr>
      </thead>
    <tbody class="table-border-bottom-0">
      <?php $i = $data->firstItem()?>
      @foreach ($data as $item)
        <tr>
          <td>{{$i}}</td>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->warna}}</strong></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href={{ url('warna/'.$item->id.'/edit') }}><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <form class='d-inline' action="{{ url('warna/'.$item->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                    <a href="{{ route('warna.destroy', $item->id) }}" class="dropdown-item" data-confirm-delete="true">
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
