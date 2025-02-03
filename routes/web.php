<?php

use App\Livewire\AboutToExpire;
use App\Livewire\ExpiredCustomers;
use App\Livewire\Dashboard;
use App\Livewire\Customer\CreateCustomer;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/bitmek-uzere-olanlar', AboutToExpire::class)->name('about-to-expire');
Route::get('/bitenler', ExpiredCustomers::class)->name('expired-customers');
Route::get('/musteri-ekle', CreateCustomer::class)->name('customer.create');
