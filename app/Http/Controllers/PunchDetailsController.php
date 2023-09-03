<?php

namespace App\Http\Controllers;

use App\Models\PunchDetails;
use App\Models\User;
use App\Classes\ZKLibrary;

class PunchDetailsController extends Controller
{
    public function getPunchedData(){

        $zk = new ZKLibrary("103.203.94.204", "4370", "UDP");
        $zk->connect();
        $zk->disableDevice();
        $users = $zk->getUser();
        $attendance = $zk->getAttendance();
        $companyId = User::where('id', auth()->user()->id)->value('company_id');

        if(isset($attendance)){
            $dataArray = $attendance;
            $groupedData = [];

            foreach ($dataArray as $record) {
                $date = substr($record[3], 0, 10);
                if (!isset($groupedData[$date])) {
                    $groupedData[$date] = [];
                }
                $groupedData[$date][] = [
                    "access_id" => $record[0],
                    "user_id" => $record[1],
                    "status" => $record[2],
                    "time" => $record[3]
                ];
            }
            foreach ($groupedData as $date => $records) {
                foreach ($records as $record) {


                    PunchDetails::updateOrInsert(
                        [
                            'employee_id'=>$record["user_id"],
                            'attendance_datetime'=>$record["time"],
                        ],
                        [
                            'company_id'=>$companyId,
                            'device_id'=>1,
                            'employee_id'=>$record["user_id"],
                            "access_id" => $record["access_id"],
                            'attendance_datetime'=>$record["time"],
                        ]
                    );
                }
            }
        }
        return to_route('admin.dashboard')->with('success', 'Punch Data Get Successfully');
    }
}
