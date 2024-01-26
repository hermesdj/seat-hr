<?php

namespace Cryocaustik\SeatHr\http\datatables;

use Cryocaustik\SeatHr\models\SeatHrApplication;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ApplicationReviewDataTable extends DataTable
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
            ->editColumn('can_reapply', fn($row) => view('seat-hr::review.partials.reapply', ['row' => $row]))
            ->editColumn('currentStatus.status.name', function ($row) {
                $status = $row->currentStatus;
                return view('seat-hr::review.partials.status', ['status' => $status]);
            })
            ->editColumn('currentStatus.assigner.name', function ($row) {
                return $row->currentStatus->assignerName;
//                return $row->currentStatus->assigner ? $row->currentStatus->assigner->name : '';
            })
            ->addColumn('action', fn($row) => view('seat-hr::review.partials.application-actions', ['row' => $row])->render());
    }

    public function query(SeatHrApplication $model)
    {
        return $model->with([
            'corporation',
            'corporation.corporation',
            'currentStatus',
            'currentStatus.status',
            'currentStatus.assigner',
            'profile',
            'profile.user',
        ])
            ->corporationView($this->id)
            ->select('seat_hr_applications.*');
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('applications-review-datatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            ['data' => 'id', 'title' => trans('seat-hr::user.applications.application.columns.app_id')],
            ['data' => 'profile.user.name', 'title' => trans('seat-hr::user.applications.application.columns.profile')],
            ['data' => 'corporation.corporation.name', 'title' => trans('seat-hr::user.applications.columns.corporation'), 'sortable' => false],
            ['data' => 'currentStatus.status.name', 'title' => trans('seat-hr::user.applications.application.columns.status'), 'sortable' => false],
            ['data' => 'currentStatus.assigner.name', 'title' => trans('seat-hr::user.applications.application.columns.status_by')],
            ['data' => 'can_reapply', 'title' => trans('seat-hr::user.applications.application.columns.can_reapply')],
            ['data' => 'created_at', 'title' => trans('seat-hr::user.applications.columns.submitted_at')],
            Column::computed('action', trans('seat-hr::hr.actions_header'))
                ->exportable(false)
                ->printable(false)
                ->sortable(false)
                ->searchable(false)
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
        return 'Application_' . date('YmdHis');
    }
}
