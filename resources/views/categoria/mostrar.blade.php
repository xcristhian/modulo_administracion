@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
          
            <h1 class="is-size-1">Categorias:</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    <a href="{{route('categoria_agregar')}}" class="button is-success"> Añadir</a>
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre de categoria</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoria as $categoria)
                      
                            <tr>
                                <td>{{$contador = $contador + 1}}</td>
                                <td>{{$categoria->nombre_categoria}}</td>
                                <td>{{$categoria->created_at}}</td>
                                <td>
        
                                    <a href="{{ route('editar_categoria', $categoria->id_categoria)}}" class="button is-warning">Editar</a>
                                    <form action="{{ route('delete_categoria', $categoria->id_categoria)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Seguro quiere eliminar el producto?');" class="button is-danger">
                                        Eliminar
                                        </button>
                                    </form>
                                </td>
                                
                                
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                        @verbatim
                      
   
           
             
    
            @endverbatim
            
            <br>
        </div>
        
    </div>
    
</div>
@endsection
