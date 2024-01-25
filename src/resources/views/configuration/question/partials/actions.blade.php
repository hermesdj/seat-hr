<div class="btn-group btn-group-sm float-right">
    <a href="{{ route('seat-hr.config.question.edit', ['id' => $row->id]) }}" class="btn btn-sm btn-warning">
        <i class="fas fa-pencil-alt"></i>
    </a>
    <a onclick="return confirmQuestionDelete(this)"
       href="{{ route('seat-hr.config.question.delete', ['id' => $row->id]) }}"
       class="btn btn-sm btn-danger"
    >
        <i class="fas fa-trash"></i>
    </a>
</div>
<script>
    function confirmQuestionDelete(node) {
        return confirm(
            '{{trans('seat-hr::question.delete.warning')}}'
        );
    }
</script>
