<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function edit()
    {
        $setting = Setting::getSettings();

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $data = $request->validated();

        $data['allow_multiple_response'] = $request->boolean('allow_multiple_response');

        DB::beginTransaction();

        try {

            $setting = Setting::getSettings();

            if ($request->hasFile('logo')) {

                if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {

                    Storage::disk('public')->delete($setting->logo);

                }

                $data['logo'] = $request->file('logo')
                    ->store('settings', 'public');
            }

            if ($request->hasFile('favicon')) {

                if ($setting->favicon && Storage::disk('public')->exists($setting->favicon)) {

                    Storage::disk('public')->delete($setting->favicon);

                }

                $data['favicon'] = $request->file('favicon')
                    ->store('settings', 'public');
            }

            $setting->update($data);

            DB::commit();

            return redirect()
                ->route('settings.edit')
                ->with('success', 'Settings updated successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Unable to update settings.');

        }
    }

}
