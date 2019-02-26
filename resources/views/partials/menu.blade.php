<nav class="navbar navbar-inverse">
    <h1 class="mx-auto">La Maison</h1>
    <div class="container-fluid">
    <div class="navbar-header">
        <span class="icon-bar"><a href="{{asset(url('/'))}}">Accueil</a></span>
        <span  class="icon-bar"><a href="{{asset(url('/solde'))}}">SOLDES</span>  
        @if(isset($categories))
        @forelse($categories as $id => $title)      
        <span  class="icon-bar"><a href="{{asset(url('categorie', $title))}}">{{$title}}</a></span>
        @empty 
        <li>Aucune categorie pour l'instant</li>
        @endforelse
        @endif        
    </div>
    </div>
</nav>