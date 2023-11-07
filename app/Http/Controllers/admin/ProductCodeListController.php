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
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FAT,ANNUAL CASH IN TRANSIT INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FCS,CASH IN SAFE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FCT,CASH IN TRANSIT INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FFG,FIDELITY GUARANTEE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FFI,FIRE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FAN,NEW ANNUAL CASH IN TRANSIT INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FSA,NEW CASH IN SAFE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FTS,NEW CASH IN TRANSIT INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FFD,NEW FIDELITY GUARANTEE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FIR,NEW FIRE INSURANCE"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FST,NEW STOCK DECLARATION"
            ],
            [
                "class_code" => "FI",
                "class_description" => "FIRE",
                "product_code" => "INSURANCE",
                "product_description" => "FSD,STOCK DECLARATION"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH",
                "product_code" => "INSURANCE",
                "product_description" => "AYH,AYA HEALTH"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH",
                "product_code" => "INSURANCE",
                "product_description" => "LHC,CRITICAL ILLNESS INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH",
                "product_code" => "INSURANCE",
                "product_description" => "LHN,HEALTH INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH",
                "product_code" => "INSURANCE",
                "product_description" => "HMT,MEDI THUKHA MICRO HEALTH INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH",
                "product_code" => "INSURANCE",
                "product_description" => "LHM,MICRO HEALTH INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH",
                "product_code" => "INSURANCE",
                "product_description" => "LPL,PUBLIC LIFE INSURANCE"
            ],
            [
                "class_code" => "LF",
                "class_description" => "HEALTH",
                "product_code" => "INSURANCE",
                "product_description" => "LSE,SHORT TERM ENDOWMENT"
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
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MCI,CARGO INSURANCE"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MIT,INLAND TRANSIT INSURANCE"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MCG,MARINE CARGO"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MHS,MARINE HULL INSURANCE(STEEL)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MHW,MARINE HULL INSURANCE(WOODEN)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MCR,NEW CARGO INSURANCE"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MIL,NEW INLAND TRANSIT INSURANCE"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MMC,NEW MARINE CARGO"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MST,NEW MARINE HULL INSURANCE(STEEL)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MHO,NEW MARINE HULL INSURANCE(WOODEN)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MAI,NEW OVERSEA MARINE CARGO INSURANCE (AIR)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MOC,NEW OVERSEA MARINE CARGO INSURANCE (OCEAN)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MCA,OVERSEA MARINE CARGO INSURANCE (AIR)"
            ],
            [
                "class_code" => "MR",
                "class_description" => "MARINE",
                "product_code" => "INSURANCE",
                "product_description" => "MCO,OVERSEA MARINE CARGO INSURANCE (OCEAN)"
            ],
            [
                "class_code" => "MS",
                "class_description" => "PERSONAL",
                "product_code" => "ACCIDENT",
                "product_description" => "INSURANCE,MPS,NEW PERSONAL ACCIDENT INSURANCE"
            ],
            [
                "class_code" => "MS",
                "class_description" => "PERSONAL",
                "product_code" => "ACCIDENT",
                "product_description" => "INSURANCE,MPA,PERSONAL ACCIDENT INSURANCE"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MCC,COMPREHENSIVE COMMERCIAL CAR"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MUC,COMPREHENSIVE COMMERCIAL CAR (USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MFC,COMPREHENSIVE COMMERCIAL FLEET"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MCH,COMPREHENSIVE DUAL PURPOSE CAR"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MUH,COMPREHENSIVE DUAL PURPOSE CAR (USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MCP,COMPREHENSIVE PRIVATE CAR"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MUP,COMPREHENSIVE PRIVATE CAR (USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MFP,COMPREHENSIVE PRIVATE FLEET"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MTC,MOTOR CYCLE"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MUB,MOTOR CYCLE(USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MNC,NEW MOTOR INSURANCE _COMMERCIAL"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MNP,NEW MOTOR INSURANCE _PRIVATE"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MCU,NEW MOTOR INSURANCE_COMMERCIAL(USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MNF,NEW MOTOR INSURANCE_FLEET"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MFU,NEW MOTOR INSURANCE_FLEET(USD)"
            ],
            [
                "class_code" => "MT",
                "class_description" => "MOTOR",
                "product_code" => "INSURANCE",
                "product_description" => "MPU,NEW MOTOR INSURANCE_PRIVATE (USD)"
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
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TSD,DOMESTIC TRAVEL INSURANCE(GO)"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TEC,EXPRESS_COACH_TRAVEL_INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TIT,INDIVIDUAL_TRAVEL_INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNG,NEW DOMESTIC TRAVEL INSURANCE(GO)"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNX,NEW EXPRESS COACH TRAVEL INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNI,NEW INDIVIDUAL TRAVEL INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNJ,NEW OVERSEA TRAVEL INSURANCE(JOY)"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNO,NEW TRAVEL TOUR INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNL,NEW TRAVEL_LOCAL_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNT,NEW TRAVEL_LOCAL_TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNS,NEW TRAVEL_OVERSEAS_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNR,NEW TRAVEL_OVERSEAS_TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNE,NEW TRAVEL_U100 MILES-EXPRESS"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TND,NEW TRAVEL_U100 MILES-INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TNU,NEW TRAVEL_U100 MILES-TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TSO,OVERSEA TRAVEL INSURANCE(JOY)"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TTT,TRAVEL TOUR INSURANCE"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TLI,TRAVEL_LOCAL_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TLT,TRAVEL_LOCAL_TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TOI,TRAVEL_OVERSEAS_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TOT,TRAVEL_OVERSEAS_TRAVEL&TOUR"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TUE,TRAVEL_U100 MILES_EXPRESS"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TUI,TRAVEL_U100 MILES_INDIVIDUAL"
            ],
            [
                "class_code" => "TI",
                "class_description" => "TRAVEL",
                "product_code" => "INSURANCE",
                "product_description" => "TUT,TRAVEL_U100 MILES_TRAVEL&TOUR"
            ]
        ];

    }
    public function FunctionName()
    {
        /*
            "casetypecode": 2,
            "title": "Insured Name Change",
            "ayasompo_enquiryproducttype@odata.bind": "/ayasompo_enquiryproducttypes(9c446ac3-c5c3-eb11-bacc-00224816b187)",
            "ayasompo_enquirytypes@odata.bind": "/ayasompo_enquirytypes(6db787df-6fc3-eb11-bacc-002248171f24)",
            "ayasompo_enquirychannels": 12,
            "ayasompo_vehicleno": "2N/2478(BGO)",
            "ayasompo_remark": "This is remark",
            "customerid_contact@odata.bind": "/contacts(5613c951-7ac8-eb11-bacc-000d3a807513)",
            "ayasompo_customercode": "C00032375",
            "ayasompo_policyno": "AMI/YGN/MFC/19000043",
            "ayasompo_productcode": "MFC",
            "ayasompo_classcode": "MT",
            "ayasompo_risksequenceno": "00YGN1900284284",
            "ayasompo_inquirydatetime": "09/20/2021 16:00:00",
            "ayasompo_accounthandlerlookup@odata.bind": "/ayasompo_accounthandlers(4dc53e9a-0173-ec11-8943-000d3a854914)",
            "ayasompo_caseid": "E677ACF5-A416-4726-86F3-6532D450E5C6"
        */
    }
}


//Enquiry Product Type
//"ayasompo_enquiryproducttype@odata.bind": "/ayasompo_enquiryproducttypes(9c446ac3-c5c3-eb11-bacc-00224816b187)",

//Enquiry Type
//"ayasompo_enquirytypes@odata.bind": "/ayasompo_enquirytypes(6db787df-6fc3-eb11-bacc-002248171f24)",

//Account Handler
//"ayasompo_accounthandlerlookup@odata.bind": "/ayasompo_accounthandlers(4dc53e9a-0173-ec11-8943-000d3a854914)",




















