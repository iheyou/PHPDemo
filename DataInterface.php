<?php
class DataInterface{
	private $_sql=NULL;
	public function DataInterface(){
		 
	}
	public function initWin(){
	    date_default_timezone_set("PRC") ;//设置时区
		error_reporting(E_ALL^E_NOTICE^E_WARNING);//关闭所有报错
            //$sqlcon = mysql_connect("localhost","root","");
			$sqlcon = mysql_connect("localhost","root","");
		if (!$sqlcon)
		{
	      return;
		}else{
	      mysql_select_db("pinghuo",$sqlcon);
		}
	}
	public function sqlInsert($table,$values){
	  $astr="";
	  $bstr="";
	  for($i=0;$i<count($values);$i++){
		 $astr=$astr.key($values);
		 $bstr=$bstr.$values[key($values)];
		 next($values);
		 if($i<count($values)-1){
			$astr=$astr."," ;
			$bstr=$bstr.",";
		 }
	  }
	  $mysql="insert into ".$table." (".$astr.") values (".$bstr.")";
	  mysqli_query("set names 'utf8'");
	  $rs = mysqli_query($mysql);
	  return $rs;
	}
	public function sqlInsertonly($table,$values){
	  $astr="";
	  $bstr="";
	  for($i=0;$i<count($values);$i++){
		 $astr=$astr.key($values);
		 $bstr=$bstr.$values[key($values)];
		 next($values);
		 if($i<count($values)-1){
			$astr=$astr."," ;
			$bstr=$bstr.",";
		 }
	  }
	  $mysql="insert ignore into ".$table." (".$astr.") values (".$bstr.")";
	  mysql_query("set names 'utf8'");
	  $rs = mysql_query($mysql);
	  return $rs;
	}
	public function sqlUpdate($table,$values,$mode){
		$sqlstr="";
		 for($i=0;$i<count($values);$i++){
			 $sqlstr=$sqlstr.key($values)."=".$values[key($values)];
			 next($values);
			 if($i<count($values)-1){
				 $sqlstr=$sqlstr.",";
			 }
		 }
		$mysql="update ".$table." set ".$sqlstr." where ".$mode;
	    mysql_query("set names 'utf8'");
		$rs = mysql_query($mysql);
		return $rs;
	}
	public function sqlSelect($table,$mode){
		$datalist=array();
		if($mode=="all"){
			$mysql="select * from ".$table;
		}else{
			$mysql="select * from ".$table." where ".$mode;
		}
		mysql_query("set names 'utf8'");
		$rs = mysql_query($mysql); 
		if(!$rs){
			return $datalist;
		}
		while($row = mysql_fetch_array($rs)){
			$datalist[] =$row;
		}
		$row=NULL;
		mysql_free_result($rs);
		if(count($datalist)!=0){
		      return $datalist;
		}
	}
	public function sqlDelete($table,$mode){
		if($mode=="all"){
			$mysql="delete from ".$table;
		}else{
			$mysql="delete from ".$table." where ".$mode;
		}
		mysql_query("set names 'utf8'");
		$rs = mysql_query($mysql);
		return $rs;
	}
public function sqlCount($table,$mode){
		if($mode=="all"){
			$mysql="select count(*) allnum from ".$table;
		}else{
			$mysql="select count(*) allnum from ".$table." where ".$mode;
		}
		mysql_query("set names 'utf8'");
		$rs = mysql_query($mysql); 
		if(!$rs){
			return 0;
		}
		$row = mysql_fetch_array($rs);
		mysql_free_result($rs);
		return $row["allnum"];
}
public function sqlAllnum($table,$key,$mode){
		if($mode=="all"){
			$mysql="select sum(".$key.") allnum from ".$table;
		}else{
			$mysql="select sum(".$key.") allnum from ".$table." where ".$mode;
		}
		mysql_query("set names 'utf8'");
		$rs = mysql_query($mysql); 
		if(!$rs){
			return 0;
		}
		$row = mysql_fetch_array($rs);
		mysql_free_result($rs);
		return $row["allnum"];
}
public function sqlExecute($sql){
		$datalist=array();
		$mysql=$sql;
		mysql_query("set names 'utf8'");
		$rs = mysql_query($mysql); 
		if(!$rs){
			return $datalist;
		}
		while($row = mysql_fetch_array($rs)){
			$datalist[] =$row;
		}
		$row=NULL;
		mysql_free_result($rs);
		if(count( $datalist)!=0){
		    return $datalist;
		}
}
    private function sqlClose(){
	global $sqlcon;
	if($sqlcon){
	    mysql_close($sqlcon);	
	}
 }
	public function getSession($kye){
	 if(!isset($_SESSION)){
		  session_start();
		  setcookie("session_id",session_id(),time()+3600*24*365*10,"/",".coolbet.net");
	  }
	  if(isset($_SESSION[$kye])){
		  return $_SESSION[$kye];
	  }
	  return "";
	}
	public function Usermode(){
		if($this->getSession("name")!=""&&$this->getSession("userid")!=""){
			return true;
		}
		return false;
	}
	public function getSessionID(){
		if(session_id()==""){
			session_start();
		}
		return session_id();
	}
	public function setSession($key,$val){
		if(session_id()==""){
			session_start();
		}
		$_SESSION[$key]=$val;
	}
	public function clearSession(){
	   if(!isset($_SESSION)){
		   session_start();
		   session_unset();
		   session_destroy();
	      }
	}
	//处理GET数据addslashes
	public function Get($v){
		$get="";
		if (isset($_GET[$v])){
				$get =$_GET[$v];
			}else{
				return "";
				exit(); 
		}
		return $get;
	}
	//处理POST数据
	public function Post($v){
		$post="";
		if (isset($_POST[$v])){
				$post =$_POST[$v];
			}else{
				return "";
				exit();
		}
		return $post;
	}
}
?>