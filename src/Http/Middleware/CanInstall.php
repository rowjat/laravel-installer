<?php

namespace Rowjat\Installer\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

/**
 * Class canInstall
 * @package Rowjat\Installer\Middleware
 */

class CanInstall
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {

        if($this->alreadyInstalled()) {
            abort(404);
        }

        $this->changePhpConfigs();

        return $next($request);
    }

    /**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled(): bool
    {
        return file_exists(storage_path('installed'));
    }

    private function changePhpConfigs(): void
    {
        try {
            ini_set('max_execution_time', 0); // Set unlimited execution time
            ini_set('memory_limit', -1);      // Set unlimited memory limit
        } catch (Exception $e) {
            // Log or report the exception message
            logger()->error('Error changing PHP configurations: ' . $e->getMessage());
        }
    }

}
