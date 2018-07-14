<div class="form-group">
  <label for="broadcast_driver">Driver</label>
  <select class="form-control" id="broadcast_driver" name="broadcast_driver">
    <option value="null" @if(config('broadcasting.default') == 'null' OR is_null(config('broadcasting.default'))) selected @endif>None</option>
    <option value="log" @if(config('broadcasting.default') == 'log') selected @endif>Log</option>
    <option value="pusher" @if(config('broadcasting.default') == 'pusher') selected @endif>Pusher</option>
    <option value="redis" @if(config('broadcasting.default') == 'redis') selected @endif>Redis</option>
  </select>
</div>

<div class="form-group">
  <label for="pusher_app_id">Pusher App ID</label>
  <input type="text" class="form-control" id="pusher_app_id" name="pusher_app_id" placeholder="">
</div>

<div class="form-group">
  <label for="pusher_app_key">Pusher Key</label>
  <input type="text" class="form-control" id="pusher_app_key" name="pusher_app_key" placeholder="">
</div>

<div class="form-group">
  <label for="pusher_app_secret">Pusher Secret</label>
  <input type="text" class="form-control" id="pusher_app_secret" name="pusher_app_secret" placeholder="">
</div>

<div class="form-group">
  <label for="pusher_app_cluster">Pusher Cluster</label>
  <input type="text" class="form-control" id="pusher_app_cluster" name="pusher_app_cluster" placeholder="mt1">
</div>

<div class="form-group">
  <label for="redis_host">Redis Server</label>
  <input type="text" class="form-control" id="redis_host" name="redis_host" placeholder="127.0.0.1">
</div>

<div class="form-group">
  <label for="redis_port">Redis Port</label>
  <input type="text" class="form-control" id="redis_port" name="redis_port" placeholder="6379">
</div>

<div class="form-group">
  <label for="redis_password">Password</label>
  <input type="password" class="form-control" id="redis_password" name="redis_password" placeholder="">
</div>
