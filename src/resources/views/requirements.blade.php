@extends('installer::layout')

@section('content')
  <div class="list-group">
    <li class="list-group-item bg-primary text-white">
      PHP <small>(minimum {{ $phpVersion['minimum'] }})</small>
      <span class="float-right">
        {{ $phpVersion['current'] }}
        <i class="far fa-{{ $phpVersion['supported'] ? 'check-circle' : 'times-circle' }}"></i>
      </span>
    </li>
    @foreach($requirements as $type => $requirement)
      @foreach($requirements[$type] as $extention => $enabled)
        <li class="list-group-item  {{ $enabled ? 'success' : 'error' }}">
          {{ $extention }}
          <i class="far fa-{{ $enabled ? 'check-circle' : 'times-circle' }} float-right"></i>
        </li>
      @endforeach
    @endforeach
  </div>
@endsection

@section('button')
  <a href="{{ route('installer.permissions') }}" class="btn btn-primary btn-sm">{{ trans('installer::installer.permissions') }} <i class="fas fa-angle-right"></i></a>
@endsection
