<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManageServiceController extends Controller
{

    public function index()
    {
        
        $services = Service::orderby('id', 'desc')->paginate(15);
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $categories= Category::all();
        return view('admin.service.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->storeData($request, new Service());
        return back()->with('success', __('Service added successfully'));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories= Category::all();
        return view('admin.service.edit', compact('service','categories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $this->storeData($request, $service, $id);
        return back()->with('success', __('Service updated successfully'));
    }

    public function destroy(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $faqs = $service->faqs;
        foreach ($faqs as $faq) {
            $faq->delete();
        }
        MediaHelper::handleDeleteImage($service->photo);
        $service->delete();
        return back()->with('success', __('Service deleted successfully'));
    }

    public function storeData($request, $data, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:services,title' . ($id ? ',' . $id : ''),
            'description' => 'required|string',
            'sort_text' => 'required|string',
            'status' => 'required|boolean',
            'photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',

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
        
        

        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->sort_text = $request->sort_text;
        $data->category_id = $request->category_id;
        $data->description = clean($request->description);
        $data->service_quality_text = $request->service_quality_text;
        $data->is_feature = $request->is_feature;
        $data->status = $request->status;
        $data->attribute = implode(',', $request->attribute);
        $data->save();

    }

    public function faq_index()
    {
        $services = Service::orderby('id', 'desc')->get();
        $faqs = ServiceFaq::orderby('id', 'desc')->paginate(4);
        return view('admin.service.faq.index', compact('faqs', 'services'));
    }

    public function faq_store(Request $request)
    {
        $this->faqDataStore($request, new ServiceFaq());
        return back()->with('success', __('Faq added successfully'));
    }

    public function faq_update(Request $request, $id)
    {
        $faq = ServiceFaq::findOrFail($id);
        $this->faqDataStore($request, $faq, $id);
        return back()->with('success', __('Faq updated successfully'));
    }

    public function faqDataStore($request, $data, $id = null)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'service_id' => 'required',
        ]);

        $data->title = $request->title;
        $data->content = $request->content;
        $data->service_id = $request->service_id;
        $data->save();
    }

    public function faq_destroy(Request $request)
    {
        $faq = ServiceFaq::findOrFail($request->id);
        $faq->delete();
        return back()->with('success', __('Faq deleted successfully'));
    }
}
