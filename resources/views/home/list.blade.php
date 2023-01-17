@extends('home/inicio')

@section('content')
    <div class="row" style="margin-top: 8rem">
      
            <div class="col">
                <div class="card listar">
                    <div class="card-body">
                        <h3 style="text-align: center;"> Tus citas Agendadas</h3>
                        <div class="table-responsive">
                            <table class="table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th scope="col">CC</th>
                                        <th scope="col">Nombre Dueño</th>
                                        <th scope="col">Apellido Dueño</th>
                                        <th scope="col">Nombre Mascota</th>
                                        <th scope="col">Fecha Cita</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datos as $d)
                                        @php
                                            $diasFaltantes = $fechaActual->diffInDays($d->fecha_cita);
                                            $horasFaltantes = $d->fecha_cita->diffInRealHours($d->hora);
                                        @endphp
                                        <tr>
                                            <td>{{ $d->cc }}</td>
                                            <td>{{ $d->nombre }}</td>
                                            <td>{{ $d->apellido }}</td>
                                            <td>{{ $d->nombreMas }}</td>
                                            <td>{{ $d->fecha_cita->format('Y-m-d') }}</td>
                                            <td>{{ $d->fecha_cita->format('H:i') }}</td>
                                            @if ($horasFaltantes > 2 || $diasFaltantes >= 0)
                                                <td><button type="button"
                                                        class="btn btn-warning btn-sm "data-bs-toggle="modal"
                                                        data-bs-target="#update{{ $d->id }}">Modificar cita</button>
                                                </td>
                                            @else
                                                <td>No es el dia</td>
                                            @endif
                                        </tr>
                                        <!-- Modal update-->
                                        <div class="modal fade" id="update{{ $d->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar cita
                                                            del cliente {{ $d->nombre . ' ' . $d->apellido }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('registrar.update', $d->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row ">
                                                                <div class="col">
                                                                    <label class="col-form-label">fecha Cita</label>
                                                                    <input type="datetime-local"
                                                                        class="form-control form-control-sm"
                                                                        name="fecha_cita" value="{{ $d->fecha_cita }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">
                                                                Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
