<div class="form-group">
  <label for="app_name">Application Name</label>
  <input type="text" class="form-control" id="app_name" name="app_name" placeholder="{{ config('app.name') }}">
</div>

<div class="form-group">
  <label for="app_url">App URL</label>
  <input type="text" class="form-control" id="app_url" name="app_url" placeholder="{{ config('app.url') }}">
</div>

<div class="form-group">
  <label for="environment">Environment</label>
  <select class="form-control" id="environment" name="environment">
    <option value="local" @if(config('app.env') == 'local') selected @endif>Local</option>
    <option value="testing" @if(config('app.env') == 'testing') selected @endif>Testing</option>
    <option value="staging" @if(config('app.env') == 'staging') selected @endif>Staging</option>
    <option value="production" @if(config('app.env') == 'production') selected @endif>Production</option>
  </select>
</div>

<div class="form-group">
  <label for="backpack_license">Backpack License <a href="https://backpackforlaravel.com/pricing" target="_blank"><i class="fas fa-question-circle"></i></a></label>
  <input type="text" class="form-control" id="backpack_license" name="backpack_license" placeholder="{{ config('backpack.base.license_code') }}">
</div>

<div class="form-group">
  <label for="app_debug">Debug Mode?</label>
  <div class="form-check">
    <label class="form-check-label" for="app_debug1">
    <input class="form-check-input" type="radio" name="app_debug" id="app_debug1" value="true" @if(config('app.debug')) checked @endif>
      True
    </label>
  </div>
  <div class="form-check">
    <label class="form-check-label" for="app_debug2">
    <input class="form-check-input" type="radio" name="app_debug" id="app_debug2" value="false" @if(!config('app.debug')) checked @endif>
      False
    </label>
  </div>
</div>

<div class="form-group">
  <label for="log_level">Log Channel <a href="https://laravel.com/docs/5.6/logging#configuration" target="_blank"><i class="fas fa-info-circle"></i></a></label>
  <select class="form-control" id="log_level" name="log_level">
    <option value="stack" @if(config('app.env') == 'stack') selected @endif>Stack</option>
    <option value="single" @if(config('app.env') == 'single') selected @endif>Single</option>
    <option value="daily" @if(config('app.env') == 'daily') selected @endif>Daily</option>
    <option value="slack" @if(config('app.env') == 'slack') selected @endif>Slack</option>
    <option value="stderr" @if(config('app.env') == 'stderr') selected @endif>Stderr</option>
    <option value="syslog" @if(config('app.env') == 'syslog') selected @endif>Syslog</option>
    <option value="errorlog" @if(config('app.env') == 'errorlog') selected @endif>Error Log</option>
  </select>
</div>
