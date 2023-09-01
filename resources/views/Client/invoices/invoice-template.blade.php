<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .invoice-header {
            text-align: center;
            background-color: #f0f0f0;
            padding: 10px;
        }
        .invoice-title {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .invoice-details {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .invoice-details h2 {
            font-size: 18px;
            margin: 0;
            color: #333;
        }
        .invoice-details ul {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }
        .invoice-details li {
            margin-bottom: 5px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .invoice-table th,
        .invoice-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .invoice-table th {
            background-color: #f0f0f0;
        }
        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }
        .invoice-total span {
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1 class="invoice-title">Facture</h1>
        </div>
        <div class="invoice-details">
            <h2>Informations sur l'Utilisateur:</h2>
            <ul>
                <li><strong>Nom:</strong> {{ $reservation->user->name }}</li>
                <li><strong>Email:</strong> {{ $reservation->user->email }}</li>
                <!-- Add more user details as needed -->
            </ul>
            <h2>Informations sur l'Événement:</h2>
            <ul>
                <li><strong>Nom de l'Événement:</strong> {{ $reservation->event->Nom }}</li>
                <li><strong>Date de l'Événement:</strong> {{ $reservation->event->start_date }} - {{ $reservation->event->end_date }}</li>
                <li><strong>Heure de Début:</strong> {{ $reservation->event->start_time }}</li>
                <li><strong>Heure de Fin:</strong> {{ $reservation->event->end_time }}</li>
                <li><strong>Lieu:</strong> {{ $reservation->event->Location }}</li>
                <!-- Add more event details as needed -->
            </ul>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- You can loop through items in the invoice here -->
                <tr>
                    <td>{{ $reservation->event->Nom }} Ticket</td>
                    <td>1</td>
                    <td>{{ $reservation->event->Prix }}</td>
                    <td>{{ $reservation->event->Prix }}</td>
                </tr>
                <!-- Add more items as needed -->
            </tbody>
        </table>
        <div class="invoice-total">
            <span>Total à payer: {{ $reservation->event->Prix }} TND</span>
        </div>
    </div>
</body>
</html>
