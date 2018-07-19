@extends('installer::layout')

@php
$commandSteps = config('backpack.installer.steps');
$totalSteps = count($commandSteps);
$currentStep = 0;
$progressPerStep = 100/$totalSteps;
$currentProgress = 0;
@endphp

@section('content')
  <div class="card-text text-center">

    <p>{{ trans('installer::installer.performing_install') }}</p>

    <div class="progress" style="height: 25px;margin-bottom:30px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><span id="ProgressPercentage"></i></div>
    </div>

  </div>

  <ul class="list-unstyled" id="StepProgress"></ul>

@endsection

@section('loader')
  <div class="loader"></div>
@endsection

@push('after_scripts')
<script>

  @foreach($commandSteps as $name => $description)

    @php $currentStep++; @endphp

    function step_{{ $name }}() {
      $('#StepProgress').append('<li>{{ $description }}</li>');

      $.ajax({
        type: 'POST',
        url: "{{ route('installer.steps.'.$name) }}",
        dataType: 'json',
      }).done(function() {

        @php
          $currentProgress = $currentProgress + $progressPerStep;
        @endphp

        $('.progress-bar').css("width", "{{ $currentProgress }}%");
        $('#ProgressPercentage').html("{{ $currentProgress }}%");

        @if($currentStep !== $totalSteps)

          @php
            $next = next($commandSteps);
            $key = key($commandSteps);
          @endphp

          step_{{ $key }}();
        @else

          $('#StepProgress').append('<li>Installation complete, redirecting you to create a new user account.</li>');
          var url = "{{ route(config('backpack.installer.after_install_name')) }}";
          $(location).delay(4000).attr('href',url);

        @endif

      }).fail(function($response) {
        $('.progress-bar').removeClass('bg-success');
        $('.progress-bar').addClass('bg-danger');
        $('.loader').addClass('hidden');
        $('#StepProgress').append('<li class="text-danger">Sorrying something went wrong when installing, please try again or contact support if this continues.</li>');

        var data = $response.responseJSON;
        console.log(data);

      });
    }

  @endforeach

  @php reset($commandSteps); $firstStep = key($commandSteps) @endphp

  step_{{ $firstStep }}();

  function performFail() {

  }
</script>
@endpush
