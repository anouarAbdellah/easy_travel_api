<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        div.page
        {
            page-break-inside: avoid;
        }
        @page {
            margin: 0px 0px;
        }
        table, td, th {
            border: 1px solid black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="page" style="font-family: arial;height: 100%;width: 100%;margin: 0px;padding: 0px;">
        <table style="padding-top: 20px; border: none;width: 90%; margin-left: 40px;">
            <tr style="border: none;">
                <td style="border: none;">
                    <table style="margin: 0px 10px">
                        <tbody>
                            <tr>
                                <th>Seat : </th>
                                <td>
                                    {{$reservation->seat}}
                                </td>
                            </tr>
                            @if ($reservation->trip->vehicle->type == 'Train')
                                <tr>
                                    <th>Cart : </th>
                                    <td>
                                        {{$reservation->cart}}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th>From : </th>
                                <td>{{$reservation->start_point->city->name}}</td>
                            </tr>
                            <tr>
                                <th>To : </th>
                                <td>{{$reservation->end_point->city->name}}</td>
                            </tr>
                            <tr>
                                <th>Date : </th>
                                <td>{{$reservation->start_point->time}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; padding-top: 20px">
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($reservation->number, 'C39+',2,60,array(0,0,0))}}" style="width: 90%" alt="barcode" />
                </td>
            </tr>
        </table>
    </div>
</body>
</html>