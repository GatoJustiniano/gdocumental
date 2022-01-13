@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => 'Detalles del trabajador'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <!--Header-->
          <div class="card-header card-header-primary">
            <h4 class="card-title">Trabajadores</h4>
            <p class="card-category">Vista detallada del trabajador: {{ $trabajador->nombre }}</p>
          </div>
          <!--End header-->
          <!--Body-->
          <div class="card-body">
            <div class="row">
              <!-- first -->
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                          <img class="avatar" src="{{ asset('/img/default-avatar.png') }}" alt="">
                          <h5 class="title mt-3">Trabajador: {{ $trabajador->nombre }}</h5>
                        </a>
                        <p class="description">
                          {{ _('Ceo/Co-Founder') }} <br>
                          {{ $trabajador->codigo }} <br>
                          {{ $trabajador->cedula }} <br>
                          {{ $trabajador->nombre }} <br>
                          {{ $trabajador->direccion }} <br>
                          {{ $trabajador->created_at }}
                        </p>
                      </div>
                    </p>
                    <div class="card-description">
                      @forelse ($trabajador->departamentos as $departamento)
                          <span class="badge rounded-pill bg-dark text-white">{{ $departamento->nombre }}</span>
                      @empty
                          <span class="badge badge-danger bg-danger">Departamento sin Elegir</span>
                      @endforelse
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--end first-->
            </div>
            <!--end row-->
          </div>
          <!--End card body-->
        </div>
        <!--End card-->
      </div>
    </div>
  </div>
</div>
@endsection