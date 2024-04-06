<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();

        $experiencelist = explode(',', $about->experiencelist);
        return view('admin.about.index', compact('about','experiencelist'));
    }

    public function update(Request $request)
    {

        $experiencelist= array_filter($request->experiencelist);
        $experiencelist = implode(',', $experiencelist);


        $about = About::first();

        if (isset($request['photo'])) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return back()->with('error', 'Please upload a valid image');
            }
            $about->photo = MediaHelper::handleUpdateImage($request['photo'], $about->photo);
        }

        if (isset($request['second_photo'])) {
            $status = MediaHelper::ExtensionValidation($request['second_photo']);
            if (!$status) {
                return back()->with('error', 'Please upload a valid image');
            }
            $about->second_photo = MediaHelper::handleUpdateImage($request['second_photo'], $about->second_photo);
        }

        $about->header_title = $request->header_title;
        $about->title = $request->title;
        $about->number = $request->number;
        $about->experience = $request->experience;
        $about->description = $request->description;
        $about->experiencelist = $experiencelist;
        $about->save();
        return back()->with('success', 'About has been updated');

    }

}
