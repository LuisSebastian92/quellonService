<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Place;
use App\Models\Productclean;
use App\Models\Productdesinfection;
use App\Models\Boat;
use App\Models\User;
class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::with('client')->get();
        return view('certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $certificates = new Certificate();
        $clients = Client::where('status', 1)->get();
        $boats = Boat::where('status', 1)->get();
        $places = Place::where('status' ,1)->get();
        $productcleans = Productclean::where('status',1)->get();
        $productdesinfections = Productdesinfection::where('status',1)->get();
        $users = User::all();
      
        return view('certificates.create',compact('certificates','clients','boats','productcleans','productdesinfections','users','places'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $highest_Cnumber = Certificate::max('Cnumber');
        $certificate = new Certificate();
        $Cnumber = $highest_Cnumber + 1;
        Certificate::create($request->all());
        return redirect()->route('certificates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $certificate_id)
    {
        $certificate = Certificate::find($certificate_id);
        $client=client::all();

        return view('certificates.show',compact('certificate','client'));
    }
    public function ticket(string $certificate_id)
    {
      $certificate = Certificate::find($certificate_id);
      $client=Client::all();

      return view('certificates.ticket',compact('client','certificate'));
    }
    public function download($certificate_id)
{
    // Obtén el certificado y otros datos necesarios según tu lógica

    $data = [
        'certificate' => $certificate,
        // Otros datos necesarios
    ];

    $pdf = PDF::loadView('certificates.show', $data);
    $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'Arial']);

    $filename = 'certificate.pdf';

    // Descarga el PDF en lugar de mostrarlo en el navegador
    return $pdf->download($filename);
}
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $certificate_id)
    {
        $certificate=Certificate::find($certificate_id);
        $clients = client::all();
        $productcleans = Productclean::all();
        $productdesinfections = Productdesinfection::all();
        $places=Place::all();
        $boats=Boat::all();
        $users=User::all();
        return view('certificates.edit',compact('certificate','clients','productcleans','productdesinfections','places','boats','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $certificate_id)
    {
        $certificate = Certificate::findOrFail($certificate_id);
        $certificate->update($request->all());
        return redirect()->route('certificates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $certificate_id)
    {
        $certificate = Certificate::find($certificate_id);
        $certificate->delete();
        return redirect()->route('certificates.index');
    }
}
