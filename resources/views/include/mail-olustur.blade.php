@extends('master')
@section('title')
    Toplu Mail Tanımlama - Toplu Mail Yönetimi
@endsection
@section('css')
<style>
.resim {
    width: 300px;
    display: block;
    float: left;;
    margin: 8px;
}
</style>
@endsection

@section('main')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Yeni Mail Oluştur</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Yeni Mail Oluştur</li>
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
                    <form action="{{route('mail-olustur-post')}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 text-uppercase">Yeni Mail Oluştur</h6>
                                <hr/>

                                <input class="form-control mb-3" name="baslik" type="text" placeholder="Mail Konusu" aria-label="default input example">

                                <textarea id="mytextarea" name="metin"></textarea>
                                <br>
                                <select class="form-control mb-3" name="tema" aria-label="default input example">
                                    <option value="1">Şablon 1</option>
                                    <option value="2">Şablon 2</option>
                                    <option value="3">Şablon 3</option>
                                </select>
                                <div class="col-md-12" style="display: block; clear: both;">
                                    <img src="{{asset('tema/tema1.PNG')}}" class="resim">
                                    <img src="{{asset('tema/tema2.PNG')}}" class="resim">
                                    <img src="{{asset('tema/tema3.PNG')}}" class="resim">
                                </div>

                                <br><br>
                                <div class="col-md-12" style="display: block; clear: both;">
                                <input class="btn btn-success mb-3" name="ilet" type="submit" value="YENİ MAİL OLUŞTUR" aria-label="default input example">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'>
    </script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
@endsection
