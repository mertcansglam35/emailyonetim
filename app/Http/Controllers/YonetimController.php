<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteriler;

class YonetimController extends Controller
{
    public function index()
    {
        return view('include.home');
    }

    public function musteriEkle()
    {
        return view('include.musteri-ekle');
    }

    public function MusteriEklePost(Request $request)
    {
        $request->validate([
            'adsoyad' => 'required',
            'mail' => 'required|email:rfc,dns',
            'telefon' => 'required'
        ]);

        Musteriler::create([
            'adsoyad' => $request->post('adsoyad'),
            'mail' => $request->post('mail'),
            'telefon' => $request->post('telefon')
        ]);
        return redirect()->route('musteri-ekle')->with('success', 'Müşteri Bilgisi Başarıyla Eklendi.!');
    }

    public function musteriListe()
    {
        $musteriler = Musteriler::all();
        return view('include.musteri-liste', compact('musteriler'));
    }

    public function musteriDuzenle($id)
    {
        $musteriBilgisi = Musteriler::whereId($id)->first();
        if ($musteriBilgisi)
        {
            return view('include.musteri-duzenle', compact('musteriBilgisi'));
        }
        else
        {
            return redirect()->route('musteri-liste');
        }
    }

    public function MusteriDuzenlePost(Request $request, $id)
    {
        $request->validate([
            'adsoyad' => 'required',
            'mail' => 'required|email:rfc,dns',
            'telefon' => 'required'
        ]);

        Musteriler::whereId($id)->update([
            'adsoyad' => $request->post('adsoyad'),
            'mail' => $request->post('mail'),
            'telefon' => $request->post('telefon')
        ]);

        return redirect()->route('musteri-duzenle', $id)->with('success', 'Müşteri Bilgisi Başarıyla Güncellendi.!');
    }

    public function musteriSil($id)
    {
        $musteriBilgisi = Musteriler::whereId($id)->first();
        if ($musteriBilgisi)
        {
            Musteriler::whereId($id)->delete();
        }

        return redirect()->route('musteri-liste')->with('success', 'Müşteri Bilgisi Başarıyla Kaldırılmıştır.!');
    }
}
