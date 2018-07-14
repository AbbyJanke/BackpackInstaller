@extends('installer::layout')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="application-tab" data-toggle="tab" href="#application" role="tab" aria-controls="application" aria-selected="true">Application</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="database-tab" data-toggle="tab" href="#database" role="tab" aria-controls="database" aria-selected="false">Database</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="broadcasting-tab" data-toggle="tab" href="#broadcasting" role="tab" aria-controls="broadcasting" aria-selected="false">Broadcasting</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">Services</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <form method="post" acion="{{ route('installer.settings') }}">
    {{ csrf_field() }}
    <div class="tab-pane fade show active" id="application" role="tabpanel" aria-labelledby="application-tab">
      <div class="applicationContent">@include('installer::forms.application')</div>
    </div>
    <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="database-tab">
      <div class="databaseContent hidden">@include('installer::forms.database')</div>
    </div>
    <div class="tab-pane fade" id="broadcasting" role="tabpanel" aria-labelledby="broadcasting-tab">
      <div class="broadcastingContent hidden">@include('installer::forms.broadcasting')</div>
    </div>
    <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
      <div class="servicesContent hidden">@include('installer::forms.services')</div>
    </div>
  </form>
</div>
@endsection

@push('after_scripts')
  <script>
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var newTab = $(e.currentTarget).attr('aria-controls');
    $("."+newTab+"Content").removeClass('hidden');
    var oldTab = $(e.relatedTarget).attr('aria-controls');
    $("."+oldTab+"Content").addClass('hidden').fadeIn;
  });
  </script>
@endpush
