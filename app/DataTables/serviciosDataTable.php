<?php

namespace App\DataTables;

use App\Models\servicios;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class serviciosDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('action', function(servicios $servicios){
                $id = $servicios->id;
                return view('servicios.datatables_actions',compact('servicios','id'));
            })
            ->editColumn('id',function (servicios $servicios){

                return $servicios->id;

            })
            ->rawColumns(['action'])

//
//
//            ->editColumn('equipo_id',function (servicios $servicios){
//
//                return $servicios->equipo->numero_serie;
//
//            })

            ->editColumn('usuario_id',function (servicios $servicios){

                return $servicios->usuario->name;

            })

            ->editColumn('cliente_id',function (servicios $servicios){

                return $servicios->cliente->nombres  . ' ' . $servicios->cliente->apeliidos ;

            })

            ->editColumn('equipo_id',function (servicios $servicios){

                return $servicios->equipo->tipo->nombre ?? 'null';



            })

            ;



    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\servicios $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(servicios $model)
    {
        return $model->newQuery()






->with(['usuario:id,name'])

 ->with(['cliente:id,nombres'])

 ->with(['equipo:id,numero_serie']);


//            ->with(['cliente:id,nombres']);



//            ->select([
//
//                'usuario_id',
////                'cliente_id',
//                'cliente_id',
//                'problema',
//                'solucion',
//                'recomendaciones',
//                'fecha_recibido',
//                'fecha_inicio',
//                'fecha_fin',
//                'fecha_entrega',
//
//
//                ]);


//        return $model->newQuery()->select($model->getTable().'.*');
//    }

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->ajax([
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data);   }"
                ])
                ->info(true)
                ->language(['url' => asset('js/SpanishDataTables.json')])
                ->responsive(true)
                ->stateSave(false)
                ->orderBy(1,'desc')
                ->dom('
                    <"row mb-2"
                    <"col-sm-12 col-md-6" B>
                    <"col-sm-12 col-md-6" f>
                    >
                    rt
                    <"row"
                    <"col-sm-6 order-2 order-sm-1" ip>
                    <"col-sm-6 order-1 order-sm-2 text-right" l>
                    >
                ')
                ->buttons(

                    Button::make('reset')
                        ->addClass('')
                        ->text('<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'),

                    Button::make('export')
                        ->extend('collection')
                        ->addClass('')
                        ->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>')
                        ->buttons([
                            Button::make('print')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline"> Imprimir</span>'),
                            Button::make('csv')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-csv"></i> <span class="d-none d-sm-inline"> Csv</span>'),
                            Button::make('pdf')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-pdf"></i> <span class="d-none d-sm-inline"> Pdf</span>'),
                            Button::make('excel')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-excel"></i> <span class="d-none d-sm-inline"> Excel</span>'),
                        ]),
                );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [



            'usuario_id'=>['title'=> 'Usuario', 'name' => 'usuario.name', 'data' => 'usuario.name', 'orderable' => 'false'],

            'cliente_id'=>['title'=> 'Cliente', 'name' => 'cliente.nombres', 'data' => 'cliente.nombres', 'orderable' => 'false'],

            'equipo_id'=>['title'=> 'Equipo', 'name' => 'equipo.numero_serie', 'data' => 'equipo.numero_serie', 'orderable' => 'false'],

//            'tipo_id'=>['title'=> 'numero serie', 'name' => 'equipo_id', 'data' => 'tipo_id', 'orderable' => 'false'],

            'problema',

            'solucion',

            'recomendaciones',

            'fecha_recibido',

            'fecha_inicio',

            'fecha_fin',

            'fecha_entrega'


//            Column::make('usuario.name'),
//            Column::make('cliente_id'),
//            Column::make('equipo_id'),
//            Column::make('usuario.name'),
//            Column::make('problema'),
//            Column::make('solucion'),
//            Column::make('recomendaciones'),
//            Column::make('fecha_recibido'),
//            Column::make('fecha_inicio'),
//            Column::make('fecha_fin'),
//            Column::make('fecha_entrega'),
//            Column::computed('action')
//                ->exportable(false)
//                ->printable(false)
//                ->width('20%')
//                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'servicios_datatable_' . time();
    }
}
