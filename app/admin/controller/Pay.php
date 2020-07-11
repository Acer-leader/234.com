<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/3/31
 * Time: 下午11:24
 */

namespace app\admin\controller;
use app\admin\model\Pay as pays;

class Pay extends Base
{
  
  
    public function index(){
		$list=pays::all();
	
	
        return $this->fetch(__FUNCTION__,['list'=>$list]);
    }
	
	public function post(){
		
		$id = params('id');

        $item = [];

        if(check_id($id)){

            $item = \app\admin\model\Pay::getInfoById($id);

        }

		 if(request()->isAjax()){
			 $params = array_trim(request()->post());

			
			if(empty($item)){
				
                $params['create_time'] = TIMESTAMP;
                $op = "添加";
			
                $status = \app\admin\model\Pay::addInfo($params);
            }else{
			
                $params['update_time'] = TIMESTAMP;
                $op = "修改";
                $status = \app\admin\model\Pay::updateInfoById($id,$params);
            }
			 if(!$status){
                message("{$op}失败",'','error');
            }
            message("{$op}成功",'reload','success');
			
		 }
		
		return $this->fetch(__FUNCTION__,[
            'item' => $item

        ]);
	}


}