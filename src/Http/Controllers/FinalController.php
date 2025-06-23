<?php

namespace Rowjat\Installer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Rowjat\Installer\Utils\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param Request $request
     * @param InstalledFileManager $fileManager
     * @return View
     */
    public function finish(Request $request, InstalledFileManager $fileManager): View
    {
        $fileManager->update();

        session()->flash('message', [
            'status' => $request->status,
            'message' => $request->message,
        ]);
        return view('installer::finished');
    }
}
