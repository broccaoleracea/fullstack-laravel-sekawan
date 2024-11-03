<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function viewCategories() {
        $data = CategoriesModel::readCategories();
        return view('admin.categories.admin_category', ['level' => 'admin'])->with('categories', $data);
    }

    public function create (Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'category_id' => $id,
            'category_name' => $request->input('nama'),
        ];

        CategoriesModel::createCategory($data);
        
        return redirect()->route('categories')->with('success', 'Data kategori berhasil ditambahkan!');
    }

    public function viewCreateCategory() {
        return view('admin.categories.admin_create_category');
    }

    public function update (Request $request, $id)
    {
        $data = [
           'category_id' => $id,
            'category_name' => $request->input('nama'),
        ];

        CategoriesModel::updateCategory($id, $data);

        return redirect()->route('categories')->with('updated', 'Data kategori berhasil diupdate!');
    }

    public function delete ($id)
    {
        CategoriesModel::deleteCategory($id);
        return redirect()->route('categories')->with('deleted', 'Data kategori berhasil dihapus!');
    }

    public function update_category ($id) {
        $categories = CategoriesModel::readCategoryById($id);
    
        return view('admin.categories.admin_update_category', ['level' => 'admin'])->with('categories', $categories);
    }
}
