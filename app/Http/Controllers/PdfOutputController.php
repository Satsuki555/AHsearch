<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pet;

use PDF;

class PdfOutputController extends Controller
{
    public function output($id) {
        $pet = Pet::find($id);
        // dd($pet);
        $data = [
            'name' => $pet->name,
        ];
        $pdf = \PDF::loadView('mypage.pet.pdf',['pet' => $pet]);
        $pdf -> setPaper('A4');
        return $pdf -> stream();
    }
}
