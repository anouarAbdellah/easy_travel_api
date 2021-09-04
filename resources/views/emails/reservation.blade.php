@component('mail::message')
<div style="padding: 18px 0px; text-align: center;font-size: 21px;background: #eb8434;color: #ffffff;margin-bottom: 16px;">
    Thank for your reservation
</div>

Hello {{ $reservations[0]->name }},<br/>

Thank you for reserving a seat in the trip in our plateform :<br/>

You can find here the links to download your tickets.

<div style="color: #2b2b2b; font-size: 18px; font-weight: 600;">
     ({{ Carbon\Carbon::now() }})
</div>

<table style="border-collapse: collapse;border: 1px solid #666666;width: 100%;text-align: center;">
<thead>
<tr style="border: 1px solid #666666;">

<th style="border: 1px solid #666666;">Seat</th>

@if ($reservations[0]->trip->vehicle->type == 'Train')
<th style="border: 1px solid #666666;">Cart</th>
@endif

<th style="border: 1px solid #666666;">From</th>

<th style="border: 1px solid #666666;">To</th>

<th style="border: 1px solid #666666;">Ticket</th>

</tr>
</thead>
<tbody>
@foreach ($reservations as $reservation)

<tr style="border: 1px solid #666666;">

<td style="border: 1px solid #666666;text-align: center;">{{ $reservation->seat }}</td>

@if ($reservation->trip->vehicle->type == 'Train')
<td style="border: 1px solid #666666;text-align: center;">{{ $reservation->cart }}</td>
@endif

<td style="border: 1px solid #666666;text-align: center;">{{ $reservation->start_point->city->name }}</td>

<td style="border: 1px solid #666666;text-align: center;">{{ $reservation->end_point->city->name }}</td>

<td style="border: 1px solid #666666;text-align: center;"><a href="{{ route('ticket', $reservation->id) }}">Download</a></td>

</tr>
@endforeach

</tbody>






</table>
</div>

<div style="padding: 10px 20px; font-size: 17px; line-height: 24px; border: 1px solid; width: 98%; margin: 13px 0px;">
    {{$reservations[0]->name}} <br>
    {{$reservations[0]->email}} <br>
    {{$reservations[0]->phone}}
</div>

Easy travel
@endcomponent
