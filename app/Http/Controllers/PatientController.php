<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function list_patient()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer tous les patients créés par l'utilisateur connecté et les paginer par trois éléments
        $patients = Patient::where('user_id', $user->id)->paginate(6);

        return view('layouts.patients.list', compact('patients'));
    }

    public function add_patient()
    {
        return view('layouts.patients.add');
    }

    public function add_request(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'telephone' => ['required', 'string', 'min:8', 'max:18'],
            'profession' => 'required',
            'adresse' => 'required',
            'date' => 'required',
            'dent' => 'required',
            'traitement' => 'required',
        ]);



        $patient = new Patient();
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->age = $request->age;
        $patient->telephone = $request->telephone;
        $patient->profession = $request->profession;
        $patient->adresse = $request->adresse;
        $patient->date = $request->date;
        $patient->dent = $request->dent;
        $patient->traitement = $request->traitement;
        $patient->user_id = auth()->user()->id;


        $patient->save();

        return redirect('/list-patient')->with('status', "Patient ajouté avec succès !");
    }

    public function update_patient($id)
    {

        $user = auth()->user();
        $patients = Patient::findOrFail($id);
        if ($patients->user_id != $user->id) {
            abort(403);
        }
        return view('layouts.patients.update', compact('patients'));
    }

    public function update_request(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'telephone' => ['required', 'string', 'min:8', 'max:18'],
            'profession' => 'required',
            'adresse' => 'required',
            'date' => 'required',
            'dent' => 'required',
            'traitement' => 'required',
        ]);

        $patient = Patient::find($request->id);

        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->age = $request->age;
        $patient->telephone = $request->telephone;
        $patient->profession = $request->profession;
        $patient->adresse = $request->adresse;
        $patient->date = $request->date;
        $patient->dent = $request->dent;
        $patient->traitement = $request->traitement;

        $patient->update();

        return redirect('/list-patient')->with('status', "Patient modifié avec succès !");
    }

    public function delete_request($id)
    {

        $user = auth()->user();
        $patient = Patient::findOrFail($id);
        if ($patient->user_id != $user->id) {
            abort(403);
        }
        $patient->delete();

        return redirect('/list-patient')->with('status', "Patient supprimé avec succès !");
    }

    public function search_request(Request $request)
    {

        $output = '';
        $user = Auth::user();
        $search = $request->search;

        // Rechercher les patients correspondant à la recherche de l'utilisateur et les paginer par trois éléments
        $patients = Patient::where(function ($query) use ($search) {
            $query->where('nom', 'LIKE', '%' . $search . '%')
                ->orWhere('prenom', 'LIKE', '%' . $search . '%');
        })
            ->whereHas('user', function ($query) use ($user) {
                $query->where('id', $user->id);
            })->paginate(6);

        // Boucler sur les patients trouvés et les ajouter à la variable de sortie
        if ($patients->count() > 0) {
            foreach ($patients as $patient) {
                $output .= '<tr>';
                $output .= '<td class="align-middle patient-name p-2">' . $patient->nom . ' 
                    <button type="button" class="btn btn-primary btn-sm float-right d-sm-block d-md-none collapse-btn" data-toggle="collapse" 
                    data-target="#patient' . $patient->id . '" aria-expanded="false" 
                    aria-controls="patient' . $patient->id . '">
                                <i class="fa fa-plus"></i>
                            </button>
                        </td>
                        <td class="d-none d-md-table-cell p-2">' . $patient->prenom . '</td>
                        <td class="d-none d-md-table-cell p-2">' . $patient->age . '</td>
                        <td class="d-none d-md-table-cell p-2">' . $patient->telephone . '</td>
                        <td class="d-none d-md-table-cell p-2">' . $patient->profession . '</td>
                        <td class="d-none d-md-table-cell p-2">' . $patient->adresse . '</td>
                        <td class="d-none d-md-table-cell p-2">' . $patient->date . '</td>
                        <td class="d-none d-md-table-cell p-2">' . $patient->dent . '</td>
                        <td class="d-none d-md-table-cell p-2">' . $patient->traitement . '</td>
                        <td class="d-none d-md-table-cell">
                            <a href="' . route('update', $patient->id) . '" class="btn btn-secondary"><i
                                    class="mdi mdi-pencil-outline"></i></a>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <a href="' . route('delete-request', $patient->id) . '" class="btn btn-danger btn-delete"><i
                                    class="mdi mdi-trash-can-outline"></i></a>
                        </td>
                    </tr>
                    <tr id="patient' . $patient->id . '" class="collapse">
                        <td colspan="12">
                            <div class="card-deck">
                                <div class="card px-2">
                                    <p><strong>Prénom :</strong> ' . $patient->prenom . '</p>
                                    <p><strong>Âge :</strong> ' . $patient->age . '</p>
                                    <p><strong>Téléphone :</strong> ' . $patient->telephone . '</p>
                                    <p><strong>Profession :</strong> ' . $patient->profession . '</p>
                                    <p><strong>Adresse :</strong> ' . $patient->adresse . '</p>
                                    <p><strong>Date :</strong> ' . $patient->date . '</p>
                                    <p><strong>Dent :</strong> ' . $patient->dent . '</p>
                                    <p><strong>Traitement :</strong> ' . $patient->traitement . '</p>
                                    <p><strong>Actions :</strong>
                                        <a href="' . route('update', $patient->id) . '" class="btn btn-secondary"><i
                                                class="mdi mdi-pencil-outline"></i></a>
                                        <a href="' . route('delete-request', $patient->id) . '" class="btn btn-danger btn-delete"><i
                                                class="mdi mdi-trash-can-outline"></i></a>
                                    </p>
                                </div>                           
                            </div>
                        </td>
                    </tr>';
            }
        } else {
            $output .= '<tr>
                            <td align="center" colspan="11"><strong style="color:red">Aucun patient trouvé !</strong></td>
                        </tr>';
        }

        // Retourner la réponse au format JSON
        return response($output);       
    }
}

