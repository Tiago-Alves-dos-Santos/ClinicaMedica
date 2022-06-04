<div class="page-consultas-atendimento">
    {{-- The whole world belongs to you. --}}
    <ul class="nav nav-tabs nav-atendimento" id="myTab" role="tablist" style="position: fixed;top:0;z-index:50; width: 100%">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Prontuário</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Exame Físico</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Documentos</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent" style="margin-top:80px">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        PG1
      </div>

      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        PG2
      </div>

      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        PG3
      </div>

    </div>
    @push('scripts')
        <script>
            $(function(){
                //setar id na consulta no valor do component abaixo
                Livewire.emit('finalizarAtendimento.setConsultaId', "{{$consulta->id}}");
                //dados do cliente
                $("#hora_inicio").html("{{$consulta->hora_inicio}}");
                $("#cliente_nome").html("{{$consulta->cliente->nome}}");
                $("#cliente_data").html("{{date('d/m/Y',strtotime($consulta->cliente->data_nascimento))}}");
                $("#cliente_idade").html("{{$idade}}");

                cronometro.segundo = "{{$diff_time_date['segundo']}}";
                cronometro.minuto = "{{$diff_time_date['minuto']}}";
                cronometro.hora = "{{$diff_time_date['hora']}}";
                start('hour','min','second', '')
            });
        </script>
    @endpush
</div>
