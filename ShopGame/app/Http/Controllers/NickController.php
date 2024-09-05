<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Category;

class NickController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nick = Nick::with('category')->orderBy('id', 'desc')->get();

        return view('admin.nick.index', compact('nick'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'desc')->get();

        return view('admin.nick.create', compact('category'));
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
        $data        = $request->validate(
            [
                'title'       => 'required|unique:nick|max:255',
                'description' => 'required|max:255',
                'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status'      => 'required',
            ],
            [
                'title.unique'         => 'Tên danh mục đã có',
                'title.required'       => 'Tên danh mục phải có',
                'description.required' => 'Mô tả đã tồn tại, hãy nhập mô tả',
                'image.required'       => 'Phải có hình ảnh',

            ]
        );
        $data        = $request->all();
        $nick        = new nick();
        $nick->ms    = random_int(100000, 999999);
        $nick->title = $data['title'];
        $attribute   = [];
        foreach ($data['attribute'] as $key => $attri) {
            //                                        $attribute[] = $key . ': ' . $attri;

            foreach ($data['name_attribute'] as $key2 => $name_attri) {
                if ($key === $key2) {
                    $attribute[] = $name_attri . ': ' . $attri;
                }
            }
        }
        //        print_r(json_encode($attribute,JSON_UNESCAPED_UNICODE));
        $nick->description = $data['description'];
        $nick->category_id = $data['category_id'];
        $nick->status      = $data['status'];
        $nick->price       = $data['price'];
        //                                $nick->attribute = serialize($attribute);
        $nick->attribute = json_encode($attribute, JSON_UNESCAPED_UNICODE);
        $get_image       = $request->image;
        $path            = 'uploads/nick/';
        $get_name_image  = $get_image->getClientOriginalName();
        $name_image      = current(explode('.', $get_name_image));
        $new_image       = $name_image . rand(0, 99) . '.'
                           . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $nick->image = $new_image;
        $nick->save();

        return redirect()->route('nick.index')
                         ->with('status', 'Thêm thành công');
    }

    public function choose_category(Request $request)
    {
        $data = $request->all();
        //                dd($data);
        $access = Accessories::where('category_id', $data['category_id'])
                             ->where('status', 1)->get();

        $output = '';
        foreach ($access as $key => $acce) {
            //            echo "$acce->title <br>";
            $output .= '<div class=" form-group">
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">'
                       . $acce->title . '</label>
                            <input type="hidden" value="' . $acce->title . '" name="name_attribute[]" >
                            <input placeholder="..." type="text"  class="form-control" required name="attribute[]">
                                            </div>';
        }
        echo $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('id', 'desc')->get();

        $nick = Nick::find($id);

        return view('admin.nick.edit', compact('nick', 'category'));

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
        $data              = $request->validate(
            [
                'status'      => 'required',
            ],
            [
                'description.required' => 'Mô tả đã tồn tại, hãy nhập mô tả',

            ]
        );
        $data              = $request->all();
        $nick              = Nick::find($id);
        $nick->ms          = $nick->ms;
        $nick->title       = $data['title'];
        $nick->description = $data['description'];
        //        $nick->category_id = $data['category_id'];
        $nick->status = $data['status'];
        $nick->price  = $data['price'];
        //                                $nick->attribute = serialize($attribute);
        $nick->attribute = $data['attribute'];
        $get_image       = $request->image;
        if ($get_image) {
            $path           = 'uploads/nick/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image     = current(explode('.', $get_name_image));
            $new_image      = $name_image . rand(0, 99) . '.'
                              . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $nick->image = $new_image;
        }
        $nick->save();
        return redirect()->route('nick.index')
                         ->with('status', 'Thêm thành công');
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
        //
    }


}
