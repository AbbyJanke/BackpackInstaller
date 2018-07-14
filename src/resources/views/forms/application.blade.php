<div class="form-group">
  <label for="app_name">Application Name</label>
  <input type="text" class="form-control" id="app_name" name="app_name" value="@if(old('app_name')){{ old('app_name') }}@else{{ config('app.name') }}@endif">

  @if ($errors->has('app_name'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('app_name') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group">
  <label for="app_url">App URL</label>
  <input type="text" class="form-control" id="app_url" name="app_url" value="@if(old('app_url')){{ old('app_url') }}@else{{ config('app.url') }}@endif">

  @if ($errors->has('app_url'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('app_url') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group">
  <label for="new_key">Generate New Encryption Key?</label>
  <div class="form-check">
    <label class="form-check-label" for="new_key1">
    <input class="form-check-input" type="radio" name="new_key" id="new_key1" value="true" @if(old('new_key')) checked @endif>
      True
    </label>
  </div>
  <div class="form-check">
    <label class="form-check-label" for="new_key2">
    <input class="form-check-input" type="radio" name="new_key" id="new_key2" value="false" @if(!old('new_key')) checked @endif>
      False
    </label>
  </div>

  @if ($errors->has('app_debug'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('app_debug') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group">
  <label for="environment">Environment</label>
  <select class="form-control" id="environment" name="environment">
    <option value="local" @if(config('app.env') == 'local' OR old('environment') == 'local') selected @endif>Local</option>
    <option value="testing" @if(config('app.env') == 'testing' OR old('environment') == 'testing') selected @endif>Testing</option>
    <option value="staging" @if(config('app.env') == 'staging' OR old('environment') == 'staging') selected @endif>Staging</option>
    <option value="production" @if(config('app.env') == 'production' OR old('environment') == 'production') selected @endif>Production</option>
  </select>

  @if ($errors->has('environment'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('environment') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group">
  <label for="backpack_license">Backpack License <a href="https://backpackforlaravel.com/pricing" target="_blank"><i class="fas fa-question-circle"></i></a></label>
  <input type="text" class="form-control" id="backpack_license" name="backpack_license" @if(old('backpack_license')){{ old('backpack_license') }}@else{{ config('backpack.base.license_code') }}@endif>

  @if ($errors->has('backpack_license'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('backpack_license') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group">
  <label for="app_debug">Debug Mode?</label>
  <div class="form-check">
    <label class="form-check-label" for="app_debug1">
    <input class="form-check-input" type="radio" name="app_debug" id="app_debug1" value="true" @if(config('app.debug') OR old('app_debug')) checked @endif>
      True
    </label>
  </div>
  <div class="form-check">
    <label class="form-check-label" for="app_debug2">
    <input class="form-check-input" type="radio" name="app_debug" id="app_debug2" value="false" @if(!config('app.debug') OR old('app_debug')) checked @endif>
      False
    </label>
  </div>

  @if ($errors->has('app_debug'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('app_debug') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group">
  <label for="log_channel">Log Channel <a href="https://laravel.com/docs/5.6/logging#configuration" target="_blank"><i class="fas fa-info-circle"></i></a></label>
  <select class="form-control" id="log_channel" name="log_channel">
    <option value="stack" @if(config('app.env') == 'stack' OR old('log_channel') == 'stack') selected @endif>Stack</option>
    <option value="single" @if(config('app.env') == 'single' OR old('log_channel') == 'single') selected @endif>Single</option>
    <option value="daily" @if(config('app.env') == 'daily' OR old('log_channel') == 'daily') selected @endif>Daily</option>
    <option value="slack" @if(config('app.env') == 'slack' OR old('log_channel') == 'slack') selected @endif>Slack</option>
    <option value="stderr" @if(config('app.env') == 'stderr' OR old('log_channel') == 'stderr') selected @endif>Stderr</option>
    <option value="syslog" @if(config('app.env') == 'syslog' OR old('log_channel') == 'syslog') selected @endif>Syslog</option>
    <option value="errorlog" @if(config('app.env') == 'errorlog' OR old('log_channel') == 'errorlog') selected @endif>Error Log</option>
  </select>

  @if ($errors->has('log_channel'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('log_channel') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>
