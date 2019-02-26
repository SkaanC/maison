<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'categorie_id', 'status', 'url_image', 'size', 'code', 'price', 'reference'
    ];

    public function categorie()
{
    return $this->belongsTo(Categorie::class)->withDefault();

}

public function scopeStatus($query){ //scope : selectionne
        return $query->where('status', 'publié'); //retourner les status publié
}
}
