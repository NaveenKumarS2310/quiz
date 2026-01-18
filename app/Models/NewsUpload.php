<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsUpload extends Model
{
    use HasFactory;

    protected $table = "news_article_upload";
}
