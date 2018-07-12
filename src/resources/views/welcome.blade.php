@extends('installer::layout')

@section('content')
        <div class="card-text text-center"><p>{{ trans('installer::installer.welcome_info') }}</p>
        <a href="{{ route('installer.requirements') }}" class="btn btn-primary btn-sm">{{ trans('installer::installer.check_requirements') }} <i class="fas fa-angle-right"></i></a></div>
@endsection
