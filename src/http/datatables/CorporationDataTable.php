<?php

namespace Cryocaustik\SeatHr\http\datatables;

use Cryocaustik\SeatHr\models\SeatHrCorporation;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CorporationDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\Contracts\DataTable
     * @throws Exception
     */
    public function dataTable(mixed $query): \Yajra\DataTables\Contracts\DataTable
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('corporation_id', fn($row) => $row->corporation->name)
            ->editColumn('has_restricted_questions', function ($row) {
                $bool = $row->has_restricted_questions;
                return view('seat-hr::configuration.corporation.partials.bool', ['bool' => $bool]);
            })
            ->editColumn('accepting_applications', function ($row) {
                $bool = $row->accepting_applications;
                return view('seat-hr::configuration.corporation.partials.bool', ['bool' => $bool]);
            })
            ->addColumn('action', fn($row) => view('seat-hr::configuration.corporation.partials.actions', ['row' => $row])->render());
    }

    /**
     * Get query source of dataTable.
     *
     * @param SeatHrCorporation $model
     * @return Builder
     */
    public function query(SeatHrCorporation $model)
    {
        return $model->newQuery()->with('corporation');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
            ->setTableId('corporationdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create')
                    ->action('window.location = "' . route('seat-hr.config.corp.create') . '"')
                    ->text(trans('seat-hr::corp.create.title'))
            );
    }


    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('corporation_id')->title(trans('seat-hr::corp.fields.name')),
            Column::make('hr_head')->title(trans('seat-hr::corp.fields.hr_head')),
            Column::make('has_restricted_questions')->title(trans('seat-hr::corp.fields.has_restricted_questions')),
            Column::make('accepting_applications')->title(trans('seat-hr::corp.fields.accepting_applications')),
            Column::computed('action', trans('seat-hr::hr.actions_header'))
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Corporation_' . date('YmdHis');
    }
}
