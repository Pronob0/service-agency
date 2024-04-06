<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Generalsetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

    public function update(Request $request)
    {

        $gs = Generalsetting::first();
        if ($request->basic) {
            $request->validate([
                'title' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required',
                'working_hour' => 'required',
                'copyright_text' => 'required',

            ]);

            $gs->title = $request->title;
            $gs->phone = $request->phone;
            $gs->email = $request->email;
            $gs->address = $request->address;
            $gs->header_text = $request->header_text;
            $gs->working_hour = $request->working_hour;
            $gs->copyright_text = $request->copyright_text;

        }

        if ($request->type == 'contact_section') {
            $gs->contact_section_header_title = $request->contact_section_header_title;
            $gs->contact_section_title = $request->contact_section_title;
        }

        if ($request->type == 'theme') {
            $gs->theme = $request->theme;
        }

        if($request->type == 'hero_section'){
            $gs->hero_title = $request->hero_title;
            $gs->hero_text = $request->hero_text;
            $gs->hero_btn_text = $request->hero_btn_text;
            $gs->hero_btn_link = $request->hero_btn_link;
        }

        if ($request->type == 'want_to_worksection') {
            $gs->want_to_header = $request->want_to_header;
            $gs->want_to_sub = $request->want_to_sub;
        }

        if ($request->plugin) {
            $gs->is_tawk = $request->is_tawk;
            $gs->tawk_id = $request->tawk_id;
            $gs->is_disqus = $request->is_disqus;
            $gs->disqus = $request->disqus;
        }

        if ($request->maintenance) {
            $gs->is_maintenance = $request->is_maintenance;
            $gs->maintenance = $request->maintenance_message;
        }

        $images = ['header_logo', 'footer_logo', 'favicon', 'maintenance_photo', 'contact_section_photo', 'breadcumb', 'faq_photo', 'counter_photo','hero_banner','footer_bg','testimonial_photo'];
        foreach ($images as $image) {
            if (isset($request[$image])) {
                $gs[$image] = MediaHelper::handleUpdateImage($request[$image], $gs[$image]);
            }
        }

        
        $gs->update();

     

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    public function emailConfig($input)
    {
        try {
            $this->setEnv('MAIL_HOST', $input['smtp_host']);
            $this->setEnv('MAIL_PORT', $input['smtp_port']);
            $this->setEnv('MAIL_USERNAME', $input['smtp_user']);
            $this->setEnv('MAIL_PASSWORD', $input['smtp_pass']);
            $this->setEnv('MAIL_ENCRYPTION', $input['mail_encryption']);

        } catch (\Throwable$e) {

        }
    }

    public function logo()
    {
        return view('admin.generalsetting.logo');
    }
    public function breadcumb()
    {
        return view('admin.generalsetting.breadcumb');
    }

    public function favicon()
    {
        return view('admin.generalsetting.favicon');
    }

    public function loader()
    {
        return view('admin.generalsetting.loader');
    }

    public function contact_section()
    {
        return view('admin.generalsetting.contact_section');
    }

    public function cookie()
    {
        return view('admin.generalsetting.cookie');
    }
    public function menu()
    {
        return view('admin.generalsetting.menu_section');
    }

    public function maintenance()
    {
        return view('admin.generalsetting.maintenance');
    }
    public function siteSettings()
    {
        return view('admin.generalsetting.settings');
    }
    public function pluginSettings()
    {
        return view('admin.generalsetting.plugin');
    }

    public function banner_section()
    {
        return view('admin.generalsetting.banner_section');
    }

    public function themeSettings()
    {
        return view('admin.generalsetting.theme');
    }

    public function hero_page(){
        return view('admin.generalsetting.hero_page');

    }
    public function want_to_work(){
        return view('admin.generalsetting.want_to_work');
    }

    public function banner_section_update(Request $request)
    {
        $request->validate([
            'banner_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_title' => 'required',
            'banner_text' => 'required',
        ]);

        $gs = Generalsetting::first();
        if ($request->banner_photo) {
            $gs->banner_photo = MediaHelper::handleUpdateImage($request->banner_photo, $gs->banner_photo);
        }

        $gs->banner_title = $request->banner_title;
        $gs->banner_text = $request->banner_text;
        $gs->banner_video = $request->banner_video;
        $gs->update();
        return redirect()->back()->with('success', 'Data updated successfully');

    }

    public function maintainance()
    {
        return view('admin.generalsetting.maintainance');
    }

}
