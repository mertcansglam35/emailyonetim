<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('include.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/index', 'YonetimController@index')->name('index');
Route::get('/musteri-ekle', 'YonetimController@musteriEkle')->name('musteri-ekle');
Route::post('/musteri-ekle-post', 'YonetimController@MusteriEklePost')->name('musteri-ekle-post');
Route::get('/musteri-liste', 'YonetimController@musteriListe')->name('musteri-liste');
Route::get('/musteri-duzenle/{id}', 'YonetimController@musteriDuzenle')->name('musteri-duzenle');
Route::post('/musteri-duzenle-post/{id}', 'YonetimController@MusteriDuzenlePost')->name('musteri-duzenle-post');
Route::get('/musteri-sil/{id}', 'YonetimController@musteriSil')->name('musteri-sil');
Route::get('/toplu-mail-olustur', 'MailController@index')->name('toplu-mail-olustur');
Route::post('/mail-olustur-post', 'MailController@MailOlusturPost')->name('mail-olustur-post');
