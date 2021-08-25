<?php

namespace Modules\ModuleManager\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Module;
use Zip;
class ModuleManagerController extends Controller
{
    function index(Request $request)
    {
        $Modules_ = [];
        $Modules = Module::all();
        foreach ($Modules as $module) {

            $Module_ = [
                "name" => $module->getName(),
                "active" => $this->isModuleEnabled($module->getName())
            ];
            $Modules_[] = $Module_;
        }

        return view('modulemanager::index', compact('Modules_'));
    }

    public function isModuleEnabled($moduleName)
    {
        $enabledModules = Module::allEnabled();
        foreach ($enabledModules as $module) {
            if (strtolower($module->getName()) === strtolower($moduleName)) {
                return true;
            }
        }

        return false;
    }

    function ToggleModuleEnabled(Request $request)
    {
        $module = Module::findOrFail(strtolower($request->name));
        if ($this->isModuleEnabled($module->getName())) {
            $module->disable();
        } else {
            $module->enable();
        }

        return redirect()->back();
    }

    function uploadModule(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:zip'
        ]);

        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        //return storage_path() .'/'. $filePath;
        $zip = Zip::open('../storage/app/public/'. $filePath);
        $zip->extract('../Modules');

        //     $zip->delete('../storage/app/public/'. $filePath);
        return redirect()->back();
    }
}
