<?php

namespace Cryocaustik\SeatHr\http\datatables;

use Cryocaustik\SeatHr\models\SeatHrQuestion;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class QuestionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     * @throws Exception
     */
    public function dataTable(mixed $query): \Yajra\DataTables\Contracts\DataTable
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('type', fn($row): string => ucwords((string)$row->type))
            ->editColumn('active', fn($row) => view('seat-hr::configuration.question.partials.active', ['row' => $row]))
            ->addColumn('action', fn($row) => view('seat-hr::configuration.question.partials.actions', ['row' => $row]));
    }

    /**
     * Get query source of dataTable.
     *
     * @param SeatHrQuestion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SeatHrQuestion $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
            ->setTableId('questiondatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->buttons(
                Button::make('create')
                    ->action('window.location = "' . route('seat-hr.config.question.create') . '"')
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
            Column::make('id')->title(trans('seat-hr::question.fields.id')),
            Column::make('name')->title(trans('seat-hr::question.fields.question')),
            Column::make('type')->title(trans('seat-hr::question.fields.data_type')),
            Column::make('active')->title(trans('seat-hr::question.fields.enabled')),
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
        return 'Question_' . date('YmdHis');
    }
}
