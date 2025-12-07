<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'total_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = 'ORD-' . strtoupper(uniqid());
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalAttribute()
    {
        return number_format($this->total_amount, 2, ',', ' ') . ' €';
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">En attente</span>',
            'confirmed' => '<span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">Confirmé</span>',
            'in_progress' => '<span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-semibold">En cours</span>',
            'completed' => '<span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">Terminé</span>',
            'cancelled' => '<span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-semibold">Annulé</span>',
            default => '<span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-semibold">Inconnu</span>',
        };
    }
}



