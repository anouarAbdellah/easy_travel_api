@extends('layouts.main')

@section('content')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Reservations</h6>
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
                        <h3 class="mb-0">Reservations</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table style="margin: 10px;font-size: 18px;">
                            <tr>
                                <td class="text-primary">
                                    Name : 
                                </td>
                                <td>
                                    {{$reservation->name}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    Email : 
                                </td>
                                <td>
                                    {{$reservation->email}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    Phone : 
                                </td>
                                <td>
                                    {{$reservation->phone}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    Reservation date : 
                                </td>
                                <td>
                                    {{$reservation->created_at}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    Date : 
                                </td>
                                <td>
                                    {{$reservation->trip->start}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    From : 
                                </td>
                                <td>
                                    {{$reservation->start_point->city->name}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    To : 
                                </td>
                                <td>
                                    {{$reservation->end_point->city->name}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    Seat : 
                                </td>
                                <td>
                                    {{$reservation->seat}}
                                </td>
                            </tr>
                            @if ($reservation->trip->vehicle->type == 'Train')
                                <tr>
                                    <td class="text-primary">
                                        Cart : 
                                    </td>
                                    <td>
                                        {{$reservation->cart}}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td class="text-primary">
                                    Driver : 
                                </td>
                                <td>
                                    {{$reservation->trip->driver->name}} / {{$reservation->trip->driver->cin}} / {{$reservation->trip->driver->phone}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    Vehicle : 
                                </td>
                                <td>
                                    {{$reservation->trip->vehicle->name}} / {{$reservation->trip->vehicle->number}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    Reservation number : 
                                </td>
                                <td>
                                    {{$reservation->number}}
                                </td>
                            </tr>
                        </table>
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

@section('scripts')
    <script>
        
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "language": {
                    "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                    "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ",",
                    "sLengthMenu":     "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing":     "Traitement...",
                    "sSearch":         "Rechercher :",
                    "sZeroRecords":    "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst":    "Premier",
                        "sLast":     "Dernier",
                        "sNext":     ">",
                        "sPrevious": "<"
                    },
                    "oAria": {
                        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    "select": {
                        "rows": {
                            "_": "%d lignes sélectionnées",
                            "0": "Aucune ligne sélectionnée",
                            "1": "1 ligne sélectionnée"
                        }
                    }
                }
            });
        });
    </script>
@endsection
