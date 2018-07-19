<div class="form-group">
  <label for="database_connection">{{ trans('installer::installer.db_connection_type') }}</label>
  <select class="form-control" id="database_connection" name="database_connection">
    <option value="mysql" @if(config('database.default') == 'mysql' OR old('database_connection')) selected @endif>MySQL</option>
    <option value="pgsql" @if(config('database.default') == 'pgsql' OR old('database_connection')) selected @endif>PostgreSQL</option>
    <option value="sqlite" @if(config('database.default') == 'sqlite' OR old('database_connection')) selected @endif>SQLite</option>
    <option value="sqlsrv" @if(config('database.default') == 'sqlsrv' OR old('database_connection')) selected @endif>SQL Server</option>
  </select>

  @if ($errors->has('database_connection'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('database_connection') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group sqliteHidden">
  <label for="database_hostname">{{ trans('installer::installer.db_server') }}</label>
  <input type="text" class="form-control" id="database_hostname" name="database_hostname" value="@if(old('database_host')){{ old('database_host') }}@else{{ config('database.connections.mysql.host') }}@endif">

  @if ($errors->has('database_host'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('database_host') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group sqliteHidden">
  <label for="database_port">{{ trans('installer::installer.db_port') }}</label>
  <input type="text" class="form-control" id="database_port" name="database_port" value="@if(old('database_port')){{ old('database_port') }}@else{{ config('database.connections.mysql.port') }}@endif">

  @if ($errors->has('database_port'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('database_port') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group">
  <label for="database_name">{{ trans('installer::installer.db_name') }}</label>
  <input type="text" class="form-control" id="database_name" name="database_name" value="@if(old('database_name')){{ old('database_name') }}@else{{ config('database.connections.mysql.database') }}@endif">

  @if ($errors->has('database_name'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('database_name') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group sqliteHidden">
  <label for="database_username">{{ trans('installer::installer.db_username') }}</label>
  <input type="text" class="form-control" id="database_username" name="database_username" value="@if(old('database_username')){{ old('database_username') }}@else{{ config('database.connections.mysql.username') }}@endif">

  @if ($errors->has('database_username'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('database_username') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group sqliteHidden">
  <label for="database_password">{{ trans('installer::installer.db_password') }}</label>
  <input type="password" class="form-control" id="database_password" name="database_password">

  @if ($errors->has('database_password'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('database_password') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

<div class="form-group sqliteHidden mysqlOnly">
  <label for="database_username">{{ trans('installer::installer.db_socket') }}</label>
  <input type="text" class="form-control" id="database_socket" name="database_socket" value="@if(old('database_socket')){{ old('database_socket') }}@else{{ config('database.connections.mysql.unix_socket') }}@endif">

  @if ($errors->has('database_socket'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
      {{ $errors->first('database_socket') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>

@push('after_scripts')
  <script>
  $("#database_connection").change(function(element) {
    if($(this).val() == 'sqlite') {
      $(".sqliteHidden").addClass('hidden');
    } else {
      $(".sqliteHidden").removeClass('hidden');
    }

    if($(this).val() == 'mysql') {
      $("#database_port").val("3306");
      $(".mysqlOnly").removeClass('hidden');
    }

    if($(this).val() == 'pgsql') {
      $("#database_port").val("5432");
      $(".mysqlOnly").addClass('hidden');
    }

    if($(this).val() == 'sqlsrv') {
      $("#database_port").val("1433");
      $(".mysqlOnly").addClass('hidden');
    }
  });
  </script>
@endpush
