<?php
namespace g4t\IDScanner\Helpers;

use ArrayObject;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class Utilities {


//  Scan Base64 Image From Camera
    public static function base64($images)
    {
        $json = [];
        $json['processParam'] = [
            "scenario" => "FullProcess",
            "resultTypeOutput" => [],
            "doublePageSpread" => true,
            "log" => true,
            "alreadyCropped" => true
        ];
        foreach($images as $key => $value) {
            $data = substr($value, strpos($value, ',') + 1);
                $json['List'][$key]['ImageData']['image'] = $data;
                $json['List'][$key]['light'] = 6;
                $json['List'][$key]['page_idx'] = $key;
        }
        $json['systemInfo'] = new ArrayObject();
        return $json;
    }


//  Scan Using uploaded file
    Public static function files($images)
    {
        $json = [];
        $json['processParam'] = [
            "scenario" => "FullProcess",
            "resultTypeOutput" => [],
            "doublePageSpread" => true,
            "log" => true,
            "alreadyCropped" => true
        ];
        foreach($images as $key => $image) {
                $json['List'][$key]['ImageData']['image'] = 'data:image/'.$image->getClientOriginalExtension().';base64,'.base64_encode(file_get_contents($image));
                $json['List'][$key]['light'] = 6;
                $json['List'][$key]['page_idx'] = $key;
        }
        $json['systemInfo'] = new ArrayObject();
        return $json;
    }





    public static function returnData($json): array
    {
        $ut = new Utilities;  // correct
        foreach($json['ContainerList']['List'] as $key => $value) {
            if (array_key_exists("ListVerifiedFields",$value)) {
                $data = $value;
            }
        }


        $data = $data['ListVerifiedFields']['pFieldMaps'];

        foreach($data as $item) {
            if($item['FieldType'] == 0) {
                $key = $ut->checkType($item);
                $array['document_class_code'] = $item[$key];
            }

            if($item['FieldType'] == 1) {
                $key = $ut->checkType($item);
                $array['issuing_state_code'] = $item[$key];
            }

            if($item['FieldType'] == 2) {
                $key = $ut->checkType($item);
                $array['document_number'] = $item[$key];
            }

            if($item['FieldType'] == 3) {
                $key = $ut->checkType($item);
                $array['date_of_expiry'] = $item[$key];
            }

            if($item['FieldType'] == 4) {
                $key = $ut->checkType($item);
                $array['date_of_issue'] = $item[$key];
            }

            if($item['FieldType'] == 5) {
                $key = $ut->checkType($item);
                $array['date_of_birth'] = $item[$key];
            }

            if($item['FieldType'] == 8) {
                $key = $ut->checkType($item);
                $array['surname'] = $item[$key];
            }

            if($item['FieldType'] == 134283272) {
                $key = $ut->checkType($item);
                $array['surname_ar'] = $item[$key];
            }

            if($item['FieldType'] == 9) {
                $key = $ut->checkType($item);
                $array['given_name'] = $item[$key];
            }

            if($item['FieldType'] == 134283273) {
                $key = $ut->checkType($item);
                $array['given_name_ar'] = $item[$key];
            }

            if($item['FieldType'] == 10) {
                $key = $ut->checkType($item);
                $array['mother_name'] = $item[$key];
            }

            if($item['FieldType'] == 134283274) {
                $key = $ut->checkType($item);
                $array['mother_name_ar'] = $item[$key];
            }

            if($item['FieldType'] == 11) {
                $key = $ut->checkType($item);
                $array['nationality'] = $item[$key];
            }

            if($item['FieldType'] == 134283275) {
                $key = $ut->checkType($item);
                $array['nationality_ar'] = $item[$key];
            }

            if($item['FieldType'] == 12) {
                $key = $ut->checkType($item);
                $array['sex'] = $item[$key];
            }

            if($item['FieldType'] == 134283276) {
                $key = $ut->checkType($item);
                $array['sex_ar'] = $item[$key];
            }

            if($item['FieldType'] == 17) {
                $key = $ut->checkType($item);
                $array['address'] = $item[$key];
            }

            if($item['FieldType'] == 134283281) {
                $key = $ut->checkType($item);
                $array['address'] = $item[$key];
            }

            if($item['FieldType'] == 22) {
                $key = $ut->checkType($item);
                $array['DL_restriction_code'] = $item[$key];
            }

            if($item['FieldType'] == 134283286) {
                $key = $ut->checkType($item);
                $array['DL_restriction_code_ar'] = $item[$key];
            }

            if($item['FieldType'] == 25) {
                $key = $ut->checkType($item);
                $array['surname_and_given_names'] = $item[$key];
            }

            if($item['FieldType'] == 134283289) {
                $key = $ut->checkType($item);
                $array['surname_and_given_names_ar'] = $item[$key];
            }

            if($item['FieldType'] == 26) {
                $key = $ut->checkType($item);
                $array['nationality_code'] = $item[$key];
            }

            if($item['FieldType'] == 35) {
                $key = $ut->checkType($item);
                $array['MRZ_Type'] = $item[$key];
            }

            if($item['FieldType'] == 36) {
                $key = $ut->checkType($item);
                $array['optional_data'] = $item[$key];
            }

            if($item['FieldType'] == 38) {
                $key = $ut->checkType($item);
                $array['issuing_state'] = $item[$key];
            }

            if($item['FieldType'] == 51) {
                $key = $ut->checkType($item);
                $array['MRZ_lines'] = $item[$key];
            }

            if($item['FieldType'] == 80) {
                $key = $ut->checkType($item);
                $array['Check_digit_for_document_number'] = $item[$key];
            }

            if($item['FieldType'] == 81) {
                $key = $ut->checkType($item);
                $array['Check_digit_for_date_of_birth'] = $item[$key];
            }

            if($item['FieldType'] == 82) {
                $key = $ut->checkType($item);
                $array['Check_digit_for_date_of_expiry'] = $item[$key];
            }

            if($item['FieldType'] == 84) {
                $key = $ut->checkType($item);
                $array['final_check_digit'] = $item[$key];
            }

            if($item['FieldType'] == 129) {
                $key = $ut->checkType($item);
                $array['father_name'] = $item[$key];
            }

            if($item['FieldType'] == 134283393) {
                $key = $ut->checkType($item);
                $array['father_name_ar'] = $item[$key];
            }

            if($item['FieldType'] == 142) {
                $key = $ut->checkType($item);
                $array['identity_card_number'] = $item[$key];
            }

            if($item['FieldType'] == 180) {
                $key = $ut->checkType($item);
                $array['blood_group'] = $item[$key];
            }

            if($item['FieldType'] == 185) {
                $key = $ut->checkType($item);
                $array['age'] = $item[$key];
            }

            if($item['FieldType'] == 195) {
                $key = $ut->checkType($item);
                $array['check_digit_for_optional_data'] = $item[$key];
            }

            if($item['FieldType'] == 364) {
                $key = $ut->checkType($item);
                $array['months_to_expire'] = $item[$key];
            }

            if($item['FieldType'] == 497) {
                $key = $ut->checkType($item);
                $array['grandfather_name'] = $item[$key];
            }

            if($item['FieldType'] == 134283761) {
                $key = $ut->checkType($item);
                $array['grandfather_name_ar'] = $item[$key];
            }

            if($item['FieldType'] == 522) {
                $key = $ut->checkType($item);
                $array['age_at_issue'] = $item[$key];
            }

            if($item['FieldType'] == 523) {
                $key = $ut->checkType($item);
                $array['years_since_issue'] = $item[$key];
            }

        }
        $array['images'] = self::images($json);
        return $array;
    }


    public static function images($json)
    {
        foreach($json['ContainerList']['List'] as $key => $value) {
            if (array_key_exists("Images",$value)) {
                $data = $value;
            }
        }
        // return $data['Images']['fieldList'];
        foreach($data['Images']['fieldList'] as $image) {
            $result[] = [
                'name' => $image['fieldName'],
                'url' => "data:image/jpeg;base64,".$image['valueList'][0]['value'],
            ];
        }
        return $result;
    }


    public static function checkType($item): string
    {
        if(array_key_exists('Field_Barcode', $item)) {
            $key = 'Field_Barcode';
        }elseif(array_key_exists('Field_Visual', $item)) {
            $key = 'Field_Visual';
        }elseif(array_key_exists('Field_MRZ', $item)) {
            $key = 'Field_MRZ';
        }
        return $key;
    }





}
