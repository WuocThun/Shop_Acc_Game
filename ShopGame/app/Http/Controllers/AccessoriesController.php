<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessories;
use App\Models\Category;

class AccessoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories = Accessories::with('category')->orderBy('id', 'desc')
                                  ->get();

        return view('admin.accessories.index', compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'desc')->get();

        return view('admin.accessories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data                     = $request->validate(
            [
                'title'  => 'required|unique:categories|max:255',
                'status' => 'required',
            ],
            [
                'title.unique'   => 'Tên danh mục đã có',
                'title.required' => 'Tên danh mục phải có',

            ]
        );
        $data                     = $request->all();
        $accessories              = new accessories();
        $accessories->title       = $data['title'];
        $accessories->status      = $data['status'];
        $accessories->category_id = $data['category_id'];
        $accessories->save();

        return redirect()->route('accessories.index')
                         ->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories  = Category::orderBy('id', 'desc')->get();
        $accessories = accessories::find($id);

        return view('admin.accessories.edit',
            compact('accessories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data                     = $request->validate(
            [
                'title'  => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.required' => 'Tên danh mục phải có',

            ]
        );
        $data                     = $request->all();
        $accessories              = accessories::find($id);
        $accessories->title       = $data['title'];
        $accessories->status      = $data['status'];
        $accessories->category_id = $data['category_id'];

        $accessories->save();

        return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accessoreis = Accessories::find($id);
        $accessoreis->delete();

        return redirect()->back();
    }

}
