# Laravel Web Installer

A Laravel package that provides a web-based installer for your Laravel applications.

## Features

- Step-by-step web installer for Laravel projects
- Checks server requirements and folder permissions
- Environment configuration via web form
- Database migration and seeding
- Customizable views, assets, and translations
- Middleware to prevent re-installation

## Installation

```bash
composer require rowjat/laravel-installer
```

## Configuration

Publish the configuration, assets, and views:

```bash
php artisan vendor:publish --provider="Rowjat\Installer\InstallerServiceProvider"
```

This will publish:
- `config/installer.php`
- Public assets to `public/vendor/installer`
- Views to `resources/views/vendor/installer`
- Translations to `resources/lang/vendor/installer`

## Configuration Options

Edit `config/installer.php` to customize:

- **logo**: Path and alt text for the installer logo.
- **core.minPhpVersion**: Minimum PHP version required.
- **requirements**: PHP extensions required.
- **permissions**: Folders and their required permissions.

## Usage

After installation, visit `/install` in your browser to start the installation process.

### Installer Steps

1. **Welcome**: Introduction page.
2. **Environment**: Configure `.env` variables.
3. **Requirements**: Check server requirements.
4. **Permissions**: Check folder permissions.
5. **Database**: Run migrations and seeders.
6. **Final**: Installation complete.

## Routes

All routes are prefixed with `/install` and protected by the `install` middleware:

| Method | URI                        | Controller@Method                | Name                  |
|--------|----------------------------|----------------------------------|-----------------------|
| GET    | /install                   | WelcomeController@welcome        | Installer::welcome    |
| GET    | /install/environment       | EnvironmentController@environment| Installer::environment|
| POST   | /install/environment/store | EnvironmentController@store      | Installer::environment.store |
| GET    | /install/requirements      | RequirementsController@requirements | Installer::requirements |
| GET    | /install/permissions       | PermissionsController@permissions | Installer::permissions |
| GET    | /install/database          | DatabaseController@database      | Installer::database   |
| GET    | /install/final             | FinalController@finish           | Installer::final      |

## Middleware

- **CanInstall**: Prevents access to installer if the app is already installed (checks for `storage/installed` file).

## Helper Functions

- `isActive($route, $className = 'active')`: Returns a CSS class if the current route matches.

## Customization

You can override the published views, assets, and translations to match your application's branding and requirements.

## License

MIT
