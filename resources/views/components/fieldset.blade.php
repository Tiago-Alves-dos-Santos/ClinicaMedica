<div class="myFieldset">
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <{{isset($h) ? $h:'h5'}} class="titulo">{{$titulo}}</{{isset($h) ? $h:'h5'}}>
    <div class="conteudo">
        {{$slot}}
    </div>
</div>
