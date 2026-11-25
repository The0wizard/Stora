<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'book_id',
        'discount_type',
        'discount_value',
        'starts_at',
        'ends_at',
        'is_active',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
        'is_active' => 'boolean',
        'discount_value' => 'float',
    ];

    // ---------- Relations ----------
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // ---------- Helpers ----------

    /**
     * La promotion est-elle actuellement active (date + flag + valeur valide) ?
     */
    public function isActive(): bool
    {
        if (!$this->is_active) {
            return false;
        }
        $now = now();
        return $this->starts_at <= $now && $this->ends_at >= $now;
    }

    /**
     * Calcule le prix final d'un livre avec cette promo.
     */
    public function applyTo(float $originalPrice): float
    {
        if ($this->discount_type === 'percentage') {
            $final = $originalPrice * (1 - $this->discount_value / 100);
        } else {
            $final = $originalPrice - $this->discount_value;
        }
        return max(0, round($final, 2));
    }

    /**
     * Montant économisé.
     */
    public function savings(float $originalPrice): float
    {
        return round($originalPrice - $this->applyTo($originalPrice), 2);
    }

    /**
     * Label lisible : "-20%" ou "-20.00$"
     */
    public function getDiscountLabelAttribute(): string
    {
        return $this->discount_type === 'percentage'
            ? '-' . $this->discount_value . '%'
            : '-$' . number_format($this->discount_value, 2);
    }

    /**
     * Scope : promotions actuellement actives.
     */
    public function scopeActiveNow($query)
    {
        $now = now();
        return $query->where('is_active', true)
            ->where('starts_at', '<=', $now)
            ->where('ends_at', '>=', $now);
    }
}
