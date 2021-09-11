<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all(); 
       
        return view('product.index', [            
            'products'=>$products            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $manufacturers = Manufacturer::all()->pluck('name', 'id'); 
         
        $manufacturer_id = NULL;
        return view('product.create',  [
            'manufacturers'=>$manufacturers,            
            'manufacturer_id'=>$manufacturer_id,
            'warranty_checked'=>false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        
        $validatedData = $request->validate([        
          'ean' => ['required', 'string', 'max:255'],          
          'designation' => ['required', 'string', 'max:255'],   
        ],
        [        
          'ean.required' => __('You must enter a ean'),
          'designation.required' => __('You must enter a designation'),
        ]);
        $data = $request->all();
        
        $newProduct = Product::create([
            'ean' => $data['ean'],
            'designation' => $data['designation'],
            'price' => $data['price'],             
            'warranty' => isset($data['warranty'])?1:0,
            'manufacturer_id' => $data['manufacturer_id'],
        ]);
        $newProduct->save();

        return redirect()->route('products.index')->with('title_modal', __("Success"))->with('message', __('Product successfully saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->edit($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        $manufacturers = Manufacturer::all()->pluck('name', 'id'); 
         
        $manufacturer_id = $product->manufacturer_id;
        return view('product.edit',[
            'product'=>$product,
            'manufacturers'=>$manufacturers,            
            'manufacturer_id'=>$manufacturer_id,
            'warranty_checked'=>$product->warranty==1,           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        
         $validatedData = $request->validate([        
          'ean' => ['required', 'string', 'max:255'],          
          'designation' => ['required', 'string', 'max:255'],   
        ],
        [        
          'ean.required' => __('You must enter a ean'),
          'designation.required' => __('You must enter a designation'),
        ]);
         
        $product->fill($request->all());
        $ok = $product->save();
        return redirect()->route('products.show',['product'=>$product])->with('title_modal', __("Success"))->with('message', __("product update successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        if ($product->ticketLines->count() == 0){//No se podrá borrar productos que esten en alguna linea
            $product->delete();
            
        }
        return response()->json($product, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
          JSON_UNESCAPED_UNICODE); 
    }
}
