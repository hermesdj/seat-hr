<a href="{{ route('seat-hr.review.application.toggle_reapply', [
        'corporation' => $row->corporation_id,
        'application' => $row->id,
    ]) }}"
   class="btn btn-sm btn-outline-{{ $row->can_reapply ? 'success' : 'danger' }}"
   data-toggle="tooltip" data-placement="bottom" title="{{trans('seat-hr::review.reapply.toggle_reapply')}}"
>
    <i class="fas fa-{{ $row->can_reapply ? 'check' : 'times' }}"></i>
</a>
