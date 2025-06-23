<?php

namespace Rowjat\Installer\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Rowjat\Installer\Utils\RequirementsChecker;

class RequirementsController extends Controller
{

    /**
     * @var RequirementsChecker
     */
    protected RequirementsChecker $requirements;

    /**
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker)
    {
        $this->requirements = $checker;
    }

    /**
     * Display the requirements page.
     *
     * @return View
     */
    public function requirements(): View
    {
        $phpSupportInfo = $this->requirements->checkPHPversion(
            config('installer.core.minPhpVersion')
        );

        $requirements = $this->requirements->check(
            config('installer.requirements')
        );

        return view('installer::requirements', compact('requirements', 'phpSupportInfo'));
    }
}
