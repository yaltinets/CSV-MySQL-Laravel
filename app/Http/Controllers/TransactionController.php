<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Reports\Models\ReportModel;


class TransactionController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        try {
            $file = $request->file('file');

            if (!$file) {
                throw new \Exception("Error: Please select a file to upload.");
            }

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $valid_extensions = ["csv"];
            $maxFileSize = 222097152;

            if (!in_array(strtolower($extension), $valid_extensions)) {
                throw new \Exception("Invalid File Extension.");
            }

            if ($fileSize > $maxFileSize) {
                throw new \Exception("File size exceeds the limit.");
            }

            $location = 'uploads';
            $file->move($location, $filename);
            $filepath = public_path($location . "/" . $filename);
            $file = fopen($filepath, "r");
            $importData_arr = [];
            $i = 0;

            while (($filedata = fgetcsv($file, 10000, ";")) !== FALSE) {
                $num = count($filedata);

                if ($i == 0) {
                    $i++;
                    continue;
                }
                for ($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;

            }
//            dd($i);
            fclose($file);

            foreach ($importData_arr as $importData) {
                $insertData = [
                    "code" => $importData[0],
                    "name" => $importData[1],
                    "lvl1" => $importData[2],
                    "lvl2" => $importData[3],
                    "lvl3" => $importData[4],
                    "price" => $importData[5],
                    "price_sp" => $importData[6],
                    "total" => $importData[7],
                    "field_property" => $importData[8],
                    "joint_purchase" => $importData[9],
                    "unit" => $importData[10],
                    "picture" => $importData[11],
                    "main_view" => $importData[12],
                    "description" => $importData[13]
                ];
                Transaction::insertData($insertData);
                error_log("Inserted data: " . json_encode($insertData));
            }

            Session::flash('message', 'Import Successful.');
        } catch (\Exception $e) {
            error_log("An error occurred: " . $e->getMessage());
            Session::flash('message', $e->getMessage());
        }

        return redirect('/');
    }
}
