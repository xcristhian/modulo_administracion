<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return redirect()->to("/login");
});
//-------------------------------
// Áreas
//-------------------------------


Route::group(
    [
        "middleware" => [
            "auth"
        ]
    ],
    function () {

        # API
        Route::prefix("api")
            ->group(function () {
              
             //PRUEBAS
             // CATEGORIAS
                Route::resource('categoria', "CategoriaController");
                Route::post('categoria/store', "CategoriaController@store");
                
             //
                Route::view("bienvenido/", "bienvenido")->name("bienvenido");


                //CLIENTE
                Route::get('vista_mostrar_cliente', "ClienteController@vista_mostrar_cliente")->name('vista_mostrar_cliente');
                Route::get('vista_crear_cliente', "ClienteController@vista_crear_cliente")->name('vista_crear_cliente');
                Route::get('cliente/edit_cliente/{id}', 'ClienteController@edit_cliente')->name('edit_cliente');
                Route::patch('cliente/editar_cliente/{id}', 'ClienteController@editar_cliente')->name('editar_cliente');
                Route::post('cliente', "ClienteController@guardar");

                //PROVEEDOR
                Route::get('proveedor', "ProveedorController@proveedor")->name('proveedor');
                Route::post('proveedor', "ProveedorController@guardar");
                Route::get('vista_mostrar_proveedor', "ProveedorController@vista_mostrar_proveedor")->name('vista_mostrar_proveedor');
                Route::get('vista_crear_proveedor', "ProveedorController@vista_crear_proveedor")->name('vista_crear_proveedor');
                Route::get('proveedor/edit_proveedor/{id}', 'ProveedorController@edit_proveedor')->name('edit_proveedor');
                Route::patch('proveedor/editar_proveedor/{id}', 'ProveedorController@editar_proveedor')->name('editar_proveedor');
                
                
               
                //PRODUCTO
                Route::get('producto', "ProductoController@producto")->name('producto_1');
                
                Route::get('producto/vista_crear_producto', 'ProductoController@vista_crear_producto')->name('vista_crear_producto');
                Route::get("producto/mostrar", "ProductoController@mostrar")->name("producto");
                //Guardar
                Route::post('producto/store_producto', "ProductoController@store_producto")->name('store_producto');
                
                //Eliminar
                Route::delete('producto/delete_producto/{id}', 'ProductoController@delete_producto')->name('delete_producto');
                //Editar
                Route::get('producto/edit_producto/{id}', 'ProductoController@edit_producto')->name('edit_producto');
                Route::patch('producto/edit_p/{id}', 'ProductoController@edit_p')->name('edit_p');
                

                /////////////////////////MANTENIMIENTOS
                Route::get('mantenimiento', "MantenimientoController@mantenimiento")->name('mantenimiento');
                Route::get('mantenimientos/vista_crear_mantenimiento', 'MantenimientoController@vista_crear_mantenimiento')->name('vista_crear_mantenimiento');
                Route::post('mantenimientos/crear', "MantenimientoController@crear")->name('crear_mantenimiento');
                //ESTADO
                Route::get('mantenimientos/estado_mantenimiento_vista/{id}', 'MantenimientoController@estado_mantenimiento_vista')->name('estado_mantenimiento_vista');
                Route::patch('mantenimientos/cambiar_estado_mantenimiento/{id}', 'MantenimientoController@cambiar_estado_mantenimiento')->name('cambiar_estado_mantenimiento');
                
                ///////GUIAS DE REMISION
                Route::get('guias/find_venta_guia/{id}', 'GuiasController@find_venta_guia')->name('find_venta_guia');
                Route::get('guias', "GuiasController@guias")->name('guias');
                Route::get('guias/buscar_pdf/{id}', 'GuiasController@buscar_pdf')->name('buscar_pdf');
                
                ///////////////////SERIE
                Route::get('serie', "SerieController@serie")->name('serie');
                Route::get('serie/vista_registra_serie/{id}', 'SerieController@vista_registrar_serie')->name('registrar_serie');
                Route::post('serie/crear_serie/{id}', "SerieController@crear_serie")->name('crear_serie');
                Route::get('serie/listar_serie/{id}', 'SerieController@listar_serie')->name('listar_serie');
                
                /////////////////EMPLEADO
                Route::get('empleados', "EmpleadosController@empleados")->name('empleados');
                Route::get('empleados/vista_crear_empleado', "EmpleadosController@vista_crear_empleado")->name('vista_crear_empleado');
                Route::get('empleados/edit_empleado/{id}', 'EmpleadosController@edit_empleado')->name('editar_empleado');
                Route::patch('empleados/guardar_edit/{id}', 'EmpleadosController@guardar_edit')->name('guardar_empleado');
                Route::delete('empleados/delete_empleado/{id}', 'EmpleadosController@delete_empleado')->name('delete_empleado');
                Route::post('empleados/crear_empleado', "EmpleadosController@crear_empleado")->name('crear_empleado');
                

                //////////////////CATEGORIA
                Route::get('categoria', "CategoriaController@categoria")->name('categoria');
                Route::get('categoria/show', "CategoriaController@show")->name('categoria_agregar');
                Route::get('categoria/edit_categoria/{id}', 'CategoriaController@edit_categoria')->name('editar_categoria');
                Route::patch('categoria/edit_categ/{id}', 'CategoriaController@edit_categ')->name('guardar_categoria');
                Route::delete('categoria/delete_categoria/{id}', 'CategoriaController@delete_categoria')->name('delete_categoria');
            
                Route::get('/categoria/consultar_clave', "CategoriaController@consultar_categoria");


                ///////////////VENTAS
                Route::post('ventas/guardar_venta', "VentasController@guardar_venta")->name('guardar_venta');
                Route::get('vista_mostrar_venta', "VentasController@vista_mostrar_venta")->name('vista_mostrar_venta');
                Route::get('vista_agregar_venta', "VentasController@vista_agregar_venta")->name('vista_agregar_venta');
                
                Route::get('ventas', "VentasController@ventas")->name('venta');
                Route::get('/ventas/findClient', "VentasController@findClient");
                Route::get('/ventas/findProducto', "VentasController@findProducto");
                //////////////DETALLE VENTA
                Route::get('vista_detalle_venta/{id}', "VentasController@vista_detalle_venta")->name('vista_detalle_venta');
                
                
                //////////////COMPRAS
                Route::post('compras/guardar_compra', "ComprasController@guardar_compra")->name('guardar_compra');
                Route::get('compras', "ComprasController@compras")->name('comprar');
                Route::get('vista_mostrar_compra', "ComprasController@vista_mostrar_compra")->name('vista_mostrar_compra');
                Route::get('vista_agregar_compra', "ComprasController@vista_agregar_compra")->name('vista_agregar_compra');
                
                Route::get('compras/findProveedor', "ComprasController@findProveedor");

                //////////////DETALLE COMPRA
                Route::get('vista_detalle_compra/{id}', "ComprasController@vista_detalle_compra")->name('vista_detalle_compra');
                



                
               
                

                Route::get('/pdf','PDFController@PDF')->name('descargarPDF');
                
                // Áreas
                Route::get("areas", "AreasController@mostrar");
                Route::get("areas/buscar/{busqueda}", "AreasController@buscar");
                Route::delete("area/{id}", "AreasController@eliminar");
                Route::post("areas/eliminar", "AreasController@eliminarMuchas");
                // Responsables
                Route::post("/responsable", "ResponsablesController@agregar");
                Route::get("responsables", "ResponsablesController@mostrar");
                Route::get("responsable/{id}", "ResponsablesController@porId");
                Route::get("responsables/buscar/{busqueda}", "ResponsablesController@buscar");
                Route::delete("responsable/{id}", "ResponsablesController@eliminar");
                Route::post("responsables/eliminar", "ResponsablesController@eliminarMuchos");
                Route::put("responsable/", "ResponsablesController@guardarCambios")->name("guardarCambiosDeResponsable");
                // Artículos
                Route::post("/articulo", "ArticulosController@agregar");
                Route::get("/articulos", "ArticulosController@mostrar");
                Route::get("articulo/{id}", "ArticulosController@porId");
                Route::put("articulo/", "ArticulosController@guardarCambios")->name("guardarCambiosDeResponsable");
                // Fotos de artículos
                Route::post("eliminar/foto/articulo/", "ArticulosController@eliminarFoto")->name("eliminarFotoDeArticulo");

            });


        # VISTAS
        Route::view("areas/agregar", "agregar_area")->name("formularioArea");
        Route::get("areas/editar/{id}", "AreasController@editar")->name("formularioEditarArea");
        Route::view("areas/", "areas")->name("areas");
        # Otras cosas
        Route::post("areas/agregar", "AreasController@agregar")->name("guardarArea");
        Route::put("area/", "AreasController@guardarCambios")->name("guardarCambiosDeArea");

        Route::get("foto/articulo/{nombre}", "ArticulosController@foto")->name("fotoDeArticulo");
        Route::get("descargar/foto/articulo/{nombre}", "ArticulosController@descargar")->name("descargarFotoDeArticulo");


        //-------------------------------
        // Responsables
        //-------------------------------
        Route::view("responsables/agregar", "responsables/agregar")->name("formularioAgregarResponsable");
        Route::view("responsables/", "responsables/mostrar")->name("responsables");
        Route::view("responsables/editar/{id}", "responsables/editar")->name("formularioEditarResponsable");
        //-------------------------------
        // Artículos
        //-------------------------------
        Route::view("articulos/agregar", "articulos.agregar")->name("formularioAgregarArticulo");
        Route::view("articulos/", "articulos/mostrar")->name("articulos");
        Route::view("articulos/editar/{id}", "articulos/editar")->name("formularioEditarArticulo");
        Route::get("articulos/fotos/{id}", "ArticulosController@administrarFotos")->name("administrarFotos");
        Route::get("articulos/eliminar/{id}", "ArticulosController@vistaDarDeBaja")->name("vistaDarDeBajaArticulo");
        Route::post("articulos/fotos", "ArticulosController@agregarFotos")->name("agregarFotosDeArticulo");
        Route::post("articulos/eliminar", "ArticulosController@eliminar")->name("eliminarArticulo");

        # Logout
        Route::get("logout", function () {
            Auth::logout();
            # Intentar redireccionar a una protegida, que a su vez redirecciona al login :)
            return redirect()->route("producto_1");
        })->name("logout");
    });


Auth::routes(["register" => false]);

Route::get('/home', 'HomeController@index')->name('home');
