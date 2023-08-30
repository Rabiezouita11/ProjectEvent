<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateQR(Request $request)
    {
        // Get the information you want to encode in the QR code
        $event_id = $request->input('event_id');
        $event_name = $request->input('event_name');
        $event_date = '2023-09-01'; // Example event date
    
        // Create an array to represent the event data
        $eventData = [
            'event_id' => $event_id,
            'event_name' => $event_name,
            'event_date' => $event_date,
            // Add more event details here
        ];
        $qrCodeContent = json_encode($eventData);
        // Generate the QR code with logo and design
        $qrCode = QrCode::format('png')
            ->size(200)
            ->merge('client\images\logo.png', 0.8, true)
            ->backgroundColor(255, 255, 255)
            ->color(0, 0, 0)
            ->generate($qrCodeContent);

        // Directory to store QR code images
        $directory = storage_path('app/public/qrcodes');

        // Create the directory if it doesn't exist
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Generate a unique filename
        $filename = time() . '.png';
        $filePath = $directory . '/' . $filename;

        // Save the QR code as an image file
        file_put_contents($filePath, $qrCode);

        // Return the filename for the download link
        return view('home', ['qrFilename' => $filename]);
    }

    public function downloadQR($filename)
    {
        $filePath = storage_path('app/public/qrcodes/' . $filename);

        return response()->download($filePath, 'qr_code.png');
    }
}
