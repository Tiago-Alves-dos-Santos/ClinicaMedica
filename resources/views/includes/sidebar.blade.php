@include('includes.camada')
<div class="sidebar-container">
    {{-- https://source.unsplash.com/random/286x286 --}}
    {{-- Conatiner perfil --}}
    <div class="exit-sidebar-arrow">
        <i class="fa-solid fa-arrow-left"></i>
    </div>
    <div class="container-perfil">
        <div class="position-perfil">
            <div>
                <img src="https://source.unsplash.com/random/100x100" alt="nome_perfil" class="img-fluid">
            </div>
            <div class="opcoes">
                <div>
                    <a href="" class="btn">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                </div>
                <div>
                    <a href="" class="btn">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Links sidebar --}}
    <div class="container-links">
        {{-- link catergoria --}}
        <div class="link-dpDown" id="categoria-inicio">
            <div class="link-hover">
                <div class="icone">
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="nome">
                    Inicio
                </div>
                <div class="seta">
                    <i class="fa-solid fa-caret-right"></i>
                </div>
            </div>

            {{-- SUblinks --}}
            <div class="container-sublinks">
                {{-- SubLink link  --}}
                <a href="{{route('view.home')}}">
                    <div class="link-icone">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="link-nome">
                        Principal
                    </div>
                </a>
                {{-- SubLink link  --}}
                {{-- SubLink link  --}}
                <a href="{{route('view.clientes')}}">
                    <div class="link-icone">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="link-nome">
                        Cliente
                    </div>
                </a>
                {{-- SubLink link  --}}
            </div>
            {{-- FIm SUblinks --}}
        </div>
        {{-- Fim link catergoria --}}
    </div>
    {{-- Fim Links sidebar --}}

    {{-- Funcionarios --}}

    {{-- Links sidebar --}}
    <div class="container-links">
        {{-- link catergoria --}}
        <div class="link-dpDown" id="categoria-inicio">
            <div class="link-hover">
                <div class="icone">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div class="nome">
                    Funcionários
                </div>
                <div class="seta">
                    <i class="fa-solid fa-caret-right"></i>
                </div>
            </div>

            {{-- SUblinks --}}
            <div class="container-sublinks">
                {{-- SubLink link  --}}
                <a href="{{route('view.recepcionista')}}">
                    <div class="link-icone">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="link-nome">
                        Recepcionista
                    </div>
                </a>
                {{-- SubLink link  --}}
                {{-- SubLink link  --}}
                <a href="{{route('view.medicos')}}">
                    <div class="link-icone">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="link-nome">
                        Médico
                    </div>
                </a>
                {{-- SubLink link  --}}
            </div>
            {{-- FIm SUblinks --}}
        </div>
        {{-- Fim link catergoria --}}
    </div>
    {{-- Fim Links sidebar --}}


    {{-- Links sidebar --}}
    <div class="container-links">
        {{-- link catergoria --}}
        <div class="link-dpDown" id="categoria-inicio">
            <div class="link-hover">
                <div class="icone">
                    <i class="fa-solid fa-bookmark"></i>
                </div>
                <div class="nome">
                    Geral
                </div>
                <div class="seta">
                    <i class="fa-solid fa-caret-right"></i>
                </div>
            </div>

            {{-- SUblinks --}}
            <div class="container-sublinks">
                {{-- SubLink link  --}}
                <a href="">
                    <div class="link-icone">
                        <i class="fa-duotone fa-archway"></i>
                    </div>
                    <div class="link-nome">
                        Empregados
                    </div>
                </a>
                {{-- SubLink link  --}}
                {{-- SubLink link  --}}
                <a href="{{route('view.especialidades')}}">
                    <div class="link-icone">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                    <div class="link-nome">
                        Especialidades
                    </div>
                </a>
                {{-- SubLink link  --}}
            </div>
            {{-- FIm SUblinks --}}
        </div>
        {{-- Fim link catergoria --}}
    </div>
    {{-- Fim Links sidebar --}}
</div>

<script>
    $(function(){
        $(".container-sublinks").hide();
        $(".link-dpDown").on('click', function(){
            $(this).find(".container-sublinks").slideToggle('fast');
            $(this).find('.seta i').toggleClass('rotate');
        });
    });
</script>
