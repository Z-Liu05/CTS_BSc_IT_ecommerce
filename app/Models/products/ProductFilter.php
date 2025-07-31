<?php

namespace App\Models\products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFilter extends Product
{
    use HasFactory;

    protected $table = 'products';

    /**
     * Filter function
     *
     * Filters the products based on $query acquired from $value give by the user
     *
     * @param [type] $query - the command used
     * @param array $values - requirement give by the user
     * @return void
     */
    public function scopeFilter($query, array $values){
        $query->searchTitle($values['search'] ?? '')
        ->priceGreaterThan($values['greater_than'] ?? '')
        ->priceLowerThan($values['lower_than'] ?? '')
        ->categoryFor($values['category'] ?? '')
        ->sortBy($values['sort'] ?? 'id');
    }


    /**
     * Search function
     *
     * Search the products based on $query acquired from $value give by the user
     *
     * @param [type] $query - the command used
     * @param [type] $value - requirement give by the user
     * @return void
     */
    public function scopeSearchTitle($query, $value){
        if(!empty($value)){
            $query->where('title', 'LIKE', '%'.$value.'%');
        }
    }


    public function scopePriceGreaterThan($query, $value){
        if(!empty($value)){
            $query->where('price', '>=', $value);
        }
    }


    public function scopePriceLowerThan($query, $value){
        if(!empty($value)){
            $query->where('price', '<=', $value);
        }
    }


    public function scopeCategoryFor($query, $value = 'id'){
        if(!empty($value)){
            $query->where('category', $value);
        }
    }

    public function scopeSortBy($query, $value){
        switch($value){
            case 'title_asc':
                $query->reorder('title');
                break;
            case 'price_asc':
                $query->reorder('price');
                break;
            case 'price_desc':
                $query->reorder('price', 'desc');
                break;
            case 'category':
                $query->reorder('category');
                break;
            default:
                $query->reorder('id');
                break;
        }
    }
}
