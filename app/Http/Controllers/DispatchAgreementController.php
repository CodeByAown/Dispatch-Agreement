<?php

namespace App\Http\Controllers;

use App\Models\DispatchAgreement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DispatchAgreementController extends Controller
{

    public function index()
{
    $agreements = DispatchAgreement::latest()->paginate(10);
    return view('agreements.index', compact('agreements'));
}
    // Show the form (Step 1)
    public function create()
    {
        return view('agreements.create');
    }

    // Save data and show agreement (Step 2)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'effective_date' => 'required|date',
            'dispatch_fee' => 'required|numeric|min:1|max:25',
            'carrier_name' => 'required|string|max:255',
            'carrier_rep' => 'required|string|max:255',
            'mc_number' => 'required|string|max:255',
            'dot_number' => 'required|string|max:255',
            'carrier_email' => 'required|email|max:255',
            'carrier_phone' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'poa' => 'nullable|in:Yes,No',
        ]);

        $agreement = DispatchAgreement::create($validated);

        return redirect()->route('agreements.show', $agreement->id);
    }

    // Show the agreement (Step 2)
    public function show($id)
    {
        $agreement = DispatchAgreement::findOrFail($id);
        return view('agreements.show', compact('agreement'));
    }

    // Generate PDF
    public function downloadPdf($id)
    {
        $agreement = DispatchAgreement::findOrFail($id);

        $pdf = Pdf::loadView('agreements.pdf', compact('agreement'));

        return $pdf->download('dispatch-agreement-' . $agreement->id . '.pdf');
    }
}
