<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Session;

class SettingsController extends Controller
{
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        $setting = Settings::first();
        return view('admin.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //  dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'copyright' => 'required',
        ]);

        $setting = Settings::first();
        

        $setting ->name = $request->name;
        $setting ->about_site = $request->about_site;
        $setting ->facebook = $request->facebook;
        $setting ->twitter = $request->twitter;
        $setting ->instagram = $request->instagram;
        $setting ->reddit = $request->reddit;
        $setting ->email = $request->email;
        $setting ->copyright = $request->copyright;


        $setting->save();

        if($request->has('site_logo')){
            $image = $request->site_logo;
            $image_new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage/setting/',$image_new_name);
            $setting->site_logo='/storage/setting/'.$image_new_name;
            $setting->save();
        }
        // dd($request->all());

        // this method is fucking method dont use is
        //  $setting->update($request->all());


        Session::flash('success','Setting Update Successfully');

        return redirect()->back();
    }


}
