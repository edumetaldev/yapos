@if(!empty($user->getRoleNames() && ($user->getRoleNames() != '[]') ))
  @foreach($user->getRoleNames() as $v)
     <label class="badge badge-success">{{ $v }}</label>
  @endforeach
@else
    Sin roles asignados
@endif
