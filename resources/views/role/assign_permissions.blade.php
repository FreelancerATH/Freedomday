@extends('layouts.app')

@section('content')
    @include('layouts.navbars.navs.header')

    <div class="container-fluid mt--6">



        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->

              <div class="card-header border-0">
                <h2 class="mb-0">Asignar permisos al rol:

                  <span class="badge badge-default pt-3 pb-3 font-weight-700"> {{ $current_role_name->name }}</span>
              </div>


                        <form class="m-5"  action="{{route('role_assign_permission')}}"  method="POST">
                            @csrf

                            @foreach ($menus as  $menu)
                                <div class="custom-control custom-checkbox mb-3">
                                <input class="custom-control-input" @if ($menu->status ==2) checked @endif
                                 id="{{ $menu->id }}" type="checkbox">
                                <label class="custom-control-label" for="{{ $menu->id }}"> {{ $menu->menus->title }}</label>
                              </div>


                            @endforeach


                        </form>




            </div>
          </div>
        </div>


        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
