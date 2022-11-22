<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicalRecordCollection;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index(Request $request){
        return response()->json( new MedicalRecordCollection( MedicalRecord::paginate(10)),200);
    }

    public function bodyTemperature(Request $request){
        $medicalRecords=MedicalRecord::query();
        if(isset($request->doctorName)){
        $doctors=Doctor::where('name','like','%'.$request->doctorName.'%')->pluck('id')->toArray();
            $medicalRecords=  $medicalRecords->whereIn('doctor_id',$doctors);
        }
        if(isset($request->diagnosisId)){
            $medicalRecords=  $medicalRecords->where('diagnosis_id',$request->diagnosisId);
        }
        $medicalRecords=$medicalRecords->get();
        $minTemperature=$medicalRecords->min(function ($q){
         return  $q->vital->bodyTemperature;
        });
        $maxTemperature=$medicalRecords->max(function ($q){
         return  $q->vital->bodyTemperature;
        });
        return response()->json([
         'minimum'=>   $minTemperature,
         'maximum'=>   $maxTemperature,
        ] ,200);
    }
}
