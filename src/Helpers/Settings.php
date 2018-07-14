<?php

namespace AbbyJanke\BackpackInstaller\Helpers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Encryption\Encrypter;

class Settings
{

    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveSettings($request)
    {
        $results = trans('installer::installer.settings_success');
        $key = config('app.key');

        $envFileData =
        'APP_NAME=\'' . $request->app_name . "'\n" .
        'APP_ENV=' . $request->environment . "\n";

        if($request->has('new_key') && $request->get('new_key') == true) {
          $key = base64_encode(Encrypter::generateKey(config('app.cipher')));
        }

        $envFileData = $envFileData.
        'APP_KEY=' . 'base64:'.$key. "\n" .
        'APP_DEBUG=' . $request->app_debug . "\n" .
        'APP_URL=' . $request->app_url . "\n\n" .

        'LOG_CHANNEL=' . $request->log_channel . "\n\n" .

        'DB_CONNECTION=' . $request->database_connection . "\n" .
        'DB_HOST=' . $request->database_hostname . "\n" .
        'DB_PORT=' . $request->database_port . "\n" .
        'DB_DATABASE=' . $request->database_name . "\n" .
        'DB_USERNAME=' . $request->database_username . "\n" .
        'DB_PASSWORD=' . $request->database_password . "\n";

        // if we define a socket for the mysql database connection lets add it in
        if($request->has('database_socket')) {
          $envFileData = $envFileData.'DB_SOCKET=' . $request->database_socket . "\n";
        }

        $envFileData = $envFileData. "\n" .
        'BROADCAST_DRIVER=' . $request->broadcast_driver . "\n" .
        'CACHE_DRIVER=' . $request->cache_driver . "\n" .
        'SESSION_DRIVER=' . $request->session_driver . "\n" .
        'QUEUE_DRIVER=' . $request->queue_driver . "\n\n" .

        'REDIS_HOST=' . $request->redis_hostname . "\n" .
        'REDIS_PASSWORD=' . $request->redis_password . "\n" .
        'REDIS_PORT=' . $request->redis_port . "\n";

        // if we define a socket for the mysql database connection lets add it in
        if($request->has('memcached_persistent_id') && !is_null($request->get('memcached_persistent_id'))) {
          $memcacheData =
          'MEMCACHED_HOST=\'' . $request->memcached_host . "'\n" .
          'MEMCACHED_PORT=\'' . $request->memcached_port . "'\n" .
          'MEMCACHED_PERSISTENT_ID=\'' . $request->memcached_persistent_id . "'\n" .
          'MEMCACHED_USERNAME=\'' . $request->memcached_username . "'\n" .
          'MEMCACHED_PASSWORD=\'' . $request->memcached_password . "'\n";
          $envFileData = $envFileData. "\n" .$memcacheData;
        }

        $envFileData = $envFileData. "\n" .
        'MAIL_DRIVER=' . $request->mail_driver . "\n" .
        'MAIL_HOST=' . $request->mail_host . "\n" .
        'MAIL_PORT=' . $request->mail_port . "\n" .
        'MAIL_USERNAME=' . $request->mail_username . "\n" .
        'MAIL_PASSWORD=' . $request->mail_password . "\n" .
        'MAIL_ENCRYPTION=' . $request->mail_encryption . "\n\n" .

        'PUSHER_APP_ID=' . $request->pusher_app_id . "\n" .
        'PUSHER_APP_KEY=' . $request->pusher_app_key . "\n" .
        'PUSHER_APP_SECRET=' . $request->pusher_app_secret . "\n" .
        'PUSHER_APP_CLUSTER=' . $request->pusher_app_cluster . "\n\n" .

        'MIX_PUSHER_APP_KEY=' . '"${PUSHER_APP_KEY}"' . "\n" .
        'MIX_PUSHER_APP_CLUSTER=' . '"${PUSHER_APP_CLUSTER}"'. "\n\n" .

        'BACKPACK_LICENSE=' . $request->backpack_license;

        try {
            file_put_contents(base_path('.env'), $envFileData);

        }
        catch(Exception $e) {
            $results = trans('installer::installer.settings_errors');
        }

        return $results;
    }

    /**
    * Before we try to save the new data lets make sure the database info is correct
    *
    * @param Request $request
    * @return boolean
    */
    public function checkDBConnection($request) {
      $connection = $request->input('database_connection');
      $settings = config("database.connections.{$connection}");

      config([
        'database' => [
          'default' => $connection,
          'connections' => [
            $connection => array_merge($settings, [
              'driver' => $connection,
              'host' => $request->input('database_hostname'),
              'port' => $request->input('database_port'),
              'database' => $request->input('database_name'),
              'username' => $request->input('database_username'),
              'password' => $request->input('database_password'),
            ]),
          ],
        ],
      ]);


      try {
        DB::connection()->getPdo();
        return true;
      } catch(Exception $e) {
        return False;
      }

    }
}
