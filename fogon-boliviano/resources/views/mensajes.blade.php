@extends('layouts.base')

@section('contenido')
    <section>
        <h2>Mensajes Recibidos</h2>
        <p>Aquí puedes ver los mensajes enviados a través del formulario de contacto:</p>
        
        @if($mensajes->count() > 0)
            <ul>
                @foreach($mensajes as $mensaje)
                    <li>
                        <strong>De:</strong> {{ $mensaje->nombre }} ({{ $mensaje->correo }})<br>
                        <strong>Asunto:</strong> {{ $mensaje->asunto }}<br>
                        <strong>Mensaje:</strong><br>
                        <em>{{ $mensaje->mensaje }}</em><br>
                        <small>Recibido el: {{ $mensaje->created_at->format('d/m/Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay mensajes recibidos aún.</p>
        @endif

        <p><a href="/contacto"><- Volver a Contacto</a></p>
    </section>
@endsection
