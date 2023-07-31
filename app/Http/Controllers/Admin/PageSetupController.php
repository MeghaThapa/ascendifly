<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetup;
use Toastr;
use Image;
use File;
use Illuminate\Support\Str;

class PageSetupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('dashboard.page_setup', 2);
        $this->route = 'admin.page-setup';
        $this->view = 'admin.page-setup';
        $this->path = 'page-setup';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['rows'] = PageSetup::orderBy('id', 'asc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        // return $this->title;
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        // dd($data);
        // $data['categories'] = PortfolioCategory::where('status', '1')->get();
        $data['rows'] = PageSetup::where('status', '1')->get();

        return view($this->view.'.create', $data);
    }

    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:pages,title',
            'description' => 'required',
            // 'image' => 'nullable|image',
        ]);
        // Get content with media file
        $content=$request->input('description');

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->encoding = 'utf-8';
        $dom->loadHtml(utf8_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        //extra code// Use XPath to find all empty <p> tags
        $xpath = new \DOMXPath($dom);
        $emptyPTags = $xpath->query("//p[not(node())]");
        // Loop through and remove the empty <p> tags
        foreach ($emptyPTags as $emptyPTag) {
            $emptyPTag->parentNode->removeChild($emptyPTag);
        }
        // Get the updated HTML after removing empty <p> tags
        $updatedContent = $dom->saveHTML();
        //end
        $images = $dom->getElementsByTagName('img');
       // foreach <img> in the submited content
        foreach($images as $img){
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)){
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid().'_'.time();

                //Crete Folder Location
                $path = public_path('uploads/media/');
                if (! File::exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $filepath = "/uploads/media/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                  // resize if required
                  //->resize(500, null)
                  ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                  ->encode($mimetype, 100)  // encode file to the specified mimetype
                  ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-


        // Insert Data
        $page = new PageSetup;
        $page->title = $request->title;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->description = $dom->saveHTML();
        $page->slug = Str::slug($request->title, '-');

        // dd($page);
        $page->save();


        Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));

        return redirect()->route($this->route.'.index');
    }

    public function edit($id){
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $row=PageSetup::find($id);
        $data['row'] = $row;
        return view($this->view.'.edit', $data);

    }


    public function update(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:page_setups,title,'.$id,
             'description' => 'required',
            'image' => 'nullable|image',
        ]);

        if($request->status == 1){
            $status = 1;
        }
        else{
            $status = 0;
        }

        // Update Data
        $data = PageSetup::findOrFail($id);
        $data->title = $request->title;
        $data->meta_title = $request->meta_title? $request->meta_title:'';
        $data->meta_description = $request->meta_description? $request->meta_description:'';
        $data->meta_keywords = $request->meta_keywords? $request->meta_keywords:'';

         // Get content with media file
        $content=$request->input('description');

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->encoding = 'utf-8';
        $dom->loadHtml(utf8_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        //extra code// Use XPath to find all empty p tag <p> </p>
        $xpath = new \DOMXPath($dom);
        $emptyPTags = $xpath->query("//p[not(node())]");
        // Loop through and remove the empty <p> tags
        foreach ($emptyPTags as $emptyPTag) {
            $emptyPTag->parentNode->removeChild($emptyPTag);
        }
        // Get the updated HTML after removing empty <p> tags
        $updatedContent = $dom->saveHTML();

        $images = $dom->getElementsByTagName('img');
       // foreach <img> in the submited content
        foreach($images as $img){
            $src = $img->getAttribute('src');

            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)){
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid().'_'.time();

                //Crete Folder Location
                $path = public_path('uploads/media/');
                if (! File::exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }


                $filepath = "/uploads/media/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                  // resize if required
                  //->resize(500, null)
                  ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                  ->encode($mimetype, 100)  // encode file to the specified mimetype
                  ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-
        $data->description = $dom->saveHTML();
        $data->status = $status;
        $data->save();


        Toastr::success(__('dashboard.updated_successfully'), __('dashboard.success'));

        return redirect()->route($this->route.'.index');
    }
}
