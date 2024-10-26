<div class="btn-group btn-group-sm float-right">
    <a href="{{ route('seat-hr.config.question.edit', ['id' => $row->id]) }}" class="btn btn-sm btn-warning">
        <i class="fas fa-pencil-alt"></i>
    </a>
    <form
        action="{{route('seat-hr.config.question.delete', ['id' => $row->id])}}"
        method="post"
        onsubmit="return confirm('{{trans('seat-hr::question.delete.warning')}}');"
    >
        @csrf
        <button
            type="submit"
            class="btn btn-sm btn-danger"
        >
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
