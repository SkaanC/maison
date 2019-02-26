@extends('layout.master')

@section('content')
<h1>{{$title}}</h1>
{{$products->links()}}

<div class="row">
@forelse($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
        <!-- Lien sur chaque produit -->
        <a href="{{url('product', $product->id)}}">
            <img class="bd-placeholder-img card-img-top" src="{{asset('images/'.$product->url_image)}}"/>            
            <div class="card-body">           
              <p class="card-text">{{$product->title}}<br>
                 Prix : {{$product->price}}</p>            
            </div>           
          </div>
        </a>
        </div>
    @empty<p>Pas d'article disponible</p>
@endforelse


</div>

@endsection



