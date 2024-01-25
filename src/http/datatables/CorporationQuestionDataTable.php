<?php

namespace Cryocaustik\SeatHr\http\datatables;

use Cryocaustik\SeatHr\models\SeatHrCorporationQuestion;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CorporationQuestionDataTable extends DataTable
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
            ->editColumn('active', function ($row) {
                $bool = $row->active;
                return view('seat-hr::configuration.corporation_questions.partials.bool', ['bool' => $bool]);
            })
            ->editColumn('used', function ($row) {
                $bool = !is_null($row->id);
                return view('seat-hr::configuration.corporation_questions.partials.bool', ['bool' => $bool]);
            })
            ->editColumn('question_type', fn($row): string => ucwords((string)$row->question_type))
            ->addColumn('action', fn($row) => view('seat-hr::configuration.corporation_questions.partials.actions', ['row' => $row]));
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('corporationquestiondatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->buttons(
                Button::make('reload')
                    ->text('<i class="fas fa-sync"></i>')
            );
    }

    /**
     * Get query source of dataTable.
     *
     * @param SeatHrCorporationQuestion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SeatHrCorporationQuestion $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->newQuery()->questions($this->request->id);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('question_id')->title(trans('seat-hr::question.fields.id'))->searchable(false)->hidden(),
            Column::make('question_name')->title(trans('seat-hr::question.fields.question'))->name('seat_hr_questions.name'),
            Column::make('question_type')->title(trans('seat-hr::question.fields.data_type'))->searchable(false),
            Column::make('active')->title(trans('seat-hr::question.fields.active'))->searchable(false),
            Column::make('used')->title(trans('seat-hr::question.fields.used'))->searchable(false),
            Column::computed('action', trans('seat-hr::hr.actions_header'))
                ->searchable(false)
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
        return 'CorporationQuestion_' . date('YmdHis');
    }
}
