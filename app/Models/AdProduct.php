<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdProduct extends Model
{
    /** @use HasFactory<\Database\Factories\AdProductFactory> */
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'images',
        'category',
        'prices',
        'promotional_price',
        'quantity',
        'status',
        'type',
        'locate',
        'tags',
        'contact_link',
        'expired_at',
    ];

    protected $casts = [
        'prices' => 'array',
        'tags' => 'array',
        'promotional_price' => 'float',
        'quantity' => 'integer',
        'images' => 'array',
    ];

    protected $hidden = [
        'user_id',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'expired_at' => 'datetime',
        ];
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }
}
