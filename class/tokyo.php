<?php
	class tokyo{
		public $tokyo;
		public function __construct(){
			$this->tokyo = new medoo([
    				'database_type' => 'mysql',
 				    'database_name' => 'tokyo',
 				    'server' => 'localhost',
 			        'username' => 'root',
  				    'password' => '',
			        'charset' => 'utf8',
   			 		'port' => 3306,
    				'prefix' => 'info_',
			]);
		}
		public function index(){
			$count=$this->count();
			$this->page($count);
		}
		public function page($count=0){
			include_once 'phpQuery/phpQuery.php';
			$url="http://tokyotosho.info/?page=".$count."&cat=0";
			phpQuery::newDocumentFile($url); 
			$info=pq(".desc-top"); 
			foreach ($info as $key => $value) {
				$add['magnet']=pq($value)->find("a:eq(0)")->attr("href");
				$add['torrent']=pq($value)->find("a:eq(1)")->attr("href");
				$add['name']=pq($value)->find("a:eq(1)")->text();
				$add['time']=time();
				$this->add($add);
			}

		}
		public function  add($info){
			if(!$this->jugg($info['name'])){
				$this->tokyo->insert('tokyo',$info);
			}
		}
		public function jugg($name){
			$where['name']=$name;
			$info=$this->tokyo->select('tokyo','id',$where);
			return $info;//true 的时候插入
		}
		public function count_insert(){
			$add['time']=time();
			$this->tokyo->insert('count',$add);
		}
		public function count(){
			$where['id[>]']=1;
			$this->count_insert();
			return $this->tokyo->count('count',$where);
		}
		public function search($name,$start=0,$num){
			$num=(int)$num;
			$start=(int)$start;
			$name=trim($name);
			$where['name[~]']=$name;
			$where['LIMIT']=array($start,$num);
			$info=$this->tokyo->select('tokyo','*',$where);
			$this->json($info);
		}
		public function json($info){
			header('Content-type:text/json');
			echo json_encode($info);
		}



	}
