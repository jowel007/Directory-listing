<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Traits\FileUploadTraits;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    use FileUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request) :RedirectResponse
    {
        $iconPath = $this->uploadImage($request,'image_icon');
        $backgroundPath = $this->uploadImage($request,'background_image');

        $category = new Category();
        $category->image_icon = $iconPath;
        $category->background_image = $backgroundPath;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->show_at_home = $request->show_at_home;
        $category->status = $request->status;
        $category->save();

        toastr()->success('Created Successfully');

        // return redirect()->route('admin.category.index');
        return to_route('admin.category.index');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $iconPath = $this->uploadImage($request,'image_icon',$request->old_image_icon);
        $backgroundPath = $this->uploadImage($request,'background_image',$request->old_background_image);

        $category = Category::findOrFail($id);
        $category->image_icon = !empty($iconPath) ? $iconPath : $request->old_image_icon;
        $category->background_image = !empty($backgroundPath) ? $backgroundPath : $request->old_background_image;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->show_at_home = $request->show_at_home;
        $category->status = $request->status;
        $category->save();

        toastr()->success('Updated Successfully');

        // return redirect()->route('admin.category.index');
        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
