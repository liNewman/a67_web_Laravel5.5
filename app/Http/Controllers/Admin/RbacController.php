<?php

namespace App\Http\Controllers\Admin;

use App\Model\PermissionRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RbacController extends Controller
{
    public function index()
    {
        return view('admin.rbac.rbac');
    }



    /**
     * @desc 权限编辑
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function permissionSave(Request $request)
    {
        $params = $request->all();

        $params = $this->delToken($params);

        $data = [];

        foreach($params['permissions'] as $permission )  {
            $data[] = [
                'role_id' => $params['role_id'],
                'permission_id' => $permission
            ];
        }

        PermissionRole::where('role_id', $params['role_id'])->delete();

        PermissionRole::insert($data);

        return redirect('/admin/role/list');
    }


}
