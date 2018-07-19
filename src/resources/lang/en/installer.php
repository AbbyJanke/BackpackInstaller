<?php

return [

  // page titles
  'welcome' => 'Backpack Installer',
  'check_requirements' => 'Check Requirements',
  'permissions' => 'Check Permissions',
  'settings' => 'Application Settings',
  'user' => 'Create Your Account',
  'create_and_login' => 'Create user and login',
  'reload' => 'Try again',
  'perform_installation' => 'Perform Backpack Installation',
  'create_user' => 'Create Your User Account',

  // Settings Tabs
  'application' => 'Application',
  'database' => 'Database',
  'broadcasting' => 'Broadcasting',
  'services' => 'Services',

  'php_minimum' => 'PHP <small>(minimum :version)</small>',

  // Application Form
  'app_name' => 'Application Name',
  'app_url' => 'App URL',
  'new_encryption' => 'Generate A New Encryption Key?',
  'environment' => 'Environment',
  'backpack_license' => 'Backpack License',
  'debug_mode' => 'Debug Mode?',
  'log_channel' => 'Log Channel',

  // Boardcasting Form
  'driver' => 'Driver',
  'pusher_id' => 'Pusher App Id',
  'pusher_key' => 'Pusher Key',
  'pusher_secret' => 'Pusher Secret',
  'pusher_cluster' => 'Pusher App Cluster',
  'redis_server' => 'Redis Server',
  'redis_port' => 'Redis Port',
  'redis_password' => 'Redis Password',

  // Database Form
  'db_connection_type' => 'Connection Type',
  'db_server' => 'Datbase Server',
  'db_port' => 'Database Port',
  'db_name' => 'Database Name',
  'db_username' => 'Username',
  'db_password' => 'Password',
  'db_socket' => 'Socket',

  // Services Form
  'cache_driver' => 'Cache Driver',
  'memcached_host' => 'Memcached Host',
  'memcached_port' => 'Memcached Port',
  'memcached_persistent_id' => 'Memcached Persistent Id',
  'memcached_username' => 'Memcached Username',
  'memcached_password' => 'Memcached Password',
  'redis_warning' => 'Be sure to enter your Redis server information on the "Broadcasting" tab.',
  'session_driver' => 'Session Driver',
  'session_lifetime' => 'Session Lifetime',
  'queue_driver' => 'Queue Driver',
  'mail_driver' => 'Mail Driver',
  'mail_server' => 'Mail Server',
  'mail_port' => 'Mail Server Port',
  'mail_username' => 'Mail Username',
  'mail_password' => 'Mail Password',
  'mail_encrypt' => 'Mail Encryption',

  // Generic Terms
  'true' => 'True',
  'false' => 'False',
  'none' => 'None',

  // Environments
  'local' => 'Local',
  'testing' => 'Testing',
  'staging' => 'Staging',
  'production' => 'Production',

  // Log Channels
  'stack' => 'Stack',
  'single' => 'Single',
  'daily' => 'Daily',
  'slack' => 'Slack',
  'stderr' => 'Stderr',
  'syslog' => 'Syslog',
  'errorlog' => 'Error Log',

  // Various Drivers (only making those that are not company names translatable)
  'array' => 'Array',
  'database' => 'Database',
  'apc' => 'APC',
  'file' => 'File',
  'log' => 'Log',
  'cookie' => 'Cookie',
  'sync' => 'Sync',
  'log' => 'Log',

  // User Form
  'display_name' => 'Display Name',
  'email_address' => 'Email Address',
  'password' => 'Password',

  // Command Step Descriptions
  'command_base_install' => 'Step 1: Installing Backpack.',
  'command_generators' => 'Step 2: Installing generators if on local environment.',
  'command_assets' => 'Step 3: Publishing backpack configs, langs, views and AdminLTE files',
  'command_alerts' => 'Step 4: Publishing config for notifications - prologue/alerts',
  'command_migrations' => 'Step 5: Generating users table (using Laravel\'s default migrations)',
  'command_crud_install' => 'Step 6: Installing Backpack CRUD',
  'command_crud_assets' => 'Step 7: Publishing CRUD configs, langs, and assets',

  // page descriptions
  'welcome_info' => 'Install and setup wizard',
  'performing_install' => 'Your environment data was successfully saved, performing backpack installation now. This may take a few minutes.',

  // copyright
  'powered_by' => 'Powered By',
  'backpack_laravel' => 'Backpack for Laravel',

  // Alerts/Errors
  'settings_errors' => 'Whoops, something went wrong saving your data.',
  'backpack_license_required' => 'You must provide a backpack license unless you are on a local environment.',
  'pusher_required' => 'If you are using Pusher as your broadcasting service you must enter your app id and keys',
  'db_connection_failed' => 'We were unable to connect to your database, please double check your settings.',
  'successfully_installed' => 'Congratulations, Backpack has been installed and your user has been created.',
  'redirecting_to_user' => 'Installation complete, redirecting you to create a new user.',
  'error_installing' => 'Sorrying something went wrong when installing, please try again or contact support if this continues.',
];
