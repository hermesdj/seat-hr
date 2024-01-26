<div class="btn-group btn-group-sm float-right">
    <a href="{{ route('seat-hr.config.corporation-question.view', ['id' => $row->id]) }}" class="btn btn-sm btn-info"
       data-toggle="tooltip" data-placement="bottom"
       title="{{trans('seat-hr::corp.questions.edit_corporation_questions')}}"
    >
        <i class="fas fa-question-circle"></i>
    </a>
    <a href="{{ route('seat-hr.config.corp.edit', ['id' => $row->id]) }}" class="btn btn-sm btn-warning"
       data-toggle="tooltip" data-placement="bottom" title="{{trans('seat-hr::corp.edit.title')}}"
    >
        <i class="fas fa-pencil-alt"></i>
    </a>
    <a href="{{ route('seat-hr.config.corp.delete', ['id' => $row->id]) }}" class="btn btn-sm btn-danger"
       data-toggle="tooltip" data-placement="bottom" title="{{trans('seat-hr::corp.delete.title')}}"
    >
        <i class="fas fa-trash"></i>
    </a>
</div>
