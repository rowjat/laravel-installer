<?php

namespace Rowjat\Installer\Utils;

use Exception;
use Illuminate\Http\Request;
use PDO;
use PDOException;

class EnvironmentManager
{
    /**
     * @var string
     */
    private string $envPath;

    /**
     * @var string
     */
    private string $envExamplePath;

    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Get the content of the .env file.
     *
     * @return string
     */
    public function getEnvContent(): string
    {
        if (!file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else {
                touch($this->envPath);
            }
        }

        return file_get_contents($this->envPath);
    }

    /**
     * Save the edited content to the file.
     *
     * @param Request $input
     * @return array
     */
    public function saveFile(Request $input): array
    {

        trans('messages.environment.success');

        $env = $this->getEnvContent();
        $dbName = $input->get('database');
        $dbHost = $input->get('hostname');
        $dbUsername = $input->get('username');
        $dbPassword = $input->get('password');

        $databaseSetting = 'DB_HOST=' . $dbHost . '
DB_DATABASE=' . $dbName . '
DB_USERNAME=' . $dbUsername . '
DB_PASSWORD="' . $dbPassword . '"
APP_URL="' . request()->getSchemeAndHttpHost() . '"
';

        // @ignoreCodingStandard
        $rows = explode("\n", $env);
        $unwanted = "DB_HOST|DB_DATABASE|DB_USERNAME|DB_PASSWORD|APP_URL";
        $cleanArray = preg_grep("/$unwanted/i", $rows, PREG_GREP_INVERT);

        $cleanString = implode("\n", $cleanArray);


        $env = $cleanString . $databaseSetting;
        try {
            $dbh = new PDO('mysql:host=' . $dbHost, $dbUsername, $dbPassword);

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // First check if database exists
            $dbh->query('CREATE DATABASE IF NOT EXISTS `' . $dbName . '` CHARACTER SET utf8 COLLATE utf8_general_ci;');
            // Save settings in session
            $_SESSION['db_username'] = $dbUsername;
            $_SESSION['db_password'] = $dbPassword;
            $_SESSION['db_name'] = $dbName;
            $_SESSION['db_host'] = $dbHost;
            $_SESSION['db_success'] = true;
            $message = 'Database settings correct';

            try {
                file_put_contents($this->envPath, $env);
            } catch (Exception) {
                $message = trans('messages.environment.errors');
            }
            return Utils::redirect(route('Installer::requirements'), $message);

        } catch (PDOException|Exception $e) {
            return Utils::error('DB Error: ' . $e->getMessage());
        }
    }
}
