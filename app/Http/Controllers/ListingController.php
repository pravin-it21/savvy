<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Gloudemans\Shoppingcart\Facades\Cart;



class ListingController extends Controller
{
    // show all listings
    public function index(Request $request) {
        return view('listings.index', [
            'listings' => Product::latest()->filter(request(['tag', 'search']))->simplepaginate(6)

        ]);
    }

    //show single listing
    public function show(Product $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

        // show create form
    public function create() {
        return view('listings.create');
    }



    //store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('products',
            'company')],
            'price' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
            'is_private' => 'boolean',

        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('productimages', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $product = new Product($formFields);
        $product->is_private = $request->input('is_private', false);
        $product->save();


        return redirect('/')->with('message', 'Product Created successfully!');
    }


    // show edit form

    public function edit(Product $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }



    //update Listing Data
    public function update(Request $request, Product $listing) {

        //make user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'price' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
            'is_private' => 'boolean',
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('productimages', 'public');
        }

         // Update the is_private column based on user's choice
         $formFields['is_private'] = $request->has('is_private');
         $listing->update($formFields);


        return redirect('/')->with('message', 'Product updated successfully!');
    }
    // dlete list
    public function destroy(Product $listing) {
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Product Deleted successfully');
    }
    // show cart
    public function cart() {
        return view('listings.cart', ['listings' => auth()->user()->listings()->get()]);
    }

    //addtocart
    public function addToCart(Request $request) {

        return redirect('/')->with('message', 'Product Added successfully!');
    }
    //manage
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }




}
