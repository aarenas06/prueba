<!-- El la ruta del archivo  del layout-->
@extends('home/inicio')

@section('content')
    <div class="col">
        <center>
            <div class="card calendario" style="width: 80%; margin-top:2rem;">
                <div class="card-body text-align-center">
                    <div id='calendar'></div>
                </div>
            </div>

        </center>

        <!-- Modal -->
        <div class="modal fade" id="datos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles de la cita</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="hola">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        import axios from 'axios';
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var datos = @json($events);
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                contentHeight: 600,
                timeZone: 'America/Bogota',
                initialView: 'dayGridMonth',
                locale: 'es',
                events: @json($events),
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek'
                },

                eventClick: function(events) {
                    var evento = events.event;
                    var id = events.event.id;
                    var fecha = events.event.extendedProps.data;
                    var persona = events.event.extendedProps.persona;
                    var hora = events.event.extendedProps.hora;
                    var Mascota = events.event.title;

                    // console.log(evento.event.id);
                    $("#datos").modal("show");
                    html = '<label class="form-label"> Nombre Mascota: </label>';
                    html += '<h6> ' + Mascota + '</h6>';
                    html += '<label class="form-label"> Nombre Propietario: </label>';
                    html += '<h6> ' + persona + '</h6>';
                    html += '<label class="form-label"> Cita agendada fecha: </label>';
                    html += '<h6> ' + fecha + ' // ' + hora + ' horas</h6>';
                    $('#hola').html(html);
                }
            });
            calendar.render();
            console.log(info);
        });
    </script>
@endpush
