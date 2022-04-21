<div class="menu-navbar">
    <div class="row">
        <div class="col-sm-3 nav-container-burger">
            <div class="position-burger">
                <span class="linha-burger" id="linha-1"></span>
                <span class="linha-burger" id="linha-2"></span>
                <span class="linha-burger" id="linha-3"></span>
            </div>
        </div>
        <div class="col-sm-9 conatiner-logo-opcoes">
            <div class='logo-nav'>
                <img src="{{asset('img/logo.png')}}" alt="Logo da clinica" class="img-fluid">
            </div>
            <div class="opcoes-nav">
                {{-- Notificações consultas --}}
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">unread messages</span>
                         </span>
                    </a>
                  
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                {{-- Configuraçoes   --}}
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear"></i>
                    </a>
                  
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(function(){
            $(".position-burger").on('click', function(e){
                $("#camada-sidebar").fadeIn('fast');
                $("body").css({'overflow-y':'hidden'});
                $('.sidebar-container').removeClass('animate-left-exit');
                $('.sidebar-container').addClass('animate-left-entrance');
            });
            $("#camada-sidebar").on('click', function(e){
                $("#camada-sidebar").fadeOut('fast');
                $("body").css({'overflow-y':'auto'});
                $('.sidebar-container').addClass('animate-left-exit');
                $('.sidebar-container').removeClass('animate-left-entrance');
            });
            $(".exit-sidebar-arrow").on('click', function(e){
                $("#camada-sidebar").fadeOut('fast');
                $("body").css({'overflow-y':'auto'});
                $('.sidebar-container').addClass('animate-left-exit');
                $('.sidebar-container').removeClass('animate-left-entrance');
            });
        });
    </script>
</div>
