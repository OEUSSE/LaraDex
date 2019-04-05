<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use LaraDex\Pokemon;

class TestController extends Controller
{
    public function ExportCsv(Request $request) {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="export.csv"'
        ];

        $response = new StreamedResponse(function () {
            // Open output stream
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, [
                'Nombre',
                'Tipo',
                utf8_decode('Clasificación'),
                'Peso'
            ]);
            
            foreach (Pokemon::all() as $pokemon) {
                // Add new row with data
                fputcsv($handle, [
                    utf8_decode($pokemon->name),
                    utf8_decode($pokemon->type),
                    utf8_decode($pokemon->clasification),
                    $pokemon->weight
                ]);
            }

            // Close the ouput stream
            fclose($handle);  
        }, 200, $headers);

        return $response;
    }
}
