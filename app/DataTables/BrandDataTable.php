<?php

namespace App\DataTables;

use App\Brand;
use Yajra\DataTables\Services\DataTable;
use Form;

class BrandDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables(Brand::query())
            ->addColumn('action', function($query){
                 return '<a href="'.route('brand.edit',$query->id).'" class="button is-small is-primary">Edit</a> '
                  .Form::open([
                "method" => "DELETE",
                "id"     =>"form-delete",
                "route"  => ["brand.destroy", $query->id],
                "style"  => "display:inline"
                ])
                .Form::submit('Delete',['class'=>'button is-small is-danger btn-danger js-submit-confirm']).'' ;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Brand $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Brand $model)
    {
        return $model->newQuery()->select($this->getColumns());
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
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'branddatatable_' . time();
    }
}
