<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'imageable_id', 'imageable_type'];

    protected $hidden = ['imageable_id', 'imageable_type', 'created_at', 'updated_at'];

    /**
     * 获取拥有此图片的模型
     */
    public function imageable()
    {
        return $this->morphTo('imageable', 'imageable_type', 'imageable_id', 'id');
    }

    // 图片访问器
    public function getUrlAttribute($url)
    {
//        return asset('storage/'.$url);
        return Storage::url($url);
    }
}
