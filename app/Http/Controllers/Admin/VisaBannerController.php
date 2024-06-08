<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\VisaBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class VisaBannerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        $objs = VisaBanner::orderBy('id', 'DESC')
            ->paginate(10);
        return view('admin.visaBanner.index')
            ->with([
                'objs' => $objs,
            ]);

    }

    public function create() {
        return view('admin.visaBanner.create');
    }


    public function store(Request $request) {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=1221,height=310',
            'image_ru' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=1221,height=310',
            'image_en' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=1221,height=310',
        ]);

        $obj = new VisaBanner();
        $slug = str_slug("night").'-'.str_random(10);
        $obj->slug = $slug;
        $obj->active = ($request->has('active')) ? true : false;
        if ($request->hasfile('image'))
        {
            $originalImage = $request->file('image');
            $originalImageName = $slug.'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/visaBanner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/visaBanner/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/visaBanner/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/visaBanner/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/visaBanner/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/visaBanner/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }
        if ($request->hasfile('image_ru'))
        {
            $originalImage = $request->file('image_ru');
            $originalImageName = $slug.'-ru.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/visaBanner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/visaBanner/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/visaBanner/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/visaBanner/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/visaBanner/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/visaBanner/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img_ru = $originalImageName;
        }
        if ($request->hasfile('image_en'))
        {
            $originalImage = $request->file('image_en');
            $originalImageName = $slug.'_en.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/visaBanner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/visaBanner/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/visaBanner/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/visaBanner/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/visaBanner/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/visaBanner/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img_en = $originalImageName;
        }
        $obj->save();
        $success = '<b>' . '</b> Surat goşuldy!';
        return redirect()->route('admin.visaBanner.index')->with([
            'success' => $success
        ]);
    }

    public function edit($id) {
        $obj = VisaBanner::findOrFail($id);
        return view('admin.visaBanner.edit', compact('obj'));
    }


    public function update(Request $request, $id) {
        $obj = VisaBanner::findOrFail($id);
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=1221,height=310',
        ]);

        $slug = str_slug("night").'-'.str_random(10);
        $obj->slug = $slug;
        $obj->active = ($request->has('active')) ? true : false;
        if ($request->hasfile('image'))
        {
            if ($obj->img) {
                Storage::delete('public/visaBanner/image/'.$obj->img);
                Storage::delete('public/visaBanner/slider/'.$obj->img);
                Storage::delete('public/visaBanner/slider/placeholder/'.$obj->img);
                Storage::delete('public/visaBanner/thumbnail-big/'.$obj->img);
                Storage::delete('public/visaBanner/thumbnail-small/'.$obj->img);
                Storage::delete('public/visaBanner/admin/'.$obj->img);
            }
            $originalImage = $request->file('image');
            $originalImageName = $slug.'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/visaBanner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/visaBanner/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/visaBanner/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/visaBanner/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/visaBanner/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/visaBanner/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }
        if ($request->hasfile('image_ru'))
        {
            if ($obj->img_ru) {
                Storage::delete('public/visaBanner/image/'.$obj->img_ru);
                Storage::delete('public/visaBanner/slider/'.$obj->img_ru);
                Storage::delete('public/visaBanner/slider/placeholder/'.$obj->img_ru);
                Storage::delete('public/visaBanner/thumbnail-big/'.$obj->img_ru);
                Storage::delete('public/visaBanner/thumbnail-small/'.$obj->img_ru);
                Storage::delete('public/visaBanner/admin/'.$obj->img_ru);
            }
            $originalImage = $request->file('image_ru');
            $originalImageName = $slug.'-ru.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/visaBanner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/visaBanner/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/visaBanner/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/visaBanner/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/visaBanner/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/visaBanner/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img_ru = $originalImageName;
        }
        if ($request->hasfile('image_en'))
        {
            if ($obj->img_en) {
                Storage::delete('public/visaBanner/image/'.$obj->img_en);
                Storage::delete('public/visaBanner/slider/'.$obj->img_en);
                Storage::delete('public/visaBanner/slider/placeholder/'.$obj->img_en);
                Storage::delete('public/visaBanner/thumbnail-big/'.$obj->img_en);
                Storage::delete('public/visaBanner/thumbnail-small/'.$obj->img_en);
                Storage::delete('public/visaBanner/admin/'.$obj->img_en);
            }
            $originalImage = $request->file('image_en');
            $originalImageName = $slug.'_en.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/visaBanner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/visaBanner/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/visaBanner/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/visaBanner/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/visaBanner/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/visaBanner/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img_en = $originalImageName;
        }
        $obj->update();

        $success = '<b>'. '</b> Surat düzedildi!';
        return redirect()->route('admin.visaBanner.index')->with([
            'success' => $success
        ]);
    }


    public function delete($id)
    {
        $obj = VisaBanner::findOrFail($id);
        if ($obj->img) {
            Storage::delete('public/visaBanner/image/'.$obj->img);
            Storage::delete('public/visaBanner/slider/'.$obj->img);
            Storage::delete('public/visaBanner/slider/placeholder/'.$obj->img);
            Storage::delete('public/visaBanner/thumbnail-big/'.$obj->img);
            Storage::delete('public/visaBanner/thumbnail-small/'.$obj->img);
            Storage::delete('public/visaBanner/admin/'.$obj->img);
        }
        if ($obj->img_ru) {
            Storage::delete('public/visaBanner/image/'.$obj->img_ru);
            Storage::delete('public/visaBanner/slider/'.$obj->img_ru);
            Storage::delete('public/visaBanner/slider/placeholder/'.$obj->img_ru);
            Storage::delete('public/visaBanner/thumbnail-big/'.$obj->img_ru);
            Storage::delete('public/visaBanner/thumbnail-small/'.$obj->img_ru);
            Storage::delete('public/visaBanner/admin/'.$obj->img_ru);
        }
        if ($obj->img_en) {
            Storage::delete('public/visaBanner/image/'.$obj->img_en);
            Storage::delete('public/visaBanner/slider/'.$obj->img_en);
            Storage::delete('public/visaBanner/slider/placeholder/'.$obj->img_en);
            Storage::delete('public/visaBanner/thumbnail-big/'.$obj->img_en);
            Storage::delete('public/visaBanner/thumbnail-small/'.$obj->img_en);
            Storage::delete('public/visaBanner/admin/'.$obj->img_en);
        }
        $objName = $obj->slug;
        $obj->delete();
        $success = '<b>'.$objName.'</b> pozuldy!';
        return redirect()->route('admin.visaBanner.index')->with([
            'success' => $success
        ]);
    }
}
