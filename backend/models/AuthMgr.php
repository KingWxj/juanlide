<?php
namespace backend\models;

use yii\base\Exception;
use yii\base\Model;

class AuthMgr extends Model {
	public $name;
	public $description;
	
	public function scenarios() {
		return [
			'addPermission' => ['name', 'description'],
			'addRole' => ['name', 'description'],
		];
	}
	
	public function rules() {
		return [
			[['name', 'description'], 'required', 'on' => ['addPermission', 'addRole'], 'message' => '此处不能为空'],
		];
	}

//	获取管理员列表（带着每个管理员的权限）
	public static function getAdminList($offset, $limit) {
		$list = Admin::find()->offset($offset)->limit($limit)->asArray()->all();
		foreach ($list as $key => $item) {
			$list[$key]['permission'] = AuthMgr::getPermissionsByUser($item['id']);
		}
		return $list;
	}

//	根据ID获取某一个管理员的权限列表
	public static function getPermissionsByUser($id) {
		$auth = \Yii::$app->authManager;
		$permission = $auth->getPermissionsByUser($id);
		return $permission;
	}

//	根据ID获取某一个管理员的角色列表
	public static function getRolesByUser($id) {
		$auth = \Yii::$app->authManager;
		$roles = $auth->getRolesByUser($id);
		return $roles;
	}

//	创建权限节点
	public static function addPermission($name, $description) {
		$auth = \Yii::$app->authManager;
		if ($auth->getRole($name) || $auth->getPermission($name)) {
			return false;
		}
		$permission = $auth->createPermission($name);
		$permission->description = $description;
		$auth->add($permission);
		return true;
	}

//	创建角色节点
	public static function addRole($name, $description) {
		$auth = \Yii::$app->authManager;
		if ($auth->getRole($name) || $auth->getPermission($name)) {
			return false;
		}
		$role = $auth->createRole($name);
		$role->description = $description;
		$auth->add($role);
		return true;
	}

//	根据角色名获取角色所有权限
	public static function getPermissionByRole($name) {
		$auth = \Yii::$app->authManager;
		$permissions = $auth->getPermissionsByRole($name);
		return $permissions;
	}

//	根据角色名读取角色
	public static function getRole($name) {
		$auth = \Yii::$app->authManager;
		$role = $auth->getRole($name);
		return $role;
	}

//	获取所有权限列表
	public static function getPermissions() {
		$auth = \Yii::$app->authManager;
		$allPermissions = $auth->getPermissions();
		return $allPermissions;
	}

//	获取所有角色列表
	public static function getRoles() {
		$auth = \Yii::$app->authManager;
		$allRoles = $auth->getRoles();
		return $allRoles;
	}

//	根据name值删除一个permission权限
	public static function delPermission($name) {
		$auth = \Yii::$app->authManager;
		$permission = $auth->getPermission($name);
		if (!$permission) {
			return false;
		}
		$auth->remove($permission);
		return true;
	}

//	根据name值删除一个role角色
	public static function delRole($name) {
		$auth = \Yii::$app->authManager;
		$role = $auth->getRole($name);
		if (!$role) {
			return false;
		}
		$auth->remove($role);
		return true;
	}

//	关联角色和权限
	public static function linkRolePermission($role_name, $permission_name) {
		$auth = \Yii::$app->authManager;
		$role = $auth->getRole($role_name);
		$permission = $auth->getPermission($permission_name);
		if ($role && $permission) {
			if (!$auth->hasChild($role, $permission)) {
				$auth->addChild($role, $permission);
				return true;
			}
		}
		return false;
	}

//	取消关联角色和权限
	public static function unlinkRolePermission($role_name, $permission_name) {
		$auth = \Yii::$app->authManager;
		$role = $auth->getRole($role_name);
		$permission = $auth->getPermission($permission_name);
		if ($role && $permission) {
			$auth->removeChild($role, $permission);
			return true;
		} else {
			return false;
		}
	}
//	关联用户和角色
	public static function linkUserRole($user_id, $role_name) {
		$auth = \Yii::$app->authManager;
		$role = $auth->getRole($role_name);
		$hasRoles=self::getRolesByUser($user_id);
		if(isset($hasRoles[$role_name])){
			return false;
		}
		$auth->assign($role,$user_id);
		return true;
	}

//	取消关联用户和角色
	public static function unlinkUserRole($user_id, $role_name) {
		$auth = \Yii::$app->authManager;
		$role = $auth->getRole($role_name);
		if ($auth->revoke($role,$user_id)){
			return true;
		}
		return false;
	}
//	检查是否有权限
	public static function checkAuth($name) {
		$id=(int)\Yii::$app->session->get('admin_id');
		$auth=\Yii::$app->authManager;
		if($auth->checkAccess($id,$name)){
			return true;
		}else{
			return false;
		}
	}
}