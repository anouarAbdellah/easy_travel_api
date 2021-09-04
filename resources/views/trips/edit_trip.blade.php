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
                        <h3 class="mb-0">Trips</h3>
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
                        <form action="{{route('update_trip', $trip->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4 mb-4">
                                <label for="start">Start :</label>
                                <input type="datetime-local" value="{{ Carbon\Carbon::parse($trip->start)->format('Y-m-d\TH:i') }}" required class="form-control" name="start" id="start">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="driver_id">Driver :</label>
                                <select required class="form-control" name="driver_id" id="driver_id">
                                    @foreach ($drivers as $driver)
                                        <option value="{{$driver->id}}" {{ $trip->driver_id == $driver->id ? 'selected' : '' }}>{{$driver->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="vehicle_id">Vehicle :</label>
                                <select required class="form-control" name="vehicle_id" id="vehicle_id">
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{$vehicle->id}}" {{ $trip->vehicle_id == $vehicle->id ? 'selected' : '' }}>{{$vehicle->name}} / {{$vehicle->number}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <label for="corona_mode">Corona mode:</label>
                                <input type="checkbox" name="corona_mode" {{ $trip->corona_mode == 1 ? 'checked' : '' }} id="corona_mode">
                            </div>
                            <h3>Points</h3>
                            <button type="button" class="btn btn-info" onclick="addPoint()">Add</button>
                            <div >
                                <table class="table table-hover">
                                    <thead>
                                        <th>City</th>
                                        <th>Time</th>
                                        <th>Price</th>
                                        <th></th>
                                    </thead>
                                    <tbody id="addPointsHolder">
                                        @foreach ($trip->points as $key => $item)
                                            <tr id="pointContainer{{$key}}" class="pointContainer">
                                                <td>
                                                    <input type="hidden" name="points[]" value="{{$item->id}}">
                                                    <select name="city_id[]" class="form-control">
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}" {{$city->id == $item->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="datetime-local" name="time[]" value="{{Carbon\Carbon::parse($item->time)->format('Y-m-d\TH:i')}}" class="form-control" required></td>
                                                <td><input type="number" name="price[]" value="{{$item->price}}" class="form-control" required></td>
                                                <td><button type="button" class="btn btn-danger" onclick="deletePoint({{$key}})">Supprimer</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        function addPoint() {
            var countPoints = $('#pointContainer');
            html = '<tr id="pointContainer'+countPoints.length+'" class="pointContainer"><td><select name="city_id[]" class="form-control">';
            @foreach($cities as $city)
            html += '<option value="{{$city->id}}">{{$city->name}}</option>'; 
            @endforeach
            html += '</select></td><td><input type="datetime-local" name="time[]" class="form-control" required></td><td><input type="number" name="price[]" class="form-control" required></td><td><button type="button" class="btn btn-danger" onclick="deletePoint('+countPoints.length+')">Supprimer</button></td></tr>'
            var tableBody = document.getElementById('addPointsHolder');
            $('#addPointsHolder').append(html)
        }
        function deletePoint(index) {
            $('#pointContainer'+index).remove()
        }
    </script>
@endsection