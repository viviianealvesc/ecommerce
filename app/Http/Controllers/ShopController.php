<?php

namespace App\Http\Controllers;

use App\Models\ShopUser;
use App\Models\Endereco;
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

        // Mostrar quantos produtos o usuario tem no carrinho
        $carrinho = $user->shopUsers;

        return view('/home', ['shop' => $shop, 'user' => $user, 'carrinho' => $carrinho]);
       
    }

    public function dashboard() {

        $shop = Shop::all();

        return view('events.dashboard', ['shop' => $shop]);
    }

    public function retiradaProd() {
      return view('retiradaProd'); //opçao de retirada
    }

    public function endereco() {
      return view('events.checkout'); //pagina de informar o endereço
    }

    public function confEndereco(Request $request) {

      $endereco = new Endereco();

      $user = auth()->user();

      $endereco->nome = $request->nome;
      $endereco->cep = $request->cep;
      $endereco->estado = $request->estado;
      $endereco->cidade = $request->cidade;
      $endereco->bairro = $request->bairro;
      $endereco->rua = $request->rua;
      $endereco->numero = $request->numero;
      $endereco->complemento = $request->complemento;
      $endereco->telefone = $request->telefone;

      $end = $endereco->user_id = $user->id;

      $endereco->save();


      return redirect('eventsformaPagamento')->with('msg', 'Endereço cadastrado!');
    }

    public function formaPagamento() {
      return view('events/formaPagamento'); //pagina de informar o endereço
    }



    public function pagarCompra(Request $request) {

      $dados = $request->all();

      $user = auth()->user();

       // Acessar o endereço do usuario logado
       $enderecoUser = $user->enderecos;

    if (isset($dados['pix'])) {

      $prodQuant = $user->shopUsers->toArray();

      // Inicializa uma variável para armazenar os nomes dos produtos
      $nomesProdutos = '';

      // Loop através de todos os produtos e concatena os nomes
      foreach ($prodQuant as $produto) {
          $nomesProdutos .= $produto['nome'] . ', ';
      }

      // Remove a vírgula extra no final da string
      $nomesProdutos = rtrim($nomesProdutos, ', ');

       // // // // // // // // // // // // // // // // // //

      $infoEnd = [];
     
      // Loop através de todos os produtos e concatena os nomes
      foreach ($enderecoUser as $endereco) {
      $infoEnd[] = $endereco;
      }


      $endpoint = 'https://sandbox.api.pagseguro.com/orders';
      $token = '5CDFE1B717394FBCB659BACF6D2572C7';

        $body =
        [
          "reference_id" => "ex-00001",
          "customer" => [
            "name" => "$user->name",
            "email" => "$user->email",
            "tax_id" => "12345678909",
            "phones" => [
              [
                "country" => "55",
                "area" => "11",
                "number" => "999999999",
                "type" => "MOBILE"
              ]
            ]
          ],

          "items" => [
            [
              "name" =>  $nomesProdutos,
              "quantity" => count($prodQuant),
              "unit_amount" => 500
            ]
          ],
          "qr_codes" => [
            [
              "amount" => [
                "value" => 500
              ],
              "expiration_date" => "2024-06-29T20:15:59-03:00",
            ]
          ],
          "shipping" => [
            "address" => [
              "street" => "rua",
              "number" => "1384",
              "complement" => "apto 12",
              "locality" => "Pinheiros",
              "city" => "São Paulo",
              "region_code" => "SP",
              "country" => "BRA",
              "postal_code" => "01452002"
            ]
          ],
          "notification_urls" => [
            "https://alexandrecardoso-pagseguro.ultrahook.com"
          ]
        ];

          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $endpoint);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
          curl_setopt($curl, CURLOPT_CAINFO, "cacert.pem");
          curl_setopt($curl, CURLOPT_HTTPHEADER, [
          'Content-Type:application/json',
          'Authorization: Bearer ' . $token
          ]);

          $response = curl_exec($curl);
          $error = curl_error($curl);

          curl_close($curl);

          //if ($error) {
          //var_dump($error);
        // die();
        // }

        $data = json_decode($response, true);

         var_dump($data);
        


    } elseif(isset($dados['cartao'])) {

      echo 'cartao';

    }
      
       
    return view('pay', [
        'response' => json_decode($response, true),
        'error' => $error
    ]);

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



    public function carrinho(Request $request, $id)
    {
        $user = auth()->user();
        $quantity = $request->input('quantity');
        $produto = Shop::findOrFail($id);
    
        // Verificar se o produto já está no carrinho do usuário
        $carrinho = $user->shopUserCarrinho()->where('shop_id', $produto->id)->first();

        if (isset($carrinho) && $quantity < $carrinho->quantity) {

            $carrinho->quantity -= $quantity;
            $carrinho->valor -= $quantity * $produto->valor;
            $carrinho->save();

            return redirect()->route('cart.carrinho')->with('msg', 'Carrinho atualizado!');

        } elseif($carrinho) {
            // Se o produto já estiver no carrinho, atualize a quantidade e calcule o valor total
            $carrinho->quantity += $quantity;
            $carrinho->valor += $quantity * $produto->valor;
            $carrinho->save();

        }else {
            // Se o produto não estiver no carrinho, crie um novo registro
            $carrinho = new ShopUser();
            $carrinho->user_id = $user->id;
            $carrinho->shop_id = $produto->id;
            $carrinho->quantity = $quantity;
            $carrinho->valor = $quantity * $produto->valor;
            $carrinho->save();
        }
        return redirect('/')->with('msg', 'Produto adicionado ao carrinho com sucesso.');
    }
    

    public function mostrarCarrinho() {
        $user = auth()->user();

        $carrinhoProdu = $user->shopUserCarrinho; // Estou tendo acesso ao valor total e a quantidade de prod.
        
        // Total do carrinho
        $shopSoma = $carrinhoProdu->sum('valor');

        // lógica para quando o usuario já tiver o endereço cadastrado
        $endereco = $user->enderecos;

        return view('events.cart', ['shopSoma' => $shopSoma, 'endereco' => $endereco, 'carrinhoProdu' => $carrinhoProdu]);
    }

    public function atualizarCarrinho(Request $request) {
        $shop = new Shop();


    }
    

    public function quantProd(Request $request) {

        $shop = new Shop();

        $qty = $request->query('quantidade');

        $produto = $shop->valor;

        $valorTotal = $produto * $qty;

        var_dump($qty);

      

        return view('events.cart', ['valorTotal' => $valorTotal]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = Shop::findOrFail($id);

        return view('events.show', ['shop' => $shop]);
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

    public function favorito($id) {
        $user = auth()->user();

        Shop::findOrFail($id);

        $user->shops()->attach($id);

        return redirect('/')->with('msg', 'Produto favoritado!');
    }

    public function productFav() {
        $user = auth()->user();

        $shops = $user->shops;

        return view('events.favorito', ['shops' => $shops]);
    }

    public function favDelete(string $id)
    {
        $user = auth()->user();

        $user->shops()->detach($id);

        return redirect('/events/favorito')->with('msg', 'Produto deletado dos favoritos!');
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

        return redirect('/events/carrinho')->with('msg', 'Produto deletado do carrinho!');
    }
}
