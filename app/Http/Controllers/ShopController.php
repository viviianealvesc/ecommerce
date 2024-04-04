<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use League\Flysystem\UrlGeneration\ShardedPrefixPublicUrlGenerator;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $shop = Shop::all();

        return view('/welcome', ['shop' => $shop, 'user' => $user]);
       
    }

    public function dashboard() {

        $shop = Shop::all();

        return view('events.dashboard', ['shop' => $shop]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shop = new Shop();

        $shop->nome = $request->nome;
        $shop->valor = $request->valor;
        $shop->cores = $request->cores;
        $shop->descricao = $request->descricao;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->image;

            $extension = $image->extension();

            $imageName = md5($image->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/shop'), $imageName);

            $shop->image = $imageName;
        }

        $shop->save();

        return redirect('/')->with('msg', 'Publicação criada com sucesso!');
    }

    /**
     * Irá apenas redirecionar o usuario para o carrinho.
     */
    public function cart() {
        return view('events.cart');
    }

    public function carrinho($id) {

        $user = auth()->user();

        $shop = Shop::findOrFail($id); 
        
        $user->shopUsers()->attach($shop->id);

        return redirect('/')->with('msg', 'Produto adicionado ao carrinho');

    }

    public function mostrarCarrinho() {
        $user = auth()->user();

        $shop = $user->shopUsers;

        return view('events.cart', ['shop' => $shop]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shop = Shop::findOrFail($id);

        return view('events.update', ['shop' => $shop]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shop = Shop::findOrFail($id);

        $shop->nome = $request->nome;
        $shop->valor = $request->valor;
        $shop->cores = $request->cores;
        $shop->descricao = $request->descricao;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->image;

            $extension = $image->extension();

            $imageName = md5($image->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/shop'), $imageName);

            $shop->image = $imageName;
        }

        $shop->save();

        return redirect('/events/dashboard')->with('msg', 'Publicação editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Shop::findOrFail($id)->delete();

        return redirect('/events/dashboard')->with('msg', 'Produto deletado com sucesso!');
    }

    public function delete(string $id)
    {
        $user = auth()->user();

        $user->shopUsers()->detach($id);

        return redirect('/events/carrinho')->with('msg', 'Produto deletado do carrinho!!');
    }
}
