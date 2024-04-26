<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    public function header() {
        return $this->hasOne(Header::class);
    }
    public function slider() {
        return $this->hasMany(Slider::class);
    }
    public function furniture() {
        return $this->hasMany(Furniture::class);
    }
    public function about() {
        return $this->hasOne(About::class);
    }
    public function blog() {
        return $this->hasMany(Blog::class);
    }
    public function client() {
        return $this->hasMany(Client::class);
    }
    public function info() {
        return $this->hasOne(Info::class);
    }
}
