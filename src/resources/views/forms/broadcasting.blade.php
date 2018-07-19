<div class="form-group">
  <label for="broadcast_driver">{{ trans('installer::installer.driver') }}</label>
  <select class="form-control" id="broadcast_driver" name="broadcast_driver">
    <option value="null" @if(config('broadcasting.default') == 'null' OR is_null(config('broadcasting.default')) OR old('broadcast_driver')) selected @endif>{{ trans('installer::installer.none') }}</option>
    <option value="log" @if(config('broadcasting.default') == 'log' OR old('broadcast_driver')) selected @endif>{{ trans('installer::installer.log') }}</option>
    <option value="pusher" @if(config('broadcasting.default') == 'pusher' OR old('broadcast_driver')) selected @endif>Pusher</option>
    <option value="redis" @if(config('broadcasting.default') == 'redis' OR old('broadcast_driver')) selected @endif>Redis</option>
  </select>
</div>

<div class="form-group">
  <label for="pusher_app_id">{{ trans('installer::installer.pusher_id') }}</label>
  <input type="text" class="form-control" id="pusher_app_id" name="pusher_app_id" value="@if(old('pusher_app_id')){{ old('pusher_app_id') }}@else{{ config('broadcasting.connections.pusher.app_id') }}@endif">
</div>

<div class="form-group">
  <label for="pusher_app_key">{{ trans('installer::installer.pusher_key') }}</label>
  <input type="text" class="form-control" id="pusher_app_key" name="pusher_app_key" value="@if(old('pusher_app_key')){{ old('pusher_app_key') }}@else{{ config('broadcasting.connections.pusher.key') }}@endif">
</div>

<div class="form-group">
  <label for="pusher_app_secret">{{ trans('installer::installer.pusher_secret') }}</label>
  <input type="text" class="form-control" id="pusher_app_secret" name="pusher_app_secret" value="@if(old('pusher_app_secret')){{ old('pusher_app_secret') }}@else{{ config('broadcasting.connections.pusher.secret') }}@endif">
</div>

<div class="form-group">
  <label for="pusher_app_cluster">{{ trans('installer::installer.pusher_cluster') }}</label>
  <input type="text" class="form-control" id="pusher_app_cluster" name="pusher_app_cluster" value="@if(old('pusher_app_cluster')){{ old('pusher_app_cluster') }}@else{{ config('broadcasting.connections.pusher.options.cluster') }}@endif">
</div>

<div class="form-group">
  <label for="redis_host">{{ trans('installer::installer.redis_server') }}</label>
  <input type="text" class="form-control" id="redis_host" name="redis_host" value="@if(old('redis_host')){{ old('redis_host') }}@else{{ config('database.redis.default.host') }}@endif">
</div>

<div class="form-group">
  <label for="redis_port">{{ trans('installer::installer.redis_port') }}</label>
  <input type="text" class="form-control" id="redis_port" name="redis_port" value="@if(old('redis_port')){{ old('redis_port') }}@else{{ config('database.redis.default.port') }}@endif">
</div>

<div class="form-group">
  <label for="redis_password">{{ trans('installer::installer.redis_password') }}</label>
  <input type="password" class="form-control" id="redis_password" name="redis_password">
</div>
