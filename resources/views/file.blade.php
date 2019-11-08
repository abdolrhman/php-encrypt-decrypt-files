@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Select File :</h1>
                <form method="post" action="{{route('upload')}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <input type="file" name="fileToEncrypt">


                    <div class="card">
                        <div class="card-header">
                            Get File Information
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <h5 class="card-title">File Size:- </h5>
                                <p class="card-text">{{ session('status')[0] }}</p>

                                <h5 class="card-title">File Extension:- </h5>
                                <p class="card-text">{{ session('status')[1] }}</p>

                                <h5 class="card-title">File Name:- </h5>
                                <p class="card-text">{{ session('status')[2] }}</p>

                            @endif

                            <button class="btn btn-dark" type="submit" name="action" value="save">Get File Information
                            </button>
                        </div>
                    </div>
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            Encrypt File
                        </div>
                        <div class="card-body">
                            <label for="fileName">File Name:- </label>
                            <input class="form-control col-md-4" type="text" name="fileName">

                        </div>
                        <div class="card-body">
                            <label for="fileLocation">File Location Path:- </label>
                            <br>
                            <input class="form-control col-md-4" type="text" name="fileLocation">
                        </div>
                        <div class="card-body">

                            <button class="btn btn-dark" type="submit" name="action" value="encryptFile">Encrypt
                            </button>
                            @if(session()->has('stats'))
                                <div class="alert alert-success">
                                    {{ session()->get('stats') }}
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            Decrypt File
                        </div>
                        <input type="file" name="fileToDecrypt">

                        <div class="card-body">
                            <label for="fileName">File Name:- </label>
                            <input class="form-control col-md-4" type="text" name="$fileNameDecryption">

                        </div>
                        <div class="card-body">
                            <label for="fileLocation2">File Location Path:- </label>
                            <br>
                            <input type="text" name="fileLocation2">
                        </div>
                        <div class="card-body">

                            <button class="btn btn-dark" type="submit" name="action" value="decryptFile">Decrypt
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
