@extends('layouts.app')

@section('content')
    @include('layouts.navbars.navs.header')

    <div class="container-fluid mt--6">



        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->

              <div class="card-header border-0">
                <h2 class="mb-0">Actualizar información del estudiante: {{ $current_user->name }}</h2>

              </div>


                        <form class="m-5"  action="{{route('student_edit')}}"  method="POST">
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
                            <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{$current_user->id}}">
                            <label for="name">Nombre </label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{    $current_user->name  }}" placeholder="Nombre"  max="50" required oninput="uppercaseLetters(event);">
                            </div>

                            <div class="form-group">
                                <label for="first_surname">Apellido Paterno</label>
                                <input type="text" class="form-control form-control-lg" id="first_surname" name="first_surname" value="{{ $current_user->first_surname }}" placeholder="Apellido paterno"  max="50" required  oninput="uppercaseLetters(event);">
                            </div>
                            <div class="form-group">
                                <label for="second_surname">Apellido Materno</label>
                                <input type="text" class="form-control form-control-lg" id="second_surname" name="second_surname" value="{{ $current_user->second_surname }}" placeholder="Apellido Materno"  max="50"  required oninput="uppercaseLetters(event);">
                            </div>

                            <div class="form-group">
                                <label for="role_id"></label>
                                <input type="hidden" class="form-control form-control-lg" id="role_id" name="role_id" value="3" placeholder="Rol del estudiante"  max="50"  required oninput="uppercaseLetters(event);">
                            </div>

                            <div class="form-group">
                                <label for="gender">Genero</label>

                                <select class="form-control form-control-lg  " data-toggle="select2" id="gender" name="gender" >
                                    <option value="-1" selected>Seleccionar</option>
                                    <option value="H" >Masculino</option>
                                    <option value="M" >Feminino</option>
                                    <option value="N/A" >No binario</option>


                                  </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <input type="emil" class="form-control form-control-lg" id="email" name="email" value="{{ $current_user->email }}" placeholder="correo electronico "  max="50"  required oninput="uppercaseLetters(event);">
                            </div>

                            <div class="form-group">
                                <label for="career">Carrera</label>

                                <select class="form-control form-control-lg  " data-toggle="select2"  name="career" id="career" >
                                    <option value="-2" selected>Seleccionar</option>
                                    @foreach ($carrers_available as $carrer )
                                    <option value="{{ $carrer->id }}" >{{ $carrer->name }}</option>

                                    @endforeach
                                  </select>
                            </div>

                            <div class="form-group">
                                <label for="quarter">Cuatrimestre</label>

                                <select class="form-control form-control-lg  " data-toggle="select2" id="quarter" name="quarter" >
                                    <option value="-3" selected>Seleccionar</option>
                                    <option value="first" >1° Primero</option>
                                    <option value="second" >2° Segundo</option>
                                    <option value="third" >3° Tercero</option>
                                    <option value="fourth" >4° Cuarto</option>
                                    <option value="fifth" >5° Quinto</option>
                                    <option value="sixth" >6° Sexto</option>
                                    <option value="seventh" >7° Séptimo</option>
                                    <option value="eighth" >8° Octavo</option>
                                    <option value="nineth" >9° Noveno</option>
                                    <option value="tenth" >10° Décimo</option>
                                  


                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="group">Grupo</label>

                                <select class="form-control form-control-lg  " data-toggle="select2" id="group" name="group" >
                                    <option value="-4" selected>Seleccionar</option>
                                    <option value="A" >A</option>
                                    <option value="B" >B</option>
                                    <option value="C" >C</option>
                                    <option value="D" >D</option>
                                  
                                  


                                  </select>
                            </div>

                            














                            <div class="row  mt-5 d-flex justify-content-center">
                                <div class="col-lg-4 col-12">
                                    <a href="{{  url()->previous()  }}" type="button" class="btn btn-danger">Cancelar</a>

                                </div>
                                <div class="form-group row d-flex justify-content-center">
                                    <button type="submit" class="btn btn-default">Actualizar</button>

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
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
