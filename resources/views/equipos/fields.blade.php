<!-- Tipo Id Field -->



{{--<div class="form-group col-sm-6" >--}}
{{--    <multiselect v-model="tipo" :options="tipos" label="nombre"></multiselect>--}}
{{--    <input type="hidden" name="tipo_id" :value="tipo ? tipo.id : null">--}}
{{--</div>--}}


    <div class="form-group col-sm-6">
        <multiselect v-model="value" :options="options"></multiselect>
    </div>


<div class="form-group col-sm-6">
    {!! Form::label('tipo_id','Tipo Equipo:') !!}
    {!!
        Form::select(
            'tipo_id',
            select(\App\Models\tipoequipo::class,'nombre','id',null)
            , null
            , ['id'=>'tipo_id','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>


<!-- Numero Serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_serie', 'Numero Serie:') !!}
    {!! Form::text('numero_serie', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Imei Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imei', 'Imei:') !!}
    {!! Form::text('imei', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>


<script>
    import Multiselect from 'vue-multiselect'

    // register globally
    Vue.component('multiselect', Multiselect)

    export default {
        // OR register locally
        components: { Multiselect },
        data () {
            return {
                value: null,
                options: ['list', 'of', 'options']
            }
        }
    }
</script>


<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>
    your styles
</style>



{{--@push('scripts')--}}
{{--    <script>--}}
{{--        const app = new Vue({--}}
{{--            el: '#root',--}}
{{--            created() {--}}

{{--            },--}}
{{--            data: {--}}
{{--                tipo: null,--}}
{{--                tipos: @json(\App\Models\tipoequipo::all() ?? [])--}}


{{--            }--}}

{{--        });--}}
{{--    </script>--}}

{{--    <script src="https://unpkg.com/vue-multiselect@2.1.6"></script>--}}
{{--    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.6/dist/vue-multiselect.min.css">--}}
{{--@endpush--}}


{{--<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>--}}
