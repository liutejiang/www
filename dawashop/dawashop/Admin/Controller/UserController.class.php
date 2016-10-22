<?php 
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
	public function index(){
		$user = M('User');
		$usercount = $user->count(); //分页
		$page = new \Think\Page($usercount,8);
		$show = $page->show();
		$info = $user->field('id,name,username,email,telno,sex,address')->order('id')
		->limit($page->firstRow.','.$page->listRows)->select(); //向模板输出个人信息
		$this->assign('user',$info);
		$this->assign('page',$show);
		$this->display();
	}
	public function change(){
		$userid = $_GET['userid'];
		$userinfo = M('user')->where('id=%d',$userid)->select();
		$this->assign('userinfo',$userinfo);//将原数据输出到模板
		$this->display();
	}
	public function deleteUserinfo(){
		$id = $_GET['userid'];
		$deleteuser = M('User')->where('id=%d',$id)->delete();
		if(!empty($deleteuser)){
			$this->success('成功删除',U('User/index'));
		}else{
			$this->error('删除失败,请重试',U('User/index'));
		}
	}
	public function modify(){
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function getdata(){
		$headpic = $_FILES['photo'];	                      //图像处理
		if(!empty($headpic)){
			$config = array(
					'maxSize' => 4194304,
					'exts' => array('jpg','jpeg','png','gif','png'),
					'rootPath' => './Public/',
					'saveName' => array('uniqid',''),
					'savePath' => 'upload/headpic/',
					'autoSub' => true,
					'subName'  =>  array('date', 'Ymd'),
			);
			$upload = new \Think\Upload($config);
			$mess = $upload->uploadOne($_FILES['photo']);
		}

			if(empty($mess)){
				print_r($upload->getError());
			}else{
				$headinfo = $mess['savepath'].$mess['savename'];
				//$_POST['headpic'] = $headinfo;                      //获取头像信息保存地址
			}
		$data = array(                                              //获取提交数据
				'username' => I('post.userName'),
				'name' => I('post.name','','htmlspecialchars'),
				'userpasswd' => I('post.passWord','','htmlspecialchars'),
				'sex' => I('post.sex','0'),
				'email' => I('post.email','',FILTER_VALIDATE_EMAIL),
				'telno' => I('post.mobile'),
				'address' => I('post.address'),
				'headpic' => $headinfo,
		);
		//dump($data);
		$user = D("User");
		if(!$user->create($data)){
			exit($user->getError());
		}else{
			if(empty($_POST['id'])){
			$user->add($data);
			$this->success('数据添加成功',U('user/index'),2);
			}else{
				$id = I('post.id');
				$user->where('id=%d',$id)->save($data);
				$this->success('数据修改成功',U('user/index'),1);
			}
		}
	}
}
?>