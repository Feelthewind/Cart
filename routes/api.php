<?php

use App\Models\Category;

Route::get('/', function () {
    $categories = Category::parents()->ordered()->get();

    dd($categories);
});
 