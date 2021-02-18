@extends('layout')
@section('content')
<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{Session::get('error')}}
    </div>
    @endif


    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Nuevo Atendedor</h3>
      </div>
      <form method="POST" action="insertaratendedor" role="form" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="rut">Seleccione Archivo </label>
            <input type="file" name="file" required>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Agregar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-lg-4"></div>
</div>
@endsection