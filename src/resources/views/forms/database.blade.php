<div class="form-group">
  <label for="db_connection">Connection Type</label>
  <select class="form-control" id="db_connection" name="db_connection">
    <option value="local" @if(config('database.default') == 'mysql') selected @endif>MySQL</option>
    <option value="testing" @if(config('database.default') == 'pgsql') selected @endif>PostgreSQL</option>
    <option value="staging" @if(config('database.default') == 'sqlite') selected @endif>SQLite</option>
    <option value="production" @if(config('database.default') == 'sqlsrv') selected @endif>SQL Server</option>
  </select>
</div>

<div class="form-group">
  <label for="db_host">Host Server</label>
  <input type="text" class="form-control" id="db_host" name="db_host" placeholder="127.0.0.1">
</div>

<div class="form-group">
  <label for="db_port">Database Port</label>
  <input type="text" class="form-control" id="db_port" name="db_port" placeholder="3306">
</div>

<div class="form-group">
  <label for="db_database">Database Name</label>
  <input type="text" class="form-control" id="db_database" name="db_database" placeholder="homestead">
</div>

<div class="form-group">
  <label for="db_username">Username</label>
  <input type="text" class="form-control" id="db_username" name="db_username" placeholder="homestead">
</div>

<div class="form-group">
  <label for="db_password">Password</label>
  <input type="password" class="form-control" id="db_password" name="db_password" placeholder="secret">
</div>
