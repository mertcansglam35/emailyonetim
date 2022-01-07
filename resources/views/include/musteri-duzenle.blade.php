@extends('master')
@section('title')
    Müşteri Düzenleme - Toplu Mail Yönetimi
@endsection
@section('css')

@endsection

@section('main')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Müşteri Düzenle</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Müşteri Düzenle</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if($errors->any())
                        @foreach($errors->all() as $hatalar)
                            <div class="alert alert-danger">
                                {{$hatalar}}
                            </div>
                        @endforeach
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('musteri-duzenle-post', $musteriBilgisi->id)}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 text-uppercase">Müşteri Düzenle</h6>
                                <hr/>
                                <input class="form-control mb-3" name="adsoyad" type="text" placeholder="Müşteri Adı / Firma Adı" value="{{ $musteriBilgisi->adsoyad }}" aria-label="default input example">
                                <input class="form-control mb-3" name="mail" type="text" placeholder="Müşteri E-Posta" value="{{ $musteriBilgisi->mail }}" aria-label="default input example">
                                <input class="form-control mb-3" name="telefon" type="text" placeholder="Müşteri Telefon" value="{{ $musteriBilgisi->telefon }}" aria-label="default input example">
                                <input class="btn btn-success mb-3" name="ilet" type="submit" value="MÜŞTERİ GÜNCELLE" aria-label="default input example">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')

@endsection
