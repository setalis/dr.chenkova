<?php

namespace App\Http\Controllers;

use App\Models\TestSession;
use Illuminate\Http\Response;

class TestResultController extends Controller
{
    public function downloadPdf(TestSession $session)
    {
        $pdf = \PDF::loadView('pdf.result', [
            'session' => $session,
            'result' => $session->skin_type_code
        ]);

        return $pdf->download('skin-type.pdf');
    }
} 