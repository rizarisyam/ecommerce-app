<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::latest()->get();
        // dump($productCategories);
        return Inertia::render('ProductCategory/Index', [
            'productCategories' => $productCategories,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('ProductCategory/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        try {
            $productCategory = ProductCategory::create([
                'name' => $request->input('name'),
                'desc' => $request->input('desc')
            ]);

            if ($productCategory) {
                return Redirect::route('product-categories.index')->with('message', 'data saved successfully');
            }
        } catch (\Throwable $e) {
            throw new Exception($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prodCat = ProductCategory::find($id);
        // dump($prodCat);

        return inertia('ProductCategory/Show', [
            'prodCat' => $prodCat
        ]);
        // return Inertia::render('ProductCategory');
        // return Inertia::render('ProductCategory/Show', [
        //     'prodCat' => $prodCat
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodCat = ProductCategory::find($id);
        // dump($prodCat);
        return inertia('ProductCategory/Edit', [
            'prodCat' => $prodCat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //set validation
        $request->validate([
            'name'   => 'required',

        ]);

        //update post
        $prodCat = ProductCategory::find($id);
        $prodCat->update([
            'name'     => $request->name,
            'desc'   => $request->desc
        ]);

        if ($prodCat) {
            return Redirect::route('product-categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
