<div class="form-group">
  <label for="broadcast_driver">Driver</label>
  <select class="form-control" id="broadcast_driver" name="broadcast_driver">
    <option value="null" @if(config('broadcasting.default') == 'null' OR is_null(config('broadcasting.default')) OR old('broadcast_driver')) selected @endif>None</option>
    <option value="log" @if(config('broadcasting.default') == 'log' OR old('broadcast_driver')) selected @endif>Log</option>
    <option value="pusher" @if(config('broadcasting.default') == 'pusher' OR old('broadcast_driver')) selected @endif>Pusher</option>
    <option value="redis" @if(config('broadcasting.default') == 'redis' OR old('broadcast_driver')) selected @endif>Redis</option>
  </select>
</div>

<div class="form-group">
  <label for="pusher_app_id">Pusher App ID</label>
  <input type="text" class="form-control" id="pusher_app_id" name="pusher_app_id" value="@if(old('pusher_app_id')){{ old('pusher_app_id') }}@else{{ config('broadcasting.connections.pusher.app_id') }}@endif">
</div>

<div class="form-group">
  <label for="pusher_app_key">Pusher Key</label>
  <input type="text" class="form-control" id="pusher_app_key" name="pusher_app_key" value="@if(old('pusher_app_key')){{ old('pusher_app_key') }}@else{{ config('broadcasting.connections.pusher.key') }}@endif">
</div>

<div class="form-group">
  <label for="pusher_app_secret">Pusher Secret</label>
  <input type="text" class="form-control" id="pusher_app_secret" name="pusher_app_secret" value="@if(old('pusher_app_secret')){{ old('pusher_app_secret') }}@else{{ config('broadcasting.connections.pusher.secret') }}@endif">
</div>

<div class="form-group">
  <label for="pusher_app_cluster">Pusher Cluster</label>
  <input type="text" class="form-control" id="pusher_app_cluster" name="pusher_app_cluster" value="@if(old('pusher_app_cluster')){{ old('pusher_app_cluster') }}@else{{ config('broadcasting.connections.pusher.options.cluster') }}@endif">
</div>

<div class="form-group">
  <label for="redis_host">Redis Server</label>
  <input type="text" class="form-control" id="redis_host" name="redis_host" value="@if(old('redis_host')){{ old('redis_host') }}@else{{ config('database.redis.default.host') }}@endif">
</div>

<div class="form-group">
  <label for="redis_port">Redis Port</label>
  <input type="text" class="form-control" id="redis_port" name="redis_port" value="@if(old('redis_port')){{ old('redis_port') }}@else{{ config('database.redis.default.port') }}@endif">
</div>

<div class="form-group">
  <label for="redis_password">Password</label>
  <input type="password" class="form-control" id="redis_password" name="redis_password">
</div>
