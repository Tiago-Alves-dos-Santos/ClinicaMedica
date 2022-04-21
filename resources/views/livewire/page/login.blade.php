<div class="pg-login-container">
    <div class="bg-blur"></div>
    {{-- Do your work, then step back. --}}
    <div class="row">
        <div class="col-md-12 img-container">
            <img src="{{asset('img/doctor.svg')}}" alt="perfil" class="img-fluid">
        </div>
    </div>
    <div class="row mt-3">
        <form action="" class="needs-validation">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">LOGIN</label>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">********</label>
                      </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 align-self-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Lembrar de mim
                        </label>
                      </div>
                </div>
                <div class="col-md-6 d-grid gap-1">
                    <button class="btn btn-pink">
                        Entrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
