<?php

namespace App\Http\Controllers;

use App\Models\AdProduct;
use App\Http\Requests\StoreAdProductRequest;
use App\Http\Requests\UpdateAdProductRequest;
use Illuminate\Support\Facades\Auth;

class AdProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdProductRequest $request)
    {
        $validated = $request->validated();
        $user = Auth::user();

        $title = $validated['title'];
        $title = urlencode("**$title**");
        $message = "Olá, vi o seu anúncio $title no app Feirine, e gostaria de saber mais informações sobre o produto.";
        $contatc_link = 'https://web.whatsapp.com/send?phone=' . $user->whatsapp_number . '/?text=' . urlencode($message);

        AdProduct::create([
            'user_id' => $user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'images' => $validated['images'],
            'category' => $validated['category'],
            'prices' => $validated['prices'],
            'promotional_price' => $validated['promotional_price'] || null,
            'quantity' => $validated['quantity'],
            'locate' => $validated['locate'],
            'tags' => $validated['tags'] || null,
            'contact_link' => $contatc_link,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AdProduct $adProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdProduct $adProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdProductRequest $request, AdProduct $adProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdProduct $adProduct)
    {
        //
    }
}
