<?php 
	///添加淘宝购买的产品
	private function AddProductTaobao($type){
		$listarray=array(
		  "ty_goodtitle"=>"'".parent::Post("product_title")."'",
		  "ty_goodimg"=>"'".parent::Post("product_smallimg")."'",
		  "ty_recomentpid"=>"'".parent::Post("pid_salemode")."'",
	      "ty_userid"=>"'".parent::Post("tk_salemode")."'",
		  "agents_id"=>"'".parent::Post("fe_salemode")."'",
		  "ty_orprice"=>"'".parent::Post("product_price")."'",
		  "ty_hytype"=>"'".parent::Post("yhtype")."'",
		  "ty_shoptype"=>"'".parent::Post("shop_type")."'",
		  "ty_saleprice"=>"'".parent::Post("product_reprice")."'",
	      "ty_tkl"=>"'".parent::Post("product_tkl")."'",
		  "ty_yhvalue"=>"'".parent::Post("product_yhvalue")."'",
		  "ty_source"=>"'1'",
		   "ty_yhurl"=>"'".parent::Post("product_yhurl")."'",
		  "ty_zhiying"=>"'".parent::Post("zhiying")."'",
		  "ty_goodurl"=>"'".parent::Post("product_url")."'",
		  "ty_yhnum"=>"'".parent::Post("yhnum")."'",
		  "ty_yhused"=>"'".parent::Post("yhusenum")."'",
		  "ty_yhstarttime"=>"'".parent::Post("yhstarttime")."'",
		  "ty_yhendtime"=>"'".parent::Post("yhendtime")."'",
		  "ty_goodid"=>"'".parent::Post("tygoodid")."'",
		
		  "ty_mailfree"=>"'".parent::Post("product_freemod")."'",
		  "class_id"=>"'".parent::Post("class_id")."'",
		  "ty_salenum30"=>"'".parent::Post("product_salenum")."'",
		  "ty_shopid"=>"'".parent::Post("product_shopid")."'",
		  "ty_gooddetailimg"=>"'".parent::Post("product_label")."'",
		  "ty_colltime"=>"'".time()."'",
		  "ty_buyurl"=>"'".parent::Post("product_buyurl")."'"
		
		);
		
		$mode=parent::sqlInsert("ty_goods",$listarray);
		
		if(parent::Post("action_selecter")!="0"){
			$goodinfo=parent::sqlSelect("ty_goods","ty_buyurl='".parent::Post("product_buyurl")."'");
		   $valueac=array("product_id"=>"'".$goodinfo[0]["product_id"]."'","action_sign"=>"'".parent::Post("action_selecter")."'");
		   parent::sqlInsert("action_goods",$valueac);
		}
		
		if($mode){
			if($type!=1){
				echo "添加成功";
				return;
			}
			$this->MessageBoxDigo("添加成功!","product.add.php");
		}else{
			if($type!=1){
				echo "添加失败";
				return;
			}
			$this->MessageBoxDigo("添加失败!","product.add.php");
		}
	}
 ?>