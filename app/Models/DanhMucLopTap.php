<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DanhMucLopTap extends Model
{
    protected $table = 'training_categories';
    protected $fillable = [
        'category_name', 'price', 'duration_days', 'deleted'
    ];
    public $timestamps = false;

    // Legacy accessors to keep old views consistent
    public function getTenloptapAttribute() { return $this->attributes['category_name'] ?? null; }
    public function getGiaAttribute() { return $this->attributes['price'] ?? null; }
    public function getThoigianAttribute() { return $this->attributes['duration_days'] ?? null; }

    // Legacy mutators
    public function setTenloptapAttribute($v) { $this->attributes['category_name'] = $v; }
    public function setGiaAttribute($v) { $this->attributes['price'] = $v; }
    public function setThoigianAttribute($v) { $this->attributes['duration_days'] = $v; }
}