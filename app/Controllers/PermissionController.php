<?php
namespace App\Controllers;

use Core\Request;
use Core\Response;

class PermissionController
{
    protected $permissions = [];

    public function __construct()
    {
        // يمكن لاحقًا تحميل الصلاحيات من قاعدة البيانات
        $this->permissions = [
            ['id' => 1, 'name' => 'view_users'],
            ['id' => 2, 'name' => 'edit_users'],
            ['id' => 3, 'name' => 'delete_users'],
        ];
    }

    public function index()
    {
        Response::json($this->permissions);
    }

    public function show($id)
    {
        foreach ($this->permissions as $perm) {
            if ($perm['id'] == $id) {
                Response::json($perm);
            }
        }
        Response::json(['error' => 'Permission not found'], 404);
    }

    public function create()
    {
        Response::json(['form' => 'create permission form']);
    }

    public function store()
    {
        $data = Request::json();
        $data['id'] = rand(100, 999);
        Response::json(['created' => $data], 201);
    }

    public function edit($id)
    {
        Response::json(['form' => 'edit permission ' . $id]);
    }

    public function update($id)
    {
        $data = Request::json();
        Response::json(['updated_id' => $id, 'data' => $data]);
    }

    public function delete($id)
    {
        Response::json(['deleted_id' => $id]);
    }

    public function assign()
    {
        $data = Request::json();
        Response::json(['assigned' => $data]);
    }

    public function revoke()
    {
        $data = Request::json();
        Response::json(['revoked' => $data]);
    }
}
