<?php
namespace Admin\Controller;
use Think\Controller;
class ProductattrController extends Controller{
	public function index(){                               //主页展示
		$attr = M('product_attr');
		//分页展示
		/*$count = $attr->count();
		$page = new \Think\Page($count,8);
		$show = $page->show();
		*/
		$attr_data = $attr->field('attr_id,attr_name,attrgroup_id')->select();
		//dump($attr_data);
		$categroy = new \Org\Util\Categroy();
		$attr_info = $categroy->unlimitedForLevel($attr_data);
		//dump($attr_info);
		$this->assign('to_attr_data',$attr_info);
		$this->assign('page',$show);
		$this->display();
	}
	public function addattrgroup(){                       //父大类的添加
		$attrgroup = M('product_attr');
		$parentattr_info = $attrgroup->where('attrgroup_id =0')->field('attr_id,attr_name')->select();
		//dump($parentattr_info);
		$this->assign('parentattr',$parentattr_info);
		$this->display();
	}
	public function getattrdata(){                                  //获取并添加类属性
		$data['attrgroup_id'] = I('post.attrgroup');                //判断类属性为子类还是父类
		$data['attrgroup_name'] = I('post.attrName');                                      //子类
		$attr = M('product_attr');
		$attrname_info = $attr->where("attr_name= '%s'" ,$data['attrgroup_name'])->select();
		if(!empty($attrname_info)){                                 //判断是否
			$this->ajaxReturn('子类已添加');
		}else{
			$attr_data['attr_name'] = $data['attrgroup_name'];
			$attr_data['attrgroup_id'] = $data['attrgroup_id'];
			$attr->add($attr_data);
			$this->ajaxReturn('ok');
		}
	}
	public function addattr(){              //子类添加
		$attrgroup_id = I('get.id');
		$attr_name = M('product_attr')->where('attr_id= %d',$attrgroup_id)->field('attr_name')->select();
		$this->assign('attr_name',$attr_name);
		$this->assign('attrgroup_id',$attrgroup_id);
		$this->display();
	}
	public function getattr(){              //获取子类所要添加的数据
		$attr_data = array(
				'attrgroup_id' => I('post.attrgroup_id'),
				'attr_name' => I('post.attrName')
		);
		if(empty($attr_data['attr_name'])){
			$this->ajaxReturn('请输入子类名');
		}else{
		$product_attr = M('product_attr');
		$attrname_info = $product_attr->where("attr_name= '%s'",$attr_data['attr_name'])->select();
		if(!empty($attrname_info)){
			$this->ajaxReturn('子分类已存在，请勿重复添加');
		}else{
			if($product_attr->add($attr_data)){
				$this->ajaxReturn('子分类成功添加');
			}else{
				$this->ajaxreturn('子分类添加失败');
			}
		}
		}
	}
	public function delattr(){
		$get_attr_id = I('get.id');
		//echo $get_attr_id;
		$attr_table = M('product_attr');
		$info = $attr_table->where('attr_id=%d',$get_attr_id)->delete();
		if($info){
			$this->success('成功删除',U('Admin/Productattr/index'));
		}else{
			$this->error('删除失败',U('Admin/Productattr/index'));
		}
	}
}