<!-- Nombres Field -->
<div class="col-sm-12">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{{ $clientes->nombres }}</p>
</div>

<!-- Apeliidos Field -->
<div class="col-sm-12">
    {!! Form::label('apeliidos', 'Apeliidos:') !!}
    <p>{{ $clientes->apeliidos }}</p>
</div>

<!-- Dpi Field -->
<div class="col-sm-12">
    {!! Form::label('dpi', 'Dpi:') !!}
    <p>{{ $clientes->dpi }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $clientes->telefono }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $clientes->direccion }}</p>
</div>

<!-- Correo Field -->
<div class="col-sm-12">
    {!! Form::label('correo', 'Correo:') !!}
    <p>{{ $clientes->correo }}</p>
</div>

