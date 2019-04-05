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

            // Exporting UTF-8 data
            fputs($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            // Add CSV headers
            fputcsv($handle, [
                'Nombre',
                'Tipo',
                'Clasificación',
                'Peso'
            ]);
            
            foreach (Pokemon::all() as $pokemon) {
                // Add new row with data
                fputcsv($handle, [
                    $pokemon->name,
                    $pokemon->type,
                    $pokemon->clasification,
                    $pokemon->weight
                ]);
            }

            // Close the ouput stream
            fclose($handle);  
        }, 200, $headers);

        return $response;
    }
}
