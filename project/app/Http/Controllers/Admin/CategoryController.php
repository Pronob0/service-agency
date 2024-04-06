<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('id', 'desc')->paginate(15);
        return view('admin.category.index', compact('categories'));
    }
    public function store(Request $request)
    {

        $this->storeData($request, new Category());
        return back()->with('success', __('Category added successfully'));
    }

    public function update(Request $request, $id)
    {
        $bcategory = Category::findOrFail($id);
        $this->storeData($request, $bcategory, $id);
        return back()->with('success', __('Category updated successfully'));
    }

    public function storeData($request, $data, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->status = $request->status;
        if(isset($request->image)){

            if($id){
                
                $data->image = MediaHelper::handleUpdateImage($request->image,$data->image);
            }else{
                
                $data->image = MediaHelper::handleMakeImage($request->image);
            } 
        }
        $data->save();

    }
    public function destroy(Request $request)
    {
        $bcategory = Category::findOrFail($request->id);
        $bcategory->services()->delete();
        $bcategory->delete();
        return back()->with('success', __('Category deleted successfully'));
    }
}
