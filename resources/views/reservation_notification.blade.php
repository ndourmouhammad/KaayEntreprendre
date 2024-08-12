<!DOCTYPE html>
<html>
<head>
    <title>Réservation</title>
</head>
<body>
    <h1>Réservation</h1>
    <p>Bonjour {{ $reservation->user->name }},</p>
    <p>Vous avez une nouvelle réservation pour l'événement "{{ $reservation->evenement->name }}"</p>
    <p>Statut de la réservation : {{ $reservation->status }}</p>
</body>
</html>
