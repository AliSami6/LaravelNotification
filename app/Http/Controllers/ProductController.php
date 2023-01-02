<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Notifications\OffersNotification;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        $productData =  $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        Product::create($productData);
        return redirect('products')->with('status','Products data inforamtion stores successfully');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }
     public function update(Request $request, $id)
    {
        $productData =  $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        $product = Product::find($id);

        $product->update($productData);
        return redirect('products')
            ->with('status', 'Products Updated Successfully');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products')
            ->with('status', 'Products Deleted Successfully');
    }
      public function sendOfferNotification() {
        $userSchema = User::first();

        $offerData = [
            'product_name' => 'Laptop',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];

        Notification::send($userSchema, new OffersNotification($offerData));
return 'ok';
      //  dd('Task completed!');
    }

}