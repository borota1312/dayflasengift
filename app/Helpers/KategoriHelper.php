<?php

use App\Models\Kategori;

function kategori()
{
    $kategori = Kategori::all();
    return $kategori;
}
