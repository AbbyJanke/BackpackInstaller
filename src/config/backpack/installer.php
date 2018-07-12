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

];
