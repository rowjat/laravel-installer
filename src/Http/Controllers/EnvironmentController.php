<?php

namespace Rowjat\Installer\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Rowjat\Installer\Http\Request\UpdateRequest;
use Rowjat\Installer\Utils\EnvironmentManager;

/**
 * Class EnvironmentController
 * @package Rowjat\Installer\Controllers
 */
class EnvironmentController extends Controller
{

    /**
     * @var EnvironmentManager
     */
    protected EnvironmentManager $environmentManager;

    /**
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager)
    {
        $this->environmentManager = $environmentManager;
    }

    /**
     * Display the Environment page.
     *
     * @return View
     */
    public function environment(): View
    {
        $envConfig = $this->environmentManager->getEnvContent();

        return view('installer::environment', compact('envConfig'));
    }

    /**
     * Store the environment configuration.
     *
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function store(UpdateRequest $request): RedirectResponse
    {
        $message = $this->environmentManager->saveFile($request);
        return redirect(route('Installer::requirements'))
            ->with('message', $message);

    }

}
