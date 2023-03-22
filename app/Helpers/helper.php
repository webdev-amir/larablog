<?php
use Illuminate\Support\Str;
use App\Models\Blog;

function createUniqueSlug()
{
    $slug = Str::random(10);
    $slugCount = Blog::where('slug', $slug)->count();
    if ($slugCount > 0) {
        return createUniqueSlug();
    }
    return $slug;
}

function pre($data, $exit = true)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    if ($exit)
    die;
}
