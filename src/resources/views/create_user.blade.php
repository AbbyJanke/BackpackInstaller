@extends('installer::layout')

@section('content')
<form method="POST" acion="{{ route('installer.create_user') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">{{ trans('installer::installer.display_name') }}</label>
    <input type="name" class="form-control" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="email">{{ trans('installer::installer.email_address') }}</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="password">{{ trans('installer::installer.password') }}</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
@endsection

@section('button')
  <input type="submit" class="btn btn-primary btn-sm" value="{{ trans('installer::installer.create_user') }}" />

</form>
@endsection
