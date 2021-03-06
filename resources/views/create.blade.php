@extends('layout.master')

@section('content')

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Ajouter un produit :  </h1>
                <form action="{{asset(url('products/store'))}}" method="post">
                    {{ csrf_field() }}
                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" value="" class="form-control" id="title" placeholder="Titre du produit">
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input type="text" name="price" class="form-control" placeholder="Prix">
                        </div>
                        
                    </div>
                    <div class="form-select">
                    <label for="categorie">Categorie :</label>
                    <select id="categorie" name="categorie">
                        @foreach($categories as $id => $title)
                            <option value="{{$id}}">{{$title}}</option>
                        @endforeach
                    </select>

                        <label for="size">Taille :</label>
                        <select id="size" name="size">
                            @forelse($product as $item)
                            <option>{{$item->size}}</option>
                            @empty
                            <option>aucune taille disponible</option>
                            @endforelse
                            @if($errors->has('size')) <span
                                class="error bg-warning">{{$errors->first('size')}}</span>@endif
                        </select>
                        
                    
                    </div>
            
                    <button type="submit" class="btn btn-primary">Ajouter un produit</button>
            </div><!-- #end col md 6 -->
            <div class="col-md-6">

               
            <div class="input-radio">
                <h2>Status</h2>
                    <input type="radio" name="status" value="Publié" checked> Publié<br>
                    <input type="radio" name="status" value="Brouillon"> Brouillon<br>
                </div>

               
            <div class="input-file">
                <h2>Image :</h2>
                <input class="file" type="file" name="url_image" >
            </div>

            <div style="margin-top: 10px" class="form-select">
                        <label for="code">Code produit :</label>
                        <select id="code" name="code" class="form-control">
                            <option>soldes</option>
                            <option selected>nouveautés</option>
                        </select>
            </div>

            <div class="form-group">
                <label for="reference">Référence :</label>
                <input type="text" name="reference" class="form-control" placeholder="Référence">
            </div>

                        </div><!-- #end col md 6 -->
            </form>
        </div>
@endsection






