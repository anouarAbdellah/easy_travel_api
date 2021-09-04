@extends('layouts.main')

@section('content')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Ajouter</h6>
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
                        <h3 class="mb-0">Vehicles</h3>
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
                        <form action="{{route('save_vehicle')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4 mb-4">
                                <label for="image">Image :</label>
                                <input type="file" required class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="name">Nom :</label>
                                <input type="text" value="{{ old('name') }}" required class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="type">Type :</label>
                                <select required class="form-control" onchange="changeVihcleType()" name="type" id="type">
                                    <option></option>
                                    <option value="Train">Train</option>
                                    <option value="Car">Car</option>
                                    <option value="Mini bus">Mini bus</option>
                                </select>
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="number">Number :</label>
                                <input type="text" value="{{ old('number') }}" required class="form-control" name="number" id="number">
                            </div>
                            <div class="form-group mt-4 mb-4" id="carts_container" style="display: none;">
                                <label for="carts">Carts :</label>
                                <input type="number" value="{{old('carts')}}" class="form-control" name="carts" id="carts">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="seats">Seats :</label>
                                <input type="number" value="{{old('seats')}}" required class="form-control" name="seats" id="seats">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="seats">Equipements :</label>
                                <div>
                                    <ul>
                                        <li><input type="checkbox" name="equipements[]" value="wifi"> Wifi</li>
                                        <li><input type="checkbox" name="equipements[]" value="free masks"> Free masks</li>
                                        <li><input type="checkbox" name="equipements[]" value="free water"> Free water</li>
                                        <li><input type="checkbox" name="equipements[]" value="air-conditioner"> Air-conditioner</li>
                                        <li><input type="checkbox" name="equipements[]" value="lagage service"> Lagage service</li>
                                        <li><input type="checkbox" name="equipements[]" value="waiting room"> Waiting room</li>
                                        <li><input type="checkbox" name="equipements[]" value="individual lamp"> Individual lamp</li>
                                    </ul>
                                </div>
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
                        &copy; 2021 <a href="https://www.sitedyali.ma/" class="font-weight-bold ml-1"
                            target="_blank">EasyTravel</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.sitedyali.ma/" class="nav-link" target="_blank">EasyTravel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('scripts')
    <script>
        function changeVihcleType() {
            if($('#type').val() == 'Train') {
                $('#carts_container').show();
                $('#carts').attr('required', 'required');
            } else {
                $('#carts_container').hide();
                $('#carts').removeAttr('required');
            }
        }
    </script>
@endsection