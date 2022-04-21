<div class="myBreadcumb container-fluid p-2 shadow mb-4 bg-body rounded">

    {{-- <div class="container-fluid" style="border:1px solid blue"> --}}

        <div class="titulo-page">
            <h3>{{$titulo}}</h3>
        </div>

        <div class="navegacao">
            <div class="conatiner-ul">
                <ul>
                    @foreach ($links as $link)
                        @if(!$loop->last)
                        <li>{{$link}}/</li>
                        @else
                         <li class="actual-page">{{$link}}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

    {{-- </div> --}}
</div>
