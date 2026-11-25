<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'price', 'category_id', 'description',
        'thumbnail', 'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'price'    => 'float',
    ];

    // ---------- Relations ----------
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    // ---------- Helpers promotions ----------

    /**
     * La promotion actuellement active (la plus avantageuse) ou null.
     */
    public function activePromotion(): ?Promotion
    {
        return $this->promotions
            ->filter(fn($p) => $p->isActive())
            ->sortByDesc(fn($p) => $p->savings($this->price))
            ->first();
    }

    /**
     * Prix final (avec la meilleure promo active).
     */
    public function finalPrice(): float
    {
        $promo = $this->activePromotion();
        return $promo ? $promo->applyTo($this->price) : (float) $this->price;
    }

    /**
     * Économie réalisée par rapport au prix de base.
     */
    public function savings(): float
    {
        return round($this->price - $this->finalPrice(), 2);
    }

    /**
     * Accesseurs pratiques.
     */
    public function getFinalPriceAttribute(): float
    {
        return $this->finalPrice();
    }

    public function getHasDiscountAttribute(): bool
    {
        return $this->activePromotion() !== null;
    }

    public function getDiscountLabelAttribute(): ?string
    {
        return $this->activePromotion()?->discount_label;
    }
}
