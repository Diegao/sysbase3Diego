<!-- Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_id','Usuario:') !!}
    {!!
        Form::select(
            'usuario_id',
            select(\App\Models\User::class,'name','id',null)
            , null
            , ['id'=>'usuario_id','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>

<!-- Cliente Id Field -->

<div class="form-group col-sm-6">

     {!! Form::label('cliente_id', 'Cliente Id:') !!}

    {!! Form::select('cliente_id',
select(\App\Models\clientes::class,'nombres' ,'id', null),

 null, ['id'=>'cliente_id','class' => 'form-control', 'required']) !!}

</div>




<!-- Equipo Id Field -->

<div class="form-group col-sm-6">

    {!! Form::label('equipo_id', 'Equipo Id:') !!}

     {!! Form::select('equipo_id',

 select(\App\Models\Equipo::class, 'numero_serie', 'id', null),

null, ['id'=>'equipo_id','class' => 'form-control', 'required']) !!}

</div>


<!-- Problema Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('problema', 'Problema:') !!}
    {!! Form::textarea('problema', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Solucion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('solucion', 'Solucion:') !!}
    {!! Form::textarea('solucion', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Recomendaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('recomendaciones', 'Recomendaciones:') !!}
    {!! Form::textarea('recomendaciones', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Fecha Recibido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_recibido', 'Fecha Recibido:') !!}
    {!! Form::text('fecha_recibido', null, ['class' => 'form-control','id'=>'fecha_recibido']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_recibido').datepicker()
    </script>
@endpush

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    {!! Form::text('fecha_inicio', null, ['class' => 'form-control','id'=>'fecha_inicio']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_inicio').datepicker()
    </script>
@endpush

<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
    {!! Form::text('fecha_fin', null, ['class' => 'form-control','id'=>'fecha_fin']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_fin').datepicker()
    </script>
@endpush

<!-- Fecha Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
    {!! Form::text('fecha_entrega', null, ['class' => 'form-control','id'=>'fecha_entrega']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_entrega').datepicker()
    </script>
@endpush
