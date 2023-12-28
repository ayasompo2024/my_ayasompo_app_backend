<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCodeList;
use App\Models\ProductCodeListRequestFormType;
use App\Services\RequestFormTypeService;
use Illuminate\Http\Request;

class ProductCodeListController extends Controller
{

    public function index()
    {
        return view('admin.product_code_list.index')->with([
            'product_code_lists' => ProductCodeList::paginate(20)
        ]);

    }
    public function searchByProductCode(Request $request)
    {
        $request->validate([
            'product_code' => "required"
        ]);
        return view('admin.product_code_list.index')->with([
            'product_code_lists' => ProductCodeList::query()->where('product_code', $request->product_code)->paginate(50)
        ]);
    }



    public function showRequestFormType($productCodeListId, RequestFormTypeService $requestFormTypeService)
    {
        return view('admin.product_code_list.show-request-form-type')->with([
            "requestFormTypes" => $requestFormTypeService->getAll(),
            'productCodeListId' => $productCodeListId,
            'bindedRequestFormTypes' => ProductCodeListRequestFormType::query()->where('product_code_list_id', $productCodeListId)->get()
        ]);

    }

    public function bindWithRequestFormType(Request $request)
    {
        $request->validate([
            "requestFormTypes" => "required|array",
            'product_code_list_id' => "required"
        ]);
        $product_code_list = ProductCodeList::find($request->product_code_list_id);
        foreach ($request->requestFormTypes as $requestFormType) {
            $input = [
                'request_form_type_id' => $requestFormType,
                'product_code_list_id' => $product_code_list->id,
                "product_code" => $product_code_list->product_code
            ];
            ProductCodeListRequestFormType::updateOrInsert(
                [
                    'request_form_type_id' => $requestFormType,
                    'product_code_list_id' => $request->product_code_list_id,
                ],
                $input
            );
        }
        return redirect()->back()->with('success', 'Success');
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function stoer2()
    {
        foreach ($this->prodcutCodeListArray() as $code_list) {
            echo var_dump(ProductCodeList::create($code_list));
        }
    }

    private function prodcutCodeListArray()
    {
        return [
            [
                "class_code" => "ENGG",
                "class_description" => "ENGINEERING",
                "product_code" => "ECA",
                "product_description" => "CONTRACTOR'S_ALL_RISKS_MUNICHRE"
            ],
            [
                "class_code" => "ENGG",
                "class_description" => "ENGINEERING",
                "product_code" => "EEA",
                "product_description" => "ERECTION_ALL_RISKS_MUNICHRE"
            ],
            [
                "class_code" => "ENGG",
                "class_description" => "ENGINEERING",
                "product_code" => "CAR",
                "product_description" => "NEW CONTRACTOR'S_ALL_RISKS_MUNICHRE"
            ],
            [
                "class_code" => "ENGG",
                "class_description" => "ENGINEERING",
                "product_code" => "EAR",
                "product_description" => "NEW ERECTION_ALL_RISKS_MUNICHRE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FAT",
                "product_description" => "ANNUAL CASH IN TRANSIT INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FCS",
                "product_description" => "CASH IN SAFE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FCT",
                "product_description" => "CASH IN TRANSIT INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FFG",
                "product_description" => "FIDELITY GUARANTEE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FFI",
                "product_description" => "FIRE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FAN",
                "product_description" => "NEW ANNUAL CASH IN TRANSIT INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FSA",
                "product_description" => "NEW CASH IN SAFE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FTS",
                "product_description" => "NEW CASH IN TRANSIT INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FFD",
                "product_description" => "NEW FIDELITY GUARANTEE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FIR",
                "product_description" => "NEW FIRE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FST",
                "product_description" => "NEW STOCK DECLARATION"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE INSURANCE",
                "product_code" => "FSD",
                "product_description" => "STOCK DECLARATION"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH INSURANCE",
                "product_code" => "AYH",
                "product_description" => "AYA HEALTH"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH INSURANCE",
                "product_code" => "LHC",
                "product_description" => "CRITICAL ILLNESS INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH INSURANCE",
                "product_code" => "LHN",
                "product_description" => "HEALTH INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH INSURANCE",
                "product_code" => "HMT",
                "product_description" => "MEDI THUKHA MICRO HEALTH INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH INSURANCE",
                "product_code" => "LHM",
                "product_description" => "MICRO HEALTH INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH INSURANCE",
                "product_code" => "LPL",
                "product_description" => "PUBLIC LIFE INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH INSURANCE",
                "product_code" => "LSE",
                "product_description" => "SHORT TERM ENDOWMENT"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LBL",
                "product_description" => "BAILEE'S / BAILEES'S AND WAREHOUSEMENS' LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LCL",
                "product_description" => "CARRIER LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LCG",
                "product_description" => "COMMERCIAL/COMPREHENSIVE GENERAL LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LDO",
                "product_description" => "DIRECTOR & OFFICER LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LEM",
                "product_description" => "EMPLOYER'S_LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LFF",
                "product_description" => "FREIGHT_FORWARDER_LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LBA",
                "product_description" => "NEW BAILEES'S & WAREHOUSEMENS' LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LCA",
                "product_description" => "NEW CARRIER LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LCC",
                "product_description" => "NEW COMMERCIAL/COMPREHENSIVE GENERAL LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LDI",
                "product_description" => "NEW DIRECTOR & OFFICER LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LEL",
                "product_description" => "NEW EMPLOYER'S LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LFR",
                "product_description" => "NEW FREIGHT FORWARDER'S LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LPE",
                "product_description" => "NEW PREMISES LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LPR",
                "product_description" => "NEW PRODUCTS LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LPU",
                "product_description" => "NEW PUBLIC LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LTL",
                "product_description" => "NEW TENANT'S LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LTH",
                "product_description" => "NEW THIRD-PARTY LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LTR",
                "product_description" => "NEW TRANSPORT OPERATOR'S LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LPM",
                "product_description" => "PREMISES LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LPD",
                "product_description" => "PRODUCT_LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LPC",
                "product_description" => "PUBLIC LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LTN",
                "product_description" => "TENANT'S LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LTP",
                "product_description" => "THIRD_PARTY_LIABILITY"
            ],
            [
                "class_code" => "LIA",
                "class_description" => "LIABILITY",
                "product_code" => "LTO",
                "product_description" => "TRANSPORT OPERATOR'S LIABILITY"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MCI",
                "product_description" => "CARGO INSURANCE"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MIT",
                "product_description" => "INLAND TRANSIT INSURANCE"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MCG",
                "product_description" => "MARINE CARGO"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MHS",
                "product_description" => "MARINE HULL INSURANCE(STEEL)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MHW",
                "product_description" => "MARINE HULL INSURANCE(WOODEN)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MCR",
                "product_description" => "NEW CARGO INSURANCE"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MIL",
                "product_description" => "NEW INLAND TRANSIT INSURANCE"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MMC",
                "product_description" => "NEW MARINE CARGO"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MST",
                "product_description" => "NEW MARINE HULL INSURANCE(STEEL)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MHO",
                "product_description" => "NEW MARINE HULL INSURANCE(WOODEN)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MAI",
                "product_description" => "NEW OVERSEA MARINE CARGO INSURANCE (AIR)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MOC",
                "product_description" => "NEW OVERSEA MARINE CARGO INSURANCE (OCEAN)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MCA",
                "product_description" => "OVERSEA MARINE CARGO INSURANCE (AIR)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE INSURANCE",
                "product_code" => "MCO",
                "product_description" => "OVERSEA MARINE CARGO INSURANCE (OCEAN)"
            ],
            [
                "class_code" => "MS",
                "class_description" => "PERSONAL ACCIDENT INSURANCE",
                "product_code" => "MPS",
                "product_description" => "NEW PERSONAL ACCIDENT INSURANCE"
            ],
            [
                "class_code" => "MS",
                "class_description" => "PERSONAL ACCIDENT INSURANCE",
                "product_code" => "MPA",
                "product_description" => "PERSONAL ACCIDENT INSURANCE"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MCC",
                "product_description" => "COMPREHENSIVE COMMERCIAL CAR"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MUC",
                "product_description" => "COMPREHENSIVE COMMERCIAL CAR (USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MFC",
                "product_description" => "COMPREHENSIVE COMMERCIAL FLEET"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MCH",
                "product_description" => "COMPREHENSIVE DUAL PURPOSE CAR"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MUH",
                "product_description" => "COMPREHENSIVE DUAL PURPOSE CAR (USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MCP",
                "product_description" => "COMPREHENSIVE PRIVATE CAR"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MUP",
                "product_description" => "COMPREHENSIVE PRIVATE CAR (USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MFP",
                "product_description" => "COMPREHENSIVE PRIVATE FLEET"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MTC",
                "product_description" => "MOTOR CYCLE"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MUB",
                "product_description" => "MOTOR CYCLE(USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MNC",
                "product_description" => "NEW MOTOR INSURANCE _COMMERCIAL"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MNP",
                "product_description" => "NEW MOTOR INSURANCE _PRIVATE"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MCU",
                "product_description" => "NEW MOTOR INSURANCE_COMMERCIAL(USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MNF",
                "product_description" => "NEW MOTOR INSURANCE_FLEET"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MFU",
                "product_description" => "NEW MOTOR INSURANCE_FLEET(USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR INSURANCE",
                "product_code" => "MPU",
                "product_description" => "NEW MOTOR INSURANCE_PRIVATE (USD)"
            ],
            [
                "class_code" => "PTY",
                "class_description" => "PROPERTY",
                "product_code" => "PIA",
                "product_description" => "INDUSTRIAL ALL RISKS"
            ],
            [
                "class_code" => "PTY",
                "class_description" => "PROPERTY",
                "product_code" => "PIR",
                "product_description" => "NEW INDUSTRIAL ALL RISKS"
            ],
            [
                "class_code" => "PTY",
                "class_description" => "PROPERTY",
                "product_code" => "PAL",
                "product_description" => "NEW PROPERTY ALL RISK"
            ],
            [
                "class_code" => "PTY",
                "class_description" => "PROPERTY",
                "product_code" => "PAR",
                "product_description" => "PROPERTY ALL RISK"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TSD",
                "product_description" => "DOMESTIC TRAVEL INSURANCE(GO)"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TEC",
                "product_description" => "EXPRESS_COACH_TRAVEL_INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TIT",
                "product_description" => "INDIVIDUAL_TRAVEL_INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNG",
                "product_description" => "NEW DOMESTIC TRAVEL INSURANCE(GO)"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNX",
                "product_description" => "NEW EXPRESS COACH TRAVEL INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNI",
                "product_description" => "NEW INDIVIDUAL TRAVEL INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNJ",
                "product_description" => "NEW OVERSEA TRAVEL INSURANCE(JOY)"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNO",
                "product_description" => "NEW TRAVEL TOUR INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNL",
                "product_description" => "NEW TRAVEL_LOCAL_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNT",
                "product_description" => "NEW TRAVEL_LOCAL_TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNS",
                "product_description" => "NEW TRAVEL_OVERSEAS_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNR",
                "product_description" => "NEW TRAVEL_OVERSEAS_TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNE",
                "product_description" => "NEW TRAVEL_U100 MILES-EXPRESS"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TND",
                "product_description" => "NEW TRAVEL_U100 MILES-INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TNU",
                "product_description" => "NEW TRAVEL_U100 MILES-TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TSO",
                "product_description" => "OVERSEA TRAVEL INSURANCE(JOY)"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TTT",
                "product_description" => "TRAVEL TOUR INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TLI",
                "product_description" => "TRAVEL_LOCAL_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TLT",
                "product_description" => "TRAVEL_LOCAL_TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TOI",
                "product_description" => "TRAVEL_OVERSEAS_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TOT",
                "product_description" => "TRAVEL_OVERSEAS_TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TUE",
                "product_description" => "TRAVEL_U100 MILES_EXPRESS"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TUI",
                "product_description" => "TRAVEL_U100 MILES_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL INSURANCE",
                "product_code" => "TUT",
                "product_description" => "TRAVEL_U100 MILES_TRAVEL&TOUR"
            ]
        ];
    }
}













