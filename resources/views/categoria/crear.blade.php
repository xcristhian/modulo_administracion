@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <h1 class="is-size-1">Agregar categoria</h1>
            <hr>
            <form action="store" method="POST" role="form">
                {{csrf_field()}}
                
                <div class="columns">
                <div class="column">
                    
                    <nav class="panel">
                        <div class="panel-block">
                            <p class="control">
                                <label class="label">Nombre de categoria</label>
                                <input   class="input" type="text" name="nombre_categoria" required
                                       placeholder= "Escribir ...">
                            </p>
                        </div>
                                 <button class="button is-success" type="submit">Guardar</button>
                                 <a href="{{ route("categoria") }}">
                                    <button class="button is-warning" type="button">Atrás</button>
                                </a>
                        
               
           
        </form>
       
    </div>
</div>
@endsection
