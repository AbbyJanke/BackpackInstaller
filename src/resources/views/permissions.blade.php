@extends('installer::layout')

@section('content')
  <div class="list-group">

    @foreach($permissions['permissions'] as $permission)
      <li class="list-group-item">
        {{ $permission['folder'] }}
        <span class="float-right">
          <i class="far fa-{{ $permission['isSet'] ? 'check-circle' : 'times-circle' }}"></i>
          {{ $permission['permission'] }}
        </span>
      </li>
    @endforeach

  </div>
@endsection

@section('button')
  <a href="{{ route('installer.permissions') }}" class="btn btn-primary btn-sm">{{ trans('installer::installer.permissions') }} <i class="fas fa-angle-right"></i></a>
@endsection
