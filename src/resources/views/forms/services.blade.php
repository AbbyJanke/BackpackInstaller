<div class="form-group">
  <label for="cache_driver">Cache Driver</label>
  <select class="form-control" id="cache_driver" name="cache_driver">
    <option value="apc" @if(config('cache.default') == 'apc') selected @endif>APC</option>
    <option value="array" @if(config('cache.default') == 'array') selected @endif>Array</option>
    <option value="database" @if(config('cache.default') == 'database') selected @endif>Database</option>
    <option value="file" @if(config('cache.default') == 'file') selected @endif>File</option>
    <option value="memcached" @if(config('cache.default') == 'memcached') selected @endif>Memcached</option>
    <option value="redis" @if(config('cache.default') == 'redis') selected @endif>Redis</option>
  </select>
</div>

<div id="memcachedFields" class="hidden">

  <div class="form-group">
    <label for="memcached_host">Memcached Host</label>
    <input type="text" class="form-control" id="memcached_host" name="memcached_host" placeholder="127.0.0.1">
  </div>

  <div class="form-group">
    <label for="memcached_port">Memcached Port</label>
    <input type="text" class="form-control" id="memcached_port" name="memcached_port" placeholder="11211">
  </div>

  <div class="form-group">
    <label for="memcached_persistent_id">Memcached Persistent ID</label>
    <input type="text" class="form-control" id="memcached_persistent_id" name="memcached_persistent_id" placeholder="">
  </div>

  <div class="form-group">
    <label for="memcached_username">Memcached Username</label>
    <input type="text" class="form-control" id="memcached_username" name="memcached_username" placeholder="">
  </div>

  <div class="form-group">
    <label for="memcached_password">Memcached Password</label>
    <input type="text" class="form-control" id="memcached_password" name="memcached_password" placeholder="">
  </div>
</div>

<div id="redisInformation" class="hidden">
  <i><span class="fas fa-exclamation-triangle"></span> Be sure to enter your Redis server information on the "Broadcasting" tab.</i>
</div>

<div class="form-group">
  <label for="session_driver">Session Driver</label>
  <select class="form-control" id="session_driver" name="session_driver">
    <option value="apc" @if(config('session.driver') == 'apc') selected @endif>APC</option>
    <option value="array" @if(config('session.driver') == 'array') selected @endif>Array</option>
    <option value="database" @if(config('session.driver') == 'database') selected @endif>Database</option>
    <option value="file" @if(config('session.driver') == 'file') selected @endif>File</option>
    <option value="memcached" @if(config('session.driver') == 'memcached') selected @endif>Memcached</option>
    <option value="redis" @if(config('session.driver') == 'redis') selected @endif>Redis</option>
    <option value="cookie" @if(config('session.driver') == 'cookie') selected @endif>Cookie</option>
  </select>
</div>

<div class="form-group">
  <label for="session_lifetime">Session Lifetime</label>
  <input type="text" class="form-control" id="session_lifetime" name="session_lifetime" placeholder="120">
</div>

<div class="form-group">
  <label for="queue_driver">Queue Driver</label>
  <select class="form-control" id="queue_driver" name="queue_driver">
    <option value="null" @if(config('queue.default') == 'null' OR is_null(config('queue.default'))) selected @endif>None</option>
    <option value="sync" @if(config('queue.default') == 'sync') selected @endif>Sync</option>
    <option value="beanstalkd" @if(config('queue.default') == 'beanstalkd') selected @endif>Beanstalkd</option>
    <option value="database" @if(config('queue.default') == 'database') selected @endif>Database</option>
    <option value="sqs" @if(config('queue.default') == 'sqs') selected @endif>SQS</option>
    <option value="redis" @if(config('queue.default') == 'redis') selected @endif>Redis</option>
  </select>
</div>

<div class="form-group">
  <label for="mail_driver">Queue Driver</label>
  <select class="form-control" id="mail_driver" name="mail_driver">
    <option value="smtp" @if(config('mail.driver') == 'smtp') selected @endif>SMTP</option>
    <option value="sendmail" @if(config('mail.driver') == 'sendmail') selected @endif>Sendmail</option>
    <option value="mailgun" @if(config('mail.driver') == 'mailgun') selected @endif>MailGun</option>
    <option value="mandrill" @if(config('mail.driver') == 'mandrill') selected @endif>Mandrill by MailChimp</option>
    <option value="redis" @if(config('mail.driver') == 'ses') selected @endif>Amazon SES</option>
    <option value="redis" @if(config('mail.driver') == 'sparkpost') selected @endif>SparkPost</option>
    <option value="redis" @if(config('mail.driver') == 'log') selected @endif>Log</option>
    <option value="redis" @if(config('mail.driver') == 'array') selected @endif>Array</option>
  </select>
</div>

<div class="form-group">
  <label for="mail_host">Mail Server</label>
  <input type="text" class="form-control" id="mail_host" name="mail_host" placeholder="{{ config('mail.host') }}">
</div>

<div class="form-group">
  <label for="mail_port">Mail Server Port</label>
  <input type="text" class="form-control" id="mail_port" name="mail_port" placeholder="{{ config('mail.port') }}">
</div>

<div class="form-group">
  <label for="mail_username">Mail Username</label>
  <input type="text" class="form-control" id="mail_username" name="mail_username" placeholder="{{ config('mail.username') }}">
</div>

<div class="form-group">
  <label for="mail_password">Mail Password</label>
  <input type="text" class="form-control" id="mail_password" name="mail_password" placeholder="{{ config('mail.password') }}">
</div>

<div class="form-group">
  <label for="mail_encryption">Mail Encryption</label>
  <input type="text" class="form-control" id="mail_encryption" name="mail_encryption" placeholder="{{ config('mail.encryption') }}">
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
