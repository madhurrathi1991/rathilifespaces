<?php
if ( function_exists( 'date_default_timezone_set' ) ) {
    date_default_timezone_set('Asia/Kolkata');
}
require_once 'database.php';
session_start();

class HOUSE {
            public $db;
      
	     var $data;
	        public function __construct(){

 $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
 if(mysqli_connect_errno()) {
 echo "Error: Could not connect to database.";
  exit;
	 }

		  $this->data = array(
//		  'get_user_details'=>$this->get_school_info_details_by_id($_REQUEST["school_info_id"]),

        );
	}


	 function dbRowInsert($table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);
    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";
    // run and return the query result resource

    return mysqli_query($this->db,$sql);
}
// again where clause is left optional
function dbRowUpdate($table_name, $form_data, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";
    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);
    // append the where statement
    $sql .= $whereSQL;
    // run and return the query result
    return mysqli_query($this->db,$sql);
}
// the where clause is left optional incase the user wants to delete every row!
function dbRowDelete($table_name, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;
    // run and return the query result resource
     return mysqli_query($this->db,$sql);
}

function dbRowInsertschool($table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);
    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";
    // run and return the query result resource

    return mysqli_query($this->schooldb,$sql);
}
// again where clause is left optional
function dbRowUpdateschool($table_name, $form_data, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";
    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);
    // append the where statement
    $sql .= $whereSQL;
    // run and return the query result
    return mysqli_query($this->schooldb,$sql);
}
// the where clause is left optional incase the user wants to delete every row!
function dbRowDeleteschool($table_name, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;
    // run and return the query result resource
     return mysqli_query($this->schooldb,$sql);
}
/* function send_mail($from,$to,$subject,$body)
{
	$headers = '';
	$headers .= "From: $from\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "Date: " . date('r', time()) . "\n";
	mail($to,$subject,$body,$headers);
} */


public function base_url(){
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
return $base_url;
}

public function full_path(){
$full_path = dirname(__FILE__);
return $full_path;
}


function get_mail_settings(){
	$tmp=array();
	$result = mysqli_query($this->db,"SELECT * FROM mail_setting");
		if(! $result) {
    die("SQL Error: " . mysqli_error($this->db));
}
	 while ($row = mysqli_fetch_assoc($result))
    {
        //load all returned rows into an array
		  $tmp['id'] = $row['id'];
         $tmp['id']=$row['id'];
        $tmp['from_name']=$row['from_name'];
        $tmp['from_emailid']=trim($row['from_emailid']);
        $tmp['to_emailid']=trim($row['to_emailid']);
    }

    return  $tmp;
}
function removeallspecialcharacters($string){
$str=preg_replace("![^a-z0-9]+!i", "", $string);
return $str;
}

function compress_image($source_url, $destination_url, $quality) {
			$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

			elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
			return $destination_url;
	}
	
	
public function category()
{
	$JSON["category"]=array();

$sql=mysqli_query($this->db,"SELECT * FROM  category order by id ASC ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
if(mysqli_num_rows($sql)>0)
{
				while($row = mysqli_fetch_array($sql)){
				$id=$row['id'];
				$category_name=$row['name'];
				$route=strtolower($row['name']);
				$image=$row['image'];
				
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($image != ''){
		$image=$base_url.$url."/shradhatops/admin/image/category_image/".$image;
}
else{
		$image=$base_url.$url."/shradhatops/admin/image/logo.png";
}
			
	
		 array_push($JSON["category"],array( 'catgtegory_id'=>$id,'category_name' => $category_name,'route'=>$route,'image' => $image));
		}
		$statuscode=0;
		$statusmessage="Successfull";
		}		
		else{
		$statuscode=1;
		$statusmessage="No category list found";
		}

		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}



public function search()
{
	$JSON["search"]=array();
		if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']!='' )
			{
		 $keyword=$_REQUEST['keyword'];
		$sql=mysqli_query($this->db,"SELECT * FROM  product_detail where name LIKE '%$keyword%'  order by id ASC");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sql)>0)
{
	$product_list=array();
				while($row = mysqli_fetch_array($sql)){
				$product_id=$row['id'];
				$product_name=$row['name'];
				
				$product_list[]=array('product_id'=>$product_id,'product_name'=>$product_name,'type'=>'product');

}
}
else{
$product_list='';
}

$sqls=mysqli_query($this->db,"SELECT * FROM  category where name  LIKE '%$keyword%'  order by id ASC");
		if(! $sqls) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqls)>0)
{
	$category_list=array();
				while($row = mysqli_fetch_array($sqls)){
				$category_id=$row['id'];
				$category_name=$row['name'];
				$category_list[]=array('product_id'=>$category_id,'product_name'=>$category_name,'type'=>'category');

}
}
else{
$category_list='';
}
$search_list=array_merge($product_list,$category_list);

		 		//array_push($JSON["search"],array( 'search_list'=>$search_list));
		$statuscode=0;
		$statusmessage="Successfull";
		}
		
					
else {
	$statuscode=1;
	$statusmessage="Please insert keyword";
}		

$JSON['search_list']=$search_list;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}



public function gift_list()
{
	$JSON["gift_list"]=array();

$sql=mysqli_query($this->db,"SELECT * FROM  gift order by id desc ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
if(mysqli_num_rows($sql)>0)
{
				while($row = mysqli_fetch_array($sql)){
				$id=$row['id'];
				$title=$row['title'];
				$description=$row['description'];
                                
                                $description = substr($description,0,50);
                                
				$image=$row['image'];
				
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($image != ''){
		$image=$base_url.$url."/shradhatops/admin/image/gift/".$image;
}
else{
		$image=$base_url.$url."/shradhatops/admin/image/logo.png";
}
			
	
		 array_push($JSON["gift_list"],array( 'gift_id'=>$id,'title' => $title,'description'=>$description,'image' => $image));
		}
		$statuscode=0;
		$statusmessage="Successfull";
		}		
		else{
		$statuscode=1;
		$statusmessage="No Gift list found";
		}

		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function signup()
{
$JSON["signup"]=array();
$JSON['statuscode']=1;
$JSON['statusmessage']="signup status is enabled";
echo json_encode($JSON);
}


public function register()
{
$JSON["register"]=array();

		if(isset($_REQUEST['email']) && $_REQUEST['email']!='' )
			{
				if(isset($_REQUEST['username']) && $_REQUEST['username']!='' )
			{
				if(isset($_REQUEST['password']) && $_REQUEST['password']!='' )
			{
				$email=$_REQUEST['email'];
				$username=$_REQUEST['username'];
				$password=md5($_REQUEST['password']);
				
			$sql=mysqli_query($this->db,"select * from user where email='$email' ");
			if(mysqli_num_rows($sql) > 0){
			
		$statuscode=1;
		$statusmessage="email Id already exist";
			}
			else{
				$sqls=mysqli_query($this->db,"select * from user where lower(customer_id)=lower('$username') ");
			if(mysqli_num_rows($sqls) > 0){
		$statuscode=1;
		$statusmessage="Username already exist";
			}
			else{
				$sqls1=mysqli_query($this->db,"insert into user(name,email,customer_id,password)VALUES('$username','$email','$username','$password') ");
				if(!($sqls1)){
					die("SQL ERROR".mysqli_error($this->db));
				}
				$statuscode=0;
		$statusmessage="Successfull";
			}
				
			}
			}
			else{
		$statuscode=1;
		$statusmessage="please insert password";
			}
			}
			else{
		$statuscode=1;
		$statusmessage="please insert username";
			}
			}
			else{
		$statuscode=1;
		$statusmessage="please insert email";
			}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function product_sizes()
{
	$JSON["product_sizes"]=array();
		
		$sql=mysqli_query($this->db,"SELECT * FROM  product_size where status='1'  order by id ASC");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sql)>0)
{
				while($row = mysqli_fetch_array($sql)){
				$size_id=$row['id'];
				$size_name=$row['name'];
				
 		array_push($JSON["product_sizes"],array( 'size_id'=>$size_id,'size_name'=>$size_name));
		}
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
			$statuscode=1;
		$statusmessage="no list found";
		}

$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function feedback()
{
	$JSON["feedback"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
				
				if(isset($_REQUEST['message']) && $_REQUEST['message']!='' )
			{
				$user_id=$_REQUEST['user_id'];
				$message=$_REQUEST['message'];
				$sql=mysqli_query($this->db,"SELECT * FROM  user where id='$user_id' ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sql)>0)
{
	$created_at=time();
	$sqls=mysqli_query($this->db,"insert into feedback(user_id,message,created_at)VALUES('$user_id','$message','$created_at') ");
	if(!$sqls){
		   die("SQL Error: " . mysqli_error($this->db));
	}
				
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
			$statuscode=1;
		$statusmessage="Invalid user";
		}
		}
		else{
			$statuscode=1;
		$statusmessage="insert message";
		}
		}
		else{
			$statuscode=1;
		$statusmessage="Please insert user id";
		}

$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function price_status()
{
	$JSON["price_status"]=array();
			if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
		$sql=mysqli_query($this->db,"SELECT * FROM  user where id='$user_id' ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sql)>0)
{
			$row = mysqli_fetch_array($sql);
				if($row['show_price']==1){
				$statuscode=0;
		$statusmessage="Successfull";
				}
 		else{
			$statuscode=1;
		$statusmessage="User cant't Show price";
		}
		
		}
		else{
			$statuscode=1;
		$statusmessage="no user found";
		}
		}
		else{
			$statuscode=1;
		$statusmessage="please enter user id";
		}

$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function user_status()
{
	$JSON["user_status"]=array();
			if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
		$sql=mysqli_query($this->db,"SELECT * FROM  user where id='$user_id' ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sql)>0)
{
			
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
			$statuscode=1;
		$statusmessage="no user found";
		}
		}
		else{
			$statuscode=1;
		$statusmessage="please enter user id";
		}

$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}



public function product_list()
{
$JSON["product_list"]=array();
		
	if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
	$sql=mysqli_query($this->db,"SELECT * FROM  product_detail  order by section asc");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sql)>0)
{
				while($row = mysqli_fetch_array($sql)){
				$product_id=$row['id'];
				$category_id=$row['category_id'];
				
								
					$sqls=mysqli_query($this->db,"select * from user_favourite where user_id='$user_id' AND product_id='$product_id'");
					
					if(mysqli_num_rows($sqls)>0)
					{
						$flag='true';
					}
					else{
						$flag='false';
					}
				
				$product_name=$row['name'];
				$product_no=$row['product_id'];
				$description=$row['description'];
				$product_price=$row['price'];
				
	$sqli=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli)>0)
{
	$rowi=mysqli_fetch_array($sqli);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}
$sql2=mysqli_query($this->db,"select * from category_size_chart where category_id='$category_id' order by id asc");
	if(mysqli_num_rows($sql2)>0){
$product_size_price=array();
		while($row2=mysqli_fetch_array($sql2)){
			
			$size_id=$row2['size_id'];
			
			$sql3=mysqli_query($this->db,"select  * from product_size where id='$size_id'");
			$row3=mysqli_fetch_array($sql3);
			//str_replace("world","Peter","Hello world!");
			$size_name=preg_replace('/[^a-z\s]/i', '', $row3['name']);
			$size=explode("-",$row3['name']);
			$size=$size[0];
			$product_set=$row2['product_set'];

                        $product_size_set=array();
                        $product_set=explode(",",$product_set);
                        foreach($product_set as $p_set){
                        $product_size_set[]=array('product_set'=>$p_set); 
                        }
			$price=$row2['price'];
			$product_size_price[]=array('size_id'=>$row3['id'],'product_size'=>$row3['name'],'size_name'=>$size_name,'size'=>$size,'product_size_set'=>$product_size_set,'price'=>$price);
		}

	}

				array_push($JSON["product_list"],
        array( 'product_id'=>$product_id,'product_name'=>$product_name,'product_price'=>$product_price,'description'=>$description,'product_no'=>$product_no,'product_image'=>$product_image,'product_size_price'=>$product_size_price,'flag'=>$flag));
		}
		$statuscode=0;
		$statusmessage="Successfull";
		}			
else {
	$sub_category=array();
	$statuscode=1;
	$statusmessage="No list Found";
}				
}
else{
	$statuscode=1;
	$statusmessage="Please Enter User Id";
}	
		
 		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function all_favouritte()
{
$JSON["all_favouritte"]=array();
			if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
	$sqls=mysqli_query($this->db,"SELECT * FROM   user_favourite where user_id='$user_id' order by id desc ");
		if(! $sqls) {
    die("SQL Error: " . mysqli_error($this->db));
}
while($rows=mysqli_fetch_array($sqls)){
	$product_id=$rows['product_id'];
$sql=mysqli_query($this->db,"SELECT * FROM  product_detail where id='$product_id' order by id desc ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		
				$row=mysqli_fetch_array($sql);
				$product_id=$row['id'];
				$product_name=$row['name'];
				$product_no=$row['product_id'];
				$category_id=$row['category_id'];
				$description=$row['description'];
				
	$sqli=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli)>0)
{
	$rowi=mysqli_fetch_array($sqli);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}

				array_push($JSON["all_favouritte"],
        array( 'product_id'=>$product_id,'category_id'=>$category_id,'product_name'=>$product_name,'description'=>$description,'product_no'=>$product_no,'product_image'=>$product_image));
}

		$statuscode=0;
		$statusmessage="Successfull";
	
}			
else {
	$statuscode=1;
	$statusmessage="Please insert user id";
}				
 		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function category_product()
{
$JSON["category_product"]=array();
		if(isset($_REQUEST['category_id']) && $_REQUEST['category_id']!='' )
			{
				$category_id=$_REQUEST['category_id'];
				if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
	$sql=mysqli_query($this->db,"SELECT * FROM  product_detail where category_id='$category_id' order by section asc");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sql)>0)
{
				while($row = mysqli_fetch_array($sql)){
				$product_id=$row['id'];
				
								
					$sqls=mysqli_query($this->db,"select * from user_favourite where user_id='$user_id' AND product_id='$product_id'");
					
					if(mysqli_num_rows($sqls)>0)
					{
						$flag='true';
					}
					else{
						$flag='false';
					}
				
				$product_name=$row['name'];
				$product_no=$row['product_id'];
				$category_id=$row['category_id'];
				$description=$row['description'];
				
	$sqli=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli)>0)
{
	$rowi=mysqli_fetch_array($sqli);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}
$sql2=mysqli_query($this->db,"select * from category_size_chart where category_id='$category_id' order by id asc");
	if(mysqli_num_rows($sql2)>0){
$product_size_price=array();
		while($row2=mysqli_fetch_array($sql2)){
			
			$size_id=$row2['size_id'];
			
			$sql3=mysqli_query($this->db,"select  * from product_size where id='$size_id'");
			$row3=mysqli_fetch_array($sql3);
			//str_replace("world","Peter","Hello world!");
			$size_name=preg_replace('/[^a-z\s]/i', '', $row3['name']);
			$size=explode("-",$row3['name']);
			$size=$size[0];
			$product_set=$row2['product_set'];

                        $product_size_set=array();
                        $product_set=explode(",",$product_set);
                        foreach($product_set as $p_set){
                        $product_size_set[]=array('product_set'=>$p_set); 
                        }
			$price=$row2['price'];
			$product_size_price[]=array('size_id'=>$row3['id'],'product_size'=>$row3['name'],'size_name'=>$size_name,'size'=>$size,'product_size_set'=>$product_size_set,'price'=>$price);
		}

	}

				array_push($JSON["category_product"],
        array( 'product_id'=>$product_id,'category_id'=>$category_id,'product_name'=>$product_name,'description'=>$description,'product_no'=>$product_no,'product_image'=>$product_image,'product_size_price'=>$product_size_price,'flag'=>$flag));
		}
		$statuscode=0;
		$statusmessage="Successfull";
		}			
else {
	$sub_category=array();
	$statuscode=1;
	$statusmessage="No list Found";
}				
}
else{
	$statuscode=1;
	$statusmessage="Please Enter User Id";
}			
}
else{
	$statuscode=1;
	$statusmessage="Please Enter Category Id";
}				
 		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}



public function product_detail()
{
	
$JSON["product_detail"]=array();
		if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!='' )
			{
				
$product_id=$_REQUEST['product_id'];
	$sql=mysqli_query($this->db,"SELECT * FROM  product_detail where id='$product_id' ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sql)>0)
{
				$row = mysqli_fetch_array($sql);
				$product_id=$row['id'];
				$product_name=$row['name'];
				$product_no=$row['product_id'];
				$category_id=$row['category_id'];
				$description=$row['description'];
				$product_price=$row['price'];
				
	$sqli=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli)>0)
{
	$product_gallery=array();
	while($rowi=mysqli_fetch_array($sqli)){
	$image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($image != ''){
$image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$image;
$product_gallery[]=array('product_image'=>$image);
}

}
}
else{
$product_gallery='No images found';
}


	$sql2=mysqli_query($this->db,"select * from category_size_chart where category_id='$category_id' order by id asc");
	if(mysqli_num_rows($sql2)>0){
$product_size_price=array();
		while($row2=mysqli_fetch_array($sql2)){
			
			$size_id=$row2['size_id'];
			
			$sql3=mysqli_query($this->db,"select  * from product_size where id='$size_id'");
			$row3=mysqli_fetch_array($sql3);
			//str_replace("world","Peter","Hello world!");
			$size_name=preg_replace('/[^a-z\s]/i', '', $row3['name']);
			$size=explode("-",$row3['name']);
			$size=$size[0];
			$product_set=$row2['product_set'];

                        $product_size_set=array();
                        $product_set=explode(",",$product_set);
                        foreach($product_set as $p_set){
                        $product_size_set[]=array('product_set'=>$p_set); 
                        }
			$price=$row2['price'];
			$product_size_price[]=array('size_id'=>$row3['id'],'product_size'=>$row3['name'],'size_name'=>$size_name,'size'=>$size,'product_size_set'=>$product_size_set,'price'=>$price);
		}

	}
	else{
$product_size_price='no size and proce found';	
	}	
				array_push($JSON["product_detail"],array( 'product_id'=>$product_id,'product_name'=>$product_name,'product_price'=>$product_price,'description'=>$description,'product_no'=>$product_no,
		'product_gallery'=>$product_gallery,'product_size_price'=>$product_size_price));
		
		$statuscode=0;
		$statusmessage="Successfull";
		}			
else {
	
	$statuscode=1;
	$statusmessage="No product Found";
}				
}
else{
		$statuscode=1;
	$statusmessage="Please insert product id";
}				
 		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}



public function add_user_favourite()
{
$JSON["add_user_favourite"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				
$user_id=$_REQUEST['user_id'];
				$sqlii=mysqli_query($this->db,"SELECT * FROM  user where id='$user_id' ");
		if(! $sqlii) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sqlii) > 0)
{	
					if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!='' )
					{
						$product_id=$_REQUEST['product_id'];
						$created_at=time();

		$sql=mysqli_query($this->db,"SELECT * FROM  product_detail where id='$product_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
					$sqls=mysqli_query($this->db,"insert into user_favourite(user_id,product_id,created_at)
					VALUES('$user_id','$product_id','$created_at')");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
else{

		$statuscode=0;
		$statusmessage="Successfull";
}		
				
				
}		
		
		else{
		$statuscode=1;
		$statusmessage="No product found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="no  User found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter user id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function delete_user_favouritte()
{
$JSON["delete_user_favouritte"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				
$user_id=$_REQUEST['user_id'];
				$sqlii=mysqli_query($this->db,"SELECT * FROM  user where id='$user_id' ");
		if(! $sqlii) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sqlii) > 0)
{	
					if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!='' )
					{
						$product_id=$_REQUEST['product_id'];
						$created_at=time();

		$sql=mysqli_query($this->db,"SELECT * FROM  product_detail where id='$product_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
					$sqls=mysqli_query($this->db,"delete from user_favourite where user_id='$user_id' AND product_id='$product_id'");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
else{

		$statuscode=0;
		$statusmessage="Successfull";
}		
				
				
}		
		
		else{
		$statuscode=1;
		$statusmessage="No product found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="no  User found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter user id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function add_to_cart()
{
$JSON["add_to_cart"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
					 $size_set=$_REQUEST['size_set'];
					


$user_id=$_REQUEST['user_id'];
				$sqlii=mysqli_query($this->db,"SELECT * FROM  user where id='$user_id' ");
		if(! $sqlii) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sqlii) > 0)
{	
					if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!='' )
					{
						$product_id=$_REQUEST['product_id'];
		$sql=mysqli_query($this->db,"SELECT * FROM  product_detail where id='$product_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	

$product_id=$_REQUEST['product_id'];
		$sqlss=mysqli_query($this->db,"SELECT * FROM  cart_product where product_id='$product_id' AND user_id='$user_id'");
		if(! $sqlss) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sqlss) > 0)
		{
		$rowss=mysqli_fetch_array($sqlss);	
		 $cart_product_id=$rowss['id'];
		//	 $sqli=mysqli_query($this->db,"delete cart_product where product_id='$product_id' AND user_id='$user_id'");
			
}
else{ 	
	
		 			$sqls=mysqli_query($this->db,"insert into cart_product(user_id,product_id,created_at)
					VALUES('$user_id','$product_id','".time()."')");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
} 
$cart_product_id=mysqli_insert_id($this->db);
}


								
					$size_set=explode(',',$size_set);
					
					foreach($size_set as $new_size_set)
					{
						 $new_size_set=explode('_',$new_size_set);
						 $size_id=$new_size_set[0];
						 $set=$new_size_set[1];
						
						
							 $sql3s=mysqli_query($this->db,"select * from cart_product_set where product_id='$product_id' AND  size_id='$size_id' ");
							 if(mysqli_num_rows($sql3s) > 0){
								 $sql3s=mysqli_query($this->db,"delete from cart_product_set where product_id='$product_id' AND  size_id='$size_id' ");
							 }
			
			
			$sql3=mysqli_query($this->db,"insert into cart_product_set(cart_product_id,product_id,size_id,no_of_set)
			VALUES('$cart_product_id','$product_id','$size_id','$set')");
if(! $sql3) {
    die("SQL Error: ".mysqli_error($this->db));
} 
					}
					
			
		$statuscode=0;
		$statusmessage="Successfull";
		}
		
else{
	$statuscode=0;
	$statusmessage="No product found";
}		
				
			/* 	$sql=mysqli_query($this->db,"select IFNULL(SUM(quantity),0) as quantity  from cart_service where customer_id='$customer_id'");
while($rowsi=mysqli_fetch_array($sql)){
$JSON['quantity']=$rowsi['quantity'];
}		 */
		}
		else{
		$statuscode=1;
		$statusmessage="Plesse insert product id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter User id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="no  User found";
		}
		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function quick_add_to_cart()
{
$JSON["quick_add_to_cart"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
					 $size_set=$_REQUEST['size_set'];
					


$user_id=$_REQUEST['user_id'];
				
					if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!='' )
					{
						$product_id=$_REQUEST['product_id'];
$product_id=explode(',',$product_id);
foreach($product_id as $p_ids){
					 $sqls=mysqli_query($this->db,"insert into quick_cart_product(user_id,product_id,created_at)
					VALUES('$user_id','$p_ids','".time()."')");
		if(! $sqls) {
    die("SQL Error: ".mysqli_error($this->db));
} 
}
								
				
					
			
		$statuscode=0;
		$statusmessage="Successfull";
			
				
			/* 	$sql=mysqli_query($this->db,"select IFNULL(SUM(quantity),0) as quantity  from cart_service where customer_id='$customer_id'");
while($rowsi=mysqli_fetch_array($sql)){
$JSON['quantity']=$rowsi['quantity'];
}		 */
		
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please Insert user id";
		}
		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function delete_cart_product()
{
$JSON["delete_cart_product"]=array();
		if(isset($_REQUEST['cart_id']) && $_REQUEST['cart_id']!='' )
			{
				$cart_id=$_REQUEST['cart_id'];
					
		$sql=mysqli_query($this->db,"select * FROM cart_product where id='$cart_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
$row=mysqli_fetch_array($sql);
$customer_id=$row['customer_id'];

					$sqls=mysqli_query($this->db,"delete FROM  cart_product where id='$cart_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
			
		$statuscode=1;
		$statusmessage="No service found";
		}
		
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter cart id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}



public function delete_quick_cart_product()
{
$JSON["delete_quick_cart_product"]=array();
		if(isset($_REQUEST['cart_id']) && $_REQUEST['cart_id']!='' )
			{
				$cart_id=$_REQUEST['cart_id'];
					
		$sql=mysqli_query($this->db,"select * FROM quick_cart_product where id='$cart_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
$row=mysqli_fetch_array($sql);
$customer_id=$row['customer_id'];

					$sqls=mysqli_query($this->db,"delete FROM  quick_cart_product where id='$cart_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
			
		$statuscode=1;
		$statusmessage="No service found";
		}
		
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter cart id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function quick_cart()
{
$JSON["quick_cart"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
				$product_id=$_REQUEST['product_id'];
					
		$sql=mysqli_query($this->db,"select * FROM quick_cart_product where user_id='$user_id' AND  product_id='$product_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
$row=mysqli_fetch_array($sql);
$cart_id=$row['id'];


					
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
			$cart_id='';
		$statuscode=1;
		$statusmessage="No cart found";
		}
		
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter product id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter user id";
		}
$JSON['cart_id']=$cart_id;

$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function deleteallcart()
{
$JSON["deleteallcarte"]=array();
		if(isset($_REQUEST['customer_id']) && $_REQUEST['customer_id']!='' )
			{
			
		
		$sql=mysqli_query($this->db,"select * FROM cart_service where customer_id='$customer_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
					$sqls=mysqli_query($this->db,"delete FROM  cart_service where customer_id='$customer_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}

		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="No service found";
		}
			$customer_id=$_REQUEST['customer_id'];
						$sqls=mysqli_query($this->db,"select SUM(quantity) from cart_service where customer_id='$customer_id'");
		if(mysqli_num_rows($sqls)>0)
		{
while($rowsi=mysqli_fetch_array($sqls)){
		$JSON['quantity']=$rowsi['SUM(quantity)'];
		}
		}
		else{
	$JSON['quantity']="0";
}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter customer id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function updatecart()
{
$JSON["updatecart"]=array();
if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
		if(isset($_REQUEST['cart_id']) && $_REQUEST['cart_id']!='' )
			{
				$cart_id=$_REQUEST['cart_id'];
				if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!='' )
			{
				
				$size_set=$_REQUEST['size_set'];
				
$user_id=$_REQUEST['user_id'];
				$sqlii=mysqli_query($this->db,"SELECT * FROM  user where id='$user_id' ");
		if(! $sqlii) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sqlii) > 0)
{	
					
						$product_id=$_REQUEST['product_id'];
		$sql=mysqli_query($this->db,"SELECT * FROM  product_detail where id='$product_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	

$product_id=$_REQUEST['product_id'];
		$sqlss=mysqli_query($this->db,"SELECT * FROM  cart_product where product_id='$product_id' AND user_id='$user_id'");
		if(! $sqlss) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sqlss) > 0)
		{
			/* $sqli=mysqli_query($this->db,"delete cart_product where product_id='$product_id' AND user_id='$user_id'");
			$statuscode=0;
		$statusmessage="Successfull"; */
}
		
					$sql2=mysqli_query($this->db,"delete from cart_product where id='$cart_id'");
		if(! $sql2) {
    die("SQL Error: ".mysqli_error($this->db));
}


					$sqls=mysqli_query($this->db,"insert into cart_product(user_id,product_id,created_at)
					VALUES('$user_id','$product_id','".time()."')");
		if(! $sqls) {
    die("SQL Error: ".mysqli_error($this->db));
}
$cart_product_id=mysqli_insert_id($this->db);
								
					$size_set=explode(',',$size_set);
					
					foreach($size_set as $new_size_set)
					{
						 $new_size_set=explode('_',$new_size_set);
						 $size_id=$new_size_set[0];
						 $set=$new_size_set[1];
						
							 $sql3=mysqli_query($this->db,"insert into cart_product_set(cart_product_id,product_id,size_id,no_of_set)
			VALUES('$cart_product_id','$product_id','$size_id','$set')");
if(! $sql3) {
    die("SQL Error: ".mysqli_error($this->db));
} 
					}
					
			
		$statuscode=0;
		$statusmessage="Successfull";
		}	
else{
		$statuscode=1;
		$statusmessage="Invalid product id";
		}
			/* 	$sql=mysqli_query($this->db,"select IFNULL(SUM(quantity),0) as quantity  from cart_service where customer_id='$customer_id'");
while($rowsi=mysqli_fetch_array($sql)){
$JSON['quantity']=$rowsi['quantity'];
}		 */
		
		}
		else{
		$statuscode=1;
		$statusmessage="no user available";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Product id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Cart id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter customer id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function add_order()
{
	
$JSON["add_order"]=array();

$test=mysqli_query($this->db,"select *  from  user_order  order by id desc");
 $row=mysqli_fetch_array($test);
 
 $order_nos=$row['order_no'];
    if(!$row['order_no']=null)
 {
     $number=substr($order_nos,7);
   $count = $number + 1;
     
if(strlen($count)==1){
  	$order_no = "SRD1819000" . $count;
  }
 else if(strlen($count)==2){
  	$order_no = "SRD181900" . $count;
  }
  else if(strlen($count)==3){
 	  $order_no = "SRD18190" . $count;
  }
  else if(strlen($count)==4){
 	 $order_no ="SRD1819".$count;
  }	
  }
 else
 {
  $num=1;
  $order_no="SRD1819000".$num;
 }

		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
				$sqlu=mysqli_query($this->db,"select * from user where id='$user_id'");
				$rowu=mysqli_fetch_array($sqlu);
					
				$mobile_no=$_REQUEST['mobile_no'];
				$add_name=$_REQUEST['name'];
				$state=$_REQUEST['state'];
				$city=$_REQUEST['city'];
				$pincode=$_REQUEST['pincode'];
				
						
 $cur_date=time();
	
if(isset($_REQUEST['gift_id']) && $_REQUEST['gift_id']!='' )
			{
						$gift_id=$_REQUEST['gift_id'];
			}
			else{
										$gift_id='';
			}
						$total_price=$_REQUEST['total_price'];
						
						$status=1;
						$sqls=mysqli_query($this->db,"insert into user_order(order_no,user_id,gift_id,add_name,mobile_no,state,city,pincode,created_at,total_price,status)
					VALUES('$order_no','$user_id','$gift_id','$add_name','$mobile_no','$state','$city','$pincode','$cur_date','$total_price','$status')");
					
			$order_id=mysqli_insert_id($this->db);
$sql=mysqli_query($this->db,"select * from cart_product where user_id='$user_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql) > 0 )
{
	$product_detail=array();
	$product_total_price=array();
	while($row=mysqli_fetch_array($sql)){
		$cart_id=$row['id'];
		$product_id=$row['product_id'];
	
	$query=mysqli_query($this->db,"insert into order_product(order_id,user_id,product_id)VALUES('$order_id','$user_id','$product_id') ");
	if(! $query) {
    die("SQL Error: ".mysqli_error($this->db));
}
$order_product_id=mysqli_insert_id($this->db);

$sqls=mysqli_query($this->db,"select * from cart_product_set where cart_product_id='$cart_id'");

while($rows=mysqli_fetch_array($sqls)){
	
$size_id=$rows['size_id'];
$no_of_set=$rows['no_of_set'];

$queries=mysqli_query($this->db,"insert into order_product_set(order_product_id,size_id,no_of_set)VALUES('$order_product_id','$size_id','$no_of_set') ");
if(! $queries) {
    die("SQL Error: ".mysqli_error($this->db));
}


}
	
		} 
		
		$sql3=mysqli_query($this->db,"delete from cart_product where user_id='$user_id'");
		
		
		require_once('phpmailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
  
    $mail->setFrom('sainathgarments85@gmail.com', 'Shradha Tops');
    $mail->AddAddress('sainathgarments85@gmail.com', 'Shradhatops');
	
    $mail->Subject  =  'ORDER No. ##'.$order_no;
    $mail->IsHTML(true);
	
    $mail->Body    = '<html>
	<body style="font-size:15px;line-height: 20px;">
 <h1 style="text-align: center;font-family: cursive;"><img src="http://www.shradhatops.com/wp-content/uploads/2018/03/Logo-new-1400x346.png" width="350" height="105"></h1>
 <br>
 <p style="line-height: 25px;">Customer name: <b>'.ucfirst($rowu['name']).'</b></p>
 <p style="line-height: 25px;">Company name: <b>'.ucfirst($rowu['company_name']).'</b></p>
 <p style="line-height: 25px;">Email: <b>'.$rowu['email'].'</b><br>
 Order No.:<b>##'.$order_no.'</b>.<br>
 Created On :<b>'.date('D M Y').'</b>.<br>
 Mobile No:<b>'.$rowu['mobile_no'].'</b>
 </p>

 <div style="text-align: -webkit-center;"><table width="50%" cellspacing="0" cellpadding="5" style="border: 1px solid black;text-align: center;">
		<tr>
			<th style="border: 1px solid black;">Sr.no</th>
			<th style="border: 1px solid black;">Design No</th>
			<th style="border: 1px solid black;">20/24</th>
			<th style="border: 1px solid black;">26/30</th>
			<th style="border: 1px solid black;">32/36</th>
			<th style="border: 1px solid black;">38</th>
			<th style="border: 1px solid black;">XL</th>
			<th style="border: 1px solid black;">XXL</th>
			</tr>
			<tr>
			<th style="border: 1px solid black;"> </th>
			<th style="border: 1px solid black;"></th>
			<th style="border: 1px solid black;">S</th>
			<th style="border: 1px solid black;">M</th>
			<th style="border: 1px solid black;">ML</th>
			<th style="border: 1px solid black;">L</th>
			<th style="border: 1px solid black;">XL</th>
			<th style="border: 1px solid black;">XXL</th>
			</tr>';
 //$body .= "<p>You order following services: </p>";
 //$body .= "<p>Bill detail </p>";
 $i=1;
 $sql2=mysqli_query($this->db,"select * from order_product where order_id='$order_id'");
	while($row2=mysqli_fetch_array($sql2))
	{
		$product_id=$row2['product_id'];
		$order_product_id=$row2['id'];
		

$sql3=mysqli_query($this->db,"select * from product_detail where id='$product_id'");
	$row3=mysqli_fetch_array($sql3);
	
	$name=$row3['name'];
	$design_no=$row3['product_id'];
	
		
 $mail->Body  .= "<tr>
			<td style='border: 1px solid black;'>".$i."</td>
			<td style='border: 1px solid black;'>".$design_no."</td>";
			
			$sql6=mysqli_query($this->db,"select * from product_size order by id asc");
			while($row6=mysqli_fetch_array($sql6)){

			 $row6['name'];
			 $size_id=$row6['id'];
			$sql7=mysqli_query($this->db,"select * from order_product_set where order_product_id='$order_product_id' AND size_id='$size_id'");
			if(mysqli_num_rows($sql7)){
			$row7=mysqli_fetch_array($sql7);
			
			$p_size_id=$row7['size_id'];
			$no_of_set=$row7['no_of_set'];
			}
			else
			{
				$no_of_set=' ';
			}
			
$mail->Body .="<td style='border: 1px solid black;'>".$no_of_set."</td>";
	
	}
	$mail->Body .="</tr>";
	$i++;
	
	}
	
	$mail->Body   .="</table></div>
			</body>
			</html>
			";
		//echo $mail->Body;die;
	if($mail->Send())
	{
		 $authKey = "255455AjwEicEj5c3360e2";

//Multiple mobiles numbers separated by comma
$mobileNumber = $rowu['mobile_no'];

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "SHRTOP";

//Your message to send, Add URL encoding here.
$message = urlencode("Dear Customer,
Order number : ##".$order_no." 
Your Order is confirmed & Will Be Dispatched Within 3 Days.. 
If There is Any Complaint Or Suggestion, 
Please Contact us 
shradhatops@ymail.com 
9284231311  
THANKYOU,
For Working With Us,  
Team, 
Shradha Tops.");


//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://api.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch); 
		
		$statuscode=0;
		$statusmessage="Successfull";
	}
	else
	{
		$statuscode=1;
		$statusmessage="mailed Not Send ";
	}
		
		}
	
		
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter User id";
		}
$JSON['order_no']=$order_no;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function quick_add_order()
{
	
$JSON["quick_add_order"]=array();

$test=mysqli_query($this->db,"select *  from  user_order  order by id desc");
 $row=mysqli_fetch_array($test);
 
 $order_nos=$row['order_no'];
    if(!$row['order_no']=null)
 {
     $number=substr($order_nos,7);
   $count = $number + 1;
     
if(strlen($count)==1){
  	$order_no = "SRD1819000" . $count;
  }
 else if(strlen($count)==2){
  	$order_no = "SRD181900" . $count;
  }
  else if(strlen($count)==3){
 	  $order_no = "SRD18190" . $count;
  }
  else if(strlen($count)==4){
 	 $order_no ="SRD1819".$count;
  }	
  }
 else
 {
  $num=1;
  $order_no="SRD1819000".$num;
 }

		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
				$sqlu=mysqli_query($this->db,"select * from user where id='$user_id'");
				$rowu=mysqli_fetch_array($sqlu);
					if(isset($_REQUEST['product_set']) && $_REQUEST['product_set']!='' )
					{
						$product_set=$_REQUEST['product_set'];
						
				$add_name=$_REQUEST['name'];
				$mobile_no=$_REQUEST['mobile_no'];
				$state=$_REQUEST['state'];
				$city=$_REQUEST['city'];
				$pincode=$_REQUEST['pincode'];
				$address=str_replace("'","&apos;",$_REQUEST['address']);
				
 $cur_date=time();
	
if(isset($_REQUEST['gift_id']) && $_REQUEST['gift_id']!='' )
					{
						$gift_id=$_REQUEST['gift_id'];
						
						$status=1;
						$order_type=1;
						$sqls=mysqli_query($this->db,"insert into user_order(order_no,user_id,gift_id,add_name,mobile_no,address,state,city,pincode,created_at,total_price,status,order_type)
					VALUES('$order_no','$user_id','$gift_id','$add_name','$mobile_no','$address','$state','$city','$pincode','$cur_date','$total_price','$status','$order_type')");
					
			$order_id=mysqli_insert_id($this->db);
$sql=mysqli_query($this->db,"select * from quick_cart_product where user_id='$user_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql) > 0 )
{
	
	while($row=mysqli_fetch_array($sql)){
		$cart_id=$row['id'];
		$product_id=$row['product_id'];

	$query=mysqli_query($this->db,"insert into order_product(order_id,user_id,product_id)VALUES('$order_id','$user_id','$product_id') ");
	if(! $query) {
    die("SQL Error: ".mysqli_error($this->db));
}
$order_product_id=mysqli_insert_id($this->db);
	}
$product_set=explode(',',$product_set);


foreach($product_set as $p_set){
	
	$p_set=explode('/',$p_set);
$size_id=$p_set[0];
$no_of_set=$p_set[1];

$queries=mysqli_query($this->db,"insert into quick_order_product_set(order_id,size_id,set_desc)VALUES('$order_id','$size_id','$no_of_set') ");
if(! $queries) {
    die("SQL Error: ".mysqli_error($this->db));
}

}

$sql3=mysqli_query($this->db,"delete from quick_cart_product where user_id='$user_id'");
	
		 
		
			
		require_once('phpmailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
 
    $mail->setFrom('contact@shradhatops.com', 'Shradha Tops');
    $mail->AddAddress($rowu['email'], $rowu['name']);
	$mail->AddCC('shradhatops01@gmail.com');
 
    $mail->Subject  =  'ORDER No. ##'.$order_no;
    $mail->IsHTML(true);
	
    $mail->Body    = '<html>
	<body style="font-size:15px;line-height: 20px;">
 <h1 style="text-align: center;font-family: cursive;"><img src="http://www.shradhatops.com/wp-content/uploads/2018/03/Logo-new-1400x346.png" width="350" height="105"></h1>
 <br>
 <p style="line-height: 25px;">Customer name: <b>'.ucfirst($rowu['name']).'</b></p>
 <p style="line-height: 25px;">Company name: <b>'.ucfirst($rowu['company_name']).'</b></p>
 <p style="line-height: 25px;">Email: <b>'.$rowu['email'].'</b><br>
 Order No.:<b>##'.$order_no.'</b>.<br>
 Created On :<b>'.date('D M Y').'</b>.<br>
 Mobile No:<b>'.$rowu['mobile_no'].'</b>
 </p>
 
 <div style="text-align: -webkit-center;"><table width="400px" cellspacing="0" cellpadding="5" style="border: 1px solid black;text-align: center;">
		<tr>
			<th style="border: 1px solid black;">Sr.no</th>
			<th style="border: 1px solid black;">Design No</th>
				</tr>
			';
 //$body .= "<p>You order following services: </p>";
 //$body .= "<p>Bill detail </p>";
 $i=1;
 $sql2=mysqli_query($this->db,"select * from order_product where order_id='$order_id'");
	while($row2=mysqli_fetch_array($sql2))
	{
		$product_id=$row2['product_id'];
		$order_product_id=$row2['id'];
		

$sql3=mysqli_query($this->db,"select * from product_detail where id='$product_id'");
	$row3=mysqli_fetch_array($sql3);
	
	$name=$row3['name'];
	$design_no=$row3['product_id'];
	
		
 $mail->Body  .= "<tr>
			<td style='border: 1px solid black;'>".$i."</td>
			<td style='border: 1px solid black;'>".$design_no."</td>";
			
	$mail->Body .="</tr>";
	$i++;
	
	}
	
	$mail->Body   .='</table></div><br><br>
	
	 <div style="text-align: -webkit-center;">
	 <h4>Size Detail</h4>
	 <table width="400px" cellspacing="0" cellpadding="5" style="border: 1px solid black;text-align: center;">';
			
			
				$sql6=mysqli_query($this->db,"select * from product_size order by id asc");
				$j=1;
			while($row6=mysqli_fetch_array($sql6)){

			 $size_name=$row6['name'];
			 $size_id=$row6['id'];
			$sql7=mysqli_query($this->db,"select * from quick_order_product_set where order_id='$order_id' AND size_id='$size_id'");
			if(mysqli_num_rows($sql7)){
			$row7=mysqli_fetch_array($sql7);
			
			$p_size_id=$row7['size_id'];
			$no_of_set=$row7['set_desc'];
			}
			else
			{
				$no_of_set=' ';
			}
			
			$mail->Body .="<tr><td style='border: 1px solid black;'>".$size_name."</td>
			<td style='border: 1px solid black;'>".$no_of_set."</td></tr>";
	$j++;
			}
		
	
	
	
	
			$mail->Body .='</table></body>
			</html>
			';
		//echo $mail->Body;die;
	if($mail->Send())
	{
		$statuscode=0;
		$statusmessage="Successfull";
	}
	else
	{
		$statuscode=1;
		$statusmessage="mailed Not Send ";
	}
		}
	

		
		}
		else{
		$statuscode=1;
		$statusmessage="Please insert Gift id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter product set";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter User id";
		}
$JSON['order_no']=$order_no;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function edit_address()
{
$JSON["edit_address"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
					if(isset($_REQUEST['address_id']) && $_REQUEST['address_id']!='' )
					{
					$address_id=$_REQUEST['address_id'];
		$sql=mysqli_query($this->db,"select * FROM   user_address where user_id='$user_id' AND id='$address_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
$address=str_replace("'","&apos;",$_REQUEST['address']);
$name=$_REQUEST['name'];
$satte=$_REQUEST['satte'];
$city=$_REQUEST['city'];
$pincode=$_REQUEST['pincode'];
$mobile_no=$_REQUEST['mobile_no'];
					$sqls=mysqli_query($this->db,"update user_address set name='$name',address='$address',mobile_no='$mobile_no',state='$state',city='$city',pincode='$pincode' where user_id='$user_id' AND id='$address_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="No address found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter address id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter customer id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function editprofile()
{
$JSON["editprofile"]=array();
		if(isset($_REQUEST['customer_id']) && $_REQUEST['customer_id']!='' )
			{
				$customer_id=$_REQUEST['customer_id'];
				
				$sqls=mysqli_query($this->db,"select * FROM   customer where customer_id='$customer_id' ");
		if(! $sqls) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sqls) > 0)
{	
if(isset($_REQUEST['customer_name']) && $_REQUEST['customer_name']!='' )
			{
				if(isset($_REQUEST['password']) && $_REQUEST['password']!='' )
			{
$customer_name=str_replace("'","&apos;",$_REQUEST['customer_name']);
$password=str_replace("'","&apos;",$_REQUEST['password']);
$sqlss=mysqli_query($this->db,"update customer set customer_name='$customer_name',password='$password' where customer_id='$customer_id' ");
		if(! $sqlss) {
    die("SQL Error: ".mysqli_error($this->db));
}
						if(isset($_REQUEST['address']) && $_REQUEST['address']!='' )
					{
						if(isset($_REQUEST['mobile_no']) && $_REQUEST['mobile_no']!='' )
					{
					$address_id=$_REQUEST['address_id'];
$address=str_replace("'","&apos;",$_REQUEST['address']);
$mobile_no=$_REQUEST['mobile_no'];
		$sql=mysqli_query($this->db,"select * FROM   customer_address where customer_id='$customer_id' AND address_id='$address_id' AND address_type='default' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	

					$sqls=mysqli_query($this->db,"update customer_address set address='$address',mobile_no='$mobile_no' where customer_id='$customer_id' AND address_id='$address_id' AND address_type='default'");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$sql2=mysqli_query($this->db,"insert into  customer_address (customer_id,address,mobile_no,address_type)VALUES
									('$customer_id','$address','$mobile_no','default')");
		if(! $sql2) {
    die("SQL Error: ".mysqli_error($this->db));
}
$JSON['address_id']=mysqli_insert_id($this->db);
		$statuscode=0;
		$statusmessage="Successfull";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter mobile no.";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter address";
		}
		
		}
		else{
		$statuscode=2;
		$statusmessage="please enter password";
		}
		}
		else{
		$statuscode=2;
		$statusmessage="please enter customer name";
		}
		}
		else{
		$statuscode=2;
		$statusmessage="Invalid customer";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter customer id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function delete_address()
{
$JSON["delete_address"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
					if(isset($_REQUEST['address_id']) && $_REQUEST['address_id']!='' )
					{
						$address_id=$_REQUEST['address_id'];
		$sql=mysqli_query($this->db,"select * FROM   user_address where user_id='$user_id' AND id='$address_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
					$sqls=mysqli_query($this->db,"delete FROM  user_address where user_id='$user_id' AND id='$address_id'");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="No address found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter address id";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter customer id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function all_cart()
{
$JSON["all_cart"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
					$sql=mysqli_query($this->db,"select * from cart_product where user_id='$user_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql) > 0 )
{
	$product_detail=array();
	$product_total_price=array();
	while($row=mysqli_fetch_array($sql)){
		$cart_id=$row['id'];
		$product_id=$row['product_id'];
		$quantity=$row['quantity'];
		
		$sqli=mysqli_query($this->db,"select * from product_detail where id='$product_id' ");
		if(! $sqli) {
    die("SQL Error: ".mysqli_error($this->db));
}

$rowi=mysqli_fetch_array($sqli);
$name=$rowi['name'];
$product_no=$rowi['product_id'];
$category_id=$rowi['category_id'];


$sqli2=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli2) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli2)>0)
{
	$rowi=mysqli_fetch_array($sqli2);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}




$category_id=$rowi['category_id'];

$sqls=mysqli_query($this->db,"select * from cart_product_set where cart_product_id='$cart_id'");
$product_size_set=array();
$product_price=array();
while($rows=mysqli_fetch_array($sqls)){
	
$size_id=$rows['size_id'];
$no_of_set=$rows['no_of_set'];



$sql5=mysqli_query($this->db,"select * from product_size where id='$size_id' ");
$row5=mysqli_fetch_array($sql5);


$sql4=mysqli_query($this->db,"select * from category_size_chart where category_id='$category_id' AND size_id='$size_id'");
$row4=mysqli_fetch_array($sql4);

$product_price[]=$row4['price']*$no_of_set;
$set_price=$row4['price']*$no_of_set;
$product_size_set[]=array('size_id'=>$size_id,'size_name'=>$row5['name'],'set'=>$no_of_set,'set_price'=>$set_price);
}

		$sql3=mysqli_query($this->db,"select * from category where id='$category_id' ");
		if(! $sql3) {
    die("SQL Error: ".mysqli_error($this->db));
}
$row3=mysqli_fetch_array($sql3);
$category_name=$row3['name'];
$product_prices=array_sum($product_price);
$product_new_prices=$product_prices;
$product_total_price[]=$product_new_prices;
		array_push($JSON["all_cart"],array('cart_id'=>$cart_id,'product_id'=>$product_id,'product_name'=>$name,'product_no'=>$product_no,'product_image'=>$product_image,'category_name'=>$category_name,'product_size_set'=>$product_size_set,'product_price'=>$product_prices));
		} 
		
	$total_price=array_sum($product_total_price);
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="no services list found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
		
$JSON['total_price']=$total_price;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function order_detail()
{
$JSON["order_detail"]=array();
		
				if(isset($_REQUEST['order_id']) && $_REQUEST['order_id']!='' )
			{
				$order_id=$_REQUEST['order_id'];
					$sql6=mysqli_query($this->db,"select * from user_order where id='$order_id' ");
		if(! $sql6) {
    die("SQL Error: ".mysqli_error($this->db));
}
$row6=mysqli_fetch_array($sql6);

$order_no=$row6['order_no'];
$add_name=$row6['add_name'];
$mobile_no=$row6['mobile_no'];
$address=$row6['address'];
$state=$row6['state'];
$city=$row6['city'];
$pincode=$row6['pincode'];
$bill_no=$row6['bill_no'];
$delivery_date=$row6['delivery_date'];
$quantity=$row6['quantity'];
$amount=$row6['amount'];
$parcel=$row6['parcel'];
$dicount_amount=$row6['dicount_amount'];
$order_status=$row6['delivery_status'];

if($order_status==1){
	$order_status='Complete';
}
else{
	$order_status='Pending';
}
$order_date=date('d-m-Y',$row6['created_at']);
$sql=mysqli_query($this->db,"select * from order_product where order_id='$order_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql) > 0 )
{
	$product_detail=array();
	$product_total_price=array();
	while($row=mysqli_fetch_array($sql)){
		$order_product_id=$row['id'];
		$product_id=$row['product_id'];
		
		$sqli=mysqli_query($this->db,"select * from product_detail where id='$product_id' ");
		if(! $sqli) {
    die("SQL Error: ".mysqli_error($this->db));
}

$rowi=mysqli_fetch_array($sqli);
$name=$rowi['name'];
$product_no=$rowi['product_id'];
$category_id=$rowi['category_id'];


$sqli2=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli2) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli2)>0)
{
	$rowi=mysqli_fetch_array($sqli2);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}



$sqls=mysqli_query($this->db,"select * from order_product_set where order_product_id='$order_product_id'");
$product_size_set=array();
$product_price=array();
while($rows=mysqli_fetch_array($sqls)){
	
$size_id=$rows['size_id'];
$no_of_set=$rows['no_of_set'];



$sql5=mysqli_query($this->db,"select * from product_size where id='$size_id' ");
$row5=mysqli_fetch_array($sql5);


$sql4=mysqli_query($this->db,"select * from category_size_chart where category_id='$category_id' AND size_id='$size_id'");
$row4=mysqli_fetch_array($sql4);

$product_price[]=$row4['price']*$no_of_set;
$set_price=$row4['price']*$no_of_set;
$product_size_set[]=array('size_id'=>$size_id,'size_name'=>$row5['name'],'set'=>$no_of_set,'set_price'=>$set_price);
}

		$sql3=mysqli_query($this->db,"select * from category where id='$category_id' ");
		if(! $sql3) {
    die("SQL Error: ".mysqli_error($this->db));
}
$row3=mysqli_fetch_array($sql3);
$category_name=$row3['name'];
$product_prices=array_sum($product_price);
$product_new_prices=$product_prices;
$product_total_price[]=$product_new_prices;
		array_push($JSON["order_detail"],array('product_id'=>$product_id,'product_name'=>$name,'product_no'=>$product_no,'product_image'=>$product_image,'category_name'=>$category_name,'product_size_set'=>$product_size_set,'product_price'=>$product_prices,'bill_no'=>$bill_no,'delivery_date'=>$delivery_date,'quantity'=>$quantity,'amount'=>$amount,'parcel'=>$parcel,'discount_amount'=>$discount_amount,'order_status'=>$order_status));
		} 
		
	$total_price=array_sum($product_total_price);
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="no services list found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
		
$JSON['name']=$add_name;
$JSON['mobile_no']=$mobile_no;
$JSON['address']=$address;
$JSON['state']=$state;
$JSON['city']=$city;
$JSON['pincode']=$pincode;
$JSON['order_no']=$order_no;
$JSON['order_date']=$order_date;
$JSON['total_price']=$total_price;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function quick_order_detail()
{
$JSON["quick_order_detail"]=array();
		
				if(isset($_REQUEST['order_id']) && $_REQUEST['order_id']!='' )
			{
				$order_id=$_REQUEST['order_id'];
				
					$sql6=mysqli_query($this->db,"select * from user_order where id='$order_id' AND order_type=1 ");
		if(! $sql6) {
    die("SQL Error: ".mysqli_error($this->db));
}
$row6=mysqli_fetch_array($sql6);

$order_no=$row6['order_no'];
$add_name=$row6['add_name'];
$mobile_no=$row6['mobile_no'];
$address=$row6['address'];
$state=$row6['state'];
$city=$row6['city'];
$pincode=$row6['pincode'];
$order_date=date('d-m-Y',$row6['created_at']);
$product_detail=array();
$sql=mysqli_query($this->db,"select * from order_product where order_id='$order_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql) > 0 )
{
	while($row=mysqli_fetch_array($sql)){
		$order_product_id=$row['id'];
		$product_id=$row['product_id'];
		
		$sqli=mysqli_query($this->db,"select * from product_detail where id='$product_id' ");
		if(! $sqli) {
    die("SQL Error: ".mysqli_error($this->db));
}

$rowi=mysqli_fetch_array($sqli);
$name=$rowi['name'];
$product_no=$rowi['product_id'];
$category_id=$rowi['category_id'];


$sqli2=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli2) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli2)>0)
{
	$rowi=mysqli_fetch_array($sqli2);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}



		$sql3=mysqli_query($this->db,"select * from category where id='$category_id' ");
		if(! $sql3) {
    die("SQL Error: ".mysqli_error($this->db));
}
$row3=mysqli_fetch_array($sql3);
$category_name=$row3['name'];
		$product_detail[]=array('product_id'=>$product_id,'product_name'=>$name,'product_no'=>$product_no,'product_image'=>$product_image,'category_name'=>$category_name);
		} 
		
$sqls=mysqli_query($this->db,"select * from quick_order_product_set where order_id='$order_id'");
$product_size_set=array();
$product_price=array();
while($rows=mysqli_fetch_array($sqls)){
	
$size_id=$rows['size_id'];
$set_desc=$rows['set_desc'];



$sql5=mysqli_query($this->db,"select * from product_size where id='$size_id' ");
$row5=mysqli_fetch_array($sql5);


$sql4=mysqli_query($this->db,"select * from product_size_chart where product_id='$product_id' AND size_id='$size_id'");
$row4=mysqli_fetch_array($sql4);

$product_size_set[]=array('size_id'=>$size_id,'size_name'=>$row5['name'],'set'=>$set_desc);
}
			array_push($JSON["quick_order_detail"],array('order_no'=>$order_no,'product_detail'=>$product_detail,'product_size_set'=>$product_size_set));
	
	$total_price=array_sum($product_total_price);
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="no services list found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
$JSON['name']=$add_name;
$JSON['mobile_no']=$mobile_no;
$JSON['address']=$address;
$JSON['state']=$state;
$JSON['city']=$city;
$JSON['pincode']=$pincode;
$JSON['order_date']=$order_date;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}






public function order_list()
{
$JSON["order_list"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
					$sql=mysqli_query($this->db,"select * from user_order where user_id='$user_id' AND order_type=0 order by id desc");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql) > 0 )
{
	
	
	while($row=mysqli_fetch_array($sql)){
		$order_id=$row['id'];
		$order_no=$row['order_no'];
		$order_status=$row['delivery_status'];
		$total_price=$row['total_price'];
		$order_date=date('d-m-Y',$row['created_at']);
		
		if($order_status==1){
			$order_status="Completed";
		}
		else{
			$order_status="Pending";
		}
		
		$sqli=mysqli_query($this->db,"select * from order_product where order_id='$order_id' ");
		if(! $sqli) {
    die("SQL Error: ".mysqli_error($this->db));
}
$product_detail=array();
while($rowi=mysqli_fetch_array($sqli)){
	$product_id=$rowi['product_id'];
	
	$rowss=mysqli_query($this->db,"select * from product_detail where id='$product_id' ");
		if(! $rowss) {
    die("SQL Error: ".mysqli_error($this->db));
}
$rowss=mysqli_fetch_array($rowss);

$order_product_id=$rowi['id'];
$product_no=$rowss['product_id'];
$category_id=$rowss['category_id'];

$sqli2=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli2) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli2)>0)
{
	$rowi=mysqli_fetch_array($sqli2);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}



$sql3=mysqli_query($this->db,"select * from category where id='$category_id' ");
		if(! $sql3) {
    die("SQL Error: ".mysqli_error($this->db));
}
$row3=mysqli_fetch_array($sql3);
$category_name=$row3['name'];

$sqls=mysqli_query($this->db,"select * from order_product_set where order_product_id='$order_product_id'");
$product_size_set=array();
$product_price=array();
while($rows=mysqli_fetch_array($sqls)){
	
$size_id=$rows['size_id'];
$no_of_set=$rows['no_of_set'];



$sql5=mysqli_query($this->db,"select * from product_size where id='$size_id' ");
$row5=mysqli_fetch_array($sql5);


$sql4=mysqli_query($this->db,"select * from category_size_chart where category_id='$category_id' AND size_id='$size_id'");
$row4=mysqli_fetch_array($sql4);

$product_price[]=$row4['price']*$no_of_set;
$set_price=$row4['price']*$no_of_set;
$product_size_set[]=array('size_id'=>$size_id,'size_name'=>$row5['name'],'set'=>$no_of_set,'set_price'=>$set_price);
}

		
$product_prices=array_sum($product_price);
$product_new_prices=$product_prices;
$product_total_price[]=$product_new_prices;
		$product_detail[]=array('product_id'=>$product_id,'product_name'=>$rowss['name'],'product_no'=>$product_no,'product_image'=>$product_image,'category_name'=>$category_name,'product_size_set'=>$product_size_set,'product_price'=>$product_prices);
		} 
		array_push($JSON["order_list"],array('order_no'=>$order_no,'product_detail'=>$product_detail,'total_price'=>$total_price,'order_date'=>$order_date,'order_status'=>$order_status));
		
		} 
		
	
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="no services list found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
		

$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function quick_order_list()
{
$JSON["quick_order_list"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
				
					$sql=mysqli_query($this->db,"select * from user_order where user_id='$user_id' AND order_type=1 order by id desc");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql) > 0 )
{
	
	
	while($row=mysqli_fetch_array($sql)){
		$order_id=$row['id'];
		$order_no=$row['order_no'];
		$order_date=date('d-m-Y',$row['created_at']);
		
		
		$sqli=mysqli_query($this->db,"select * from order_product where order_id='$order_id' ");
		if(! $sqli) {
    die("SQL Error: ".mysqli_error($this->db));
}
$product_detail=array();
while($rowi=mysqli_fetch_array($sqli)){
	$product_id=$rowi['product_id'];
	
	$rowss=mysqli_query($this->db,"select * from product_detail where id='$product_id' ");
		if(! $rowss) {
    die("SQL Error: ".mysqli_error($this->db));
}
$rowss=mysqli_fetch_array($rowss);

$order_product_id=$rowi['id'];
$category_id=$rowss['category_id'];
$$product_no=$rowss['product_no'];


$sqli2=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli2) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli2)>0)
{
	$rowi=mysqli_fetch_array($sqli2);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}


$sql3=mysqli_query($this->db,"select * from category where id='$category_id' ");
		if(! $sql3) {
    die("SQL Error: ".mysqli_error($this->db));
}
$row3=mysqli_fetch_array($sql3);
$category_name=$row3['name'];
		$product_detail[]=array('product_id'=>$product_id,'product_name'=>$rowss['name'],'product_no'=>$product_no,'product_image'=>$product_image,'category_name'=>$category_name);
		}

$sqls=mysqli_query($this->db,"select * from quick_order_product_set where order_id='$order_id'");
$product_size_set=array();

while($rows=mysqli_fetch_array($sqls)){
	
$size_id=$rows['size_id'];
$set_desc=$rows['set_desc'];



$sql5=mysqli_query($this->db,"select * from product_size where id='$size_id' ");
$row5=mysqli_fetch_array($sql5);


$sql4=mysqli_query($this->db,"select * from product_size_chart where product_id='$product_id' AND size_id='$size_id'");
$row4=mysqli_fetch_array($sql4);


$product_size_set[]=array('size_id'=>$size_id,'size_name'=>$row5['name'],'set'=>$set_desc);
}

		
		array_push($JSON["quick_order_list"],array('order_no'=>$order_no,'product_detail'=>$product_detail,'product_size_set'=>$product_size_set,'order_date'=>$order_date));
		
		} 
		
	
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="no services list found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
		

$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function quick_all_cart()
{
$JSON["quick_all_cart"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
					$sql=mysqli_query($this->db,"select * from quick_cart_product where user_id='$user_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql) > 0 )
{
$quantity=mysqli_num_rows($sql);
	while($row=mysqli_fetch_array($sql)){
		$cart_id=$row['id'];
		$product_id=$row['product_id'];
		
		$sqli=mysqli_query($this->db,"select * from product_detail where id='$product_id' ");
		if(! $sqli) {
    die("SQL Error: ".mysqli_error($this->db));
}

$rowi=mysqli_fetch_array($sqli);
$name=$rowi['name'];
$product_no=$rowi['product_id'];


$sqli2=mysqli_query($this->db,"SELECT * FROM  product_gallery where product_id='$product_id' order by id ASC ");
		if(! $sqli2) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqli2)>0)
{
	$rowi=mysqli_fetch_array($sqli2);
	$product_image=$rowi['image'];
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($product_image != ''){
$product_image=$base_url.$url."/shradhatops/admin/image/product_gallery/".$product_image;
}
else{
	$product_image='';
}
}
else{
	$product_image='';
}


		array_push($JSON["quick_all_cart"],array('cart_id'=>$cart_id,'product_id'=>$product_id,'product_no'=>$product_no,'product_image'=>$product_image,'product_name'=>$name));
		} 
		
	$total_price=array_sum($product_total_price);
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
			$quantity=0;
		$statuscode=1;
		$statusmessage="no services list found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter Service id";
		}
		
$JSON['quantity']=$quantity;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function all_address()
{
$JSON["all_address"]=array();

		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				$user_id=$_REQUEST['user_id'];
				$sql=mysqli_query($this->db,"select * from user where id='$user_id'");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql)>0){
	$row=mysqli_fetch_array($sql);
	$sqls=mysqli_query($this->db,"select * from user_address where user_id='$user_id'");
		if(! $sqls) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sqls)>0){
					
while($rows=mysqli_fetch_array($sqls)){
$address_id=$rows['id'];
$name=$rows['name'];
$address=$rows['address'];
$state=$rows['state'];
$city=$rows['city'];
$pincode=$rows['pincode'];
$mobile_no=$rows['mobile_no'];
			array_push($JSON["all_address"],array('name'=>$name,'address_id'=>$address_id,'address'=>$address,'mobile_no'=>$mobile_no,'state'=>$state,'city'=>$city,'pincode'=>$pincode));
}
			$statuscode=0;
		$statusmessage="Successfull";
	
	}
		else{
		$statuscode=1;
		$statusmessage="no address found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="in valid user";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="please insert user id";
		}
		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}



public function add_address()
{
$JSON["add_address"]=array();
		if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='' )
			{
				if(isset($_REQUEST['address']) && $_REQUEST['address']!='' )
			{
				
				$user_id=trim($_REQUEST['user_id']);
				$name=$_REQUEST['name'];
				$state=$_REQUEST['state'];
				$city=$_REQUEST['city'];
				$pincode=$_REQUEST['pincode'];
				$mobile_no=$_REQUEST['mobile_no'];
				$address=str_replace("'","&apos;",$_REQUEST['address']);

						$sqls=mysqli_query($this->db,"insert into user_address(user_id,name,address,mobile_no,state,city,pincode)
					VALUES('$user_id','$name','$address','$mobile_no','$state','$city','$pincode')");
		if(!$sqls){
    die("SQL Error: ".mysqli_error($this->db));
}
$JSON['id']=mysqli_insert_id($this->db);
		$statuscode=0;
		$statusmessage="Successfull";
		
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter address";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter user id";
		}		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function forgotpassword()
{
$JSON["forgotpassword"]=array();
		if(isset($_REQUEST['customer_id']) && $_REQUEST['customer_id']!='' )
			{
				$customer_id=$_REQUEST['customer_id'];
				$sql=mysqli_query($this->db,"select * FROM customer where customer_id='$customer_id'");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		if(mysqli_num_rows($sql) > 0)
{	
$row=mysqli_fetch_array($sql);
$name=$row['customer_name'];
$password=$row['password'];
$email=$row['email'];

$to      = $email;
$subject = "Easy House";
$txt = "\r\nUsername:".$name." \r\npassword:".$password;
$headers = 'From: easyhouse7242@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$form='easyhouse7242@gmail.com';
if(mail($to, $subject, $message, $form))
{
	echo "";
}
else
{
	echo "sdfghg";
}
		$statuscode=0;
		$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="No address found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter customer id";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function add_review()
{
$JSON["add_review"]=array();
		if(isset($_REQUEST['name']) && $_REQUEST['name']!='' )
			{
				if(isset($_REQUEST['heading']) && $_REQUEST['heading']!='' )
			{
				if(isset($_REQUEST['description']) && $_REQUEST['description']!='' )
			{
				$heading=str_replace("'","&apos;",$_REQUEST['heading']);
				$description=str_replace("'","&apos;",$_REQUEST['description']);
				$name=str_replace("'","&apos;",$_REQUEST['name']);
				$c_date=date('Y/m/d h:i:s');

					$sql=mysqli_query($this->db,"insert into testimonial(heading,description,name,created_date)VALUES('$heading','$description','$name','$c_date') ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
		$statuscode=0;
		$statusmessage="Successfull";
		}		
		else{
		$statuscode=1;
		$statusmessage="Please enter description";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter heading";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter name";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function review()
{
$JSON["review"]=array();
		
					$sql=mysqli_query($this->db,"select * from testimonial where status='1' order by id DESC");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
while($row=mysqli_fetch_array($sql))
{
	$name=$row['name'];
	$heading=$row['heading'];
	$description=$row['description'];
	array_push($JSON["review"],array('name'=>$name,'heading'=>$heading,'description'=>$description));
}
		$statuscode=0;
		$statusmessage="Successfull";
			
		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function cancelorder()
{
$JSON["cancelorder"]=array();
		if(isset($_REQUEST['order_id']) && $_REQUEST['order_id']!='')
		{
			$order_id=$_REQUEST['order_id'];
					$sql=mysqli_query($this->db,"select * from sr_order where  order_id='$order_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql)>0)
{
	
					$sql=mysqli_query($this->db,"update sr_order set status='7' where  order_id='$order_id'");
		$statuscode=0;
		$statusmessage="cancelled";
		}
		else{
		$statuscode=1;
		$statusmessage="no order found";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="please enter order id";
			
		}
		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}





public function term_condition()
{
$JSON["term_condition"]=array();
					
					$sql=mysqli_query($this->db,"select * from new_condition where status='1' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
if(mysqli_num_rows($sql)>0)
{
	$row=mysqli_fetch_array($sql);
		$JSON['term_condition']=$row['term_condition'];
		$statuscode=0;
		$statusmessage="cancelled";
		}
		else{
		$statuscode=1;
		$statusmessage="no list found";
		}
	
		
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function quantity_count()
{
$JSON["quantity_count"]=array();
					if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='')
			{
				$user_id=$_REQUEST['user_id'];
					$sql=mysqli_query($this->db,"select * from cart_product where user_id='$user_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
	$total_quantity=mysqli_num_rows($sql);

	$statuscode=0;
	$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="Please insert user id";
		}
	
$JSON['total_quantity']=$total_quantity;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function wishlist_count()
{
$JSON["wishlist_count"]=array();
					if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='')
			{
				$user_id=$_REQUEST['user_id'];
					$sql=mysqli_query($this->db,"select * from  user_favourite where user_id='$user_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
	$total_quantity=mysqli_num_rows($sql);

	$statuscode=0;
	$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="Please insert user id";
		}
	
$JSON['total_quantity']=$total_quantity;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}

public function quick_quantity_count()
{
$JSON["quick_quantity_count"]=array();
					if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='')
			{
				$user_id=$_REQUEST['user_id'];
					$sql=mysqli_query($this->db,"select * from quick_cart_product where user_id='$user_id' ");
		if(! $sql) {
    die("SQL Error: ".mysqli_error($this->db));
}
	$total_quantity=mysqli_num_rows($sql);

	$statuscode=0;
	$statusmessage="Successfull";
		}
		else{
		$statuscode=1;
		$statusmessage="Please insert user id";
		}
	
$JSON['total_quantity']=$total_quantity;
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}



public function registration()
{
	$JSON["registration"]=array();
	if(empty($_REQUEST['token']))
{
$token='';	
}
else{
	$token=$_REQUEST['token'];
}
	if(isset($_REQUEST['email']) && $_REQUEST['email']!=''  && isset($_REQUEST['type']) && $_REQUEST['type']=='google')
		{
			//echo $_REQUEST['type'];
function rand_string( $length )
 {

    $chars = "0123456789ABCDEFGHIKLMNOPQRSTUVWXYZabcdefghiklmnopqrstuvwxyz!@@#$%&*";
    return substr(str_shuffle($chars),0,$length);
}
$password=rand_string(10);
$email=str_replace("'","&apos;",$_REQUEST['email']);
$username=str_replace("'","&apos;",$_REQUEST['username']);


	$sqls=mysqli_query($this->db,"select * from customer where email='$email'");
		if(! $sqls) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqls)>0)
{	
	$statuscode=2;
	$statusmessage="You are already a user please login";
}
	else{
			$sql=mysqli_query($this->db,"insert into customer(customer_name,email,password,firebase_token)VALUES('$username','$email','$password','$token')");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
		}
$id=mysqli_insert_id($this->db);

$JSON['id']=$id;
$JSON['username']=$_REQUEST['username'];
$JSON['password']=$password;
$JSON['email']=$_REQUEST['email'];
		$statuscode=0;
		$statusmessage="Successfull";
		}
		}
		
	else if(isset($_REQUEST['username']) && $_REQUEST['username']!='' && isset($_REQUEST['email']) && $_REQUEST['email']!=''  && isset($_REQUEST['mobile_no']) && $_REQUEST['mobile_no']!='' && isset($_REQUEST['password']) && $_REQUEST['password']!='' && isset($_REQUEST['address']) && $_REQUEST['address']!='' && isset($_REQUEST['type']) &&  $_REQUEST['type']=='normal')
		{
			//echo $_REQUEST['type'];
$email=str_replace("'","&apos;",$_REQUEST['email']);
$username=str_replace("'","&apos;",$_REQUEST['username']);
$m_no=str_replace("'","&apos;",$_REQUEST['mobile_no']);
$address=str_replace("'","&apos;",$_REQUEST['address']);
$password=$_REQUEST['password'];
$sqls=mysqli_query($this->db,"select * from customer where email='$email'");
		if(! $sqls) {
    die("SQL Error: " . mysqli_error($this->db));
}
		if(mysqli_num_rows($sqls)>0)
{	
	$statuscode=2;
	$statusmessage="You are already a user please login";
}
	else{
		//echo "insert into customer(customer_name,email,password)VALUES('$username','$email','$password')";
			$sql=mysqli_query($this->db,"insert into customer(customer_name,email,password,firebase_token)VALUES('$username','$email','$password','$token')");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}
$id=mysqli_insert_id($this->db);
$address_type='default';
	$sqls=mysqli_query($this->db,"insert into customer_address(customer_id,address,mobile_no,address_type)VALUES('$id','$address','$m_no','$address_type')");
		if(! $sqls) {
    die("SQL Error: " . mysqli_error($this->db));
}
$add_id=mysqli_insert_id($this->db);
$JSON['id']=$id;
$JSON['username']=$_REQUEST['username'];
$JSON['password']=$_REQUEST['password'];
$JSON['email']=$_REQUEST['email'];
$JSON['add_id']=$add_id;
$JSON['address']=$_REQUEST['address'];
$JSON['mobile_no']=$_REQUEST['mobile_no'];
		$statuscode=0;
		$statusmessage="Successfull";
		}
		}
		else{
		$statuscode=1;
		$statusmessage="Please enter the valid detail";
		}
$JSON['statuscode']=$statuscode;
$JSON['statusmessage']=$statusmessage;
echo json_encode($JSON);
}


public function login(){
	$JSON["login"]=array();
		
	
			if(isset($_REQUEST['customer_id']) && $_REQUEST['customer_id']!='')
			{
				
				if(isset($_REQUEST['password']) && $_REQUEST['password']!='')
			{
			$password=md5($_REQUEST['password']);
	$customer_id=$_REQUEST['customer_id'];
		
	//	echo "select * from user where customer_id='$customer_id' AND password='$password' ";die;
$sql=mysqli_query($this->db,"select * from user where customer_id='$customer_id' AND password='$password' ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}

if(mysqli_num_rows($sql) > 0)
{

	$sql2=mysqli_query($this->db,"select * from user where customer_id='$customer_id' AND login_status=0 ");
		if(! $sql2) {
    die("SQL Error: " . mysqli_error($this->db));
}
	
	if(mysqli_num_rows($sql2) > 0)
{
	
	$row=mysqli_fetch_array($sql);
	$id=$row['id'];
	$password=$row['password'];
	$email=$row['email'];
	$user_name=$row['name'];
	$customer_id=$row['customer_id'];
	$company_name=$row['company_name'];
	$mobile_no=$row['mobile_no'];
	$image=$row['image'];
	
	$sqls=mysqli_query($this->db,"update user set login_status=1 where id='$id'");
		if(! $sqls) {
    die("SQL Error: " . mysqli_error($this->db));
}
$created_at=time();
	$sql3=mysqli_query($this->db,"insert into user_login_list(user_id,created_at)VALUES('$id','$created_at')");
		if(! $sql3) {
    die("SQL Error: " . mysqli_error($this->db));
}
	
	
	$JSON['id']=$id;
	$JSON['customer_id']=$customer_id;
	$JSON['username']=$user_name;
	$JSON['password']=$password;
	$JSON['email']=$email;
	$JSON['mobile_no']=$mobile_no;
	$JSON['company_name']=$company_name;
	
	$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];
if($image != ''){
		$image=$base_url.$url."/shradhatops/admin/image/user/".$image;
}
else{
		$image=$base_url.$url."/shradhatops/admin/image/logo.png";
}
	$JSON['profile_image']=$image;
	$statuscode=0;
	$statusmessage="Successfull";
}
else{
	$row12=mysqli_fetch_array($sql);
	$user_id=$row12['id'];
	$JSON['user_id']=$user_id;
	$statuscode=2;
	$statusmessage="user already logged in";
}
}
else{
	$statuscode=1;
	$statusmessage="invalid user Customer Id & passowrd";
}
}
else{
	$statuscode=1;
	$statusmessage="please insert a Password";
}
}
else{
	$statuscode=1;
	$statusmessage="please insert a Customer Id";
}

	 $JSON['statuscode']=$statuscode;
	 $JSON['statusmessage']=$statusmessage;
	 echo json_encode($JSON);
	
	}
	
	
	 public function edit_profile(){
	$JSON["edit_profile"]=array();
		
	
			if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='')
			{
				if(isset($_REQUEST['company_name']) && $_REQUEST['company_name']!='')
			{
				$company_name=$_REQUEST['company_name'];
			}
			else
			{
				$company_name='';
			}
			
		$user_id=$_REQUEST['user_id'];
						
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$url=$_SERVER['HTTP_HOST'];

	//	$image=$base_url.$url."/shradhatops/admin/image/category_image/".$image;
$sqls=mysqli_query($this->db,"select * from user where id='$user_id' ");
$row=mysqli_fetch_array($sqls);
$image=$row['image'];

/* if($image !=''){
	$profile_image=$row['image'];
}
else{ */
		$profile_image=$_REQUEST['profile_image'];
		

$sql=mysqli_query($this->db,"update user set company_name='$company_name',image='$profile_image' where id='$user_id'  ");
		if(! $sql) {
    die("SQL Error: " . mysqli_error($this->db));
}

$statuscode=0;
	$statusmessage="Successfull";
}
else{
	$statuscode=1;
	$statusmessage="please insert user id";
}

	 $JSON['statuscode']=$statuscode;
	 $JSON['statusmessage']=$statusmessage;
	 echo json_encode($JSON);
	
	} 

	public function user_detail(){
	$JSON["user_detail"]=array();
		
	
			if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='')
			{
				
			
		$user_id=$_REQUEST['user_id'];
$sqls=mysqli_query($this->db,"select * from user where id='$user_id' ");
if(mysqli_num_rows($sqls) > 0 ){
$row=mysqli_fetch_array($sqls);
$name=$row['name'];
$customer_id=$row['customer_id'];
$company_name=$row['company_name'];
$mobile_no=$row['mobile_no'];
$email=$row['email'];
$image=$row['image'];

			array_push($JSON["user_detail"],
			array('user_id'=>$user_id,'customer_id'=>$customer_id,'name'=>$name,'email'=>$email,'mobile_no'=>$mobile_no,'company_name'=>$company_name,'image'=>$image));

$statuscode=0;
	$statusmessage="Successfull";
}
else{
	$statuscode=1;
	$statusmessage="Invlid user id";
}
}
else{
	$statuscode=1;
	$statusmessage="please insert user id";
}

	 $JSON['statuscode']=$statuscode;
	 $JSON['statusmessage']=$statusmessage;
	 echo json_encode($JSON);
	
	} 
	
	
	public function logout(){
	$JSON["login"]=array();
		
	
			if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!='')
			{
				$user_id=$_REQUEST['user_id'];
				
	$sqls=mysqli_query($this->db,"update user set login_status=0 where id='$user_id'");
		if(! $sqls) {
    die("SQL Error: " . mysqli_error($this->db));
}
$statuscode=0;
	$statusmessage="Successfull";
}
else{
	$statuscode=1;
	$statusmessage="please insert a valid detail";
}

	 $JSON['statuscode']=$statuscode;
	 $JSON['statusmessage']=$statusmessage;
	 echo json_encode($JSON);
	
	}
	

}
?>
