<?php

DB::table('book_inventory')->insert([
    'title' => 'The Three-Body Problem',
    'author' => 'Cixin Liuu',
    'number_available' => 5
]);

DB::table('book_inventory')
    ->where('title', '=', 'The Three-Body Problem')
    ->update(['Author' => 'Cixin Liu']);

DB::table('book_inventory')
    ->where('title', '=', 'The Three-Body Problem')
    ->decrement('number_available', 1);