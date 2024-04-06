<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Pcategory;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::orderby('id', 'desc')->paginate(15);
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        $categories = Pcategory::whereStatus(1)->get();
        return view('admin.project.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $this->storeData($request, new Project());
        return back()->with('success', __('Project added successfully'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $categories = Pcategory::whereStatus(1)->get();
        return view('admin.project.edit', compact('project', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $this->storeData($request, $project, $id);
        return back()->with('success', __('Project updated successfully'));
    }

    public function destroy(Request $request)
    {
        $project = Project::findOrFail($request->id);
        MediaHelper::handleDeleteImage($project->photo);
        $project->delete();
        return back()->with('success', __('Project deleted successfully'));
    }

    public function storeData($request, $data, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:projects,title' . ($id ? ',' . $id : ''),
            'category_id' => 'required|integer',
            'details' => 'required|string',
            'client' => 'required|string',
            'date' => 'required|string',
            'photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|string',

        ]);

        if (isset($request['photo'])) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $data->photo = MediaHelper::handleUpdateImage($request['photo'], $data->photo);
            } else {
                $data->photo = MediaHelper::handleMakeImage($request['photo']);
            }
        }

        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->category_id = $request->category_id;
        $data->client = $request->client;
        $data->date = $request->date;
        $data->details = $request->details;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->linkedin = $request->linkedin;
        $data->instagram = $request->instagram;
        $data->address = $request->address;
        $data->end_date = $request->end_date;
        $data->website = $request->website;
        $data->email= $request->email;
        $data->phone= $request->phone;

        $data->save();

    }
}
