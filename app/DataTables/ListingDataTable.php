<?php

namespace App\DataTables;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ListingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'listing.action')
            ->addColumn('category', function($query){
                return $query->category->name;
            })
            ->addColumn('location', function($query){
                return $query->location->name;
            })

            ->addColumn('status', function($query){
                if($query->status == 1){
                    return "<span class='badge badge-info'>Active</span>";
                }else {
                    return "<span class='badge badge-danger'>InActive</span>";
                }
            })

            ->addColumn('action', function($query){
                $edit = '<a href="'.route('admin.listing.edit',$query->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>';
                $delete = '<a href="'.route('admin.listing.destroy',$query->id).'" class="delete-item btn btn-sm btn-danger ml-2"><i class="fas fa-trash"></i></a>';

                $button = '<div class="btn-group dropleft">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-cog"></i>
                      </button>
                      <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-2px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="'.route('admin.listing-image-gallery.index',['id' =>$query->id ]).'">Image Gallery</a>
                        <a class="dropdown-item" href="'.route('admin.listing-video-gallery.index',['id' =>$query->id ]).'">Video Gallery</a>
                        <a class="dropdown-item" href="'.route('admin.listing-schedule.index',['id' =>$query->id ]).'">Schedule</a>
                      </div>
                    </div>';



                return $edit.$delete.$button;
            })

            ->rawColumns(['status','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Listing $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('listing-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('title'),
            Column::make('category'),
            Column::make('location'),
            Column::make('status'),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(220)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Listing_' . date('YmdHis');
    }
}
