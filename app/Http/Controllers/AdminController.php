<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\IpConfig;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function getHome(){
        return view('admin.dashboard');
    }
    public function userManagement(){
        return view('admin.user-management');
    }

    public function ipConfig(){
        $data = IpConfig::all();
        return view('admin.ip-config',compact('data'));
    }
    public function getListUser(Request $request){
        $req = $request->all();
        $user = User::where('role','0')->where('name', 'like', '%'.$req['userName'].'%');
        $data = $user->orderBy('created_at', 'DESC')->skip($req['start'])->take($req['limit'])->get();
        if(count($data)){
            $res = [
                'rc'=>'0',
                'data'=>$data,
                'total' =>User::where('role','0')->where('name', 'like', '%'.$req['userName'].'%')->count()
            ];
        }else{
            $res = [
                'rc'=>'1',
                'rd'=>'Không tìm thấy bản ghi nào'
            ];
        }
        return json_encode($res);
    }
    public function getListIp(Request $request){
        $data = IpConfig::skip(0)->take(10)->get();
        if(count($data)){
            $res = [
                'rc'=>'0',
                'data'=>$data
            ];
        }else{
            $res = [
                'rc'=>'1',
                'rd'=>'Không tìm thấy bản ghi nào'
            ];
        }
        return json_encode($res);
    }
    public function addIp(Request $request){
        Log::info("Thêm ip");
        $name = 'Không xác định';
        $ip = $request->ip;
        if($request->name){
            $name = $request->name;
        }
        $check = IpConfig::where('ip',$ip)->get();
        if(count($check)){
            $res = [
                'rc'=>'-1',
                'rd'=>'Địa chỉ ip này đã tồn tại'
            ];
        }else{
            $config = new IpConfig;
            $config->ip = $ip;
            $config->name = $name;
            $config->status = 1;
            $config->save();
            $res = [
                'rc'=>'0',
                'rd'=>'Thêm thành công'
            ];
        }
        return json_encode($res);

    }
    public function updateIp(Request $request){
        Log::error('Cập nhật ip');
        $ip = $request->ip;
        $check = IpConfig::where('ip',$ip)->first();
        $check ->status = $request->status;
        $check->save();
        $res = [
            'rc'=>'0',
            'rd'=>'Cập nhật trạng thái thành công'
        ];
        return json_encode($res);
    }
    public function updateUser(Request $request){
        Log::error('Cập nhật ip');
        $req = $request->all();
        $check = User::where('id',$req['userId'])->first();
        $check ->status = $req['status'];
        $check->save();
        $res = [
            'rc'=>'0',
            'rd'=>'Cập nhật trạng thái thành công',
            'data'=>$check
        ];
        return json_encode($res);
    }
    public function deleteIp(Request $request){
        $ip = $request->ip;
        $check = IpConfig::where('ip', $ip)
            ->first();
        $check->delete();
        $res = [
            'rc'=>'0',
            'rd'=>'Cập nhật trạng thái thành công'
        ];
        return json_encode($res);
    }
    public function deleteUser(Request $request){
        $id = $request->userId;
        $check = User::where('id', $id)
            ->first();
        $check->delete();
        $res = [
            'rc'=>'0',
            'rd'=>'Xoá dữ liệu thành công'
        ];
        return json_encode($res);
    }
    public function CheckIpConfig(Request $request){
        Log::error('Check ip onfig');
        $ip = $request->ip;
        Log::error($ip);
        if($ip){
            $config = IpConfig::where('ip',$ip)->where('status',1)->first();
            if($config){
                $config->count = $config->count + 1;
                $config->save();
                $res = [
                    'rc'=>'0',
                    'accept'=>true,
                    'rd'=>'Có thể sử dụng'
                ];
            }else{
                $ipClient = IpConfig::where('ip',$ip)->where('status',0)->first();
                if($ipClient){
                    $ipClient->count = $ipClient->count + 1;
                    $ipClient->save();
                    Log::info($ipClient);
                    $res = [
                        'rc'=>'-1',
                        'accept'=>false,
                        'rd'=>'Địa chỉ ip chưa được cấp quyền. Vui lòng đợi admin phê duyệt.'
                    ];
                }else{
                    $config = new IpConfig;
                    $config->ip = $ip;
                    $config->name = "Khách hàng vãng lai";
                    $config->status = 0;
                    $config->save();
                    $res = [
                        'rc'=>'-1',
                        'rd'=>'Đã lưu lại địa chỉ ip của bạn trên hệ thống. Vui lòng đợi admin phê duyệt'
                    ];
                }
            }
        }else{
            $res = [
                'rc'=>'-1',
                'accept'=>false,
                'rd'=>'Địa chỉ ip chưa được cấu hình'
            ];
        }
        return json_encode($res);
    }
}
