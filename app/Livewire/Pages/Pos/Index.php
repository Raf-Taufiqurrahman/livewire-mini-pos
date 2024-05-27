<?php

namespace App\Livewire\Pages\Pos;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Index extends Component
{
    use WithPagination;

    // define layout
    #[Layout('layouts.app')]
    // define title
    #[Title('Pos')]

    // define property
    #[Url]
    public $search;
    public $carts;
    public $qty;
    public $totalQty;
    public $subTotalPrice;
    public $totalPrice;
    public $pay;
    public $change;

    // define lifecycle hook
    public function updatedPay()
    {
        // call method updateChange
        $this->updateChange();
    }

    // define method updateChange
    public function updateChange()
    {
        // do it when property pay is more than 0
        if($this->pay > 0 )
            // calculate change
            $this->change = $this->pay - $this->totalPrice;
        else
            // change is totalPrice
            $this->change = $this->totalPrice;
    }

    // define method addToCart
    public function addToCart($id)
    {
        // get product item by id
        $product = Product::findOrFail($id);

        // get cart items by product id and user id
        $cart = Cart::whereProductId($product->id)->whereUserId(auth()->user()->id)->first();

        // do it when cart is true
        if($cart){
            // do it when cart qty is less than product qty
            if($cart->qty < $product->qty)
                // update cart qty
                $cart->update([
                    'qty' => $cart->qty + 1,
                ]);
        }else{
            // create new cart data
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'qty' => 1,
                'price' => $product->price,
            ]);
        }

        // render view
        return $this->redirect('/pos', navigate: true);
    }

    public function removeItem($id)
    {
        // get cart data by id
        $cart = Cart::findOrFail($id);

        // delete cart data
        $cart->delete();

        // render view
        return $this->redirect('/pos', navigate: true);
    }

    public function incrementQty($id)
    {
        // get cart items by id
        $cart = Cart::whereId($id)->whereUserId(auth()->user()->id)->first();

        // get products by id
        $product = Product::findOrFail($cart->product_id);

        // do it when cart qty is less than product qty
        if($cart->qty < $product->qty){
            // update cart qty
            $cart->increment('qty');
            // update totalQty
            $this->totalQty[$cart->id] = $cart->qty;
            // update subTotalPrice
            $this->subTotalPrice[$cart->id] = $cart->qty * $cart->price;
            // update totalPrice
            $this->totalPrice += $cart->price;
            // update change
            $this->change = $this->totalPrice;
        }
    }

    public function decrementQty($id)
    {
        // get cart items by id
        $cart = Cart::whereId($id)->whereUserId(auth()->user()->id)->first();

        // do it when cart qty more than 1
        if($cart->qty > 1){
            // update cart qty
            $cart->decrement('qty');
            // update totalQty
            $this->totalQty[$cart->id] = $cart->qty;
            // update subTotalPrice
            $this->subTotalPrice[$cart->id] = $cart->qty * $cart->price;
            // update totalPrice
            $this->totalPrice -= $cart->price;
            // update change
            $this->change = $this->totalPrice;
        }
    }

    public function mount()
    {
        // call method userCarts
        $this->userCarts();

        // loop carts data
        foreach($this->carts as $cart){
            // set totalQty
            $this->totalQty[$cart->id] = $cart->qty;
            // set subTotalPrice
            $this->subTotalPrice[$cart->id] = $cart->qty * $cart->price;
            // set totalPrice
            $this->totalPrice = $this->totalPrice + $this->subTotalPrice[$cart->id];
            // set change
            $this->change = $this->totalPrice;
        }
    }

    public function userCarts()
    {
        // get carts data by userId
        $this->carts = Cart::whereUserId(auth()->user()->id)->get();
    }

    public function render()
    {
        // list products data
        $products = Product::query()
            ->with('category')
            ->when($this->search, function($query){
                $query->where('name', 'like', '%'. $this->search . '%');
            })->paginate(9);

        // render view
        return view('livewire.pages.pos.index', compact('products'));
    }
}
