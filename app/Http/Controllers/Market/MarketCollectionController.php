<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Market\StoreMarketCollectionRequest;
use App\Http\Requests\Market\UpdateMarketCollectionRequest;
use App\Models\Market\MarketCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketCollectionController extends Controller
{
    public function index()
    {
        $collections = MarketCollection::with(['images','defaultImage','type','category'])->paginate(20);
        return view('market.collections.index', compact('collections'));
    }

    public function show(MarketCollection $collection)
    {
        $collection->load(['images','defaultImage','type','category','followers','products']);
        return view('market.collections.show', compact('collection'));
    }

    public function create()
    {
        return view('market.collections.create');
    }

    public function store(StoreMarketCollectionRequest $request)
    {
        $collection = MarketCollection::create($request->validated());
        return redirect()->route('market.collections.show', $collection)->with('success', 'Collection created successfully!');
    }

    public function edit(MarketCollection $collection)
    {
        return view('market.collections.edit', compact('collection'));
    }

    public function update(UpdateMarketCollectionRequest $request, MarketCollection $collection)
    {
        $collection->update($request->validated());
        return redirect()->route('market.collections.show', $collection)->with('success', 'Collection updated successfully!');
    }

    public function destroy(MarketCollection $collection)
    {
        $collection->delete();
        return redirect()->route('market.collections.index')->with('success', 'Collection deleted successfully!');
    }

    public function follow(MarketCollection $collection)
    {
        Auth::user()->followedCollections()->syncWithoutDetaching([$collection->id]);
        return back()->with('success', 'Collection followed!');
    }

    public function unfollow(MarketCollection $collection)
    {
        Auth::user()->followedCollections()->detach($collection->id);
        return back()->with('success', 'Collection unfollowed!');
    }

    public function report(StoreMarketCollectionRequest $request, MarketCollection $collection)
    {
        $collection->reports()->create([
            'user_id' => Auth::id(),
            'reason_id' => $request->reason_id,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Collection reported successfully!');
    }
}
