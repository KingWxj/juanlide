<?php
namespace backend\controllers;


use backend\models\Admin;
use backend\models\AuthMgr;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\HttpException;

class AuthController extends Controller {
	public function init() {
		parent::init();
		if(!AuthMgr::checkAuth('authControl')){
			return \Yii::$app->response->redirect(['index/auth-error']);
		}
	}


//	主页视图控制器，用来查看管理员的权限列表（首页）
	public function actionIndex() {
		$admin_count=Admin::find()->count();
		$pagination=new Pagination(['totalCount'=>$admin_count,'pageSize'=>10]);
		$list=AuthMgr::getAdminList($pagination->offset,$pagination->limit);
		return $this->render('index',['pagination'=>$pagination,'list'=>$list]);
	}

//添加权限节点的视图（表单）
	public function actionAddPermission() {
		$model=new AuthMgr();
		$model->setScenario('addPermission');
		if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) && $model->validate()){
			$add=AuthMgr::addPermission($model->name,$model->description);
			if ($add){
				\Yii::$app->session->setFlash('success','添加权限成功！');
			}else{
				\Yii::$app->session->setFlash('error','添加权限失败，可能有重复！');
			}
			return $this->redirect(['add-permission']);
		}
		$allPermissions=AuthMgr::getPermissions();
		return $this->render('addPermission',['model'=>$model,'allPermissions'=>$allPermissions]);
	}
//添加角色节点的视图（表单）
	public function actionAddRole() {
		$model=new AuthMgr();
		$model->setScenario('addRole');
		if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) && $model->validate()){
			$add=AuthMgr::addRole($model->name,$model->description);
			if ($add){
				\Yii::$app->session->setFlash('success','添加角色成功！');
			}else{
				\Yii::$app->session->setFlash('error','添加角色失败，可能有重复！');
			}
			return $this->redirect(['add-role']);
		}
		$allRoles=AuthMgr::getRoles();
		return $this->render('addRole',['model'=>$model,'allRoles'=>$allRoles]);
	}
//关联某个角色和权限(视图)
	public function actionLinkRolePermission() {
		$role_name=\Yii::$app->request->get('role_name');
		if(trim($role_name)==''){
			return $this->redirect(['index']);
		}
		if(\Yii::$app->request->isPost){
			$permission_name=\Yii::$app->request->post('permission_name');
			if (!$permission_name){
				\Yii::$app->session->setFlash('error','给角色添加权限失败！');
				return $this->redirect(['link-role-permission','role_name'=>$role_name]);
			}
			if (AuthMgr::linkRolePermission($role_name,$permission_name)){
				\Yii::$app->session->setFlash('success','给角色添加权限成功！');
			}else{
				\Yii::$app->session->setFlash('error','给角色添加权限失败！');
			}
			return $this->redirect(['link-role-permission','role_name'=>$role_name]);
		}
		return $this->render('linkRolePermission');
	}
//取消关联某个角色和权限(链接)	
	public function actionUnlinkRolePermission() {
		$role_name=\Yii::$app->request->get('role_name');
		$permission_name=\Yii::$app->request->get('permission_name');
		if(trim($role_name)=='' || trim($permission_name)==''){
			return $this->redirect(['add-role']);
		}
		if(AuthMgr::unlinkRolePermission($role_name,$permission_name)){
			\Yii::$app->session->setFlash('success','取消角色的权限成功！');
		}else{
			\Yii::$app->session->setFlash('error','取消角色的权限失败！');
		}
		return $this->redirect(['link-role-permission','role_name'=>$role_name]);
	}
//关联某个用户和角色(视图)
	public function actionLinkUserRole() {
		$user_id=\Yii::$app->request->get('user_id');
		$user_id=(int)$user_id;
		if(!$user_id){  //如果id异常
			return $this->redirect(['index']);
		}
		if(\Yii::$app->request->isPost){
			$role_name=\Yii::$app->request->post('role_name');
			if (!$role_name){
				\Yii::$app->session->setFlash('error','关联用户与角色失败,可能已经用户已经关联这个角色！');
				return $this->redirect(['link-user-role','user_id'=>$user_id]);
			}
			if(AuthMgr::linkUserRole($user_id,$role_name)){
				\Yii::$app->session->setFlash('success','关联用户与角色成功！');
			}else{
				\Yii::$app->session->setFlash('error','关联用户与角色失败,可能已经用户已经关联这个角色！');
			}
			return $this->redirect(['link-user-role','user_id'=>$user_id]);
		}
		return $this->render('linkUserRole');
	}
//取消关联某个用户和角色(链接)
	public function actionUnlinkUserRole() {
		$user_id=\Yii::$app->request->get('user_id');
		$user_id=(int)$user_id;
		if(!$user_id){  //如果id异常
			return $this->redirect(['index']);
		}
		$role_name=\Yii::$app->request->get('role_name');
		if(AuthMgr::unlinkUserRole($user_id,$role_name)){
			\Yii::$app->session->setFlash('success','取消关联用户与角色成功！');
		}else{
			\Yii::$app->session->setFlash('error','取消关联用户与角色失败！');
		}
		return $this->redirect(['link-user-role','user_id'=>$user_id]);
	}
//	删除某个权限（链接）
	public function actionDeletePermission() {
		$name=\Yii::$app->request->get('name');
		if(trim($name)==''){
			return $this->redirect(['index']);
		}
		if (AuthMgr::delPermission($name)){
			\Yii::$app->session->setFlash('success','删除权限成功！');
		}else{
			\Yii::$app->session->setFlash('error','删除权限失败！');
		}
		return $this->redirect(['add-permission']);
	}
//	删除某个角色（链接）
	public function actionDeleteRole() {
		$name=\Yii::$app->request->get('role_name');
		if(trim($name)==''){
			return $this->redirect(['index']);
		}
		if (AuthMgr::delRole($name)){
			\Yii::$app->session->setFlash('success','删除角色成功！');
		}else{
			\Yii::$app->session->setFlash('error','删除角色失败！');
		}
		return $this->redirect(['add-role']);
	}


	
}