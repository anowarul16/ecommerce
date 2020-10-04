<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\setting;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logo()
    {
        $settings = DB:: table('settings')->get();

        return view('admin.setting.logo', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('logo')) {
            $setting = $request->file('logo');
            $name = "P" . mt_rand(1000000, 9999999) . "." . $setting->getClientOriginalExtension();
            $destinationPath = public_path('/images/logo');
            $setting->move($destinationPath, $name);

            DB::table('settings')->insert([

                'setting' => "Logo",
                'value' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return redirect('logo-setting');
        } else {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\setting $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
