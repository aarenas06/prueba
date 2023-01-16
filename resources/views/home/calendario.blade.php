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
        </center>
    </div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                locale: 'es',
                events:@json($events)  
            });
            calendar.render();
            console.log(events);
        });
    </script>
@endpush
