<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Visa;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $objs = Visa::orderBy('order')->paginate(10);
        return view('admin.visa.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function create()
    {
        return view('admin.visa.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title_tm' => 'required',
            'description_tm' => 'required',
        ]);

        $obj = new Visa();
        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->description_tm = $request->description_tm;
        $obj->description_ru = $request->description_ru ?: null;
        $obj->description_en = $request->description_en ?: null;
        $obj->order = $request->order;

        $obj->save();

        $success = '<b>' . '</b> Goşuldy!';
        return redirect()->route('admin.visa.index')->with([
            'success' => $success
        ]);
    }

    public function edit(Visa $visa)
    {
        $obj = $visa;
        return view('admin.visa.edit', compact('obj'));
    }


    public function update(Request $request, Visa $visa)
    {
        $obj = $visa;
        $request->validate([
            'title_tm' => 'required',
            'description_tm' => 'required',

        ]);

        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->description_tm = $request->description_tm;
        $obj->description_ru = $request->description_ru ?: null;
        $obj->description_en = $request->description_en ?: null;
        $obj->order = $request->order;

        $obj->update();

        $success = '<b>' . '</b> Düzedildi!';
        return redirect()->route('admin.visa.index')->with([
            'success' => $success
        ]);
    }


    public function delete(Visa $visa)
    {
        $obj = $visa;
        $obj->delete();
        $success = '<b>'  . '</b> pozuldy!';
        return redirect()->route('admin.visa.index')->with([
            'success' => $success
        ]);
    }
}
