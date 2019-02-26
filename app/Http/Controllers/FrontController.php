<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // importer l'alias dans la classe
use App\Categorie;

class FrontController extends Controller
{
    protected $paginate = 6; //6 articles par page

    public function __construct(){ //Récupérer les categories et les ajouter dans la barre de navigation
 
        view()->composer('partials.menu', function($view){
            $categories = Categorie::pluck('title', 'id')->all();
            $view->with('categories', $categories );
        });
    }

    public function index(){
        $count =  Product::count(); //Nombre d'articles total disponibles (compte le nombre de produits dnas la BDD)
        $products = Product::status()->paginate($this->paginate); //Fonction de pagination
        //$products = Product::where('categorie_id', "2")->paginate($this->paginate);
        return view('index', ['products' => $products, 'count' => $count, 'title'=>'Nos produits']); //Cherche les porduits publies (pas en brouillon)
    }

    //Requête solde
    function productByCategorie(){
        $products = Product::status()->where('code', "solde")->paginate($this->paginate);
        return view('index', ['products'=>$products, 'title'=>'Produits en solde']);
    }

    //Requête Femme
    function productByGirl(){
        $products = Product::where('categorie_id', "1")->paginate($this->paginate);
        return view('index', ['products'=>$products, 'title'=>'Produits femme']);
    }

    //Requête Homme
    function productByBoy(){
        $products = Product::where('categorie_id', "2")->paginate($this->paginate);
        return view('index', ['products'=>$products, 'title'=>'Produits hommes']);
    }

    //Requête par produit pour la page 2
    public function show(int $id) {
        $products = Product::status()->paginate(3);
        // récupération d'un seul produit 
        $product = Product::find($id);
        // passage à la vue
        return view('show', ['product' => $product, 'products' => $products, 'title'=>'Titre du produit']);
    }

    //Requête pour le dashboard
    public function admin(){
        $products = Product::all(); 
        return view('admin', ['products' => $products, 'title'=>'Administration']); 
    }

    //Requête pour ajouter un nouveau produit
    public function productCreate(){
        $products = Product::pluck('title', 'id')->all();
        $categories = Categorie::pluck('title', 'id')->all();
        $product = Product::select('size')->distinct()->orderByRaw('size ASC')->get();
        return view('create', ['products' => $products, 'product' => $product, 'categories' => $categories]);
    }

    
    //Requête pour récupérer le produit ajouté
    public function store(Request $request){
        
        $product = Product::create($request->all());
        $product->categorie()->associate($request->categorie);
  
        return redirect()->route('admin')->with('message', 'success');

    }

    //Requête pour modifier un produit
    public function productEdit($id){
         $article = Product::find($id);
         $product = Product::select('size')->distinct()->orderByRaw('size ASC')->get();
         $categories = Categorie::pluck('title', 'id')->all();
         return view('edit', ['article' => $article, 'product'=>$product, 'categories' =>$categories]);
    }

    //Requête pour récupérer un produit modifié
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'categorie_id'=>'required|integer',
            'status'=>'in:publier,brouillon',
            'code'=>'required',
            'reference'=>'required',
        ]);
        
        $product = Product::find($id);
        $product->update($request->all());
        $im=$request->file('url_image');

        if(!empty($im)){
            $link=$request->file('url_image')->store('');

            $product->update([
                'url_image'=>$link,
            ]);
        }
    return redirect()->route('admin', ['product'=>$product]);
    }

    //Requête pour supprimer un produit
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete($request->product);
        return redirect()->route('admin', ['product'=>$product])->with('message', 'Produit supprimé');
    } 
    
}



    

