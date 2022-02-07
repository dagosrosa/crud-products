<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        return view('index');
    }

    /**
     * Return the list of the all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        $products = $this->product->all();
        return \Response::json(Product::all(),200);
    }

    /**
     * Return the specified resource.
     *@param  int  $id
     *@param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request  $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            return \Response::json(array($product), 200);
        } else {
            return \Response::json(array($product), 404);
        }
    }

    /**
     * Create a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->file('productJsonFile')->isValid())
        {
            $data = json_decode($request->productJsonFile->get());
            foreach ($data as $product)
            {
                Product::create(array(
                    'title'=>$product->title,
                    'type'=>$product->type,
                    'description'=>$product->description,
                    'price'=>$product->price,
                    'rating'=>$product->rating
                ));
            }
            return redirect('/');
        }
    }

    /**
     * Edit the specified resource.
     *
     * @param  int  $id
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        DB::table('product')
        ->where('id',$id)
        ->update(array(
            'title'=>$request->title,
            'type'=>$request->type,
            'description'=>$request->description,
            'price'=>$request->price,
            'rating'=>$request->rating
        ));
        
        return response('Done', 200);
    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('product')
        ->where('id',$id)
        ->delete();

        return response('Done', 200);
    }

}
