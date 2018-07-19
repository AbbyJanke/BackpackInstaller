# AbbyJanke\BackpackInstaller

## Install

1) Run in your terminal:

``` bash
composer require abbyjanke/backpack-installer
```

2) Publish necessary CSS & Image assets:

```bash
php artisan vendor:publish --provider="AbbyJanke\BackpackInstaller\InstallerServiceProvider" --tag=public
```

## Vanilla Backpack Usage

1. Proceed to yourappname/admin/install
2. Making sure you have necessary folder permissions then enter your environment data (basically editing your *.env* file).
3. Create your new user.


## Custom Usage (Additional Additional Install Commands, View Customization, &amp; Translate)

While this package is designed to work straight out of the box for installing backpack should you be creating a package using
Backpack which has additional installation steps you can easily add these new steps by publishing the config to overwrite which
Controller is used to run commands and any steps that is being installed. You can also publish the language and view files.

```bash
php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" --tag=config // Publish Configuration File
php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" --tag=views // Publish views to customize
php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" --tag=lang // Publish Language files.
```

## Security

If you discover any security related issues, please email me@abbyjanke.com instead of using the issue tracker.

## Credits

- [Abby Janke][link-author]
- [Cristian Tabacitu][link-tabacito] (For creating Backpack Admin Panel)

## License

Backpack Installer is open-sourced software licensed under the MIT license.
Backpack is free for non-commercial use and 49 EUR/project for commercial use. Please see [License File](LICENSE.md) and [backpackforlaravel.com](https://backpackforlaravel.com/#pricing) for more information.

[link-author]: http://abbyjanke.com
[link-tabacito]: http://tabacitu.ro
