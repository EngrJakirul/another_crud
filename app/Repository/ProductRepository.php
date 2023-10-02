<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository implements InterfaceProductRepository{


    public function getAllProducts()
    {
        return Product::all();
    }

    public function createProduct($request)
    {
        Try{
            if ($image = $request->file('picture'))
            {
                $name = time().rand(1, 1000000000).'.'.$image->getClientOriginalName();
                $image->move(public_path('/images/'),$name);
            }
            Product::insert([
                'title'         => $request->title,
                'price'         => $request->price,
                'description'   => $request->description,
                'picture'       => $name,
            ]);
            return true;
        }
        Catch(\Exception $th){
            return false;
        }

    }
    public function getSingleProduct($id)
    {
        return Product::find($id);
    }

    public function editProduct($id)
    {
        return Product::find($id);
    }

    public function updateProduct($id, $request)
    {

        $product              = Product::find($id);
        if($request->file('picture'))
        {
            if (file_exists($product->picture))
            {
                unlink($product->picture);
            }
                $name = time().rand(1, 1000000000).'.'.$request->file('picture')->getClientOriginalName();
                $request->file('picture')->move(public_path('/images/'),$name);
        }

        $product->title       = $request->title;
        $product->description = $request->description;
        $product->price       = $request->price;
        if ($request->file('picture'))
        {
            $product->picture     = $name;
        }

        $product->save();
        return true;


    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

}

?>
