<?php
namespace Home\Controller;
use Think\Controller;

/**
* 业务模块控制器
* @author lrf
* @modify 2016/12/22
*/
class BusinessModelController extends BaseController
{
	/*
	 * 添加模块与对应的编码
	 * @param cn_name 模块的中文名称
	 * @param en_name 模块的英文名称
	 * @param remark 模块的说明
	 */
	public function addBusinessmodel(){
		$cn_name = I('post.cn_name');
		$en_name = I('post.en_name');
		$remark = I('post.remark');
		if(empty($cn_name)){
			$arr['status'] = 102;
			$arr['msg'] = "中文名称不能为空";
			$this->response($arr,'json');
			exit();
		}
		$data['cn_name'] = $cn_name;
		$data['en_name'] = $en_name;
		$data['remark'] = $remark;
		$data['code'] = generate_code();
		$data['enabled'] = 1;
		$res = \Think\Product\BusinessModel::AddBusinessModel($data);
		$this->response($res,'json');
	}

	/*
	 * 获取模块与对应编码的列表
	 */
	public function getBusinessmodel(){
		$vague = I('post.vague');
		$res = \Think\Product\BusinessModel::GetBusinessModel($vague);
		$this->response($res,'json');
	}

	/*
	 * 删除模块
	 * @param id 模块id
	 */
	public function delBusinessmodel(){
		$id = I('post.id');
		if(empty($id)){
			$arr['status'] = 102;
			$arr['msg'] = "请选择模块";
			$this->response($arr,'json');
			exit();
		}
		$res = \Think\Product\BusinessModel::DelBusinessModel($id);
		$this->response($res,'json');
	}

	/*
	 * 修改模块
	 * @param id 模块id
	 * @param cn_name 模块中文名称
	 * @param en_name 模块英文名称
	 * @param remark 模块说明
	 */
	public function updateBusinessmodel(){
		$id = I('post.id');
		$cn_name = I('post.cn_name');
		$en_name = I('post.en_name');
		$remark = I('post.remark');
		if(empty($cn_name)){
			$arr['status'] = 102;
			$arr['msg'] = "中文名称不能为空";
			$this->response($arr,'json');
			exit();
		}
		$data['cn_name'] = $cn_name;
		$data['en_name'] = $en_name;
		$data['remark'] = $remark;
		$res = \Think\Product\BusinessModel::UpdateBusinessModel($id,$data);
		$this->response($res,'json');
	}
}