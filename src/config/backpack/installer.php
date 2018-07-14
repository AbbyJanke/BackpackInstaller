<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Server Requirements
  |--------------------------------------------------------------------------
  |
  | Defaults to laravel requirements, but if you require other permissions
  | apply them here. We check if the extension is enabled by looping through
  | the array and run "extension_loaded" on it.
  |
  */
  'phpVersion' => '7.1.3',

  'requirements' => [
      'php' => [
          'openssl',
          'pdo',
          'mbstring',
          'tokenizer',
          'xml',
          'ctype',
          'JSON',
          'cURL',
      ],
      'apache' => [
          'mod_rewrite',
      ],
  ],

  /*
  |--------------------------------------------------------------------------
  | Folder Permissions
  |--------------------------------------------------------------------------
  |
  | Defaults to laravel folder permissions but if you require additional
  | for your custom backpack application apply them here.
  |
  */
  'permissions' => [
    'storage/framework/'     => '775',
    'storage/logs/'          => '775',
    'bootstrap/cache/'       => '775'
  ],

  /*
  |--------------------------------------------------------------------------
  | Settings Validation Rules
  |--------------------------------------------------------------------------
  |
  | Default validation rules to support base laravel and backpack however
  | you can customize them to support your own application.
  |
  | Available Rules: https://laravel.com/docs/5.6/validation#available-validation-rules
  |
  */
  'rules' => [
    'app_name'              => 'required|string',
    'environment'           => 'required',
    'app_debug'             => 'required|boolean',
    'app_url'               => 'required|url',
    'backpack_license'      => 'required_unless:environment,local|string',
    'database_connection'   => 'required',
    'database_hostname'     => 'required|string',
    'database_port'         => 'required|numeric',
    'database_name'         => 'required|string',
    'database_username'     => 'required|string',
    'database_password'     => 'required|string',
    'broadcast_driver'      => 'required',
    'cache_driver'          => 'required',
    'session_driver'        => 'required',
    'queue_driver'          => 'required',
    'redis_hostname'        => 'string',
    'redis_password'        => 'string',
    'redis_port'            => 'numeric',
    'mail_driver'           => 'required',
    'mail_host'             => 'required|string|max:50',
    'mail_port'             => 'required|string|max:50',
    'mail_username'         => 'required|string|max:50',
    'mail_password'         => 'required|string|max:50',
    'mail_encryption'       => 'required|string|max:50',
    'pusher_app_id'         => 'required_if:broadcast_driver,pusher',
    'pusher_app_key'        => 'required_if:broadcast_driver,pusher',
    'pusher_app_secret'     => 'required_if:broadcast_driver,pusher',
  ],

];
