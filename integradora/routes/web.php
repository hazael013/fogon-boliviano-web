<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\Mensaje;
use App\Models\Pedido;
use App\Models\Libro;

// RUTAS PUBLICAS
Route::get('/', function () {
    $productos = Producto::all();
    return view('inicio', ['productos' => $productos]);
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/contacto', function (Request $request) {
    Mensaje::create([
        'nombre' => $request->nombre,
        'correo' => $request->correo,
        'asunto' => $request->asunto,
        'mensaje' => $request->mensaje,
    ]);
    return redirect('/contacto')->with('success', '¡Mensaje enviado correctamente!');
});

Route::get('/pedidos/nuevo', function () {
    $productos = Producto::all();
    return view('pedidos-nuevo', ['productos' => $productos]);
});

Route::post('/pedidos/nuevo', function (Request $request) {
    Pedido::create([
        'cliente_nombre' => $request->cliente_nombre,
        'producto_id' => $request->producto_id,
        'cantidad' => $request->cantidad
    ]);
    return redirect('/ventas');
});

// SISTEMA DE LOGIN Y SEGURIDAD

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    $credenciales = [
        'email' => request()->input('email'),
        'password' => request()->input('password')
    ];

    if (Auth::attempt($credenciales)) {
        request()->session()->regenerate();
        return redirect('/panel');
    }

    return back()->with('error', 'Correo o contraseña incorrectos.');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/panel', function () {
    $productos = Producto::all();
    return view('panel', ['productos' => $productos]);
})->middleware('auth');

Route::get('/productos', function () {
    $productos = Producto::all();
    return view('productos', ['productos' => $productos]); // publico
});

Route::get('/productos/nuevo', function () {
    return view('productos-nuevo');
})->middleware('auth');

Route::post('/productos/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'El nombre no puede quedar vacío.',
        'precio.required' => 'El precio no puede quedar vacío.',
        'precio.integer' => 'El precio tiene que ser un número entero, sin letras.',
    ]);

    Producto::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio')
    ]);

    return redirect('/productos')->with('success', 'Producto agregado correctamente.');
});

Route::get('/ventas', function () {
    $pedidos = Pedido::with('producto')->get();
    return view('ventas', ['pedidos' => $pedidos]);
})->middleware('auth');

Route::get('/mensajes', function () {
    $mensajes = Mensaje::orderBy('created_at', 'desc')->get();
    return view('mensajes', ['mensajes' => $mensajes]);
})->middleware('auth');

// RUTAS EXAMEN INTEGRADORA
Route::get('/libros', function () {
    $libros = Libro::all();
    return view('libros', ['libros' => $libros]);
});

Route::get('/libros/nuevo', function () {
    return view('libros-nuevo');
});

Route::post('/libros/nuevo', function () {
    request()->validate([
        'titulo' => 'required',
        'precio' => 'required|integer',
    ], [
        'titulo.required' => 'Falta el título del libro.',
        'precio.required' => 'Falta el precio del libro.',
        'precio.integer' => 'Ese precio no es un número entero.',
    ]);

    Libro::create([
        'titulo' => request()->input('titulo'),
        'precio' => request()->input('precio')
    ]);

    return redirect('/libros');
});
