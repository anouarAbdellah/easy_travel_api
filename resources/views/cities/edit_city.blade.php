@extends('layouts.main')

@section('content')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Modifier</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Cities</h3>
                    </div>
                    <!-- Light table -->
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('update_city', $city->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4 mb-4">
                                <label for="name">Nom :</label>
                                <input type="text" value="{{$city->name}}"  required class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="lat">Lat :</label>
                                <input type="text" value="{{$city->lat}}"  required class="form-control" name="lat" id="lat">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="lng">Lng :</label>
                                <input type="text" value="{{$city->lng}}"  required class="form-control" name="lng" id="lng">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <button class="btn btn-primary mar-bm" type="submit">
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2021 <a href="https://www.EasyTravel.com/" class="font-weight-bold ml-1"
                            target="_blank">EasyTravel</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.EasyTravel.com/" class="nav-link" target="_blank">EasyTravel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
@endsection
