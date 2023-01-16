<!-- El la ruta del archivo  del layout-->
@extends('home/inicio')

@section('content')
    <div class="row" style="margin-top: 8rem">
        <center>
            <div class="col">
                <div class="card" style="width: 50%;">
                    <div class="card-body">
                        <form action="{{ route('registrar.store') }}" method="post">
                            @csrf
                            <img src="https://www.zarla.com/images/zarla-carevet-1x1-2400x2400-20210809-ctbb9btmp84tpccp4hdr.png?crop=1:1,smart&width=250&dpr=2"
                                alt="" width="20%" height="40%">
                            <br><br>
                            <label for="">Registro</label>
                            <div class="row   align-items-center">
                                <div class="col-6">
                                    <label class="col-form-label">N° identificacion</label>
                                    <input type="number" class="form-control form-control-sm" name="cc"
                                        placeholder="......">
                                </div>
                                <div class="col-6">
                                    <label class="col-form-label">Nombre Mascota</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="nombreMas"placeholder="......">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-6">
                                    <label class="col-form-label">Nombre dueño</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre"
                                        placeholder="......">
                                </div>
                                <div class="col-6">
                                    <label class="col-form-label">Apellido dueño</label>
                                    <input type="text" class="form-control form-control-sm" name="apellido"
                                        placeholder="......">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-6">
                                    <label class="col-form-label">fecha Cita</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_cita"
                                        placeholder="......">
                                </div>
                                <div class="col-6">
                                    <label class="col-form-label">Hora</label>
                                    <input type="time" class="form-control form-control-sm" name="hora"
                                        placeholder="......">
                                </div>
                            </div>
                            <button style="margin-top: 1rem;" type="submit"
                                class="btn btn-primary btn-sm">Registrar</button>
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </center>
    </div>
@endsection
