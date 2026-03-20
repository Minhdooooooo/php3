<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request){
        // dạng query buider
        $query = DB::table('categories')->orderBy('id','desc');
        $categories = $query->paginate(5);
        return view('categories.index',compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(CategoryRequest $request){
        DB::table('categories')->insert([
            'name' => $request->name,
            'status' =>(bool) $request->status,
        ]);
        return redirect()->route('categories.index')->with('success','Thêm mới danh mục thành công');

    }

    public function edit($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id){
        DB::table('categories')->where('id',$id)->update([
            'name' => $request->name,
            'status' =>(bool) $request->status,
        ]);
        return redirect()->route('categories.index')->with('success','Cập nhật danh mục thành công');
    }

    public function destroy($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('categories.index')->with('success','Xóa danh mục thành công');
    }
}
