<div class="form-group">
  <label for="cache_driver">Cache Driver</label>
  <select class="form-control" id="cache_driver" name="cache_driver">
    <option value="apc" @if(config('cache.default') == 'apc' OR old('cache_driver')) selected @endif>APC</option>
    <option value="array" @if(config('cache.default') == 'array' OR old('cache_driver')) selected @endif>Array</option>
    <option value="database" @if(config('cache.default') == 'database' OR old('cache_driver')) selected @endif>Database</option>
    <option value="file" @if(config('cache.default') == 'file' OR old('cache_driver')) selected @endif>File</option>
    <option value="memcached" @if(config('cache.default') == 'memcached' OR old('cache_driver')) selected @endif>Memcached</option>
    <option value="redis" @if(config('cache.default') == 'redis' OR old('cache_driver')) selected @endif>Redis</option>
  </select>
</div>

<div id="memcachedFields" class="hidden">

  <div class="form-group">
    <label for="memcached_host">Memcached Host</label>
    <input type="text" class="form-control" id="memcached_host" name="memcached_host" value="@if(old('memcached_host')){{ old('memcached_host') }}@else{{ config('cache.stores.memcached.servers.0.host') }}@endif">
  </div>

  <div class="form-group">
    <label for="memcached_port">Memcached Port</label>
    <input type="text" class="form-control" id="memcached_port" name="memcached_port" value="@if(old('memcached_port')){{ old('memcached_port') }}@else{{ config('cache.stores.memcached.servers.0.port') }}@endif">
  </div>

  <div class="form-group">
    <label for="memcached_persistent_id">Memcached Persistent ID</label>
    <input type="text" class="form-control" id="memcached_persistent_id" name="memcached_persistent_id" value="@if(old('memcached_persistent_id')){{ old('memcached_persistent_id') }}@else{{ config('cache.stores.memcached.memcached_persistent_id') }}@endif">
  </div>

  <div class="form-group">
    <label for="memcached_username">Memcached Username</label>
    <input type="text" class="form-control" id="memcached_username" name="memcached_username" value="@if(old('memcached_username')){{ old('memcached_username') }}@else{{ config('cache.stores.memcached.sasl.0') }}@endif">
  </div>

  <div class="form-group">
    <label for="memcached_password">Memcached Password</label>
    <input type="text" class="form-control" id="memcached_password" name="memcached_password" value="@if(old('memcached_password')){{ old('memcached_password') }}@else{{ config('cache.stores.memcached.sasl.1') }}@endif">
  </div>
</div>

<div id="redisInformation" class="hidden">
  <i><span class="fas fa-exclamation-triangle"></span> Be sure to enter your Redis server information on the "Broadcasting" tab.</i>
</div>

<div class="form-group">
  <label for="session_driver">Session Driver</label>
  <select class="form-control" id="session_driver" name="session_driver">
    <option value="apc" @if(config('session.driver') == 'apc' OR old('session_driver')) selected @endif>APC</option>
    <option value="array" @if(config('session.driver') == 'array' OR old('session_driver')) selected @endif>Array</option>
    <option value="database" @if(config('session.driver') == 'database' OR old('session_driver')) selected @endif>Database</option>
    <option value="file" @if(config('session.driver') == 'file' OR old('session_driver')) selected @endif>File</option>
    <option value="memcached" @if(config('session.driver') == 'memcached' OR old('session_driver')) selected @endif>Memcached</option>
    <option value="redis" @if(config('session.driver') == 'redis' OR old('session_driver')) selected @endif>Redis</option>
    <option value="cookie" @if(config('session.driver') == 'cookie' OR old('session_driver')) selected @endif>Cookie</option>
  </select>
</div>

<div class="form-group">
  <label for="session_lifetime">Session Lifetime</label>
  <input type="text" class="form-control" id="session_lifetime" name="session_lifetime" value="@if(old('session_lifetime')){{ old('session_lifetime') }}@else{{ config('session.lifetime') }}@endif">
</div>

<div class="form-group">
  <label for="queue_driver">Queue Driver</label>
  <select class="form-control" id="queue_driver" name="queue_driver">
    <option value="null" @if(config('queue.default') == 'null' OR is_null(config('queue.default')) OR old('queue_driver')) selected @endif>None</option>
    <option value="sync" @if(config('queue.default') == 'sync' OR old('queue_driver')) selected @endif>Sync</option>
    <option value="beanstalkd" @if(config('queue.default') == 'beanstalkd' OR old('queue_driver')) selected @endif>Beanstalkd</option>
    <option value="database" @if(config('queue.default') == 'database' OR old('queue_driver')) selected @endif>Database</option>
    <option value="sqs" @if(config('queue.default') == 'sqs' OR old('queue_driver')) selected @endif>SQS</option>
    <option value="redis" @if(config('queue.default') == 'redis' OR old('queue_driver')) selected @endif>Redis</option>
  </select>
</div>

<div class="form-group">
  <label for="mail_driver">Queue Driver</label>
  <select class="form-control" id="mail_driver" name="mail_driver">
    <option value="smtp" @if(config('mail.driver') == 'smtp' OR old('mail_driver')) selected @endif>SMTP</option>
    <option value="sendmail" @if(config('mail.driver') == 'sendmail' OR old('mail_driver')) selected @endif>Sendmail</option>
    <option value="mailgun" @if(config('mail.driver') == 'mailgun' OR old('mail_driver')) selected @endif>MailGun</option>
    <option value="mandrill" @if(config('mail.driver') == 'mandrill' OR old('mail_driver')) selected @endif>Mandrill by MailChimp</option>
    <option value="redis" @if(config('mail.driver') == 'ses' OR old('mail_driver')) selected @endif>Amazon SES</option>
    <option value="redis" @if(config('mail.driver') == 'sparkpost' OR old('mail_driver')) selected @endif>SparkPost</option>
    <option value="redis" @if(config('mail.driver') == 'log' OR old('mail_driver')) selected @endif>Log</option>
    <option value="redis" @if(config('mail.driver') == 'array' OR old('mail_driver')) selected @endif>Array</option>
  </select>
</div>

<div class="form-group">
  <label for="mail_host">Mail Server</label>
  <input type="text" class="form-control" id="mail_host" name="mail_host" value="@if(old('mail_host')){{ old('mail_host') }}@else{{ config('mail.host') }}@endif">
</div>

<div class="form-group">
  <label for="mail_port">Mail Server Port</label>
  <input type="text" class="form-control" id="mail_port" name="mail_port" value="@if(old('mail_port')){{ old('mail_port') }}@else{{ config('mail.port') }}@endif">
</div>

<div class="form-group">
  <label for="mail_username">Mail Username</label>
  <input type="text" class="form-control" id="mail_username" name="mail_username" value="@if(old('mail_username')){{ old('mail_username') }}@else{{ config('mail.username') }}@endif">
</div>

<div class="form-group">
  <label for="mail_password">Mail Password</label>
  <input type="password" class="form-control" id="mail_password" name="mail_password" value="{{ config('mail.password') }}">
</div>

<div class="form-group">
  <label for="mail_encryption">Mail Encryption</label>
  <input type="text" class="form-control" id="mail_encryption" name="mail_encryption" value="@if(old('mail_encryption')){{ old('mail_encryption') }}@else{{ config('mail.encryption') }}@endif">
</div>

@push('after_scripts')
  <script>

  $("#cache_driver").change(function(element) {
    if($(this).val() == 'memcached') {
      $("#memcachedFields").removeClass('hidden');
    } else {
      $("#memcachedFields").addClass('hidden');
    }

    if($(this).val() == 'redis') {
      $("#redisInformation").removeClass('hidden');
    } else {
      $("#redisInformation").addClass('hidden');
    }
  });

  </script>
@endpush
