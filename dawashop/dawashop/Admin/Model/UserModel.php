<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	protected $_validate = array(
			array('telno','number','请输入电话号码'),
			array('username','','用户名已存在',0,'unique',1),
	);
	protected $_auto = array(
			array('userpasswd','md5',3,'function'),
			);
}
