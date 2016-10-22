<?php
namespace Admin\Model;
use Think\Model;
class Product_attrgroupModel extends Model{
	protected $_validate = array(
			array('attrgroup_name','','父类名已存在',0,'unique',1),
	);
}