@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('categoriaModificada'))
            <div class="alert alert-success">
                {{ session('categoriaModificada')}}
            </div>
            @endif
            <h1 class="is-size-1">Editar categoria</h1>
            <hr>
            @foreach ($categoria as $categoria)
            <form action="{{ route('guardar_categoria', $categoria->id_categoria)}}" method="POST" role="form">
                {{csrf_field()}} @method('PATCH')
                <hr><br>
                <div class="field is-horizontal">
                 
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Nombre categoría</label>
                            <div class="control">
                                <input placeholder="El nombre del producto" name="nombre_categoria" required
                                       class="input" type="text" value="{{$categoria->nombre_categoria}}">
                            </div>
                        </div>
                </div>
                                 <button class="button is-success" type="submit">Editar</button>
                               
                                 
                                       
                        
               
           
        </form>
        @endforeach
        <a href="{{ route("categoria") }}">
            <button class="button is-warning" type="button">Atrás</button>
        </a>
    </div>
</div>
@endsection
