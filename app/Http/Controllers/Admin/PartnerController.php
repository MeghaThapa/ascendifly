<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Str;
use Toastr;
use Image;
use File;

class PartnerController extends Controller
{
     public function __construct()
    {
        // Module Data
        $this->title = trans_choice('Partners', 1);
        $this->route = 'admin.partner';
        $this->view = 'admin.partner';
        $this->path = 'partner';
    }

     public function index()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['rows'] = Partner::orderBy('id', 'desc')->get();
        return view('admin.partner.index',$data);
    }

     public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:clients,title',
            'image' => 'required|image',
        ]);


        // image upload, fit and store inside public folder
        if($request->hasFile('image')){
            //Upload New Image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->path.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (200 width, null height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file('image')->getRealPath())->resize(200, null, function ($constraint) { $constraint->aspectRatio(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        // Insert Data
        $partner = new Partner;
        $partner->title = $request->title;
        $partner->slug = Str::slug($request->title, '-');
        $partner->description = $request->description;
        $partner->image_path = $fileNameToStore;
        $partner->link = $request->link;
        $partner->save();


        Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));

        return redirect()->back();
    }

     public function edit(Partner $partner)
    {
        //
    }

    public function update(Request $request, Partner $partner)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:clients,title,'.$partner->id,
            'image' => 'nullable|image',
        ]);


        // image upload, fit and store inside public folder
        if($request->hasFile('image')){

            $file_path = public_path('uploads/'.$this->path.'/'.$partner->image_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->path.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (200 width, null height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file('image')->getRealPath())->resize(200, null, function ($constraint) { $constraint->aspectRatio(); })->save($thumbnailpath);
        }
        else{

            $fileNameToStore = NULL;
        }


        // Update Data
        $partner->title = $request->title;
        $partner->slug = Str::slug($request->title, '-');
        $partner->description = $request->description;
        $partner->image_path = $fileNameToStore;
        $partner->link = $request->link;
        $partner->status = $request->status;
        $partner->save();
        Toastr::success(__('dashboard.updated_successfully'), __('dashboard.success'));

        return redirect()->back();
    }

     public function destroy(Partner $partner)
    {
        // Delete Data
        $image_path = public_path('uploads/'.$this->path.'/'.$partner->image_path);
        if(File::isFile($image_path)){
            File::delete($image_path);
        }

        $partner->delete();

        Toastr::success(__('dashboard.deleted_successfully'), __('dashboard.success'));

        return redirect()->back();
    }
}
