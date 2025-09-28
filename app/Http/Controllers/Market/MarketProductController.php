<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Market\StoreMarketProductRequest;
use App\Http\Requests\Market\UpdateMarketProductRequest;
use App\Models\Market\MarketProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketProductController extends Controller
{
     public function index()
    {
        $products = MarketProduct::with(['images','defaultImage','type','category','currency'])->paginate(20);
        return view('market.products.index', compact('products'));
    }

    public function show(MarketProduct $product)
    {
        $product->load(['images','defaultImage','type','category','currency','savedByUsers']);
        return view('market.products.show', compact('product'));
    }

    public function create()
    {
        return view('market.products.create');
    }

    public function store(StoreMarketProductRequest $request)
    {
        $product = MarketProduct::create($request->validated());
        return redirect()->route('market.products.show', $product)->with('success', 'Product created successfully!');
    }

    public function edit(MarketProduct $product)
    {
        return view('market.products.edit', compact('product'));
    }

    public function update(UpdateMarketProductRequest $request, MarketProduct $product)
    {
        $product->update($request->validated());
        return redirect()->route('market.products.show', $product)->with('success', 'Product updated successfully!');
    }

    public function destroy(MarketProduct $product)
    {
        $product->delete();
        return redirect()->route('market.products.index')->with('success', 'Product deleted successfully!');
    }

    public function save(MarketProduct $product)
    {
        Auth::user()->savedProducts()->syncWithoutDetaching([$product->id]);
        return back()->with('success', 'Product saved to your favorites!');
    }

    public function unsave(MarketProduct $product)
    {
        Auth::user()->savedProducts()->detach($product->id);
        return back()->with('success', 'Product removed from your favorites!');
    }

    public function report(StoreMarketProductRequest $request, MarketProduct $product)
    {
        $product->reports()->create([
            'user_id' => Auth::id(),
            'reason_id' => $request->reason_id,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Product reported successfully!');
    }
}
