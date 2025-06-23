<?php

namespace Rowjat\Installer\Utils;


use Exception;

class InstalledFileManager
{
    /**
     * Create or update the installed file.
     *
     * @return bool
     */
    public function create(): bool
    {
       try {
           file_put_contents(storage_path('installed'), '');
           return true;
       } catch (Exception) {
           return false;
       }
    }

    /**
     * Check if the application is installed.
     *
     * @return bool
     */
    public function update(): bool
    {
        return $this->create();
    }
}
