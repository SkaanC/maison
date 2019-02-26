@extends('layout.master')

@section('content')
<h1>{{$title}}</h1>


@forelse($products as $product)
        <div class="col-md-4-small">
          <div class="card mb-4 shadow-sm">
        <!-- Lien sur chaque produit -->
        <a href="{{url('product', $product->id)}}">
            <img class="bd-placeholder-img card-img-top" src="{{asset('images/'.$product->url_image)}}"/>                       
          </div>
        </a>
        </div>
    @empty<p>Pas d'article disponible</p>
@endforelse


<div class="row" id="show">
<div class="col-md-4-product">
          <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="{{asset('images/'.$product->url_image)}}"/>       
            <div class="card-body">           
              <p class="card-text">Description : {{$product->description}}<br></p>            
            </div>           
          </div>
        </div>
        <p class="details">{{$product->title}}<br>
                 Référence : {{$product->reference}}<br>
                 {{$product->price}} euros
                 
                 <br><br>
                 <span class="custom-dropdown custom-dropdown--white">
                    <select class="custom-dropdown__select custom-dropdown__select--white">
                    @forelse($products as $product)
                        <option>Taille {{$product->size}}</option>
                        @empty<p>Pas d'article disponible</p>
                        @endforelse
                    </select>
                  </span>
        </p>  
</div>
@endsection