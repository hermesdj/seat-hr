<div class="btn-group btn-group-sm float-right">
    <a href="{{ route('seat-hr.profile.blacklist.edit', ['character' => $character, 'blacklist' => $blacklist]) }}"
       class="btn btn-sm btn-warning"
       data-toggle="tooltip" data-placement="bottom" title="{{trans('seat-hr::user.blacklist.edit.sub-title')}}"
    >
        <i class="fas fa-pencil-alt"></i>
    </a>
    <a href="{{ route('seat-hr.profile.blacklist.delete', ['character' => $character, 'blacklist' => $blacklist]) }}"
       class="btn btn-sm btn-danger"
       data-toggle="tooltip" data-placement="bottom" title="{{trans('seat-hr::user.blacklist.delete.sub-title')}}"
    >
        <i class="fas fa-trash"></i>
    </a>
</div>
