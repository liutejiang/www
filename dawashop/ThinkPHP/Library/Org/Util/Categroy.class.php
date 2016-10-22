<?php
namespace Org\Util;
class Categroy{
	static public function unlimitedForLevel($a,$html = '->',$id = 0,$level = 0){
		$arr = array();
		foreach($a as $v){
			if($v['attrgroup_id'] == $id){
				$v['level'] = $level+1;
				$v['html'] = str_repeat($html,$level);
				$arr[] = $v;
				$arr = array_merge($arr,self::unlimitedForLevel($a,$html,$v['attr_id'],$level+1));
			}
		}
		return $arr;
	}
}