<?php

namespace App\Http\Controllers;

use App\Repository\InterfaceProductRepository;
use Illuminate\Http\Request;
use function Nette\Utils\data;
use Session;

class ProductController extends Controller
{
    public $product, $products, $image, $name;

    public function __construct(InterfaceProductRepository $product)
    {
        $this->product = $product;
    }
    public function index(){
        $products = $this->product->getAllProducts();
        return view('product.index')->with('products', $products);
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        $request->validate([
            'picture' => 'required|image|max:1024|dimensions:max_width=3000,max_height=3000 |mimes:jpeg,jpg',
            'title'   => 'required|max:255',
            'price'   => 'required|numeric',
        ]);
        if ($this->product->createProduct($request)){
            return redirect('/products')->with('message', 'Product add Successfully');
        }
        else{
            return redirect('/products')->with('message', 'Product add unsuccessful');
        }
    }
    public function detail($id)
    {
        $product = $this->product->getSingleProduct($id);
        return view('product.detail',compact('product'));
    }
    public function edit($id)
    {
        $product = $this->product->editProduct($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'picture'       => 'required|image|max:1024|dimensions:max_width=3000,max_height=3000 |mimes:jpeg,jpg',
            'title'         => 'required|max:255',
            'price'         => 'required|numeric',
            'description'   => 'required',
        ]);


        $this->product->updateProduct($id, $request);

        return redirect()->route('product.index')->with('message', 'Product Updated Successfully');
    }

    public function delete($id)
    {
        $this->product->delete($id);
        return redirect()->route('product.index')->with('message', 'Product Delete Successfully');
    }
}
