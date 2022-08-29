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

                            @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('success') }}</strong>
                            </div>
                            @endif
                            @if ($errors->any())

                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            <strong> {{ $error }}</strong>
                                        </div>

                                        @endforeach
                            @endif
                            <input type="hidden" value="{{ $current_role_name->id }}" name="role_id" id="role_id">

                            <div class="row">
                                @foreach ($menus as  $menu)

                                        @if ($menu->menus->menu_parent==0)


                                                        <div class="col-lg-4 mb-4">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                            <div class="custom-control custom-checkbox mb-3">
                                                                                        <input class="custom-control-input  @if ($menu->status ==2) parent_check @endif " name="{{ $menu->id }}" @if ($menu->status ==2) checked @endif
                                                                                        id="{{ $menu->id }}"  type="checkbox">
                                                                                        <label class="custom-control-label " for="{{ $menu->id }}"> {{ $menu->menus->title }}</label>
                                                                                </div>

                                                                                    @foreach ($menus as $menus_child)
                                                                                        @if ($menu->menus->id == $menus_child->menus->menu_parent)
                                                                                                <li class="list-group-item ml-5">
                                                                                                    <div class="custom-control custom-checkbox mb-3">
                                                                                                                <input class="custom-control-input " @if ($menus_child->status ==2) checked @endif
                                                                                                                id="{{ $menus_child->id }}" type="checkbox" name="{{ $menus_child->id }}">
                                                                                                                <label class="custom-control-label " for="{{ $menus_child->id }}"> {{ $menus_child->menus->title }}</label>
                                                                                                    </div>
                                                                                                </li>
                                                                                        @endif
                                                                                    @endforeach


                                                                        </li>

                                                                </ul>


                                                    </div>
                                            @endif



                                  @endforeach








                            </div>
                            <div class="row  d-flex justify-content-end">
                                <div class="col-lg-4 col-12">
                                    <a href="{{  url()->previous()  }}" type="button" class="btn btn-danger">Cancelar</a>

                                </div>
                                <div class="col-lg-4 col-12">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>

                                </div>
                            </div>


                        </form>




            </div>
          </div>
        </div>


        @include('layouts.footers.auth')

    </div>
@endsection

@push('js')

    <script  src='/assets/js/menu/menu_assign.js'></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
