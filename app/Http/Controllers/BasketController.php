<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;

class BasketController extends Controller
{
    public function index(Request $request) {
        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            return view('basket', ['products'=>$products]);
        } else {
            abort(404);
        }
    }

    public function checkout() {
        return view('basket.checkout');
    }

    public function add(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        $quantity = $request->input('quantity') ?? 1;
        if (empty($basket_id)) {
            
            $basket = Basket::create();
           
            $basket_id = $basket->id;
        } else {
            
            $basket = Basket::findOrFail($basket_id);
            // обновляем поле `updated_at` таблицы `baskets`
            $basket->touch();
        }
        if ($basket->products->contains($id)) {
            // если такой товар есть в корзине — изменяем кол-во
            $pivotRow = $basket->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            // если такого товара нет в корзине — добавляем его
            $basket->products()->attach($id, ['quantity' => $quantity]);
        }
        // выполняем редирект обратно на страницу, где была нажата кнопка «В корзину»
        return view('basket');
    }
}
