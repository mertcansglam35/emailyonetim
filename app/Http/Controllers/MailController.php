<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mailyonetim;

class MailController extends Controller
{
    public function index()
    {
        return view('include.mail-olustur');
    }

    public function MailOlusturPost(Request $request)
    {
        $request->validate([
            "baslik" => "required",
            "metin" => "required",
            "tema" => "required"
        ]);

        Mailyonetim::create([
            "baslik" => $request->post('baslik'),
            "metin" => $request->post('metin'),
            "tema" => $request->post('tema')
        ]);

        return redirect()->route('toplu-mail-olustur')->with('success', 'Mail Tanımlama İşlemi Başarılı!');
    }
}
