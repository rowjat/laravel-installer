<?php

namespace Rowjat\Installer\Utils;

use Exception;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DatabaseManager
{

    /**
     * Migrate and seed the database.
     *
     * @return array
     */
    public function migrateAndSeed(): array
    {
        $this->sqlite();
        return $this->migrate();
    }

    /**
     * Run the migration and call the seeder.
     *
     * @return array
     */
    private function migrate(): array
    {
        try {
            Artisan::call('migrate:fresh', ["--force" => true, '--schema-path' => 'do not run schema path']);
        } catch (Exception $e) {
            return $this->response($e->getMessage());
        }

        return $this->seed();
    }

    /**
     * Seed the database.
     *
     * @return array
     */
    private function seed(): array
    {
        try {
            Artisan::call('db:seed');
        } catch (Exception $e) {
            return $this->response($e->getMessage());
        }
        return $this->response(trans('installer::installer_messages.final.finished'), 'success');
    }

    /**
     * Return a formatted error messages.
     *
     * @param $message
     * @param string $status
     * @return array
     */
    private function response($message, string $status = 'danger'): array
    {
        return array(
            'status' => $status,
            'message' => $message
        );
    }

    /**
     * check database type. If SQLite, then create the database file.
     */
    private function sqlite(): void
    {
        if (DB::connection() instanceof SQLiteConnection) {
            $database = DB::connection()->getDatabaseName();
            if (!file_exists($database)) {
                touch($database);
                DB::reconnect(Config::get('database.default'));
            }
        }
    }
}
