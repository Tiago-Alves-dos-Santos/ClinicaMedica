<div class="sidebar-atendimento">
    <div class="full-screen">
        <i class="fa-solid fa-expand" onclick="toogleFullScreen()"></i>
    </div>
    <div class="img-cliente">
        <img src="{{asset('img/perfil_anonimo.png')}}" class="img-fluid" alt="nome cliente">
    </div>
    <div class="clock">
        <div class="title">
            <h3 class="text-center">DURAÇÃO</h3>
        </div>
        <div class="time">
            <h4>
                <span id="hour">00</span>:
                <span id="min">00</span>:
                <span id="second">00</span>
            </h4>
        </div>
    </div>
    <div class="hora-consulta">
        <div class="title">
            <h4 class="text-center">Hora da consulta</h4>
        </div>
        <div class="time">
            <h5>
                <span class="fw-bold text-success">
                    <i class="fa-solid fa-stopwatch"></i>
                </span>
                00:00:00
            </h5>
            <h5>
                <span class="fw-bold text-danger">
                    <i class="fa-solid fa-stopwatch"></i>
                </span>
                00:00:00
            </h5>
        </div>
    </div>
    <div class="data-paciente mt-3">
        <div>
            <h6>
                <span class="fw-bold">Nome:</span> <br>
                Tiago Alves dos Santos de Oliveira
            </h6>
            <h6>
                <span class="fw-bold">Data nascimento:</span> <br>
                02/02/2001
            </h6>
            <h6>
                <span class="fw-bold">Idade:</span> <br>
                21
            </h6>
        </div>
    </div>
    <div class="form-finalizar mt-3 p-3">
        <button type="button" class="btn btn-success d-block w-100">
            Finalizar Consulta
        </button>
    </div>
</div>
