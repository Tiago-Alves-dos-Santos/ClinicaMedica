<div>

    {{-- Stop trying to control. --}}
    <x-title-section titulo="Calendário"/>

    <div class="row">
        <div class="col-md-2">

            <div class="card mb-3">
                <div class="card-header">
                  Buscar por médico
                </div>
                <div class="card-body">
                  <h5 class="card-title">Selecione o médico</h5>
                  {{-- <p class="card-text">Buscar consultas a partir do medico selecionado</p> --}}
                  {{-- Aq colocar componente livewire --}}
                  <select name="" id="select-medico" class="form-select">
                    <option value="0">Selecione</option>
                    @forelse ($medicos as $value)
                    <option value="{{$value->id}}">{{$value->nome}}</option>
                    @empty
                    @endforelse
                  </select>

                  <a href="{{route('view.agendamento.agendar', ['medico_id' => 0])}}" class="btn btn-blue mt-2 d-block" id="agendar-medico">
                      AGENDAR
                  </a>
                  <a href="{{route('view.agendamento.dashboard')}}" class="btn btn-blue mt-2 d-block">
                    AGENDAMENTOS
                </a>
                </div>
            </div>
            <x-card-number class="blues" titulos="Consultas" numero="45"/>
            <x-card-number class="blues" titulos="Consultas Confirmadas" numero="45"/>
            <x-card-number class="blues" titulos="Consultas canceladas" numero="45"/>
            <x-card-number class="blues" titulos="Consultas a Confirmar" numero="45"/>
            <x-card-number class="blues" titulos="Consultas a Realizadas" numero="45"/>

        </div>
        <div class="col-md-10">
            {{-- Componente livewire calendar  --}}
            <script>

                document.addEventListener('DOMContentLoaded', function() {
                  var calendarEl = document.getElementById('calendar');
                  var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        center: 'dayGridMonth,timeGridWeek,timeGridFourDay' // buttons for switching between views
                    },
                    views:{
                        timeGridFourDay: {
                        type: 'timeGrid',
                        duration: { days: 1 },
                        buttonText: 'dia'
                        }
                    },
                    navLinks: true,
                    navLinkDayClick: function(date, jsEvent) {
                        let medico_id = $("#select-medico").val();
                        let dates = date.toISOString();
                        window.location.href = "{{route('view.agendamento.agendar')}}"+"/"+medico_id+"/"+dates;
                        // console.log('coords', jsEvent.pageX, jsEvent.pageY);
                    },
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap5',
                    locale: 'pt-br',
                  });
                  calendar.render();
                });

              </script>
            <div id='calendar'></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function(){
        $("#select-medico").on('change', function(){
            let medico_id = $(this).val();
            $("#agendar-medico").attr('href', "{{route('view.agendamento.agendar')}}"+"/"+medico_id+"/")

        });
    });
</script>
@endpush
