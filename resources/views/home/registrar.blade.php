<!-- El la ruta del archivo  del layout-->
@extends('home/inicio')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card registro" style="width: 50%">
                <div class="card-body">
                    <form action="{{ route('envio.data') }}" method="post">
                        @csrf
                        <center>
                            <img src="https://www.zarla.com/images/zarla-carevet-1x1-2400x2400-20210809-ctbb9btmp84tpccp4hdr.png?crop=1:1,smart&width=250&dpr=2"
                                alt="" width="20%" height="40%"><br>
                            <h4 style="font-family: 'Abyssinica SIL', serif;">¡Tu Software de gestión de citas veterinaria favorito!</h4>
                        </center>
                        <br>
                        <h3>Registro:</h3>
                        <div class="row   align-items-center">
                            <div class="col-6">
                                <label class="col-form-label">N° identificacion</label>
                                <input type="number" class="form-control form-control-sm" name="cc"
                                    placeholder="digite numero de identidad del propietario"required>
                            </div>
                            <div class="col-6">
                                <label class="col-form-label">Nombre Mascota</label>
                                <input type="text" class="form-control form-control-sm"
                                    name="nombreMas"placeholder="digite el nombre de la mascota"required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-6">
                                <label class="col-form-label">Nombre Propietario</label>
                                <input type="text" class="form-control form-control-sm" name="nombre"
                                    placeholder="digite el nombre del propietario" required>
                            </div>
                            <div class="col-6">
                                <label class="col-form-label">Apellido Propietario</label>
                                <input type="text" class="form-control form-control-sm" name="apellido"
                                    placeholder="digite el apellido del propietario" required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-6">
                                <label class="col-form-label">fecha Cita</label>
                                <input type="datetime-local" class="form-control form-control-sm" name="fecha_cita"
                                    placeholder="......"required>
                            </div>
                        </div>
                        <center>
                            <button style="margin-top: 1rem;" type="submit"
                                class="btn btn-primary btn-sm">Registrar</button>
                        </center>
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
    </div>
@endsection
