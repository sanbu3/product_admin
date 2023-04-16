<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $products = Products::all();

        return view('products.index')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function search($searchValue)
    {

        //在products表中直接搜索
        $products = Products::query()->where('name', 'like', "%$searchValue%")
            ->orWhere('description', 'like', "%$searchValue%")
            ->get();

        //整理result
        $result = [
            'products' => $products,
            'categoriesTags' => [],
        ];

        //直接在商品中搜索到的结果,如果有category_id,则把category_id对应的category_name,category_id,parent_id追加到result['categoriesTags']
        foreach ($result['products'] as $product) {
            if ($product->category_id) {
                $category = Categories::query()->where('category_id', $product->category_id)->first();
                $result['categoriesTags'][] = [
                    'category_id' => $category->category_id,
                    'category_name' => $category->category_name,
                    'parent_id' => $category->parent_id,
                ];
            }
        }

        //在categories表中搜索
        $categories = Categories::query()->where('category_name', 'like', "%$searchValue%")->get();
        foreach ($categories as $category) {
            $result['categoriesTags'][] = [
                'category_id' => $category->category_id,
                'category_name' => $category->category_name,
                'parent_id' => $category->parent_id,
            ];
            //如果result['categoriesTags']中有重复的category_id,则删除重复的category_id
//            $result['categoriesTags'] = array_unique($result['categoriesTags'], SORT_REGULAR);
        }
        //通过查到的categories的category_name,利用category_id查询products表,把结果追加到result['products']中
        foreach ($result['categoriesTags'] as $categoryTag) {
            $products = Products::query()->where('category_id', $categoryTag['category_id'])->get();
            foreach ($products as $product) {
                $result['products'][] = $product;
                //如果result['products']中有重复的product_id,则删除重复的product_id
//                $result['products'] = array_unique($result['products'], SORT_REGULAR);
            }
        }

        return response()->json($result);
    }

    public function item($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $product = Products::query()->where('id', $id)->first();
        return view('products.item')->with([
            'product' => $product
        ]);
    }

}
