<?php

namespace Rowjat\Installer\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Rowjat\Installer\Utils\DatabaseManager;

class DatabaseController extends Controller
{

    /**
     * @var DatabaseManager
     */
    private DatabaseManager $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @return RedirectResponse
     */
    public function database(): RedirectResponse
    {
        // Sometimes migration file and seed files may take more than 30 seconds, so we are going to set it 0 that indicates
        // that there is no time limit for execution.

        set_time_limit(0);
        $response = $this->databaseManager->migrateAndSeed();
        return redirect()
            ->route('Installer::final',$response)
            ;
    }
}
