<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string',
            'notes' => 'nullable|string',
            'cart_items' => 'required|json',
        ]);

        $cartItems = json_decode($validated['cart_items'], true);

        if (empty($cartItems)) {
            return back()->with('error', 'Votre panier est vide.');
        }

        try {
            DB::beginTransaction();

            $totalAmount = 0;
            foreach ($cartItems as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'] ?? null,
                'customer_address' => $validated['customer_address'] ?? null,
                'total_amount' => $totalAmount,
                'notes' => $validated['notes'] ?? null,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'service_id' => $item['id'],
                    'service_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            return redirect()->route('order.confirmation', $order->id)
                ->with('success', 'Votre commande a été créée avec succès!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue lors de la création de votre commande.');
        }
    }

    public function confirmation($id)
    {
        $order = Order::with('items')->findOrFail($id);
        
        return view('order.confirmation', compact('order'));
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->orWhere('customer_email', auth()->user()->email)
            ->with('items')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('order.my-orders', compact('orders'));
    }
}

