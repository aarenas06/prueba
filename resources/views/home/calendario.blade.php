<!-- El la ruta del archivo  del layout-->
@extends('home/inicio')

@section('content')
    <div class="col">
        <center>
            <div class="card" style="width: 80%; margin-top:3rem;">
                <div class="card-body text-align-center">
                    <div id='calendar'></div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#datos">
                +
            </button>
        </center>

        <!-- Modal -->
        <div class="modal fade" id="datos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Holi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="hola">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'America/Bogota',
                initialView: 'dayGridMonth',
                locale: 'es',
                events: @json($events),
                headerToolbar:{
                    left:'prev,next today',
                    center:'title',
                    right:'dayGridMonth,timeGridWeek,listWeek'
                },

                eventClick: function(){
                    alert();
                    $("#datos").modal("show");
                    html = "Usted es una perra" ;
                    $('#hola').html(html);
                }
            });
            calendar.render();
            console.log(events);
        });
    </script>
@endpush
