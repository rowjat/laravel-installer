<?php

namespace Rowjat\Installer\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Rowjat\Installer\Utils\PermissionsChecker;

class PermissionsController extends Controller
{

    /**
     * @var PermissionsChecker
     */
    protected PermissionsChecker $permissions;

    /**
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker)
    {
        $this->permissions = $checker;
    }

    /**
     * Display the permissions check page.
     *
     * @return View
     */
    public function permissions(): View
    {
        $permissions = $this->permissions->check(
            config('installer.permissions')
        );

        return view('installer::permissions', compact('permissions'));
    }
}
