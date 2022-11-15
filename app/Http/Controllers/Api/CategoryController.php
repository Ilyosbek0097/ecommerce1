<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $request_data = $request->all();
        $request_data['slug'] = Str::slug($request_data['name'],'-');
        return Category::create($request_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request_data = $request->all();
        $request_data['slug'] = Str::slug($request_data['name'],'-');
        $category->update($request_data);
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('Delete Success',200);
    }

    public function kurs()
    {
        $data = [];
        $response = Http::get('https://cbu.uz/uz/services/open_data/rates/json/');

        foreach ($response->json() as $key => $value) {
            $data[$key]['belgisi'] = $value['G1'];
            $data[$key]['nomi'] = $value['G7'];
            $data[$key]['qiymati'] = $value['G4'];
            $data[$key]['sanasi'] = $value['G5'];
//            $data['nomi'] = $item['G1'];
//            $data['qiymati'] = $item['G4'];
//            $data['Sana'] = $item['G5'];
        }
        return $data;
//        return $data;
    }
}
