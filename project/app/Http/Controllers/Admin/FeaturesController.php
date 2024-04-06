<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = Feature::orderby('id', 'desc')->paginate(15);
        return view('admin.feature.index', compact('features'));
    }

    public function store(Request $request)
    {
       
        $this->storeData($request, new Feature());
        return back()->with('success', __('Feature added successfully'));
    }

    public function update(Request $request, $id)
    {
        $Feature = Feature::findOrFail($id);
        $this->storeData($request, $Feature, $id);
        return back()->with('success', __('Feature updated successfully'));
    }

    public function destroy(Request $request)
    {
        $Feature = Feature::findOrFail($request->id);
        MediaHelper::handleDeleteImage($Feature->photo);
        $Feature->delete();
        return back()->with('success', __('Feature deleted successfully'));
    }

    public function storeData($request, $data, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:features,title' . ($id ? ',' . $id : ''),
            'description' => 'required|string',
            'photo' =>  $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if(isset($request['photo'])){
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if(!$status){
                return ['errors' => [0=>'file format not supported']];
            }
            if($id){
                $data->photo = MediaHelper::handleUpdateImage($request['photo'],$data->photo);
            }else{
                $data->photo = MediaHelper::handleMakeImage($request['photo']);
            }
            
        }

        $data->title = $request->title;
        $data->slug = Str::slug($request->name);
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();

    }
}
