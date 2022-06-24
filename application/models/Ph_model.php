<?php

class Ph_model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    //For insert data

    function insert_record($table_name, $data_array) {
        //echo "<pre>";print_r($data_array);echo "</pre>";
        $this->db->insert($table_name, $data_array);
        $id = $this->db->insert_id();
        return $id;
    }

    //For delete data

    function delete_record($table_name, $condition) {
        //pr($condition);
        $this->db->delete($table_name, $condition);
        if ($this->db->affected_rows())
            return true;
    }

    function update_record($table_name, $data_array, $condition) {
        $this->db->update($table_name, $data_array, $condition);
        if ($this->db->affected_rows())
            return true;
    }
	
	
	
	
	
	function checkduplicatepets($name) {
		//echo "select * from project_type where name='$name' ";die;
         $query = $this->db->query("select * from pets where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicate_product_category($name) {
		
         $query = $this->db->query("select * from product_category where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

	function checkduplicatedeveloper($name) {
		//echo "select * from project_type where name='$name' ";die;
         $query = $this->db->query("select * from developer_detail where name='$name' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	
	function checkduplicate_variation_type($name) {
		
         $query = $this->db->query("select * from variations_type where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicatecondition($name) {
		
         $query = $this->db->query("select * from vet_condition where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	
	function checkduplicate_batch($name) {
		
         $query = $this->db->query("select * from batch_detail where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicateformulation($name) {
		
         $query = $this->db->query("select * from formulation where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicateanimalsize($name) {
		
         $query = $this->db->query("select * from animal_size where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicate_animal_type($name) {
		
         $query = $this->db->query("select * from animal_type where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicateadministration($name) {
		
         $query = $this->db->query("select * from administration where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicategetproducttype($name) {
		
         $query = $this->db->query("select * from product_type where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicate_age_type($name) {
		
         $query = $this->db->query("select * from age_type where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicate_breed($name) {
		
         $query = $this->db->query("select * from breed where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function checkduplicate_wet_food_type($name) {
		
         $query = $this->db->query("select * from wet_food_type where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	
	function checkduplicate_food_flavour($name) {
		
         $query = $this->db->query("select * from food_flavour where lower(name)=lower('$name') ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	
	function usermail_checker($login_email) {
		
         $query = $this->db->query("select * from user_detail where email='$login_email' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function check_cod($pincode) {
		
         $query = $this->db->query("select * from  cod_table where pincode='$pincode' ");
        if ($query->num_rows() > 0) {
			 $query1 = $this->db->query("select * from  cod_table where pincode='$pincode' AND cod_avail='YES'");
        if ($query1->num_rows() > 0) {
            return "yes";
        } else {
            return "not available";
        }
		} else {
            return "no";
        }
    }
	
	
	function checkduplicateproject($name) {
		//echo "select * from project_type where name='$name' ";die;
         $query = $this->db->query("select * from project_detail where name='$name' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //For listing data

    function select_data($parameters) {

        //echo "<pre>";print_r($parameters);echo "</pre>";

        $table_name = $parameters['table_name'];
        $table_field = $parameters['table_fields'];
        $condition = $parameters['condition'];
        $limit = $parameters['limit'];
        $offset = $parameters['offset'];

        if (isset($parameters['order']) && isset($parameters['order_by_field'])) {
            $order = $parameters['order'];
            $order_by_field = $parameters['order_by_field'];
        }

        $this->db->select($table_field);
        $this->db->from($table_name);

        if (!empty($condition)) {
            foreach ($condition as $cond_k => $cond_v) {


                if (isset($cond_v[3]))
                    $this->db->where($cond_v[1], $cond_v[2], $cond_v[3]);
                else
                    $this->db->where($cond_v[1], $cond_v[2]);
            }
        }
        if (isset($order_by_field) && $order_by_field != '' && isset($order) && $order != '') {
            $this->db->order_by($order_by_field, $order);
        }


        if (isset($limit) && $limit != '') {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        //echo $this->db->last_query();
        //echo "<pre>";print_r($result);echo "</pre>";

        return $result;
    }

    function get_user_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from customer_detail where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['fname'] = $row['fname'];
                $return['lname'] = $row['lname'];
                $return['email'] = $row['email'];
                $return['dob'] = $row['dob'];
                $return['gender'] = $row['gender'];
                $return['mobile_no'] = $row['mobile_no'];
                $return['add_info'] = $row['add_info'];
                $return['status'] = $row['status'];
                $return['state'] = $row['state'];
                $return['city'] = $row['city'];
                $return['pincode'] = $row['pincode'];
                $return['street_address'] = $row['street_address'];
                $return['password'] = $row['password'];
                $return['news_letter'] = $row['news_letter'];
                
            }
        }

        return ($return);
    }
	
 		public function get_address_list($userid)
	{
		$return=array();
		$query=$this->db->query("select * from customer_detail  where id='$userid' order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}  

	function get_shipping_detail() {

        $return = array();

        $query = $this->db->query("select * from shipping_price_tbl ");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['shipping_price'] = $row['shipping_price'];
                $return['free_delivery'] = $row['free_delivery'];
                $return['price_limit'] = $row['price_limit'];
            }
        }

        return ($return);
    }

 function get_product_color_by_id($id) {

        $return = array();

        $query = $this->db->query("select color from product_variation where product_id='$id' AND color IS NOT NULL group by color ");

      
            if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);

    }
	
	function get_product_materials_by_id($id) {

        $return = array();

        $query = $this->db->query("select material from product_variation where product_id='$id'  AND material IS NOT NULL group by material ");

      
            if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);

    }
	
			function get_product_type_by_id($id) {

        $return = array();

        $query = $this->db->query("select type from product_variation where product_id='$id' AND type IS NOT NULL group by type ");

      
            if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);

    }
	
	function get_product_size_by_id($id) {

        $return = array();

        $query = $this->db->query("select size from product_variation where product_id='$id' AND size IS NOT NULL group by size ");

      
            if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);

    }
	
	

	
	function get_variations_type_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from variations_type where id='$id'");

      
            if($query->num_rows() > 0){
			 foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
            }
		} 
		return ($return);

    }

    function get_pet_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from pets where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
                
            }
        }

        return ($return);
    }

	function get_pincode_detail_by_pincode($pincode) {

        $return = array();

        $query = $this->db->query("select * from cod_table where pincode='$pincode'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['state'] = $row['state'];
                $return['city'] = $row['city'];
                
            }
        }

        return ($return);
    }
	
	
 	function get_sub_category_by_name($segment3) {
		
		$sub_cat_names=str_replace("-"," ",$segment3);
		
		

        $return = array();
//echo "select * from sub_category where lower(name)=lower('$segment3')";die;
        $query = $this->db->query("select * from sub_category where lower(name)=lower('$sub_cat_names')");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
                
            }
        }

        return ($return);
    } 
	
	
/* 	function get_category_by_name($segment2) {

        $return = array();

        $query = $this->db->query("select * from category where lower(name)=lower('$segment2')");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
                
            }
        }

        return ($return);
    } */
	
	function get_pet_by_name($segment1) {

        $return = array();

        $query = $this->db->query("select * from pets where lower(name)=lower('$segment1')");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
                $return['image'] = $row['image'];
                
            }
        }

        return ($return);
    }

	
	
	 function fetch_category($pet_id)
 {
  
  $query = $this->db->query("select * from category where pet_id='$pet_id'");
  $output = '<option value="">Select Category</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
  return $output;
 }
 

 function fetch_sub_category($catg_id)
 {
  //echo $catg_id;
  $catg_ids=array();
  $catg_ids=explode(',',$catg_id);
  foreach($catg_ids as $catg_id){
	  echo $catg_id;
  $query1 = $this->db->query("select * from category where  id='$catg_id'");
  $result=$query1->row();
  
//echo "select * from sub_category where  category_id='$catg_id' ";
  $query = $this->db->query("select * from sub_category where  category_id='$catg_id' ");
 $output .= '<optgroup label="'.$result->name.'">';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'_'.$row->category_id.'">'.$row->name.'</option>';
  }
  $output .= '</optgroup>'; 
  }
  return $output;
 }
 
 
 function fetch_varation($var_id)
 {
  //echo $catg_id;
  $catg_ids=array();
  $catg_ids=explode(',',$var_id);
  $output = '<div class="col-md-12">
			  <table id="ratesdetails1" class="table">
		   <thead><tr>
		   <th><b>Image</b></th>
		   <th><b>Price</b></th>';
		   foreach($catg_ids as $var_id){
	//  echo $var_id;
  $query1 = $this->db->query("select * from variations_type where  id='$var_id'");
  $result=$query1->row();
   $output .='
		   <th><b>'.$result->name.'</b></th>';
		   }
		   $output .='
		   <th></th>
		    </tr>
			</thead>
			<tbody>
			<tr>
			<td><input type="file" class="form-control" name="image[]" ></td>
			<td><input type="text" class="form-control" name="price[]" placeholder="price" required></td>
		';
  foreach($catg_ids as $var_id){
	//  echo $var_id;
  $query1 = $this->db->query("select * from variations_type where  id='$var_id'");
  $result=$query1->row();
  
//echo "select * from sub_category where  category_id='$catg_id' ";
  $query = $this->db->query("select * from variation_detail  where  variation_id='$var_id' ");
$output .='<td><input type="hidden" name=variation_name" class="form-control" value="'.strtolower($result->name).'" >
				<select class="form-control" name="'.strtolower($result->name).'[]" required>
			<option value=" ">'.$result->name.'</option>';
  foreach($query->result() as $row)
  {
	  $names=array();
	  $names=explode('-',$row->name);
	  $name=$names[0];
  $output .= '<option value="'.$row->id.'">'.$name.'</option>';
  
  }
  $output .= '</select></td>'; 
  }
  $output .='<td><a href="javascript:void(0);" class="btn btn-md btn-primary addRow"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
			</tr>
				</tbody>
			</table>
		</div>';
  return $output;
 
 
 }
 
 function fetch_varation_by_id($product_id)
 {
	  $query1 = $this->db->query("select * from product_variation where  product_id='$product_id'");
	  if($query1->num_rows() > 0){
					  $results=$query1->result();
	 ?>
  
 <div class="col-md-12" > 
			 
				<div >
				
				
				<table class="table">
				<thead>
				<tr>
				 <th><b>SKU</b></th>
				   <th><b>Price</b></th>
				   <th><b>Vaiation Type</b></th>
				   <th><b>Vaiation Detail</b></th>
				   <th></th>
				</tr>
				</thead>
				</table>
				
				<?php 
					    foreach($results as $rows){
			  ?>
			  <div  class="input_fields_wrap_table<?php echo $rows->id;?>">
				
				
				<table class="table">
<?php 
  $variation_type=array();
	$var_type_id=array();
	$var_type_id=explode('_',$rows->variation_type_id);
	foreach($var_type_id as $var_type){
	$get_variation_type_by_id=$this->ph_model->get_variation_type_by_id($var_type);
	$variation_type[]=$get_variation_type_by_id['name'];
	}
	$variation_type=implode(' - ',$variation_type);
	
	$variation=array();
	$var_id=array();
	$var_id=explode('_',$rows->variation_id);
	foreach($var_id as $variation_id){
	$get_variation_detail_by_id=$this->ph_model->get_variation_detail_by_id($variation_id);
	$variation[]=$get_variation_detail_by_id['name'];
	}
	 $variation=implode(' / ',$variation);
	 ?>
	 <tbody>
				<tr>
					<td><input type="text" class="form-control" name="c_name[]" value="<?php echo $rows->sku?>" disabled ></td>
					<td><input type="email" class="form-control" name="c_email[]" value="<?php echo $rows->price?>" disabled></td>
					<td> <input type="text" class="form-control" name="c_c_no[]" value="<?php echo $variation_type ?>" disabled></td>
					<td> <input type="text" class="form-control" name="c_c_no[]" value="<?php echo $variation ?>" disabled></td>
					
				</tr>
				
				<tr>
				 <th><b>Quantity</b></th>
				   <th><b>Expiry Date</b></th>
				   <th><b>Bin No.</b></th>
				   <th></th>
				</tr>
				<?php $sql12=$this->db->query("select * from product_inventory where product_id='$rows->product_id' AND var_id='$rows->id' ");
				if($sql12->num_rows() > 0 ){
					foreach($sql12->result() as $row12){
				?>
				<tr>
			<td> <input type="hidden" class="form-control" name="product_id[]" value="<?php echo $rows->product_id; ?>" >
			 <input type="hidden" class="form-control" name="var_id[]" value="<?php echo $rows->id; ?>" >
			<input type="text" class="form-control" name="qty[]" value="<?php echo $row12->stock;?>" placeholder="Quantity" required></td>
			<td><input type="date" name="i_date[]" class="form-control " value="<?php echo $row12->expiry_date;?>" placeholder="<?php echo $row12->expiry_date;?>" required></td>
			  <?php $query = $this->db->query("select * from bin_detail  ");?>
            <td><select class="form-control" name="bin_no[]" required>
			<option value=" ">Select Bin No.</option>
  <?php foreach($query->result() as $row)
  {
if($row12->bin_id==$row->id){
	$selected='selected';
}
else{
	$selected='';
}
	  ?>
  
  <option value="<?php echo $row->id; ?>" <?php echo $selected?>><?php echo $row->name; ?></option>
  <?php }?>
  </select></td>
  <td ><a class='<?php echo $rows->id;?> btn btn-md btn-danger "'style="    color: #fff;" ><i class='fa fa-trash' aria-hidden='true'></i></a> </td>
				</tr>
					<?php }
$required='';
					}
else{
	$required='required';
}					?>
				<tr>
			<td> <input type="hidden" class="form-control" name="product_id[]" value="<?php echo $rows->product_id; ?>" >
			 <input type="hidden" class="form-control" name="var_id[]" value="<?php echo $rows->id; ?>" >
			<input type="text" class="form-control" name="qty[]" placeholder="Quantity" <?php echo $required;?>></td>
			<td><input type="date" name="i_date[]" class="form-control " placeholder="Selector Month &amp; Year" <?php echo $required;?>></td>
			  <?php $query = $this->db->query("select * from bin_detail   ");?>
            <td><select class="form-control" name="bin_no[]" <?php echo $required;?>>
			<option value=" ">Select Bin No.</option>
  <?php foreach($query->result() as $row)
  { ?>
  <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
  <?php }?>
  </select></td>
  <td ><a class='add_field_buttons<?php echo $rows->id;?> btn btn-md btn-primary addRow"'style="    color: #fff;" ><i class='fa fa-plus' aria-hidden='true'></i></a> </td>
				</tr>
						
				</tbody></table>
					</div>
				<?php } ?>
					
					</div>
					<?php   foreach($results as $rows){?>
			 <script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrappers<?php echo $rows->id;?>         = $(".input_fields_wrap_table<?php echo $rows->id;?>"); //Fields wrapper
    var add_buttons<?php echo $rows->id;?>     = $(".add_field_buttons<?php echo $rows->id;?>"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_buttons<?php echo $rows->id;?>).click(function(add){ //on add input button click
        add.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrappers<?php echo $rows->id;?>).append('<div class="col-md-12" ><table class="table" style="float: left; width:79%"><tbody><tr><td><input type="hidden" class="form-control" name="product_id[]" value="<?php echo $rows->product_id; ?>" ><input type="hidden" class="form-control" name="var_id[]" value="<?php echo $rows->id; ?>" ><input type="text" class="form-control" name="qty[]" placeholder="Quantity" required></td><td><input type="date" name="i_date[]" class="form-control " placeholder="Selector Month &amp; Year" required></td><?php $query = $this->db->query("select * from bin_detail   ");?><td><select class="form-control" name="bin_no[]" required><option value=" ">Select Bin No.</option><?php foreach($query->result() as $row){ ?><option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option><?php }?></select></td><td></td></tr><tbody/><table><a href="#"  style="    margin: 19px 0;" class="remove_fields1 btn btn-md btn-danger" ><i class="fa fa-minus" aria-hidden="true"></a></div>'); //add input box        
			}
    });
    
    $(wrappers<?php echo $rows->id;?>).on("click",".remove_fields1", function(add){ //user click on remove text
        add.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
	  <?php } }?>
									
									<div class="col-md-12" id="variation">
										
									</div>
									
                                    </div><?php 
		
  return $output;
 }
 
 function fetch_pets($animal_type_id)
 {
  
  $animal_type_ids=array();
  $animal_type_ids=explode(',',$animal_type_id);
  foreach($animal_type_ids as $animal_type_id){
	  $query1 = $this->db->query("select * from animal_type where  id='$animal_type_id'");
	  $result=$query1->row();
  //$query = $this->db->query("select * from pets where  find_in_set (animal_type_id,'$animal_type_id')");
  $query = $this->db->query("select * from pets where  animal_type_id='$animal_type_id'");
  $output .= '<optgroup label="'.$result->name.'">';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
   $output .= '</optgroup>'; 
  }
  return $output;
 }
 
 
 function fetch_pets_detail($pets_id)
 {

  $query = $this->db->query("select * from animal_size where  find_in_set (pet_id,'$pets_id')");
  
  $output ='
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $("#lstFruits").multiselect({
            includeSelectAllOption: true
        });
    });
	$(function () {
        $("#lstFruits1").multiselect({
            includeSelectAllOption: true
        });
    });
	$(function () {
        $("#lstFruits2").multiselect({
            includeSelectAllOption: true
        });
    });
</script>
<div class="row">
<div class="col-md-4">
				<div class="form-group">
					<label for="form_control_1" style="    width: 100%;">Animal Size : </label>
					<select id="lstFruits" name="animal_size_id[]"  class= "select2 form-control custom-select" style="width: 100%; height:156px;" multiple="multiple" required>
					';
					
					 foreach($query->result() as $row)
  {
	  $query3 = $this->db->query("select * from pets where  id ='$row->pet_id' ");
	   foreach($query3->result() as $row3){
		   $animal_type_id=$row3->animal_type_id;
	   }
   $output .= '<option value="'.$row->id.'_'.$row->pet_id.'_'.$animal_type_id.'">'.$row->name.'</option>';
  }
					$output .='</select>
					
				</div>
			</div>';
   $query1 = $this->db->query("select * from age_type where  find_in_set (pet_id,'$pets_id')");
  $output .='<div class="col-md-4">
				<div class="form-group" >
					<label for="form_control_1" style="    width: 100%;">Age Type : </label>
					<select id="lstFruits1" name="age_type_id[]"  class= "select2 form-control custom-select" style="width: 100%; height:156px;" multiple="multiple" required>
					';
					
					 foreach($query1->result() as $row1)
  {
	  $query3 = $this->db->query("select * from pets where  id ='$row1->pet_id' ");
	   foreach($query3->result() as $row3){
		   $animal_type_id=$row3->animal_type_id;
	   }
   $output .= '<option value="'.$row1->id.'_'.$row1->pet_id.'_'.$animal_type_id.'">'.$row1->name.'</option>';
  }
					$output .='</select>
					
				</div>
			</div>';

			$query2 = $this->db->query("select * from breed where  find_in_set (pet_id,'$pets_id')");
  $output .='<div class="col-md-4">
				<div class="form-group">
					<label for="form_control_1" style="    width: 100%;"> Breeds : </label>
					<select id="lstFruits2" name="breed_id[]"  class= "select2 form-control custom-select" style="width: 100%; height:156px;" multiple="multiple" required>
					';
					
					 foreach($query2->result() as $row2)
  {
	    $query3 = $this->db->query("select * from pets where  id ='$row2->pet_id' ");
	   foreach($query3->result() as $row3){
		   $animal_type_id=$row3->animal_type_id;
	   }
   $output .= '<option value="'.$row2->id.'_'.$row2->pet_id.'_'.$animal_type_id.'">'.$row2->name.'</option>';
  }
					$output .='</select>
					
				</div>
				</div>
			</div>';
 /* 
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  } */
  return $output;
 }
 
 
 function fetch_city($state_id)
 {
  
  $query = $this->db->query("select * from city where state_id='$state_id'");
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
  return $output;
 }
 
 function fetch_project($developer_id)
 {
  
  $query = $this->db->query("select * from project_detail where developer_id='$developer_id'");
  $output = '<option value="">Select Project</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
  return $output;
 }

 function get_city_by_state_id($state_id)
 {
  
  $query = $this->db->query("select * from city where state_id='$state_id'");
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
  return $output;
 }
 
 function get_pet_details_by_id($id)
 {
  $return=array();
 
  $query = $this->db->query("select * from pets where id='$id'");
  if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
  return $return;
 }
 }

 function get_category_by_id($id)
 {
  $return=array();
 
  $query = $this->db->query("select * from category where id='$id'");
  if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
  return $return;
 }
 }
 
 
 function get_city_by_id($id)
 {
  $return=array();
 
  $query = $this->db->query("select * from city where id='$id'");
  if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
  return $return;
 }
 }

 function get_project_by_id($id)
 {
  $return=array();
 
  $query = $this->db->query("select * from project_detail where id='$id'");
  if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
  return $return;
 }
 }
 
 
	
	function get_category_detail_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from category where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
                $return['image'] = $row['image'];	
                $return['description'] = $row['description'];	
			
		}
		
	}
	return ($return);
	}
	
	
	function get_sub_category_detail_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from sub_category where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
                $return['image'] = $row['image'];	
                $return['description'] = $row['description'];	
			
		}
		
	}
	return ($return);
	}
	
	
	
	function get_pets_detail_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from pets where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
                $return['image'] = $row['image'];	
			
		}
		
	}
	return ($return);
	}
	
	function get_product_category_detail_by_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from product_category where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}
	
	function get_age_type_checker_by_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from age_type where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}
	
	function get_breed_checker_by_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from breed where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}
	
	function get_wet_food_type_checker_by_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from wet_food_type where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}
	
	function get_food_type_checker_by_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from food_type where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}
	
		function get_food_flavour_checker_by_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from food_flavour where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}
	
	
	function get_product_type_checker_by_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from product_type where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}
	
	
	
	function get_project_detail_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from project_detail where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}
	
	
	function get_developer_detail_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from developer_detail where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			
		}
		
	}
	return ($return);
	}

	
	function get_pets()
	{
		$return=array();
		$query=$this->db->query("select * from pets order by id ASC");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_administration()
	{
		$return=array();
		$query=$this->db->query("select * from administration order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_manufactured()
	{
		$return=array();
		$query=$this->db->query("select * from manufactured_by order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_company()
	{
		$return=array();
		$query=$this->db->query("select * from company order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_marketed()
	{
		$return=array();
		$query=$this->db->query("select * from marketed_by order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_food_type()
	{
		$return=array();
		$query=$this->db->query("select * from food_type order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_animal_type()
	{
		$return=array();
		$query=$this->db->query("select * from animal_type order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_food_flavour()
	{
		$return=array();
		$query=$this->db->query("select * from food_flavour order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_age_type()
	{
		$return=array();
		$query=$this->db->query("select * from age_type order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_breed()
	{
		$return=array();
		$query=$this->db->query("select * from breed order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_wet_food_type()
	{
		$return=array();
		$query=$this->db->query("select * from wet_food_type order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_formulation()
	{
		$return=array();
		$query=$this->db->query("select * from formulation order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_category()
	{
		$return=array();
		$query=$this->db->query("select * from category order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_category_by_pet_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from category where pet_id='$id' order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_blog_by_pet_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from blog where pets_id='$id' order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	
	function get_subcategory_by_category_id($id)
	{
		$return=array();
		
		$query=$this->db->query("select * from sub_category where category_id='$id' order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	
	function get_sub_category()
	{
		$return=array();
		$query=$this->db->query("select * from sub_category order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	
	function get_brand()
	{
		$return=array();
		$query=$this->db->query("select * from brand_detail order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	
	function get_product_category()
	{
		$return=array();
		$query=$this->db->query("select * from product_category order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	
	function get_blog_detail()
	{
		$return=array();
		$query=$this->db->query("select * from blog order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_product_type()
	{
		$return=array();
		$query=$this->db->query("select * from product_type order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_project_type()
	{
		$return=array();
		$query=$this->db->query("select * from project_type order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_state()
	{
		  $return = array();
		   $query = $this->db->query("select * from state order by name asc");
		    if ($query->num_rows() > 0) {
            $return = $query->result();
        }
        return ($return);
	}
	
	function get_state_detail_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from state where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
                $return['status'] = $row['status'];	
               
		}
		
	}
	return ($return);
	}
	
	function get_city()
	{
		  $return = array();
		   $query = $this->db->query("select * from ref_location order by id desc");
		    if ($query->num_rows() > 0) {
            $return = $query->result();
        }
        return ($return);
	}
	
	
	
	function checkduplicatestate($name) {
		//echo "select * from project_type where name='$name' ";die;
         $query = $this->db->query("select * from ref_state where name='$name' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function get_city_detail_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from ref_location where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['state_id'] = $row['state_id'];	
                $return['name'] = $row['name'];	
                $return['status'] = $row['status'];	
               
		}
		
	}
	return ($return);
	}
	
	
	function get_property_detail_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from property_detail where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];		
               
		}
		
	}
	return ($return);
	}
	
	function checkduplicatecity($name) {
		//echo "select * from project_type where name='$name' ";die;
         $query = $this->db->query("select * from ref_location where name='$name' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

	function checkduplicateproperty($name) {
		//echo "select * from project_type where name='$name' ";die;
         $query = $this->db->query("select * from property_detail where name='$name' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	function get_project_detail()
	{
		$return=array();
		$query=$this->db->query("select * from project_detail  order by id desc");
		if($query->num_rows()>0){
			$return=$query->result();
		}
		return($return);
	}
	
	function get_user_detail()
	{
		$return=array();
		$query=$this->db->query("select * from user order by id desc");
		
		if($query->num_rows()>0){
			$return=$query->result();
		}
		return($return);
	}
	
	
	function get_product_variation()
	{
		$return=array();
		$query=$this->db->query("select * from product_variation order by id desc");
		
		if($query->num_rows()>0){
			$return=$query->result();
		}
		return($return);
	}
	
	
	
	 function get_project_type_dropdown() {

        $return[''] = 'Select';
        $query = $this->db->query("select * from project_type order by name asc");

        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

	function get_project_floor_plan($id) {

        $return=array();
        $query = $this->db->query("select * from  project_floor_plan  where project_id='$id' ");

       $return=$query->result();
	   
        return $return;
    }
	

	
	function get_fetaure($id) {

        $return=array();
        $query = $this->db->query("select * from  product_features  where product_id='$id' ");

       $return=$query->result();
	   
        return $return;
    }
	
	function get_product_gallery($id) {

        $return=array();
		//echo "select * from  product_gallery  where product_id='$id' ";
        $query = $this->db->query("select * from  product_gallery  where product_id='$id' ");

       $return=$query->result();
	   
        return $return;
    }
	
	
		function slide_product_gallery() {

        $return=array();
        $query = $this->db->query("select * from  product_gallery  order by id desc ");

       $return=$query->result();
	   
        return $return;
    }
	
	function get_sub_category_by_id($id) {

        $return=array();
        $query = $this->db->query("select * from  product_sub_category  where product_id='$id' group by category_id");

       $return=$query->result();
	   
        return $return;
    }
	
	function get_category_by_product_id($id) {

        $return=array();
        $query = $this->db->query("select * from  product_sub_category  where product_id='$id' group by category_id");

       $return=$query->result();
	   
        return $return;
    }
	
	function get_sub_category_by_product_id($id) {

        $return=array();
        $query = $this->db->query("select * from  product_sub_category  where product_id='$id' group by sub_category_id");

       $return=$query->result();
	   
        return $return;
    }
	
	function get_coupon() {

        $return=array();
        $query = $this->db->query("select * from  tbl_coupon");

       $return=$query->result();
	   
        return $return;
    }
	
	function get_property_gallery($id) {

        $return=array();
        $query = $this->db->query("select * from  property_gallery  where property_id='$id' ");

       $return=$query->result();
	   
        return $return;
    }
	
	function get_user_list() {

        $return[''] = 'Select';
        $query = $this->db->query("select * from user order by name asc");

        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
	
	function get_blog_tag()
	{
		$return=array();
		$query=$this->db->query("select * from blog_tag order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_animalsize()
	{
		$return=array();
		$query=$this->db->query("select * from animal_size order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_blog_tag_dropdown()
	{
		$return=array();
		$query=$this->db->query("select * from blog_tag order by id desc");
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $row){
			$return[$row['id']]=$row['name'];
			}
		}
		return $return;
	}
	
	function get_condition(){
		
		$return=array();
		
		$query=$this->db->query("select * from vet_condition order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_product_detail(){
		
		$return=array();
		
		$query=$this->db->query("select * from product_detail order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	

	
	function get_sub_category_by_pets($name){
		
		$return=array();
		
		$query=$this->db->query("select * from sub_category where  pet_id in (select id from pets where lower(name)=lower('$name')	)  LIMIT 8");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_brand_by_pets($name){
		
		$return=array();
		
		$query=$this->db->query("select * from product_detail where id in (select product_id from  product_sub_category where pet_id in (select id from pets where lower(name)=lower('$name'))) group by brand_id");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_batch(){
		
		$return=array();
		
		$query=$this->db->query("select * from batch_detail order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_drugs(){
		
		$return=array();
		
		$query=$this->db->query("select * from drugs order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_variation_type(){
		
		$return=array();
		
		$query=$this->db->query("select * from variations_type order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_prodduct_by_shop($name){
		
        $sub_cat_name = $name;
		$sub_cat_names=str_replace("-"," ",$sub_cat_name);
		
		
		
		//echo $sub_cat_names;die;
		
		$where="where id in (select product_id from product_sub_category where sub_category_id in (select id from sub_category where name='$sub_cat_names'))";
		//echo "select * from product_detail $where order by id desc";die;
		 $query=$this->db->query("select * from product_detail $where order by id desc");
		
		//echo $query;die;
		if($query->num_rows() > 0){
			//echo "yes";die;
			$return=$query->result();
		}
		else{
			//echo "no";die;
		}
		return ($return);
	}
	
 
 function fetch_product_by_header_search($searchString)
 {

	 $query=$this->db->query("select * from product_detail where name LIKE '$searchString%'");
	 if($query->num_rows() > 0){
	?>
	<ul>
	 <?php foreach($query->result() as $p_row){?>
	 
	 
		 
		 <?php $image=base_url()."admin/assets/images/Gallery/".$p_row->product_image;
							$offer= $p_row->sale_price /  $p_row->mrp * 100;
							$offer=100-round($offer);
							?>
					<li>
						<div class="tt-product thumbprod-center">
									<div class="tt-image-box">
										<a href="<?php echo site_url('home/product_detail/'.$p_row->id);?>" class="tt-btn-quickview"></a>
										<?php 
										 if (isset($this->session->userdata['logged_in_prolix_panel'])) {
										$userid=($this->session->userdata['logged_in_prolix_panel']['userid']);
											$query=$this->db->query("select * from wishlist where product_id='$p_row->id' AND user_id='$userid'");
											if($query->num_rows() > 0){?>
											<a href="#" class="tt-btn-add-wishlist" data-tooltip="Added to Wishlist" ><i class="fa fa-heart" aria-hidden="true"></i></a>
											<?php }
											else{?>
												<a href="#" class="tt-btn-wishlist"  id="add_new" onclick="addproducttowishlist('<?php echo $p_row->id;?>')" data-tooltip="Add to Wishlist" data-tposition="left"></a>
											<?php }
										}else{?>
										
										<a href="#" class="tt-btn-wishlist" id="button_pop1"	data-tooltip="Add to Wishlist" data-tposition="left"></a>
										<?php }?>
										<a href="javascript:value(0)" id="added" style="display:none" class="tt-btn-add-wishlist" data-tooltip="Added to Wishlist" ><i class="fa fa-heart" aria-hidden="true"></i></a>
										<a href="<?php echo site_url('home/product_detail/'.$p_row->id);?>">
											<span class="tt-img"><img src="<?php echo $image;?>" alt=""></span>
											<span class="tt-img-roll-over"><img src="<?php echo $image;?>" alt=""></span>
											<span class="tt-label-location">
												<span class="tt-label-new">YOU SAVE <b style="font-size: 16px;"><?php echo $offer;?>%</b></span>
											</span>
											<?php if($p_row->prescription==1){?>
											<span class="tt-label-location">
											<div class="product-badge-wrap-prescription" title=" Vet prescription required in checkout">
												<div class="product-badge-prescription"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
											</div>
											</span>
											<?php }?>
										</a>
										
									</div>
									<div class="tt-description">
										<div class="tt-row">
											
											
										</div>
										<h2 class="tt-title"><a href="<?php echo site_url('home/product_detail/'.$p_row->id);?>"><?php echo $p_row->name?></a></h2>
										<div class="tt-price">
											<span class="old-price" style="    font-size: 15px;">&#8377;<?php echo $p_row->mrp;?></span>
										</div>
										
										<div class="tt-price">
											&#8377;<?php echo $p_row->sale_price;?>
										</div>
										
									</div>
								</div>
								</li>
						
			
 <?php } ?>
</ul>
 <?php }
 else{
 echo "<p><b>No Search Product Found</b></p>";
 }
 }
 
 
	function get_prodduct_by_prescription($prescription){
		
		$return=array();
		
		$query=$this->db->query("select * from product_detail where name LIKE  '$prescription%' AND prescription=1 order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		}
		return ($return);
	}
	
	function get_prodduct_by_search($search){
		
		$return=array();
		//echo "select * from product_detail where name LIKE  '%$search%'  order by id desc";die;
		$query=$this->db->query("select * from product_detail where name LIKE  '%$search%'  order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		}
		return ($return);
	}
	
		function get_prodduct(){
		
		$return=array();
		$query=$this->db->query("select * from product_detail  order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		}
		return ($return);
	}
	
	function get_prodduct_by_brand($brand){
		
		$return=array();
		
		//echo "select * from product_detail where brand_id in (select id  from brand_detail where lower(name)=lower('$brand'))";die;
		$query=$this->db->query("select * from product_detail where brand_id in (select id from  brand_detail where lower(name)=lower('$brand'))");
		if($query->num_rows() > 0){
			$return=$query->result();
		}
		return ($return);
	}
	
	function get_brand_by_sub_category_product($name){
		
		$return=array();
		
		$query=$this->db->query("select * from variation_detail order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_variation_detail(){
		
		$return=array();
		
		$query=$this->db->query("select * from variation_detail order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_bin(){
		
		$return=array();
		
		$query=$this->db->query("select * from bin_detail order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	
	function get_product_inventory(){
		
		$return=array();
		
		$query=$this->db->query("select * from product_inventory order by id desc");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	}
	
	function get_condition_by_id($id)
	{
		$return=array();
		$query=$this->db->query("select * from vet_condition where  id='$id' order by id desc");
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
		return($return);
	}
	
	
	
	function get_batch_id($id)
	{
		$return=array();
		$query=$this->db->query("select * from batch_detail where  id='$id' order by id desc");
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
		return($return);
	}
	
	function get_variation_type_by_id($id)
	{
		$return=array();
		$query=$this->db->query("select * from variations_type where  id='$id' order by id desc");
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
		return($return);
	}
	
	function get_variation_detail_by_id($id)
	{
		$return=array();
		$query=$this->db->query("select * from variation_detail where  id='$id' order by id desc");
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
		return($return);
	}
	
	function get_formulation_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from formulation where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
	return ($return);
	}
	
	function get_animalsize_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from animal_size where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
	return ($return);
	}
	
	function get_administration_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from administration where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
	return ($return);
	}
	
	
	function get_animal_type_by_id($id)
	{
		$return=array();
		//echo "select * from project_type where id='$id'";die;
		$query=$this->db->query("select * from animal_type where id='$id'");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
	return ($return);
	}
	
	function get_variations_name_by_id($id)
	{
		$return=array();
		//echo "select * from variations_type where id='$id'";die;
		$query=$this->db->query("select * from variation_detail where id='$id' ");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
	return ($return);
	}
	
	/* function get_weight_name_by_id($id)
	{
		$return=array();
		//echo "select * from variations_type where id='$id'";die;
		$query=$this->db->query("select * from variation_detail where id='$id' ");
		
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		
	}
	return ($return);
	} */
	
	
	function get_blog_tag_by_id($id)
	{
		$return=array();
		$query=$this->db->query("select * from blog_tag where  id='$id' order by id desc");
		if($query->num_rows()>0){
		  foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];	
			}
		return($return);
	}
	}

	function get_order_list($userid)
	{
		$return=array();
		$query=$this->db->query("select * from order_detail  where user_id='$userid' order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_order_prescription_by_order_id($id)
	{
		$return=array();
		$query=$this->db->query("select * from order_prescription  where order_id='$id' order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	function get_mypet_list($userid)
	{
		$return=array();
		$query=$this->db->query("select * from user_pets  where user_id='$userid' order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
	}
	
	
	function get_developer_dropdown() {

        $return[''] = 'Select';
        $query = $this->db->query("select * from developer_detail order by name asc");

        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
	
	function get_property_detail(){
		
		$return=array();
		$query=$this->db->query("select * from property_detail  order by id desc");
		if($query->num_rows()>0)
		{
			$return=$query->result();
		}
		return($return);
		
	}
    function get_employee_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from employee where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['herbal_actor_id'] = $row['herbal_actor_id'];
                $get_herbal_actors_details_by_id = $this->get_herbal_actors_details_by_id($row['herbal_actor_id']);
                $return['herbal_actor_name'] = $get_herbal_actors_details_by_id['name'];
                $return['name'] = $row['name'];
                $return['emailid'] = $row['emailid'];
                $return['address'] = $row['address'];
                $return['contactno'] = $row['contactno'];

                $backgroundphoto = $row['photo'];
                if ($backgroundphoto != '') {
                    $return['photo'] = base_url() . 'images/' . $backgroundphoto;
                } else {
                    $return['photo'] = base_url() . 'images/avatars/user1.png';
                }
            }
        }

        return ($return);
    }

    function get_amanities_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from amenities where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
            }
        }

        return ($return);
    }

	function get_user_access_menu($user_id,$nav_id){
		$checkstatus="";
		$query=$this->db->query("select * from nav_access where user_id='$user_id' AND nav_id='$nav_id' ");
		if($query->num_rows() >0 )
		{
			$checkstatus="checked='checked'";
		}
		return $checkstatus;
	}
	
	
	
    function get_category_details_by_id($id) {

        $return = array();
        $query = $this->db->query("select * from category where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['description'] = $row['description'];
                $return['status'] = $row['status'];
                $return['image'] = $row['image'];
                
            }
        }

        return ($return);
    }
	
	function get_navigation()
	{
		  $return = array();
		   $query = $this->db->query("select * from navigation where   parent_id=0 AND sub_parent_id=0 AND status=1 order by sort asc ");
		    if ($query->num_rows() > 0) {
            $return = $query->result();
        }
        return $return;
	}
	
	
	function get_navigation_by_parent_id($id)
	{
		  $return = array();
		   $query = $this->db->query("select * from navigation where  parent_id='$id' order by sort asc ");
		    if ($query->num_rows() > 0) {
            $return = $query->result();
        }
        return $return;
	}
	
	
	function get_subnavigation_by_parent_id($id)
	{
		  $return = array();
		   $query = $this->db->query("select * from navigation where  sub_parent_id='$id' order by sort asc");
		    if ($query->num_rows() > 0) {
            $return = $query->result();
        }
        return $return;
	}

    function get_sub_category_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from sub_category where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['category_id'] = $row['category_id'];
                $return['name'] = $row['name'];
                $return['image'] = $row['image'];
                $return['status'] = $row['status'];
               
               }
        }

        return ($return);
    }

    function get_member_discount_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from member_discount where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['with_dist_purchase_amount'] = $row['with_dist_purchase_amount'];
                $return['with_dist_purchase_discount'] = $row['with_dist_purchase_discount'];
                $return['without_dist_sd_purchase_amount'] = $row['without_dist_sd_purchase_amount'];
                $return['without_dist_sd_purchase_discount'] = $row['without_dist_sd_purchase_discount'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_distributor_comission_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from distributor_comission where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['with_sd_code_amount'] = $row['with_sd_code_amount'];
                $return['with_sd_code_discount'] = $row['with_sd_code_discount'];
                $return['without_sd_code_amount'] = $row['without_sd_code_amount'];
                $return['without_sd_code_discount'] = $row['without_sd_code_discount'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_super_distributor_comission_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from super_distributor_comission where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['amount'] = $row['amount'];
                $return['discount'] = $row['discount'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_coupon_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from tbl_coupon where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['coupon_code'] = $row['coupon_code'];
                $return['description'] = $row['description'];
                $return['discount_type'] = $row['discount_type'];
                $return['coupon_amount'] = $row['coupon_amount'];
                $return['cashback'] = $row['cashback'];
                $return['minimum_spend'] = $row['minimum_spend'];
                $return['maximum_spend'] = $row['maximum_spend'];
                $return['cashback'] = $row['cashback'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }


	function get_coupon_detail_by_coupon($coupon) {

        $return = array();
//echo "select * from tbl_coupon where lower(coupon_code)='lower($coupon)'";die;
        $query = $this->db->query("select * from tbl_coupon where coupon_code='$coupon'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['coupon_code'] = $row['coupon_code'];
                $return['description'] = $row['description'];
                $return['discount_type'] = $row['discount_type'];
                $return['coupon_amount'] = $row['coupon_amount'];
                $return['cashback'] = $row['cashback'];
                $return['minimum_spend'] = $row['minimum_spend'];
                $return['maximum_spend'] = $row['maximum_spend'];
                $return['cashback'] = $row['cashback'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_vendor_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from vendor where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['emailid'] = $row['emailid'];
                $return['mobileno'] = $row['mobileno'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_manufacturer_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from manufacturer where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_product_type_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from product_type where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

	function get_product_details_by_id($id) {

        $return = array();
//echo "select * from product_detail where id='$id'";die;
        $query = $this->db->query("select * from product_detail where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['SKU'] = $row['SKU'];
                $return['sale_price'] = $row['sale_price'];
                $return['product_image'] = $row['product_image'];
                $return['mrp'] = $row['mrp'];
            }
        }

        return ($return);
    }



function get_product_var_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from product_variation where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['variation_type_id'] = $row['variation_type_id'];
                $return['sku'] = $row['sku'];
                $return['mrp'] = $row['mrp'];
                $return['sale_price'] = $row['sale_price'];
            }
        }

        return ($return);
    }

	function get_bin_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from bin_detail where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
            }
        }

        return ($return);
    }

    function get_product_package_type_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from product_package_type where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_brand_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from brand_detail where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['logo'] = $row['logo'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }
	
	function get_brand_details_by_name($brand) {

        $return = array();

        $query = $this->db->query("select * from brand_detail where lower(name)=lower('$brand')");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['logo'] = $row['logo'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_market_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from marketed_by where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

  function get_manufactured_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from  manufactured_by where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_country_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from country where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

   
    function get_product_gst() {
        $return = '';
        $query = $this->db->query("select * from product_gst");
        if ($query->num_rows() > 0) {
            $return = $query->result_array();
        }
        return ($return);
    }

    function getDomain() {
        $CI = & get_instance();
        return preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/", "$1", $CI->config->slash_item('base_url'));
    }

    function get_company_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from company where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['invoice_company_name'] = $row['invoice_company_name'];
                $return['gst_no'] = $row['gst_no'];
                $return['description'] = $row['description'];
                $return['emailid'] = $row['emailid'];
                $return['phone_no'] = $row['phone_no'];
                $return['mobile_no'] = $row['mobile_no'];
                $return['address'] = $row['address'];
                $return['latitude'] = $row['latitude'];
                $return['longitude'] = $row['longitude'];
                $return['facebook_link'] = $row['facebook_link'];
                $return['twitter_link'] = $row['twitter_link'];
                $return['googleplus_link'] = $row['googleplus_link'];
                $return['pininterest_link'] = $row['pininterest_link'];
                $return['linkedin_link'] = $row['linkedin_link'];
                $backgroundphoto = $row['photo'];
                if ($backgroundphoto != '') {
                    $return['photo'] = base_url() . 'images/company/' . $backgroundphoto;
                } else {
                    $return['photo'] = base_url() . 'images/default_product.png';
                }
            }
        }

        return ($return);
    }

    function get_pets_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('pets');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
	
	function get_variation_type_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('variations_type');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
	
	function get_batch_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('batch_detail');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
	
	function get_bin_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('bin_detail');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
	
	function get_category_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('category');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
    function get_categoryprice_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('categoryprice');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
    function get_category_from_memberdiscount_dropdown() {
        $return[''] = 'Select';
         $query = $this->db->query("SELECT md.*, c.id,c.name FROM `member_discount` as md
left join category as c ON c.id = md.cat_id
where md.cat_id is not null");
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function checkcompany_detailsexists() {
        $id = '';
        $query = $this->db->query("select * from company_details");
        foreach ($query->result_array() as $row) {
            $id = $row['id'];
        }
        return $id;
    }

    function get_distributor_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('distributor');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'] . ' (' . $row['mobileno'] . ')';
        }
        return $return;
    }

    function get_super_distributor_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('super_distributor');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'] . ' (' . $row['mobileno'] . ')';
        }
        return $return;
    }

    function get_member_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from member where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
                $return['code'] = $row['code'];
                $return['emailid'] = $row['emailid'];
                $return['mobileno'] = $row['mobileno'];
                $return['address'] = $row['address'];
                $return['gst_number'] = $row['gst_number'];
                $city_data = $this->herbal_model->get_city_details_by_id($row['city']);
                $state_data = $this->herbal_model->get_state_details_by_id($row['state']);
                $country_data = $this->herbal_model->get_country_details_by_id($row['country']);

                $return['city'] = $row['city'];
                $return['state'] = $row['state'];
                $return['country'] = $row['country'];
                $return['cityname'] = $city_data['city'];
                $return['statename'] = $state_data['state'];
                $return['countryname'] = $country_data['name'];
                $return['pincode'] = $row['pincode'];
                $return['identity_proof'] = $row['identity_proof'];
                $return['distributor_id'] = $row['distributor_id'];
                $return['super_distributor_id'] = $row['super_distributor_id'];
                $return['member_id'] = $row['member_id'];
                $return['discount'] = $row['discount'];
                $return['identity_proof'] = $row['identity_proof'];
                $return['notification_email_id'] = $row['notification_email_id'];
                $return['loyalty_point_check'] = $row['loyalty_point_check'];
                $return['forget_password'] = $this->encrypt->decode($row['forget_password']);
                $return['status'] = $row['status'];
                $return['credit_status'] = $row['credit_status'];
                $return['otp'] = $row['otp'];
                $return['otp_verify'] = $row['otp_verify'];
            }
        }

        return ($return);
    }

    function get_state_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from state where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];
            }
        }

        return ($return);
    }

    function get_city_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from city where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['city'] = $row['city'];
            }
        }

        return ($return);
    }
    function checkvalidcode($codechk, $code) {
        $return = array();
        if ($codechk == 4) {
            $query = $this->db->query("select * from distributor where code='$code'");
        } else if ($codechk == 1) {
            $query = $this->db->query("select * from super_distributor where code='$code'");
        } else if ($codechk == 2) {
            $query = $this->db->query("select * from member where code='$code'");
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
            }
            return $return;
        } else {
            return false;
        }
    }

    function get_distributor_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from distributor where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['code'] = $row['code'];
                $return['name'] = $row['name'];
                $return['emailid'] = $row['emailid'];
                $return['mobileno'] = $row['mobileno'];
                $return['address'] = $row['address'];
                $return['gst_in'] = $row['gst_in'];
                $return['pancard'] = $row['pancard'];
                $return['aadhar_no'] = $row['aadhar_no'];
                $return['wholeseller_code'] = $row['wholeseller_code'];
                $return['super_distributor_referelcode'] = $row['super_distributor_referelcode'];
                $return['commission_discount'] = $row['commission_discount'];
                $return['location'] = $row['location'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_super_distributor_details_by_id($id) {

        $return = array();

        $query = $this->db->query("select * from super_distributor where id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['code'] = $row['code'];
                $return['name'] = $row['name'];
                $return['emailid'] = $row['emailid'];
                $return['mobileno'] = $row['mobileno'];
                $return['address'] = $row['address'];
                $return['gst_in'] = $row['gst_in'];
                $return['pancard'] = $row['pancard'];
                $return['aadhar_no'] = $row['aadhar_no'];
                $return['wholeseller_code'] = $row['wholeseller_code'];
                $return['super_distributor_referelcode'] = $row['super_distributor_referelcode'];
                $return['commission_discount'] = $row['commission_discount'];
                $return['location'] = $row['location'];
                $return['status'] = $row['status'];
                $return['is_approved'] = $row['is_approved'];
            }
        }

        return ($return);
    }

    function get_product_gallery_grid($product_id) {
        $return = array();
        $query = $this->db->query("select * from product_gallery where product_id='$product_id'");
        $return = $query->result_array();
        return $return;
    }

    function checkduplicatecategory($name) {

        $query = $this->db->query("select * from category where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatesub_category($name) {
        $query = $this->db->query("select * from sub_category where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatemember_discount($name) {
        $query = $this->db->query("select * from member_discount where with_dist_purchase_amount='$name'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatemember_discount_without_dist_sd_purchase_amount($name) {
        $query = $this->db->query("select * from member_discount where without_dist_sd_purchase_amount='$name'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatedistributor_comission($name) {
        $query = $this->db->query("select * from distributor_comission where with_sd_code_amount='$name'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatesuper_distributor_comission($name) {
        $query = $this->db->query("select * from super_distributor_comission where amount='$name'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatecoupon($name) {
        $query = $this->db->query("select * from coupon where code='$name'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatevendor($name) {
        $query = $this->db->query("select * from vendor where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatemanufacturer($name) {
        $query = $this->db->query("select * from manufacturer where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicateproduct_type($name) {
        $query = $this->db->query("select * from product_type where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicateproduct_package_type($name) {
        $query = $this->db->query("select * from product_package_type where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatecountry($name) {
        $query = $this->db->query("select * from country where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkduplicatebrand($name) {
        $query = $this->db->query("select * from brand_detail where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getsub_categorybycategory($category_id) {

        $cities[] = 'Select';

        $query = $this->db->query("select * from sub_category where category_id='$category_id' and status=1 order by name");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $cities[$row['id']] = $row['name'];
            }
        }
        return $cities;
    }

    function getcodeprefix() {

        $return = array();
        $query = $this->db->query("select * from codeprefix");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['member'] = $row['member'];
                $return['distributor'] = $row['distributor'];
                $return['super_distributor'] = $row['super_distributor'];
            }
        }
        return $return;
    }

    function generatemembercode() {
        $orderno = '';
        $id = '';
        $query = $this->db->query("select * from member order by id desc limit 1");
        $number = 0000;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $rows) {
                $code = $rows['code'];
            }
            $number = filter_var($code, FILTER_SANITIZE_NUMBER_INT);
        }
        $getcodeprefix = $this->getcodeprefix();
        $prefix = $getcodeprefix['member'];
        $number++;
        $code = $prefix . str_pad($number, 4, "0", STR_PAD_LEFT);
        return $code;
    }

    function generatedistributorcode() {
        $orderno = '';
        $id = '';
        $query = $this->db->query("select * from distributor order by id desc limit 1");
        $number = 0000;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $rows) {
                $code = $rows['code'];
            }
            $number = filter_var($code, FILTER_SANITIZE_NUMBER_INT);
        }
        $getcodeprefix = $this->getcodeprefix();
        $prefix = $getcodeprefix['distributor'];
        $number++;
        $code = $prefix . str_pad($number, 4, "0", STR_PAD_LEFT);
        return $code;
    }

    function generatesuper_distributorcode() {
        $orderno = '';
        $id = '';
        $query = $this->db->query("select * from super_distributor order by id desc limit 1");
        $number = 0000;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $rows) {
                $code = $rows['code'];
            }
            $number = filter_var($code, FILTER_SANITIZE_NUMBER_INT);
        }
        $getcodeprefix = $this->getcodeprefix();
        $prefix = $getcodeprefix['super_distributor'];
        $number++;
        $code = $prefix . str_pad($number, 4, "0", STR_PAD_LEFT);
        return $code;
    }

    function get_order_details_by_id($id) {
        $return = array();
        $query = $this->db->query("select * from master_order where id='$id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['order_no'] = $row['order_no'];
                $return['order_date'] = date('d/m/Y', strtotime($row['order_date']));
                $return['member_id'] = $row['member_id'];
                $member_id = $row['member_id'];
                $get_member_details_by_id = $this->herbal_model->get_member_details_by_id($member_id);
                $return['member'] = $get_member_details_by_id['name'];
                $return['member_emailid'] = $get_member_details_by_id['emailid'];
                $return['get_member_details_by_id'] = $get_member_details_by_id;
                $return['tax'] = $row['tax'];
                $return['gst_percent'] = $row['gst_percent'];
                $return['coupon_code'] = $row['coupon_code'];
                $return['discount'] = $row['discount'];
                $return['member_discount'] = $row['member_discount'];
                $return['member_referral_discount_value'] = $row['member_referral_discount_value'];
                $return['loyalty_point_discount_value'] = $row['loyalty_point_discount_value'];
                $return['sub_total'] = $row['sub_total'];
                $return['grand_total'] = $row['grand_total'];
                $return['status'] = $row['status'];
                $return['payment_mode'] = $row['payment_mode'];
                $return['transporter_name'] = $row['transporter_name'];
                $return['docket_no'] = $row['docket_no'];
                //$return['dispatch_date'] = $row['dispatch_date'];
                if ($row['dispatch_date'] != '') {
                    $return['dispatch_date'] = date('d/m/Y', strtotime($row['dispatch_date']));
                } else {
                    $return['dispatch_date'] = null;
                }
                $return['delivery_type'] = $row['delivery_type'];
                $return['pay_status'] = $row['pay_status'];
                //$return['expected_date'] = $row['expected_date'];
                if ($row['expected_date'] != '') {
                    $return['expected_date'] = date('d/m/Y', strtotime($row['expected_date']));
                } else {
                    $return['expected_date'] = null;
                }
                $return['transportion_charge'] = $row['transportion_charge'];
                $return['delivery_charges'] = $row['delivery_charges'];
                $return['tracking_id'] = $row['tracking_id'];
                $return['team_name'] = $row['team_name'];
                $return['po_number'] = $row['po_number'];
                $return['get_shippingdetails_byid'] = $this->herbal_model->get_shippingdetails_byid($id);
                $url = $row['order_no'] . '-' . $row['id'] . '-orderdetails';
                $url = base_url() . preg_replace('/[^A-Za-z0-9]+/', '-', $url); //replace multiple hyphen at a time with one hyphen
                $return['url'] = $url;
                $return['get_comma_separated_products_by_order'] = $this->get_comma_separated_products_by_order($id);
            }
        }
        return ($return);
    }

    function get_comma_separated_products_by_order($order_id) {
        $return = array();
        $product_name = '';
        $query = $this->db->query("SELECT * from product_order_details where order_id='$order_id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row1) {
                $qty = $row1['qty'];
                $price = $row1['price'];
                $product_price = $row1['product_price'];
                $get_product_details_by_id = $this->herbal_model->get_product_details_by_id($row1['product_id']);
                $product_name .= $get_product_details_by_id['product_name'] . ', ';
            }
        }
        return rtrim($product_name, ', ');
    }

    function get_shippingdetails_byid($id) {
        $return = array();
        $result = array();
        $query = $this->db->query("select * from shipping where order_id = '$id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['shipping_name'] = $row['shipping_name'];
                $return['shipping_emailid'] = $row['shipping_emailid'];
                $return['shipping_address'] = $row['shipping_address'];
                $return['shipping_pincode'] = $row['shipping_pincode'];
                $return['shipping_contactno'] = $row['shipping_contactno'];
                $return['shipping_state'] = $row['shipping_state'];
                $return['shipping_city'] = $row['shipping_city'];
                $return['shipping_country'] = $row['shipping_country'];
            }
        }
        return ($return);
    }

    function get_products_in_order($order_id) {
        $return = array();
        $query = $this->db->query("SELECT * from product_order_details where order_id='$order_id'");

        if ($query->num_rows() > 0) {

            $return = $query->result_array();
        }
        return $return;
    }
    function get_products_in_editorder($order_id,$product_id) {
        $return = array();
        $query = $this->db->query("SELECT * from product_order_details where order_id='$order_id' and product_id='$product_id'");

        if ($query->num_rows() > 0) {

            $return = $query->result_array();
        }
        return $return;
    }

    function getcompanydetailsid() {
        $id = '';
        $query = $this->db->query("SELECT * from company_details");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
        }
        return $id;
    }

    function get_certificates_details_by_id($id) {
        $return = array();
        $query = $this->db->query("select * from certificates where id='$id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['status'] = $row['status'];
                $backgroundphoto = $row['photo'];
                $return['file'] = $row['file'];
                if ($backgroundphoto != '') {
                    $return['photo'] = base_url() . '/images/certificates/' . $backgroundphoto;
                } else {
                    $return['photo'] = base_url() . 'images/default_product.png';
                }
            }
        }
        return ($return);
    }

    function get_vendor_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('vendor');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_manufacturer_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('manufacturer');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_brand_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('brand_detail');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_company_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('company');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_manufactured_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('manufactured_by');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_marketed_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('marketed_by');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

 function get_animal_type_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('animal_type');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

 function get_condition_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get(' vet_condition');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

 function get_drugs_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('drugs');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

 function get_administration_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('administration');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

 function get_type_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('formulation');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

 function get_flavour_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('food_flavour');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_pet_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('pets');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_product_type_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('product_type');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_country_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('country');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_product_package_type_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('product_package_type');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_yesno_dropdown() {
        $return[''] = 'Select';
        $return['0'] = 'No';
        $return['1'] = 'Yes';
        return $return;
    }

    function checksub_categoryexists($category_id, $name) {
        $id = '';
        $query = $this->db->query("select * from sub_category where category_id='$category_id' and lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkvendorexists($name) {
        $id = '';
        $query = $this->db->query("select * from vendor where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkmanufacturerexists($name) {
        $id = '';
        $query = $this->db->query("select * from manufacturer where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkbrandexists($name) {
        $id = '';
        $query = $this->db->query("select * from brand where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkproduct_typeexists($name) {
        $id = '';
        $query = $this->db->query("select * from product_type where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkproduct_package_typeexists($name) {
        $id = '';
        $query = $this->db->query("select * from product_package_type where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkproduct_detailsexists($name) {
        $id = '';
        $query = $this->db->query("select * from product_details where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkcountryexists($name) {
        $id = '';
        $query = $this->db->query("select * from country where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function get_product_gallery_details_by_id($id) {
        $return = array();
        $query = $this->db->query("select * from product_gallery where id='$id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $backgroundphoto = $row['photo'];
                if ($backgroundphoto != '') {
                    $return['photo'] = base_url() . 'images/products/gallery/' . $backgroundphoto;
                } else {
                    $return['photo'] = base_url() . 'images/default_product.png';
                }
            }
        }
        return ($return);
    }

    function getproductgallerybyproductid($product_id) {
        $return = array();
        $query = $this->db->query("select * from product_gallery where product_id='$product_id'");
        $return = $query->result_array();
        return $return;
    }

    function sendmailtosuperdistributor($id) {
        $config = Array(
            'protocol' => 'mail',
//            'protocol' => 'smtp',
//            'smtp_host' => get_mail_settings()['smtp_host'],
//            'smtp_port' => get_mail_settings()['smtp_port'],
//            'smtp_user' => get_mail_settings()['smtp_user'],
//            'smtp_pass' => get_mail_settings()['smtp_pass'],
            'wordwrap' => FALSE,
            'charset' => 'utf-8',
            'crlf' => '\r\n',
            'newline' => '\r\n',
            'mailtype' => 'html'
        );
        $get_super_distributor_details_by_id = $this->herbal_model->get_super_distributor_details_by_id($id);

        $subject = 'You have been registered successfully';
        $message = "Dear " . $get_super_distributor_details_by_id['name'] . "! <br/><br/>";
        $message .= "Your email ID " . $get_super_distributor_details_by_id['emailid'] . " was used to register at www.mywebsite.com";
        $message .= "<br/><br/>Your generated Super Distributor code is:<b>" . $get_super_distributor_details_by_id['code'] . "</b>";
        $message .= "<br/><br/>Best regards,";
        $message .= "<br/><br/>--";
        $message .= "<br/>Herbal Hills Team";
        $message .= "<br/>" . base_url();
        $this->load->library('email', $config);
        $this->email->clear();
        $this->email->set_mailtype("html");
        $this->email->from(get_mail_settings()['from_emailid'], get_mail_settings()['from_name']);
        $this->email->reply_to(get_mail_settings()['to_emailid'], get_mail_settings()['from_name']);
        $this->email->to($get_super_distributor_details_by_id['emailid']);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            // Generate error
            // echo $this->email->print_debugger();
        } else {
            //echo 'success';
        }
    }

    function sendmailtodistributor($id) {
        $config = Array(
            'protocol' => 'mail',
//            'protocol' => 'smtp',
//            'smtp_host' => get_mail_settings()['smtp_host'],
//            'smtp_port' => get_mail_settings()['smtp_port'],
//            'smtp_user' => get_mail_settings()['smtp_user'],
//            'smtp_pass' => get_mail_settings()['smtp_pass'],
            'wordwrap' => FALSE,
            'charset' => 'utf-8',
            'crlf' => '\r\n',
            'newline' => '\r\n',
            'mailtype' => 'html'
        );
        $get_distributor_details_by_id = $this->herbal_model->get_distributor_details_by_id($id);

        $subject = 'You have been registered successfully';
        $message = "Dear " . $get_distributor_details_by_id['name'] . "! <br/><br/>";
        $message .= "Your email ID " . $get_distributor_details_by_id['emailid'] . " was used to register at www.mywebsite.com";
        $message .= "<br/><br/>Your generated Distributor code is:<b>" . $get_distributor_details_by_id['code'] . "</b>";
        $message .= "<br/><br/>Best regards,";
        $message .= "<br/><br/>--";
        $message .= "<br/>Herbal Hills Team";
        $message .= "<br/>" . base_url();
        $this->load->library('email', $config);
        $this->email->clear();
        $this->email->set_mailtype("html");
        $this->email->from(get_mail_settings()['from_emailid'], get_mail_settings()['from_name']);
        $this->email->reply_to(get_mail_settings()['to_emailid'], get_mail_settings()['from_name']);
        $this->email->to($get_distributor_details_by_id['emailid']);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            // Generate error
            // echo $this->email->print_debugger();
        } else {
            //echo 'success';
        }
    }

    function sendmailtomember($id) {
        $config = Array(
            'protocol' => 'mail',
//            'protocol' => 'smtp',
//            'smtp_host' => get_mail_settings()['smtp_host'],
//            'smtp_port' => get_mail_settings()['smtp_port'],
//            'smtp_user' => get_mail_settings()['smtp_user'],
//            'smtp_pass' => get_mail_settings()['smtp_pass'],
            'wordwrap' => FALSE,
            'charset' => 'utf-8',
            'crlf' => '\r\n',
            'newline' => '\r\n',
            'mailtype' => 'html'
        );
        $get_member_details_by_id = $this->herbal_model->get_member_details_by_id($id);

        $subject = 'You have been registered successfully';
        $message = "Dear " . $get_member_details_by_id['name'] . "! <br/><br/>";
        $message .= "Your email ID " . $get_member_details_by_id['emailid'] . " was used to register at www.mywebsite.com";
        $message .= "<br/><br/>Your generated Member code is:<b>" . $get_member_details_by_id['code'] . "</b>";
        $message .= "<br/><br/>Best regards,";
        $message .= "<br/><br/>--";
        $message .= "<br/>Herbal Hills Team";
        $message .= "<br/>" . base_url();
        $this->load->library('email', $config);
        $this->email->clear();
        $this->email->set_mailtype("html");
        $this->email->from(get_mail_settings()['from_emailid'], get_mail_settings()['from_name']);
        $this->email->reply_to(get_mail_settings()['to_emailid'], get_mail_settings()['from_name']);
        $this->email->to($get_member_details_by_id['emailid']);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            // Generate error
            // echo $this->email->print_debugger();
        } else {
            //echo 'success';
        }
    }

    function get_mostboughtproduct_list($member_id) {
        $return = array();
        $query = $this->db->query("
                SELECT mo.id as order_id, mo.member_id, pod.product_id FROM `master_order` as mo
LEFT JOIN product_order_details as pod ON pod.order_id = mo.id
WHERE mo.member_id = '$member_id'
GROUP BY product_id ORDER BY SUM(pod.qty) DESC");

        if ($query->num_rows() > 0) {
            $return = $query->result_array();
        }
        return $return;
    }

    function check_member_order_exist($member_id) {
        $query = $this->db->query("select * from master_order where member_id='$member_id'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function check_member_referral_code_exist($code, $member_id) {
        $query = $this->db->query("select * from member where code='$code' AND member_id='$member_id'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_member_loyalty_points() {
        $return = array();
        $query = $this->db->query("select * from loyalty_points");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['loyalty_points'] = $row['loyalty_points'];
                $return['credit_loyalty_point'] = $row['credit_loyalty_point'];
                $return['debit_loyalty_point'] = $row['debit_loyalty_point'];
            }
        }
        return $return;
    }

    function get_member_total_loyalty_points_by_id($member_id) {
        $return = array();
        $query = $this->db->query("SELECT ROUND(sum(`loyalty_points`),2) - ROUND(sum(`debit_loyalty_point`),2) as total_loyalty_points FROM `member_loyalty_points` WHERE `member_id`='$member_id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['total_loyalty_points'] = $row['total_loyalty_points'];
            }
        }
        return $return;
    }

    function get_member_total_loyalty_points() {
        $return = array();
        $query = $this->db->query("SELECT ROUND(sum(`loyalty_points`),2) - ROUND(sum(`debit_loyalty_point`),2) as total_loyalty_points FROM `member_loyalty_points`");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['total_loyalty_points'] = $row['total_loyalty_points'];
            }
        }
        return $return;
    }

    function get_member_loyalty_points_for_spending($member_id = null, $d_id = null, $sd_id = null) {
        $return = array();
        //  if ($member_id != null || $d_id != null || $sd_id != null) {
        if ($member_id != '') {
            $query = $this->db->query("SELECT * FROM `member_loyalty_points` where member_id='$member_id'");
        } else if ($d_id != '') {

            $query = $this->db->query("SELECT mlp.* FROM `member_loyalty_points` as mlp
LEFT JOIN member as m ON m.id = mlp.`member_id`
LEFT JOIN distributor as d ON d.id = m.distributor_id
WHERE m.distributor_id = '$d_id' AND m.status=1 and m.is_approved=1 order by mlp.id desc");
        } else if ($sd_id != '') {
            $query = $this->db->query("SELECT mlp.* FROM `member_loyalty_points` as mlp
LEFT JOIN member as m ON m.id = mlp.`member_id`
LEFT JOIN super_distributor as sd ON sd.id = m.super_distributor_id
WHERE m.super_distributor_id = '$sd_id' AND m.status=1 and m.is_approved=1 order by mlp.id desc");
            //}
        } else {
            $query = $this->db->query("SELECT * FROM `member_loyalty_points`");
        }
        $return = $query->result_array();
        return $return;
    }

    function get_loyaltypoint_validity($member_id = null, $d_id = null, $sd_id = null) {
        //echo $d_id;die;
        $get_member_loyalty_points_for_spending = $this->get_member_loyalty_points_for_spending($member_id, $d_id, $sd_id);

        foreach ($get_member_loyalty_points_for_spending as $row) {
            //$from_date = date('Y-m-d',strtotime($row['created_date']));
            $end_date = date('Y-m-d', strtotime("+2 year", strtotime($row['created_date'])));

            date_default_timezone_set('Asia/Kolkata');
            $start = date('Y-m-d');

            $date1 = date_create($start);
            $date2 = date_create($end_date);
            $diff = date_diff($date1, $date2);

            if ($date1 <= $date2) {
                $earning_point += round($row['loyalty_points']);
            }
            $spending_point += round($row['debit_loyalty_point']);
        }
        $valid_loyalty_point = $earning_point - $spending_point;
        return $valid_loyalty_point;
    }

    function get_order_credit_balance($id) {

        $return = array();
        // echo "SELECT * FROM `order_member_credit` WHERE `member_id` = '$id' and (`status` IS NULL OR status = 'Pending') order by id desc limit 1";
        $query = $this->db->query("SELECT * FROM `order_member_credit` WHERE `member_id` = '$id' and (`status` IS NULL OR status = '0') order by id desc limit 1");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['order_id'] = $row['order_id'];
                $return['member_id'] = $row['member_id'];
                $return['current_credit_balance'] = $row['current_credit_balance'];
                $return['use_credit'] = $row['use_credit'];
                $return['expiry_date'] = $row['expiry_date'];
                $return['paid_credit'] = $row['paid_credit'];
                $return['credit_to_be_paid'] = $row['credit_to_be_paid'];
                $return['status'] = $row['status'];
            }
        }
        return $return;
    }

    function get_order_credit_balanceby_id($order_id, $id) {

        $return = array();
        // echo "SELECT * FROM `order_member_credit` WHERE `member_id` = '$id' and (`status` IS NULL OR status = 'Pending') order by id desc limit 1";
        $query = $this->db->query("SELECT * FROM `order_member_credit` WHERE order_id='$order_id' and `member_id` = '$id' and (`status` IS NULL OR status = 'Pending') order by id desc");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['order_id'] = $row['order_id'];
                $return['member_id'] = $row['member_id'];
                $return['current_credit_balance'] = $row['current_credit_balance'];
                $return['use_credit'] = $row['use_credit'];
                $return['expiry_date'] = $row['expiry_date'];
                $return['paid_credit'] = $row['paid_credit'];
                $return['credit_to_be_paid'] = $row['credit_to_be_paid'];
                $return['status'] = $row['status'];
            }
        }
        return $return;
    }

    function get_order_credit_balance_record() {

        $return = array();

        $query = $this->db->query("SELECT * FROM `order_member_credit` WHERE (`status` IS NULL OR status = '0') order by id desc");

        $return = $query->result_array();
        return $return;
    }

    function get_master_credit_balance_record() {

        $return = array();

        $query = $this->db->query("SELECT * FROM `master_member_credits` WHERE (`status` IS NULL OR status = '0') order by id desc");

        $return = $query->result_array();
        return $return;
    }

    function get_master_credit_balance($id) {

        $return = array();
        // echo "SELECT * FROM `order_member_credit` WHERE `member_id` = '$id' and (`status` IS NULL OR status = 'Pending') order by id desc limit 1";
        $query = $this->db->query("SELECT * FROM `master_member_credits` WHERE `member_id` = '$id' and (`status` IS NULL OR status = '0') order by id desc limit 1");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['member_id'] = $row['member_id'];
                $return['current_credit_balance'] = $row['current_credit_balance'];
                $return['use_credit'] = $row['use_credit'];
                $return['expiry_date'] = $row['expiry_date'];
                $return['paid_credit'] = $row['paid_credit'];
                $return['credit_to_be_paid'] = $row['credit_to_be_paid'];
                $return['status'] = $row['status'];
            }
        }
        return $return;
    }

    function get_total_active_members() {

        $return = array();
        $query = $this->db->query("SELECT count(*) as total_active_memebrs  FROM `member` WHERE `is_approved` = 1 AND `status` = 1");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['total_active_members'] = $row['total_active_memebrs'];
            }
            return $return;
        }
    }

    function get_total_members($d_id = null, $sd_id = null) {

        $return = array();
        if ($d_id) {
            $query = $this->db->query("SELECT count(*) as total_memebrs  FROM `member` WHERE distributor_id='$d_id' AND status=1 and is_approved=1 order by id desc");
        } else if ($sd_id) {

            $query = $this->db->query("SELECT count(*) as total_memebrs  FROM `member` WHERE super_distributor_id='$sd_id' AND status=1 and is_approved=1 order by id desc");
        } else {
            $query = $this->db->query("SELECT count(*) as total_memebrs  FROM `member` ");
        }

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['total_memebrs'] = $row['total_memebrs'];
            }
            return $return;
        }
    }

    function get_total_members_credit($distributor_id = null, $super_distributor_id = null) {
        $return = array();
        if ($distributor_id) {
           
            $query = $this->db->query("SELECT SUM(omc.`current_credit_balance`) AS all_credit_balance FROM `order_member_credit` as omc
                LEFT JOIN member as m ON m.id = omc.member_id
                WHERE m.distributor_id = $distributor_id");
        } else if ($super_distributor_id) {
            $query = $this->db->query("SELECT SUM(omc.`current_credit_balance`) AS all_credit_balance FROM `order_member_credit` as omc
                LEFT JOIN member as m ON m.id = omc.member_id
                WHERE m.super_distributor_id = $super_distributor_id");
        } else {
            $query = $this->db->query("SELECT SUM(omc.`current_credit_balance`) AS all_credit_balance FROM `order_member_credit` as omc");
        }
        $res = $query->result_array();
   
        if (count($res[0]['all_credit_balance']) > 0 ) {
            foreach ($query->result_array() as $row) {
                $return['all_credit_balance'] = $row['all_credit_balance'];
            }
          
        }else{
            if ($distributor_id) {
            $query = $this->db->query("SELECT  SUM(REPLACE(CONCAT(rc.`request_credit_amount`), ',', '')) as all_credit_balance FROM `member_credits`  as rc
LEFT JOIN member as m ON m.id = rc.member_id
                WHERE m.distributor_id = $distributor_id");
        } else if ($super_distributor_id) {
            $query = $this->db->query("SELECT  SUM(REPLACE(CONCAT(rc.`request_credit_amount`), ',', '')) as all_credit_balance FROM `member_credits`  as rc
                LEFT JOIN member as m ON m.id = rc.member_id
                WHERE m.super_distributor_id = $super_distributor_id");
        } else {
            $query = $this->db->query("SELECT  SUM(REPLACE(CONCAT(rc.`request_credit_amount`), ',', '')) as all_credit_balance FROM `member_credits`  as rc
                LEFT JOIN member as m ON m.id = rc.member_id");
        } 
         $res1 = $query->result_array();
          if (count($res1[0]['all_credit_balance']) > 0 ) {
                foreach ($query->result_array() as $row) {
                    $return['all_credit_balance'] = $row['all_credit_balance'];
                }
            }
        }
          return $return;
    }

    function get_total_orders($member_id = null) {

        $return = array();
        if ($member_id) {
            $query = $this->db->query("SELECT count(*) as total_orders , SUM(`grand_total`) as total_sale FROM `master_order` WHERE member_id = '$member_id' AND status='delivered'");
        } else {
            $query = $this->db->query("SELECT count(*) as total_orders , SUM(`grand_total`) as total_sale FROM `master_order` WHERE status='delivered' ");
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['total_orders'] = $row['total_orders'];
                $return['total_sale'] = $row['total_sale'];
            }
            return $return;
        }
    }

    function get_total_open_orders($member_id = null) {

        $return = array();
        if ($member_id) {
            $query = $this->db->query("SELECT count(*) as total_orders , SUM(`grand_total`) as total_sale FROM `master_order` WHERE member_id = '$member_id' AND status='pending'");
        } else {
            $query = $this->db->query("SELECT count(*) as total_orders , SUM(`grand_total`) as total_sale FROM `master_order` WHERE status='pending' ");
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['total_orders'] = $row['total_orders'];
                $return['total_sale'] = $row['total_sale'];
            }
            return $return;
        }
    }

    function get_total_credit_request() {

        $return = array();
        $query = $this->db->query("SELECT count(*) as total_credit_request FROM `member_credits` WHERE `status` LIKE 'request_pending'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['total_credit_request'] = $row['total_credit_request'];
            }
            return $return;
        }
    }

    function generate_credit_orderno() {
        $orderno = '';
        $id = '';
        $test = $this->db->query("select max(id) as id from member_credits_payment_record limit 1");
        foreach ($test->result_array() as $y) {
            $id = $y['id'];
        }
        if ($id == "" && $id == null) {
            $num = 1;
            $orderno = "CT" . $num;
        } else {
            $test2 = $this->db->query("select * from member_credits_payment_record where id='$id'");
            foreach ($test2->result_array() as $y) {
                $code = $y['order_no'];
            }
            $number = substr($code, 3);
            $count = $number + 1;
            $orderno = "CT" . $count;
        }
        return $orderno;
    }

    function get_distributor_details_by_code($code) {

        $return = array();

        $query = $this->db->query("select * from distributor where code='$code'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['code'] = $row['code'];
                $return['name'] = $row['name'];
                $return['emailid'] = $row['emailid'];
                $return['mobileno'] = $row['mobileno'];
                $return['address'] = $row['address'];
                $return['gst_in'] = $row['gst_in'];
                $return['pancard'] = $row['pancard'];
                $return['aadhar_no'] = $row['aadhar_no'];
                $return['wholeseller_code'] = $row['wholeseller_code'];
                $return['super_distributor_referelcode'] = $row['super_distributor_referelcode'];
                $return['location'] = $row['location'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_distributor_commission_member_wise($member_id, $carttotalamount) {

        $get_member_details_by_id = $this->herbal_model->get_member_details_by_id($member_id);
        $distributor_id = $get_member_details_by_id['distributor_id'];
        $super_distributor_id = $get_member_details_by_id['super_distributor_id'];


        if ($distributor_id != '') {
            $get_distributor_details_by_id = $this->herbal_model->get_distributor_details_by_id($distributor_id);
            $d_commission_discount = $get_distributor_details_by_id['commission_discount'];

            $super_distributor_referelcode = $get_distributor_details_by_id['super_distributor_referelcode'];
            //print_r($super_distributor_referelcode);die;
            if ($super_distributor_referelcode == '') {
                $d_commission_without_sd_arr = $this->herbal_model->get_distributor_commission_details_without_sd();

                foreach ($d_commission_without_sd_arr as $row) {
                    if ($d_commission_discount == '' || $d_commission_discount == 0) {
                        if ($carttotalamount >= $row['without_sd_code_amount']) {

                            $cartdiscount = $row['without_sd_code_discount'];
                        } else {
                            $cartdiscount = $d_commission_discount;
                        }
                    }
                }
            } else {
                $d_commission_with_sd_arr = $this->herbal_model->get_distributor_commission_details_with_sd();

                foreach ($d_commission_with_sd_arr as $row) {

                    if ($carttotalamount >= $row['with_sd_code_amount']) {
                        if ($d_commission_discount == '' || $d_commission_discount == 0) {
                            $cartdiscount = $row['with_sd_code_discount'];
                        } else {
                            $cartdiscount = $d_commission_discount;
                        }
                    }
                }
            }
        }

        return $cartdiscount;
    }

    function get_distributor_commission($distributor_id = null, $carttotalamount) {

//        $get_member_details_by_id = $this->herbal_model->get_member_details_by_id($member_id);
//        $distributor_id = $get_member_details_by_id['distributor_id'];
//        $super_distributor_id = $get_member_details_by_id['super_distributor_id'];


        if ($distributor_id != '') {
            $get_distributor_details_by_id = $this->herbal_model->get_distributor_details_by_id($distributor_id);


            $super_distributor_referelcode = $get_distributor_details_by_id['super_distributor_referelcode'];
            $commission_discount = $get_distributor_details_by_id['commission_discount'];

            if ($super_distributor_referelcode == '') {
                $d_commission_without_sd_arr = $this->herbal_model->get_distributor_commission_details_without_sd();

                foreach ($d_commission_without_sd_arr as $row) {

                    if ($carttotalamount >= $row['without_sd_code_amount']) {
                        if ($commission_discount == '' || $commission_discount == 0) {
                            $cartdiscount = $row['without_sd_code_discount'];
                        } else {
                            $cartdiscount = $commission_discount;
                        }
                    }
                }
            } else {
                $d_commission_with_sd_arr = $this->herbal_model->get_distributor_commission_details_with_sd();

                foreach ($d_commission_with_sd_arr as $row) {

                    if ($carttotalamount >= $row['with_sd_code_amount']) {
                        if ($commission_discount == '' || $commission_discount == 0) {
                            $cartdiscount = $row['with_sd_code_discount'];
                        } else {
                            $cartdiscount = $commission_discount;
                        }
                    }
                }
            }
        } else {
            $d_commission_without_sd_arr = $this->herbal_model->get_distributor_commission_details_without_sd();

            foreach ($d_commission_without_sd_arr as $row) {

                if ($carttotalamount >= $row['without_sd_code_amount']) {
                    if ($commission_discount == '' || $commission_discount == 0) {
                        $cartdiscount = $row['without_sd_code_discount'];
                    } else {
                        $cartdiscount = $commission_discount;
                    }
                }
            }
        }

        return $cartdiscount;
    }

    function get_distributor_commission_details_without_sd() {

        $return = array();
        $query = $this->db->query("SELECT `id`, `without_sd_code_amount`, `without_sd_code_discount`  FROM `distributor_comission` where status = '1' ORDER BY `without_sd_code_amount` ASC");
        $return = $query->result_array();
        return $return;
    }

    function get_distributor_commission_details_with_sd() {

        $return = array();

        $query = $this->db->query("SELECT `id`, `with_sd_code_amount`, `with_sd_code_discount`  FROM `distributor_comission` where status = '1' ORDER BY `with_sd_code_amount` ASC");
        $return = $query->result_array();
        return $return;
    }

    function get_master_d_commission_month_wise($id) {

        $return = array();
        $query = $this->db->query("SELECT * FROM `master_d_commission` WHERE `d_id` = '$id' order by id desc limit 1");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['d_id'] = $row['d_id'];
                $return['commission_percent'] = $row['commission_percent'];
                $return['commission_amount'] = $row['commission_amount'];
                $return['payment_type'] = $row['payment_type'];
                $return['commission_paid'] = $row['commission_paid'];
                $return['commission_to_be_paid'] = $row['commission_to_be_paid'];
                $return['created_date'] = $row['created_date'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }
    function get_master_d_commission_history_month_wise($id,$order_id) {

        $return = array();
        $query = $this->db->query("SELECT * FROM `master_d_commission_history` WHERE `d_id` = '$id' AND order_id='$order_id' order by id desc limit 1");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['d_id'] = $row['d_id'];
                $return['order_id'] = $row['order_id'];
                $return['commission_percent'] = $row['commission_percent'];
                $return['commission_amount'] = $row['commission_amount'];
                $return['payment_type'] = $row['payment_type'];
                $return['commission_paid'] = $row['commission_paid'];
                $return['commission_to_be_paid'] = $row['commission_to_be_paid'];
                $return['created_date'] = $row['created_date'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function get_master_d_commission($id) {

        $return = array();
        $query = $this->db->query("SELECT * FROM `master_d_commission` WHERE `id` = '$id' order by id desc");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['d_id'] = $row['d_id'];
                $return['commission_percent'] = $row['commission_percent'];
                $return['commission_amount'] = $row['commission_amount'];
                $return['payment_type'] = $row['payment_type'];
                $return['commission_paid'] = $row['commission_paid'];
                $return['commission_to_be_paid'] = $row['commission_to_be_paid'];
                $return['created_date'] = $row['created_date'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function get_distributor_total_sale($distributor_id) {

        $return = array();
        $current_month = date('m');
        //echo "SELECT sum(`grand_total`) as total_sale FROM `master_order` WHERE distributor_id ='$distributor_id'  AND `status`='delivered' AND MONTH(order_date) = '$current_month'";die;
        $query = $this->db->query("SELECT sum(`grand_total`) as total_sale FROM `master_order` WHERE distributor_id ='$distributor_id'  AND `status`='pending' AND MONTH(order_date) = '$current_month'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function checkparentcategoryexists($name) {
        $id = '';
        $query = $this->db->query("select * from parent_category where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkcategoryexists($name) {
        $id = '';
        $query = $this->db->query("select * from category where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function checkparentidexists($parent_id, $name) {
        $id = '';
        $query = $this->db->query("select * from category where lower(name)=lower('$name') AND parent_id = '$parent_id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $id = $row['id'];
            }
            return $id;
        } else {
            return false;
        }
    }

    function getparentidbyategory($cat_id) {
        $parent_id = '';
        $query = $this->db->query("select * from category where id = '$cat_id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $parent_id = $row['parent_id'];
            }
            return $parent_id;
        } else {
            return false;
        }
    }

    function get_parentcategory_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('parent_category');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_super_distributor_commission_with_d($carttotalamount, $sd_commission_discount) {

        if ($carttotalamount != '') {

            $sd_commission_with_d_arr = $this->herbal_model->get_super_distributor_commission_details_with_d();

            foreach ($sd_commission_with_d_arr as $row) {

                if ($carttotalamount >= $row['with_d_code_amount']) {
                    if ($sd_commission_discount == '' || $sd_commission_discount == 0) {
                        $cartdiscount = $row['with_d_code_discount'];
                    } else {
                        $cartdiscount = $sd_commission_discount;
                    }
                }
            }
        }
        return $cartdiscount;
    }

    function get_super_distributor_commission_with_member($carttotalamount, $sd_commission_discount) {

        if ($carttotalamount != '') {

            $sd_commission_with_d_arr = $this->herbal_model->get_super_distributor_commission_details_with_member();

            foreach ($sd_commission_with_d_arr as $row) {

                if ($carttotalamount >= $row['without_d_code_amount']) {
                    if ($sd_commission_discount == '' || $sd_commission_discount == 0) {
                        $cartdiscount = $row['without_d_code_discount'];
                    } else {
                        $cartdiscount = $sd_commission_discount;
                    }
                }
            }
        }
        return $cartdiscount;
    }

    function get_super_distributor_commission_details_with_d() {

        $return = array();

        $query = $this->db->query("SELECT `id`, `with_d_code_amount`, `with_d_code_discount`  FROM `super_distributor_comission` where status = '1'");
        $return = $query->result_array();
        return $return;
    }

    function get_super_distributor_commission_details_with_member() {

        $return = array();

        $query = $this->db->query("SELECT `id`, `without_d_code_amount`, `without_d_code_discount`  FROM `super_distributor_comission` where status = '1'");
        $return = $query->result_array();
        return $return;
    }

    function get_sd_distributor_total_sale_without_d($super_distributor_id) {

        $return = array();

        $query = $this->db->query("SELECT sum(`grand_total`) as total_sale FROM `master_order` WHERE super_distributor_id ='$super_distributor_id' AND distributor_id IS NULL  AND `status`='delivered'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {


                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function get_sd_distributor_total_sale($super_distributor_id, $distributor_id) {

        $return = array();
        //  echo "SELECT sum(`grand_total`) as total_sale FROM `master_order` WHERE super_distributor_id ='$super_distributor_id' AND distributor_id  ='$distributor_id'  AND `status`='delivered'";
        $query = $this->db->query("SELECT sum(`grand_total`) as total_sale FROM `master_order` WHERE super_distributor_id ='$super_distributor_id' AND distributor_id  ='$distributor_id'  AND `status`='pending' ");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {


                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function get_master_sd_commission_month_wise($id) {

        $return = array();
        $current_month = date('m');
        $query = $this->db->query("SELECT * FROM `master_sd_commission` WHERE `sd_id` = '$id' AND MONTH(created_date) = '$current_month'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['sd_id'] = $row['sd_id'];
                $return['sale_by_distributor'] = $row['sale_by_distributor'];
                $return['sale_by_member'] = $row['sale_by_member'];
                $return['commission_percent'] = $row['commission_percent'];
                $return['commission_amount'] = $row['commission_amount'];
                $return['payment_type'] = $row['payment_type'];
                $return['commission_paid'] = $row['commission_paid'];
                $return['commission_to_be_paid'] = $row['commission_to_be_paid'];
                $return['created_date'] = $row['created_date'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }
    function get_history_master_sd_commission_month_wise($id,$order_id) {

        $return = array();
        $current_month = date('m');
        $query = $this->db->query("SELECT * FROM `master_sd_commission_history` WHERE `sd_id` = '$id' AND `order_id` = '$order_id' AND MONTH(created_date) = '$current_month'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['sd_id'] = $row['sd_id'];
                $return['order_id'] = $row['order_id'];
                $return['sale_by_distributor'] = $row['sale_by_distributor'];
                $return['sale_by_member'] = $row['sale_by_member'];
                $return['commission_percent'] = $row['commission_percent'];
                $return['commission_amount'] = $row['commission_amount'];
                $return['payment_type'] = $row['payment_type'];
                $return['commission_paid'] = $row['commission_paid'];
                $return['commission_to_be_paid'] = $row['commission_to_be_paid'];
                $return['created_date'] = $row['created_date'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function get_super_distributor_details_by_code($code) {

        $return = array();

        $query = $this->db->query("select * from super_distributor where code='$code'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['code'] = $row['code'];
                $return['name'] = $row['name'];
                $return['emailid'] = $row['emailid'];
                $return['mobileno'] = $row['mobileno'];
                $return['address'] = $row['address'];
                $return['gst_in'] = $row['gst_in'];
                $return['pancard'] = $row['pancard'];
                $return['aadhar_no'] = $row['aadhar_no'];
                $return['wholeseller_code'] = $row['wholeseller_code'];
                $return['super_distributor_referelcode'] = $row['super_distributor_referelcode'];
                $return['location'] = $row['location'];
                $return['status'] = $row['status'];
                $return['is_approved'] = $row['is_approved'];
            }
        }

        return ($return);
    }

    function get_master_sd_commission($id) {

        $return = array();
        // echo "SELECT * FROM `master_sd_commission` WHERE `id` = '$id' order by id desc";
        $query = $this->db->query("SELECT * FROM `master_sd_commission` WHERE `id` = '$id' order by id desc");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['sd_id'] = $row['sd_id'];
                $return['sale_by_distributor'] = $row['sale_by_distributor'];
                $return['sale_by_member'] = $row['sale_by_member'];
                $return['commission_percent'] = $row['commission_percent'];
                $return['commission_amount'] = $row['commission_amount'];
                $return['payment_type'] = $row['payment_type'];
                $return['commission_paid'] = $row['commission_paid'];
                $return['commission_to_be_paid'] = $row['commission_to_be_paid'];
                $return['created_date'] = $row['created_date'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function get_total_member_credits($id, $start_date, $end_date) {

        $return = array();
//       echo "SELECT mms.* , mo.order_date FROM `order_member_credit` as mms
//LEFT JOIN master_order AS mo ON mo.id = mms.order_id
//where mms.member_id='$id' AND mo.`order_date` BETWEEN '$start_date' AND '$end_date' order by mms.id desc limit 1";
        $query = $this->db->query("SELECT mms.* , mo.order_date,mo.status FROM `order_member_credit` as mms
LEFT JOIN master_order AS mo ON mo.id = mms.order_id
where mms.member_id='$id' AND mo.`order_date` BETWEEN '$start_date' AND '$end_date' AND mo.status ='delivered' order by mms.id desc limit 1");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['current_credit_balance'] = $row['current_credit_balance'];
                $return['use_credit'] = $row['use_credit'];
            }
        } ELSE {
            $return['use_credit'] = '0';
        }
        return $return;
    }

    function get_order_details_by_id_datewise($id, $start_date, $end_date) {
        $return = array();
        $query = $this->db->query("select * from master_order where member_id='$id' AND `order_date` BETWEEN '$start_date' AND '$end_date' AND status ='delivered'");
        $return = $query->result_array();
        return $return;
    }

    function get_loyalty_point_datewise($id, $start_date, $end_date) {
        $return = array();
//         echo "SELECT SUM(mlp.`loyalty_points`) as total_loyalty_points, SUM(mlp.`debit_loyalty_point`) as debit_loyalty_point FROM `member_loyalty_points` as mlp
//LEFT JOIN master_order AS mo ON mo.id = mlp.order_id
//where mlp.member_id='$id' AND mo.`order_date` BETWEEN '$start_date' AND '$end_date' AND mo.status ='delivered' order by mlp.id desc";
        $query = $this->db->query("SELECT SUM(mlp.`loyalty_points`) as total_loyalty_points, SUM(mlp.`debit_loyalty_point`) as debit_loyalty_point FROM `member_loyalty_points` as mlp
LEFT JOIN master_order AS mo ON mo.id = mlp.order_id
where mlp.member_id='$id' AND mo.`order_date` BETWEEN '$start_date' AND '$end_date' AND mo.status ='delivered' order by mlp.id desc");
        $return = $query->result_array();
        return $return;
    }

    function get_order_details_by_sd_d_id_datewise($sd_id, $d_id, $start_date, $end_date) {
        $return = array();
        $query = $this->db->query("select * from master_order where super_distributor_id='$sd_id' AND distributor_id='$d_id' AND `order_date` BETWEEN '$start_date' AND '$end_date' AND status ='delivered'");
        $return = $query->result_array();
        return $return;
    }

    function get_total_prod_qty($order_id) {

        $return = array();
        $query = $this->db->query("SELECT COUNT(id) as total_prod_count FROM `product_order_details` WHERE order_id ='$order_id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['total_prod_count'] = $row['total_prod_count'];
            }
            return $return;
        }
    }

    function get_order_details_by_did_datewise($d_id, $start_date, $end_date) {
        $return = array();
        //echo "select * from master_order where distributor_id='$d_id' AND `order_date` BETWEEN '$start_date' AND '$end_date' AND status ='delivered'";
        $query = $this->db->query("select * from master_order where distributor_id='$d_id' AND `order_date` BETWEEN '$start_date' AND '$end_date' AND status ='delivered'");
        $return = $query->result_array();
        return $return;
    }

    function get_members_count_under_distributor($d_id) {
        $return = array();

        $query = $this->db->query("SELECT COUNT(*) as members_count_under_distributor FROM `member` WHERE `distributor_id` ='$d_id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['members_count_under_distributor'] = $row['members_count_under_distributor'];
            }
            return $return;
        }
    }

    function get_order_details_with_distributor($d_id, $start_date, $end_date) {
        $return = array();
        //echo "SELECT SUM(`sub_total`) as total_mrp, SUM(grand_total) as purchase_amt, SUM(`member_discount`) as memberdiscount ,SUM(grand_total)*SUM(`member_discount`)/100 AS member_drscount_amt FROM `master_order` WHERE `distributor_id` ='$d_id' AND `order_date` BETWEEN '$start_date' AND '$end_date' AND status ='delivered'";
        $query = $this->db->query("SELECT SUM(`sub_total`) as total_mrp, SUM(grand_total) as purchase_amt, SUM(`member_discount`) as memberdiscount ,SUM(sub_total)*SUM(`member_discount`)/100 AS member_drscount_amt FROM `master_order` WHERE `distributor_id` ='$d_id' AND `order_date` BETWEEN '$start_date' AND '$end_date' AND status ='delivered'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['total_mrp'] = $row['total_mrp'];
                $return['purchase_amt'] = $row['purchase_amt'];
                $return['memberdiscount'] = $row['memberdiscount'];
                $return['member_drscount_amt'] = $row['member_drscount_amt'];
            }
            return $return;
        }
    }

    function get_total_prod_qty_with_distributor($d_id, $start_date, $end_date) {
        $return = array();
//echo "SELECT SUM(pod.`qty`) prod_qty FROM product_order_details as pod
//LEFT JOIN master_order as mo ON mo.id=pod.order_id
//WHERE mo.distributor_id = '$d_id' AND mo.order_date BETWEEN '$start_date' AND '$end_date' AND mo.status ='delivered'";
        $query = $this->db->query("SELECT SUM(pod.`qty`) prod_qty FROM product_order_details as pod
LEFT JOIN master_order as mo ON mo.id=pod.order_id
WHERE mo.distributor_id = '$d_id' AND mo.order_date BETWEEN '$start_date' AND '$end_date' AND mo.status ='delivered'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['prod_qty'] = $row['prod_qty'];
            }
            return $return;
        }
    }

    function get_total_member_credits_distributorwise($id, $start_date, $end_date) {

        $return = array();
        $date = date('Y-m-d');
//        echo "SELECT case when SUM(mmc.`current_credit_balance`) > SUM(mmc.`use_credit`) then `current_credit_balance` when SUM(mmc.`current_credit_balance`) <=  SUM(mmc.`use_credit`) then '0' else null end AS current_credit_balance FROM `master_member_credits` as mmc
//LEFT JOIN member as m ON m.id = mmc.member_id
//WHERE m.distributor_id = '$id' AND mmc.`expiry_date` >= '$date'";
        $query = $this->db->query("SELECT case when SUM(mmc.`current_credit_balance`) > SUM(mmc.`use_credit`) then `current_credit_balance` when SUM(mmc.`current_credit_balance`) <=  SUM(mmc.`use_credit`) then '0' else null end AS current_credit_balance FROM `master_member_credits` as mmc
LEFT JOIN member as m ON m.id = mmc.member_id
WHERE m.distributor_id = '$id' AND mmc.`expiry_date` >= '$date' AND mmc.expiry_date BETWEEN '$start_date' AND '$end_date'");

        if (count($query->result_array()) > 1) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['current_credit_balance'] = $row['current_credit_balance'];
                //$return['use_credit'] = $row['use_credit'];
            }
        } else {
//            echo "SELECT SUM(mc.`request_credit_amount`) as request_credit_amount FROM `member_credits` as mc
//LEFT JOIN member as m ON m.id = mc.member_id
//WHERE m.distributor_id='$id' AND mc.status='approved'";
            $query = $this->db->query("SELECT SUM(mc.`request_credit_amount`) as request_credit_amount FROM `member_credits` as mc
LEFT JOIN member as m ON m.id = mc.member_id
WHERE m.distributor_id='$id' AND mc.status='approved' AND mc.approved_date BETWEEN '$start_date' AND '$end_date'");
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {

                    $return['current_credit_balance'] = $row['request_credit_amount'];
                }
            }
        }
        return $return;
    }

    function get_topsellingproduct_list() {
        $return = array();
        $query = $this->db->query("
SELECT pod.product_id as id, SUM(pod.qty) as qty ,SUM(pod.product_price) AS product_price, SUM(pod.price) AS price
FROM product_order_details pod
INNER JOIN master_order mo ON mo.id=pod.order_id
INNER JOIN product_details pd ON pd.id=pod.product_id
WHERE month(mo.order_date) = '02'
GROUP BY pod.product_id
ORDER BY SUM(qty) DESC");

        if ($query->num_rows() > 0) {

            $return = $query->result_array();
        }
        return $return;
    }
     function sendmailafterorderplaced($master_orderid) {
        $data = $this->data;
        if ($master_orderid) {
            $get_order_details_by_id = $this->herbal_model->get_order_details_by_id($master_orderid);
            $orderno = $get_order_details_by_id['order_no'];
            $orderdate = date('d/m/Y', strtotime($get_order_details_by_id['order_date']));
           

            $config = Array(
                'protocol' => 'mail',
                'wordwrap' => FALSE,
                'charset' => 'utf-8',
                'crlf' => '\r\n',
                'newline' => '\r\n',
                'mailtype' => 'html'
            );
            //$message = $this->load->view('email/Account_creation_email_to_admin', $data, true);
            if($get_order_details_by_id['member_id']){
            $to_emailid = $get_order_details_by_id['member_emailid'];
            $message = $this->emailtemplate($get_order_details_by_id);
            $this->load->library('email', $config);
            $this->email->clear();
            $this->email->set_mailtype("html");
            $this->email->from(get_mail_settings()['from_emailid'], get_mail_settings()['from_name']);
            $this->email->reply_to(get_mail_settings()['to_emailid'], get_mail_settings()['from_name']);
            $this->email->to($to_emailid);
            $this->email->subject("Your Order is updated Successfully");
            $this->email->message($message);
            $this->email->send();
            }
            if($get_order_details_by_id['distributor_id']){
            $sd_emailid = $get_order_details_by_id['distributor_emailid'];
            $sd_message = $this->emailtemplate_to_sd($get_order_details_by_id);
            $this->load->library('email', $config);
            $this->email->clear();
            $this->email->set_mailtype("html");
            $this->email->from(get_mail_settings()['from_emailid'], get_mail_settings()['from_name']);
            $this->email->reply_to(get_mail_settings()['to_emailid'], get_mail_settings()['from_name']);
            $this->email->to($sd_emailid);
            $this->email->subject("Updated Order ".$orderno);
            $this->email->message($sd_message);
            $this->email->send();
            }
            if($get_order_details_by_id['super_distributor_id']){
           $d_emailid = $get_order_details_by_id['super_distributor_emailid'];
            $d_message = $this->emailtemplate_to_d($get_order_details_by_id);
             $this->load->library('email', $config);
            $this->email->clear();
            $this->email->set_mailtype("html");
            $this->email->from(get_mail_settings()['from_emailid'], get_mail_settings()['from_name']);
            $this->email->reply_to(get_mail_settings()['to_emailid'], get_mail_settings()['from_name']);
            $this->email->to($d_emailid);
             $this->email->subject("Updated Order ".$orderno);
            $this->email->message($d_message);
            $this->email->send();
            }
//            if($this->email->send()){
//   //Success email Sent
//   echo 'Success email Sent';
//}else{
//   //Email Failed To Send
//   echo $this->email->print_debugger();
//}
        }
    }
 
    function emailtemplate_to_sd($get_order_details_by_id) {

         $order_id = $get_order_details_by_id['id'];
        $orderno = $get_order_details_by_id['order_no'];
       $member = $get_order_details_by_id['member'];
       $sd_name = $get_order_details_by_id['super_distributor'];
        $get_products_in_order = $this->herbal_model->get_products_in_order($order_id);
        $template = '<html>
    <head></head>
    <body>
    <center>
        <table   cellspacing="0" cellpadding="10"   style="max-width:600px; border:1px solid #ccc; font-family:verdana; font-size:13px;">
            <tr>
                <td  style="text-align:center;font-weight:bold;">
                    <img src="http://hhwholesaleclub.com/admin/images/company/logo1511184997.png" style="width: 284.75px;height: 88px;">
                </td>
            </tr>

            <tr><td>
                    <p><strong style="font-size:15px;">Hi '.$sd_name.',</strong>
                        <br>
                    <b>'.$orderno.'</b> this order is updated successfully.
                </td></tr>

            <tr><td>
                    <table style="font-size:13px;">
                        <tr>
                            <td rowspan="2" >Seller: hhwholesaleclub.com</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            </tr>
                    </table>
                </td></tr>

<tr><td>
<table border="1" cellpadding="5" BORDERCOLOR="#ccc" cellspacing="0" style="width:100%; background:#fbfbfb; font-size:14px;">
<tr>
<td style="text-align:center;font-weight:bold;">Billing Address</td>
<td style="text-align:center;font-weight:bold;">Shipping Address</td>
<td style="text-align:center;font-weight:bold;">Payment Mode</td>
</tr>
<tr>
<td><address>
         ' . $get_order_details_by_id['get_member_details_by_id']['name'] . '<br>
            ' . $get_order_details_by_id['get_member_details_by_id']['address'] . '<br/>
            Phone: ' . $get_order_details_by_id['get_member_details_by_id']['mobileno'] . '<br>
            Email: ' . $get_order_details_by_id['get_member_details_by_id']['emailid'] . '
          </address></td>
<td> <address>
           ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_name'] . '<br>
           ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_address'] . '<br/>
            Phone: ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_contactno'] . '<br>
            Email: ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_emailid'] . '
          </address></td>
          <td tyle="text-align:center; font-weight:bold;">' . $get_order_details_by_id['payment_mode'] . '</td>
    </tr>
</table>

    </td></tr>
            <tr><td style="padding:0px;">
                    <table border="1" cellpadding="5" BORDERCOLOR="#ccc" cellspacing="0" style="width:100%; background:#fbfbfb; font-size:14px;">
<tr>
<td style="text-align:center;font-weight:bold;">Image</td>
<td style="text-align:center;font-weight:bold;">Product Name</td>
<td style="text-align:center;font-weight:bold;">Qty.</td>
<td style="text-align:center;font-weight:bold;">Unit Price</td>
<td style="text-align:center;font-weight:bold;">Total Price</td>
</tr>';
        if (!empty($get_products_in_order)) {

            foreach ($get_products_in_order as $row) {
                $qty = $row['qty'];
                $price = $row['price'];
                $product_price = $row['product_price'];
                $get_product_details_by_id = $this->herbal_model->get_product_details_by_id($row['product_id']);
                $template .= '<tr>

<td style="text-align:center;"><img src="' . $get_product_details_by_id['photo'] . '" width="70" height="60"></td>
<td style="text-align:center;">' . $get_product_details_by_id['name'] . '</td>
<td style="text-align:center;">' . $qty . '</td>
<td style="text-align:center;">Rs. ' . $product_price . '</td>
<td style="text-align:center;">Rs. ' . $price . '</td></tr>';
            }
        }
        $template .= '

<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Subtotal</td>
<td colspan="3" style="text-align:center;font-weight:bold;">Rs. ' . $get_order_details_by_id['sub_total'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Promo Code Discount(%)</td>
<td colspan="3" style="text-align:center;font-weight:bold;">' . $get_order_details_by_id['discount'] . '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Discount(%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['discount'] . '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Member Discount(%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['member_discount']. '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Loyalty Point Discount</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['loyalty_point_discount_value'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Member Refarral Discount (%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['member_referral_discount_value']. '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Delivery Charges</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['delivery_charges'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Grand Total</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['grand_total']. '</td>
</tr>


</table>
</td></tr>

    </td></tr>



<tr><td></td></tr>
<tr><td>
                    <p>You will be getting the tracking details in the next email. <br>
Please do not hesitate if you require further assistance.</p>
                </td></tr>
</table>

</center>


</body>
</html>';


        return $template;
    }
    function emailtemplate_to_d($get_order_details_by_id) {

        $order_id = $get_order_details_by_id['id'];
        $orderno = $get_order_details_by_id['order_no'];
       $member = $get_order_details_by_id['member'];
       $d_name = $get_order_details_by_id['distributor'];
        $get_products_in_order = $this->herbal_model->get_products_in_order($order_id);
        $template = '<html>
    <head></head>
    <body>
    <center>
        <table   cellspacing="0" cellpadding="10"   style="max-width:600px; border:1px solid #ccc; font-family:verdana; font-size:13px;">
            <tr>
                <td  style="text-align:center;font-weight:bold;">
                    <img src="http://hhwholesaleclub.com/admin/images/company/logo1511184997.png" style="width: 284.75px;height: 88px;">
                </td>
            </tr>

            <tr><td>
                    <p><strong style="font-size:15px;">Hi '.$d_name.',</strong>
                        <br>
                      <b>'.$orderno.'</b> this order is updated successfully.
                </td></tr>

            <tr><td>
                    <table style="font-size:13px;">
                        <tr>
                            <td rowspan="2" >Seller: hhwholesaleclub.com</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            </tr>
                    </table>
                </td></tr>

<tr><td>
<table border="1" cellpadding="5" BORDERCOLOR="#ccc" cellspacing="0" style="width:100%; background:#fbfbfb; font-size:14px;">
<tr>
<td style="text-align:center;font-weight:bold;">Billing Address</td>
<td style="text-align:center;font-weight:bold;">Shipping Address</td>
<td style="text-align:center;font-weight:bold;">Payment Mode</td>
</tr>
<tr>
<td><address>
         ' . $get_order_details_by_id['get_member_details_by_id']['name'] . '<br>
            ' . $get_order_details_by_id['get_member_details_by_id']['address'] . '<br/>
            Phone: ' . $get_order_details_by_id['get_member_details_by_id']['mobileno'] . '<br>
            Email: ' . $get_order_details_by_id['get_member_details_by_id']['emailid'] . '
          </address></td>
<td> <address>
           ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_name'] . '<br>
           ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_address'] . '<br/>
            Phone: ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_contactno'] . '<br>
            Email: ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_emailid'] . '
          </address></td>
          <td tyle="text-align:center; font-weight:bold;">' . $get_order_details_by_id['payment_mode'] . '</td>
    </tr>
</table>

    </td></tr>
            <tr><td style="padding:0px;">
                    <table border="1" cellpadding="5" BORDERCOLOR="#ccc" cellspacing="0" style="width:100%; background:#fbfbfb; font-size:14px;">
<tr>
<td style="text-align:center;font-weight:bold;">Image</td>
<td style="text-align:center;font-weight:bold;">Product Name</td>
<td style="text-align:center;font-weight:bold;">Qty.</td>
<td style="text-align:center;font-weight:bold;">Unit Price</td>
<td style="text-align:center;font-weight:bold;">Total Price</td>
</tr>';
        if (!empty($get_products_in_order)) {

            foreach ($get_products_in_order as $row) {
                $qty = $row['qty'];
                $price = $row['price'];
                $product_price = $row['product_price'];
                $get_product_details_by_id = $this->herbal_model->get_product_details_by_id($row['product_id']);
                $template .= '<tr>

<td style="text-align:center;"><img src="' . $get_product_details_by_id['photo'] . '" width="70" height="60"></td>
<td style="text-align:center;">' . $get_product_details_by_id['name'] . '</td>
<td style="text-align:center;">' . $qty . '</td>
<td style="text-align:center;">Rs. ' . $product_price . '</td>
<td style="text-align:center;">Rs. ' . $price . '</td></tr>';
            }
        }
        $template .= '

<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Subtotal</td>
<td colspan="3" style="text-align:center;font-weight:bold;">Rs. ' . $get_order_details_by_id['sub_total'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Promo Code Discount(%)</td>
<td colspan="3" style="text-align:center;font-weight:bold;">' . $get_order_details_by_id['discount'] . '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Discount(%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['discount'] . '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Member Discount(%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['member_discount']. '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Loyalty Point Discount</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['loyalty_point_discount_value'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Member Refarral Discount (%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['member_referral_discount_value']. '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Delivery Charges</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['delivery_charges'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Grand Total</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['grand_total']. '</td>
</tr>


</table>
</td></tr>

    </td></tr>



<tr><td></td></tr>
<tr><td>
                    <p>You will be getting the tracking details in the next email. <br>
Please do not hesitate if you require further assistance.</p>
                </td></tr>
</table>

</center>


</body>
</html>';


        return $template;
    }


    function get_new_order_count($member_id = null) {
        $return = '';
        if ($member_id) {
            $query = $this->db->query("SELECT count(*) as id from master_order where open='0' AND member_id='$member_id'");
        } else {
            $query = $this->db->query("SELECT count(*) as id from master_order where open='0'");
        }
        $return = $query->result_array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return = $row['id'];
            }
        }
        return $return;
    }

    function get_new_memberregister_count($d_id = null, $sd_id = null) {
        $return = '';
        if ($d_id) {
            $query = $this->db->query("SELECT count(*) as id from member where is_approved='0' AND distributor_id='$d_id'");
        } else if ($sd_id) {
            $query = $this->db->query("SELECT count(*) as id from member where is_approved='0' AND super_distributor_id='$sd_id'");
        } else {
            $query = $this->db->query("SELECT count(*) as id from member where is_approved='0'");
        }
        $return = $query->result_array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return = $row['id'];
            }
        }
        return $return;
    }

    function get_new_distributor_register_count($sd_code = null) {
        $return = '';
        if ($sd_code) {
            $query = $this->db->query("SELECT count(*) as id from distributor where is_approved='0' AND super_distributor_referelcode='$sd_code'");
        } else {
            $query = $this->db->query("SELECT count(*) as id from distributor where is_approved='0'");
        }
        $return = $query->result_array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return = $row['id'];
            }
        }
        return $return;
    }

    function get_new_superdistributor_register_count() {
        $return = '';

        $query = $this->db->query("SELECT count(*) as id from super_distributor where is_approved='0'");

        $return = $query->result_array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return = $row['id'];
            }
        }
        return $return;
    }

    function emailtemplate($get_order_details_by_id) {

        $order_id = $get_order_details_by_id['id'];
        $orderno = $get_order_details_by_id['order_no'];
        $get_products_in_order = $this->herbal_model->get_products_in_order($order_id);
        $template = '<html>
    <head></head>
    <body>
    <center>
          <table   cellspacing="0" cellpadding="10"   style="max-width:600px; border:1px solid #ccc; font-family:verdana; font-size:13px;">
            <tr>
                <td  style="text-align:center;font-weight:bold;">
                    <img src="http://hhwholesaleclub.com/admin/images/company/logo1511184997.png" style="width: 284.75px;height: 88px;">
                </td>
            </tr>

            <tr><td>
                    <p><strong style="font-size:15px;">Hi ,</strong>
                        <br>
                      Your order <b>'.$orderno.'</b> has been updated successfully. We thank you for buying from HH Wholesale Club. Please note that your order has being successfully processed.

                </td></tr>

            <tr><td>
                    <table style="font-size:13px;">
                        <tr>
                            <td rowspan="2" >Seller: hhwholesaleclub.com</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            </tr>
                    </table>
                </td></tr>

<tr><td>
<table border="1" cellpadding="5" BORDERCOLOR="#ccc" cellspacing="0" style="width:100%; background:#fbfbfb; font-size:14px;">
<tr>
<td style="text-align:center;font-weight:bold;">Billing Address</td>
<td style="text-align:center;font-weight:bold;">Shipping Address</td>
<td style="text-align:center;font-weight:bold;">Payment Mode</td>
</tr>
<tr>
<td><address>
         ' . $get_order_details_by_id['get_member_details_by_id']['name'] . '<br>
            ' . $get_order_details_by_id['get_member_details_by_id']['address'] . '<br/>
            Phone: ' . $get_order_details_by_id['get_member_details_by_id']['mobileno'] . '<br>
            Email: ' . $get_order_details_by_id['get_member_details_by_id']['emailid'] . '
          </address></td>
<td> <address>
           ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_name'] . '<br>
           ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_address'] . '<br/>
            Phone: ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_contactno'] . '<br>
            Email: ' . $get_order_details_by_id['get_shippingdetails_byid']['shipping_emailid'] . '
          </address></td>
          <td tyle="text-align:center; font-weight:bold;">' . $get_order_details_by_id['payment_mode'] . '</td>
    </tr>
</table>

    </td></tr>
            <tr><td style="padding:0px;">
                    <table border="1" cellpadding="5" BORDERCOLOR="#ccc" cellspacing="0" style="width:100%; background:#fbfbfb; font-size:14px;">
<tr>
<td style="text-align:center;font-weight:bold;">Image</td>
<td style="text-align:center;font-weight:bold;">Product Name</td>
<td style="text-align:center;font-weight:bold;">Qty.</td>
<td style="text-align:center;font-weight:bold;">Unit Price</td>
<td style="text-align:center;font-weight:bold;">Total Price</td>
</tr>';
        if (!empty($get_products_in_order)) {

            foreach ($get_products_in_order as $row) {
                $qty = $row['qty'];
                $price = $row['price'];
                $product_price = $row['product_price'];
                $get_product_details_by_id = $this->herbal_model->get_product_details_by_id($row['product_id']);
                $template .= '<tr>

<td style="text-align:center;"><img src="' . $get_product_details_by_id['photo'] . '" width="70" height="60"></td>
<td style="text-align:center;">' . $get_product_details_by_id['name'] . '</td>
<td style="text-align:center;">' . $qty . '</td>
<td style="text-align:center;">Rs. ' . $product_price . '</td>
<td style="text-align:center;">Rs. ' . $price . '</td></tr>';
            }
        }
        $template .= '

<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Subtotal</td>
<td colspan="3" style="text-align:center;font-weight:bold;">Rs. ' . $get_order_details_by_id['sub_total'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Promo Code Discount(%)</td>
<td colspan="3" style="text-align:center;font-weight:bold;">' . $get_order_details_by_id['discount'] . '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Discount(%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['discount'] . '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Member Discount(%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['member_discount'] . '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Loyalty Point Discount</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['loyalty_point_discount_value'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Member Refarral Discount (%)</td>
<td colspan="3" style="text-align:center; font-weight:bold;">' . $get_order_details_by_id['member_referral_discount_value'] . '%</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Delivery Charges</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['delivery_charges'] . '</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;font-weight:bold;">Grand Total</td>
<td colspan="3" style="text-align:center; font-weight:bold;">Rs. ' . $get_order_details_by_id['grand_total'] . '</td>
</tr>


</table>
</td></tr>

    </td></tr>

<tr><td></td></tr>
<tr><td>
                    <p>You will be getting the tracking details in the next email. <br>
Please do not hesitate if you require further assistance.</p>
                </td></tr>
</table>

</center>


</body>
</html>';


        return $template;
    }

    function get_total_distributor_commission_dashboard() {
        $return = array();
        if (isset($this->session->userdata['logged_in_herbal_panel'])) {
            $userid = $this->session->userdata['logged_in_herbal_panel']['userid'];

            $getdata = $this->db->query("SELECT *  FROM `master_d_commission` WHERE d_id='$userid' order by id desc");
        }
        if ($getdata->num_rows() > 0) {
            $i = 0;
            foreach ($getdata->result_array() as $rows) {
                $i++;
                $id = $rows['id'];
                $d_id = $rows['d_id'];
                //$code = $rows['code'];
                $get_distributor_details_by_id = $this->herbal_model->get_distributor_details_by_id($d_id);
                $distributor_id = $get_distributor_details_by_id['id'];
                $code = $get_distributor_details_by_id['code'];
                $order_id = $rows['order_id'];
                $get_order_details_by_id = $this->herbal_model->get_order_details_by_id($order_id);
                $order_no = $get_order_details_by_id['order_no'];
                $status = $rows['status'];

                if ($rows['commission_paid'] == '') {
                    $return['commission_paid'] += '0';
                } else {
                    $return['commission_paid'] += $rows['commission_paid'];
                }

                 $return['total_sale'] += $rows['total_sale'];
              
                    $distributor_commission_in_percent = $this->herbal_model->get_distributor_commission($distributor_id,  $return['total_sale']);
                    $return['commission_amount'] +=  $return['total_sale'] * $distributor_commission_in_percent / 100;
                
              
                    $return['commission_to_be_paid'] = $return['commission_amount'];
               
            }
//
        }

        return $return;
    }

    function get_total_superdistributor_commission_dashboard() {
        $return = array();
        if (isset($this->session->userdata['logged_in_herbal_panel'])) {
            $userid = $this->session->userdata['logged_in_herbal_panel']['userid'];

            $getdata = $this->db->query("SELECT *  FROM `master_sd_commission` WHERE sd_id='$userid' order by id desc");
        }
        if ($getdata->num_rows() > 0) {
            $i = 0;
            foreach ($getdata->result_array() as $rows) {
                $i++;
                $id = $rows['id'];
                $d_id = $rows['sd_id'];
                //$code = $rows['code'];
                $get_distributor_details_by_id = $this->herbal_model->get_distributor_details_by_id($d_id);
                $distributor_id = $get_distributor_details_by_id['id'];
                $code = $get_distributor_details_by_id['code'];
                $order_id = $rows['order_id'];
                $get_order_details_by_id = $this->herbal_model->get_order_details_by_id($order_id);
                $order_no = $get_order_details_by_id['order_no'];
                $status = $rows['status'];

                if ($rows['commission_paid'] == '') {
                    $return['commission_paid'] += '0';
                } else {
                    $return['commission_paid'] += $rows['commission_paid'];
                }

                $return['total_sale'] += $rows['total_sale'];
                if ($rows['commission_amount'] == '' || $rows['commission_amount'] == '0') {
                    $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($rows['sale_by_distributor']);
                    $commission_amount_by_d = $rows['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
                    $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($rows['sale_by_member']);
                    $commission_amount_by_member = $rows['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;

                    $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
                    $return['commission_amount'] += $commission_amount_by_d + $commission_amount_by_member;
                } else {
                    $return['commission_amount'] = $return['commission_amount'];
                }
                if ($rows['commission_to_be_paid'] == '' || $rows['commission_to_be_paid'] == '0') {
                    $return['commission_to_be_paid'] = $return['commission_amount'];
                } else {
                    $return['commission_to_be_paid'] += $rows['commission_to_be_paid'];
                }
            }
//
        }

        return $return;
    }

    function get_total_monthly_purchase($member_id = null, $start_date = null, $end_date = null) {

        $return = array();
        if ($member_id) {
//            $query = $this->db->query("SELECT count(*) as total_orders , SUM(`grand_total`) as total_sale FROM `master_order` WHERE member_id = '$member_id' AND `order_date` BETWEEN '$start_date' AND '$end_date'");
            $query = $this->db->query("SELECT count(*) as total_orders , SUM(`grand_total`) as total_sale FROM `master_order` WHERE member_id = '$member_id' and status !='cancelled'");
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['total_orders'] = $row['total_orders'];
                $return['total_sale'] = $row['total_sale'];
            }
            return $return;
        }
    }

    function get_total_available_member_credits($id) {

        $return = array();
        //echo "SELECT case when `current_credit_balance` > `use_credit` then `current_credit_balance` when `current_credit_balance` <=  `use_credit` then `current_credit_balance` else null end AS current_credit_balance, use_credit FROM `master_member_credits` WHERE `member_id` = '$id'";
        $query = $this->db->query("SELECT case when `current_credit_balance` > `use_credit` then `current_credit_balance` when `current_credit_balance` <=  `use_credit` then `current_credit_balance` else null end AS current_credit_balance, use_credit FROM `master_member_credits` WHERE `member_id` = '$id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['current_credit_balance'] = $row['current_credit_balance'];
                $return['use_credit'] = $row['use_credit'];
            }
        } else {
            $query = $this->db->query("SELECT `request_credit_amount` FROM `member_credits` WHERE `member_id` = '$id'");
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {

                    $return['current_credit_balance'] = $row['request_credit_amount'];
                }
            }
        }

        return $return;
    }

    function get_total_delivered_orders_chart($year, $member_id = null) {
        if ($member_id == '') {
            $query = $this->db->query("SELECT COUNT(*) as delivered_count,MONTH(order_date) as order_month
                                        FROM master_order 
                                        WHERE YEAR(order_date) = '$year' and status = 'delivered'
                                        GROUP BY MONTH(order_date)");
        } else {
            $query = $this->db->query("SELECT COUNT(*) as delivered_count,MONTH(order_date) as order_month
                                        FROM master_order 
                                        WHERE YEAR(order_date) = '$year' and status = 'delivered' AND member_id ='$member_id'
                                        GROUP BY MONTH(order_date)");
        }

        if ($query->num_rows() > 0) {
            $montharr = array();

            for ($i = 1; $i <= 12; $i++) {
                $montharr[$i] = 0;
            }

            foreach ($query->result_array() as $row) {
                $order_month = $row['order_month'];
                $delivered_count = $row['delivered_count'];
                $montharr[$order_month] = $delivered_count;
            }
        }
        return $montharr;
    }

    function get_total_pending_orders_chart($year, $member_id = null) {
        if ($member_id == '') {
            $query = $this->db->query("SELECT COUNT(*) as delivered_count,MONTH(order_date) as order_month
                                        FROM master_order 
                                        WHERE YEAR(order_date) = '$year' and status = 'pending'
                                        GROUP BY MONTH(order_date)");
        } else {
            $query = $this->db->query("SELECT COUNT(*) as delivered_count,MONTH(order_date) as order_month
                                        FROM master_order 
                                        WHERE YEAR(order_date) = '$year' and status = 'pending' AND member_id ='$member_id'
                                        GROUP BY MONTH(order_date)");
        }

        if ($query->num_rows() > 0) {

            $montharr = array();

            for ($i = 1; $i <= 12; $i++) {
                $montharr[$i] = 0;
            }

            foreach ($query->result_array() as $row) {
                $order_month = $row['order_month'];
                $delivered_count = $row['delivered_count'];
                $montharr[$order_month] = $delivered_count;
            }
        }
        return $montharr;
    }

    function get_total_cancelled_orders_chart($year, $member_id = null) {
        if ($member_id == '') {
            $query = $this->db->query("SELECT COUNT(*) as delivered_count,MONTH(order_date) as order_month
                                        FROM master_order 
                                        WHERE YEAR(order_date) = '$year' and status = 'cancelled'
                                        GROUP BY MONTH(order_date)");
        } else {
            $query = $this->db->query("SELECT COUNT(*) as delivered_count,MONTH(order_date) as order_month
                                        FROM master_order 
                                        WHERE YEAR(order_date) = '$year' and status = 'cancelled' AND member_id ='$member_id'
                                        GROUP BY MONTH(order_date)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $order_month = $row['order_month'];
                $delivered_count = $row['delivered_count'];
                $montharr[$order_month] = $delivered_count;
            }
        }
        //print_r($montharr);die;
        return $montharr;
    }

    function get_total_earning_loyaltypoints_chart($year, $member_id = null) {
        if ($member_id == '') {
            $query = $this->db->query("SELECT SUM(loyalty_points) as earning_loyalty_points ,SUM(debit_loyalty_point) as spending_loyalty_points ,MONTH(`created_date`) as month
                                        FROM member_loyalty_points 
                                        WHERE YEAR(created_date) = '$year' and `loyalty_points` IS NOT NULL
                                        GROUP BY MONTH(created_date)");
        } else {
            $query = $this->db->query("SELECT SUM(loyalty_points) as earning_loyalty_points ,SUM(debit_loyalty_point) as spending_loyalty_points ,MONTH(`created_date`) as month
                                        FROM member_loyalty_points 
                                        WHERE YEAR(created_date) = '$year' and `loyalty_points` IS NOT NULL and member_id='$member_id'
                                        GROUP BY MONTH(created_date)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];
                $earning_loyalty_points = $row['earning_loyalty_points'];
                $montharr[$month] = round($earning_loyalty_points,2);
            }
        }
        //print_r($montharr);die;
        return $montharr;
    }

    function get_total_spending_loyaltypoints_chart($year, $member_id = null) {
        if ($member_id == '') {
            $query = $this->db->query("SELECT (SUM(loyalty_points)) as earning_loyalty_points ,SUM(debit_loyalty_point) as spending_loyalty_points ,MONTH(`created_date`) as month
                                        FROM member_loyalty_points 
                                        WHERE YEAR(created_date) = '$year' and `debit_loyalty_point` IS NOT NULL
                                        GROUP BY MONTH(created_date)");
        } else {
            $query = $this->db->query("SELECT SUM(loyalty_points) as earning_loyalty_points ,SUM(debit_loyalty_point) as spending_loyalty_points ,MONTH(`created_date`) as month
                                        FROM member_loyalty_points 
                                        WHERE YEAR(created_date) = '$year' and `debit_loyalty_point` IS NOT NULL and member_id='$member_id'
                                        GROUP BY MONTH(created_date)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];
                $spending_loyalty_points = $row['spending_loyalty_points'];
                $montharr[$month] = round($spending_loyalty_points,2);
            }
        }
        //print_r($montharr);die;
        return $montharr;
    }

    function get_totalcommissionamount_sdcommission_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM((`sale_by_distributor`)) as sale_by_distributor,SUM((`sale_by_member`)) as sale_by_member ,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM((`sale_by_distributor`)) as sale_by_distributor,SUM((`sale_by_member`)) as sale_by_member ,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];

                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;

                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
                $commission_amount = $commission_amount_by_d + $commission_amount_by_member;


                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
                if ($row['commission_to_be_paid'] == '' || $row['commission_to_be_paid'] == '0') {
                    $commission_to_be_paid = $commission_amount - $commission_paid;
                } else {
                    $commission_to_be_paid = $commission_amount - $commission_paid;
                }
                $montharr[$month] = $commission_amount;
            }
        }
        return $montharr;
    }

    function get_totalcommissiontobepaid_sdcommission_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];

                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;

                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
                $commission_amount = $commission_amount_by_d + $commission_amount_by_member;


                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
                if ($row['commission_to_be_paid'] == '' || $row['commission_to_be_paid'] == '0') {
                    $commission_to_be_paid = $commission_amount;
                } else {
                    $commission_to_be_paid = $commission_amount - $commission_paid;
                }
                $montharr[$month] = $row['commission_to_be_paid'];
            }
        }
        return $montharr;
    }

    function get_totalcommissionpaid_sdcommission_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM((`sale_by_distributor`)) as sale_by_distributor,SUM((`sale_by_member`)) as sale_by_member ,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM((`sale_by_distributor`)) as sale_by_distributor,SUM((`sale_by_member`)) as sale_by_member ,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];

                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;

                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
                $commission_amount = $commission_amount_by_d + $commission_amount_by_member;


                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
                if ($row['commission_to_be_paid'] == '' || $row['commission_to_be_paid'] == '0') {
                    $commission_to_be_paid = $commission_amount - $commission_paid;
                } else {
                    $commission_to_be_paid = $commission_amount - $commission_paid;
                }
                $montharr[$month] = $commission_paid;
            }
        }

        return $montharr;
    }

    function get_totalcommissionamount_sdcommission_by_distributor_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM((`sale_by_distributor`)) as sale_by_distributor,SUM((`sale_by_member`)) as sale_by_member ,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM((`sale_by_distributor`)) as sale_by_distributor,SUM((`sale_by_member`)) as sale_by_member ,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];

                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
//                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
//                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;
//                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
//                 $commission_amount = $commission_amount_by_d + $commission_amount_by_member;
                $commission_amount = $commission_amount_by_d;



                $commission_to_be_paid = $commission_amount;


                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }

                $montharr[$month] = $commission_amount;
            }
        }

        return $montharr;
    }

    function get_totalcommissiontobepaid_sdcommission_by_distributor_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`)) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];


                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
//                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
//                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;
//                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
//                 $commission_amount = $commission_amount_by_d + $commission_amount_by_member;
                $commission_amount = $commission_amount_by_d;
                // $commission_to_be_paid = $commission_amount;

                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
                $commission_to_be_paid = $commission_amount - $row['commission_paid'];
                $montharr[$month] = $commission_to_be_paid;
            }
        }
        return $montharr;
    }

    function get_totalcommissionpaid_sdcommission_by_distributor_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];


                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
//                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
//                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;
//                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
//                 $commission_amount = $commission_amount_by_d + $commission_amount_by_member;
                $commission_amount = $commission_amount_by_d;

                //    $commission_to_be_paid = $commission_amount;

                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
                $commission_to_be_paid = $commission_amount - $row['commission_paid'];
                $montharr[$month] = $commission_paid;
            }
        }

        return $montharr;
    }

    function get_totalcommissionamount_sdcommission_by_members_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];

//                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
//                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;

//                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
//                 $commission_amount = $commission_amount_by_d + $commission_amount_by_member;
                $commission_amount = $commission_amount_by_member;

                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
                if ($commission_amount != '0') {
                    $commission_to_be_paid = $commission_amount - $row['commission_paid'];
                } else {
                    $commission_to_be_paid = '0';
                }
                $montharr[$month] = $commission_amount;
            }
        }

        return $montharr;
    }

    function get_totalcommissiontobepaid_sdcommission_by_members_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];



//                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
//                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;

//                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
//                 $commission_amount = $commission_amount_by_d + $commission_amount_by_member;
                $commission_amount = $commission_amount_by_member;
                //$commission_to_be_paid = $commission_amount;

                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
                if ($commission_amount != '0') {
                    $commission_to_be_paid = $commission_amount - $row['commission_paid'];
                } else {
                    $commission_to_be_paid = '0';
                }

                $montharr[$month] = $commission_to_be_paid;
            }
        }
        return $montharr;
    }

    function get_totalcommissionpaid_sdcommission_by_members_chart($year, $sd_id = null) {
        if ($sd_id == '') {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`sale_by_distributor`) as sale_by_distributor,SUM(`sale_by_member`) as sale_by_member ,SUM(`commission_paid`) as commission_paid ,SUM(`commission_to_be_paid`) as commission_to_be_paid ,MONTH(`created_date`) as month
                                        FROM master_sd_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND sd_id = '$sd_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];


//                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
//                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;

//                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
//                 $commission_amount = $commission_amount_by_d + $commission_amount_by_member;
                $commission_amount = $commission_amount_by_member;

                //$commission_to_be_paid = $commission_amount;

                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
                if ($commission_amount != '0') {
                    $commission_to_be_paid = $commission_amount - $row['commission_paid'];
                } else {
                    $commission_to_be_paid = '0';
                }
                $montharr[$month] = $commission_paid;
            }
        }

        return $montharr;
    }

    function get_totalcommissionamount_dcommission_chart($year, $d_id = null) {
        if ($d_id == '') {
            $query = $this->db->query("SELECT SUM(`total_sale`) as total_sale,MONTH(`created_date`) as month,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid
                                        FROM master_d_commission
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`total_sale`) as total_sale,MONTH(`created_date`) as month,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid
                                        FROM master_d_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND d_id = '$d_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];
                $total_sale = $row['total_sale'];

                $distributor_commission_in_percent = $this->herbal_model->get_distributor_commission($d_id, $total_sale);
                $commission_amount = $total_sale * $distributor_commission_in_percent / 100;


                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
//                if ($row['commission_to_be_paid'] == '' || $row['commission_to_be_paid'] == '0') {
//                    $commission_to_be_paid = $commission_amount - $commission_paid;
//                } else {
                $commission_to_be_paid = $commission_amount - $commission_paid;
                //}
                $montharr[$month] = $commission_amount;
            }
        }

        return $montharr;
    }

    function get_totalcommissiontobepaid_dcommission_chart($year, $d_id = null) {
        if ($d_id == '') {

            $query = $this->db->query("SELECT SUM(`total_sale`) as total_sale,MONTH(`created_date`) as month,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid
                                        FROM master_d_commission
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {

            $query = $this->db->query("SELECT SUM(`total_sale`) as total_sale,MONTH(`created_date`) as month,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid
                                        FROM master_d_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND d_id = '$d_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];
                $total_sale = $row['total_sale'];


//                $sd_commission_in_by_d_in_percent = $this->herbal_model->get_super_distributor_commission_with_d($row['sale_by_distributor']);
//                $commission_amount_by_d = $row['sale_by_distributor'] * $sd_commission_in_by_d_in_percent / 100;
//                $sd_commission_in_by_member_in_percent = $this->herbal_model->get_super_distributor_commission_with_member($row['sale_by_member']);
//                $commission_amount_by_member = $row['sale_by_member'] * $sd_commission_in_by_member_in_percent / 100;
//
//                $commission_percent = $sd_commission_in_by_d_in_percent + $sd_commission_in_by_member_in_percent;
//                 $commission_amount = $commission_amount_by_d + $commission_amount_by_member;
                $distributor_commission_in_percent = $this->herbal_model->get_distributor_commission($d_id, $total_sale);

                $commission_amount = $total_sale * $distributor_commission_in_percent / 100;


                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
//                if ($row['commission_to_be_paid'] == '' || $row['commission_to_be_paid'] == '0') {
//                    $commission_to_be_paid = $commission_amount - $commission_paid;
//                } else {
                $commission_to_be_paid = $commission_amount - $commission_paid;
                // }

                $montharr[$month] = $commission_to_be_paid;
            }
        }
        return $montharr;
    }

    function get_totalcommissionpaid_dcommission_chart($year, $d_id = null) {
        if ($d_id == '') {
            $query = $this->db->query("SELECT SUM(`total_sale`) as total_sale,MONTH(`created_date`) as month,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid
                                        FROM master_d_commission
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`total_sale`) as total_sale,MONTH(`created_date`) as month,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid
                                        FROM master_d_commission 
                                        WHERE YEAR(`created_date`) = '$year' AND d_id = '$d_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $month = $row['month'];
                $total_sale = $row['total_sale'];

                $distributor_commission_in_percent = $this->herbal_model->get_distributor_commission($d_id, $total_sale);
                $commission_amount = $total_sale * $distributor_commission_in_percent / 100;

                if ($row['commission_paid'] == '') {
                    $commission_paid = '0';
                } else {
                    $commission_paid = $row['commission_paid'];
                }
//                if ($row['commission_to_be_paid'] == '' || $row['commission_to_be_paid'] == '0') {
//                    $commission_to_be_paid = $commission_amount - $commission_paid;
//                } else {
                $commission_to_be_paid = $commission_amount - $commission_paid;
                //}


                $montharr[$month] = $commission_paid;
            }
        }

        return $montharr;
    }

    function get_total_purchase_orders_chart($year, $member_id = null) {
        if ($member_id == '') {
            $query = $this->db->query("SELECT SUM(`total_sale`) as total_sale,MONTH(`created_date`) as month,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid
                                        FROM master_d_commission
                                        WHERE YEAR(`created_date`) = '$year'
                                        GROUP BY MONTH(`created_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`total_sale`) as total_sale,MONTH(`created_date`) as month,SUM((`commission_paid`)) as commission_paid ,SUM((`commission_to_be_paid`)) as commission_to_be_paid
                                        FROM master_d_commission
                                        WHERE YEAR(`created_date`) = '$year' AND d_id = '$d_id'
                                        GROUP BY MONTH(`created_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $order_month = $row['order_month'];
                $total_purchase = $row['total_purchase'];
                $montharr[$order_month] = $total_purchase;
            }
        }
        //print_r($montharr);die;
        return $montharr;
    }
    function get_total_purchase_member_orders_chart($year, $member_id = null) {
        if ($member_id == '') {
            $query = $this->db->query("SELECT SUM(`grand_total`) as total_sale,MONTH(`order_date`) as order_month 
                                        FROM master_order
                                        WHERE YEAR(`order_date`) = '$year' and status !='cancelled'
                                        GROUP BY MONTH(`order_date`)");
        } else {
            $query = $this->db->query("SELECT SUM(`grand_total`) as total_sale,MONTH(`order_date`) as order_month 
                                        FROM master_order
                                        WHERE YEAR(`order_date`) = '$year' and member_id =$member_id and status !='cancelled'
                                        GROUP BY MONTH(`order_date`)");
        }
        $montharr = array();

        for ($i = 1; $i <= 12; $i++) {
            $montharr[$i] = 0;
        }

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $order_month = $row['order_month'];
                $total_purchase = $row['total_sale'];
                $montharr[$order_month] = $total_purchase;
            }
        }
        
        return $montharr;
    }

    function get_member_wise_product($product_id, $start_date, $end_date) {
        $return = array();
        //echo "select * from master_order where distributor_id='$d_id' AND `order_date` BETWEEN '$start_date' AND '$end_date' AND status ='delivered'";
        $query = $this->db->query("SELECT DISTINCT(mo.member_id) as member_id FROM master_order as mo
INNER JOIN product_order_details as pod ON pod.order_id= mo.id
WHERE pod.product_id ='$product_id' AND mo.order_date BETWEEN '$start_date' AND '$end_date'");
        $return = $query->result_array();
        return $return;
    }

    function get_members_dropdown($member_id = null) {

        if ($member_id != '') {
            $query = $this->db->query("select * from member WHERE status= 1 AND id='$member_id' order by name asc");
        } else {
            $return[''] = 'Select';
            $query = $this->db->query("select * from member WHERE status= 1 order by name asc");
        }
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'] . ' (' . $row['mobileno'] . ')';
        }
        return $return;
    }

    function get_city_dropdown() {

        $return[''] = 'Select';
        $query = $this->db->query("select * from city order by name asc");

        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_state_dropdown() {

        $return[''] = 'Select';
        $query = $this->db->query("select * from state order by name asc");

        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_product_dropdown() {

        $return[''] = 'Select';
        $query = $this->db->query("select * from product_detail order by id asc");

        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['SKU'];
        }
        return $return;
    }

    function get_navigations_by_herbal_actor_id($herbal_actor_id) {
        $return = array();
        // echo "select * from navigation_access where herbal_actor_id='$herbal_actor_id' order by id asc";
        $query = $this->db->query("select * from navigation_access where herbal_actor_id='$herbal_actor_id' order by id asc");
        if ($query->num_rows() > 0) {
            $return = $query->result_array();
        }
        return $return;
    }

    function checkforsubparentnavigationsaccess($herbal_actor_id, $sub_parent_main_id) {
        $query = $this->db->query("select * from navigation_access where herbal_actor_id='$herbal_actor_id' and navigation_id='$sub_parent_main_id'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkforsubnavigations($navigation_id, $herbal_actor_id) {

        $query = $this->db->query("select * from navigation_access where navigation_id='$navigation_id' and herbal_actor_id='$herbal_actor_id'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkforsubnavigationsinherbaldb($navigation_id, $herbal_actor_id) {

        $query = $this->db->query("select * from navigation_access where navigation_id='$navigation_id' and herbal_actor_id='$herbal_actor_id'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkforaccess($herbal_actor_id = NULL, $methodname) {
        $return = array();
        $default_database = $this->db->database;
        if ($herbal_actor_id != '') {
//           echo "select na.* from navigation_access na
//inner join " . $default_database . ".navigations n on n.id=na.navigation_id
//where na.herbal_actor_id='$herbal_actor_id' and n.alternateurl like '%$methodname%'";die;
            $query = $this->db->query("select na.* from navigation_access na
inner join " . $default_database . ".navigations n on n.id=na.navigation_id
where na.herbal_actor_id='$herbal_actor_id' and n.alternateurl like '%$methodname%'");
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $actions = $row['actions'];
                    //add
                    if (strpos($actions, '1') !== false) {
                        $return['add_access'] = true;
                    }
                    //edit
                    if (strpos($actions, '2') !== false) {
                        $return['edit_access'] = true;
                    }
                    //delete
                    if (strpos($actions, '3') !== false) {
                        $return['delete_access'] = true;
                    }
                    //view
                    if (strpos($actions, '4') !== false) {
                        $return['view_access'] = true;
                    }
                    //view All
                    if (strpos($actions, '5') !== false) {
                        $return['viewall_access'] = true;
                    }
                    //csvupload All
                    if (strpos($actions, '6') !== false) {
                        $return['csvupload_access'] = true;
                    }
                    //csvexport All
                    if (strpos($actions, '7') !== false) {
                        $return['csvexport_access'] = true;
                    }
                }
            }
        } else {
            $return['add_access'] = true;
            $return['edit_access'] = true;
            $return['delete_access'] = true;
            $return['view_access'] = true;
            $return['viewall_access'] = true;
            $return['csvupload_access'] = true;
            $return['csvexport_access'] = true;
        }
        return $return;
    }

    function checkforsubparentnavigations($parent_id, $navigation_id) {

        $query = $this->db->query("select * from navigations where parent_id='$parent_id' and sub_parent_id='$navigation_id' and sub_parent_id != 0 order by sort");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function get_user_access_actions($herbal_actor_id, $navigation_id) {
        $return = '';

        $query = $this->db->query("select * from navigation_access where herbal_actor_id='$herbal_actor_id' and navigation_id='$navigation_id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return = $row['actions'];
            }
        }

        return ($return);
    }

    function get_herbal_actors_dropdown() {
        $return[''] = 'Select';

        $query = $this->db->query("select * from herbal_actors where status=1 order by name asc");
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

   

    function get_herbal_actors_grid() {
        $return = array();
        $query = $this->db->query("select * from herbal_actors order by id desc");
        if ($query->num_rows() > 0) {
            $return = $query->result_array();
        }
        return $return;
    }

    function get_user_details_by_employee_id($id) {

        $return = array();

        $query = $this->db->query("select * from user where employee_id='$id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['employee_id'] = $row['employee_id'];
                $return['username'] = $row['username'];
                $return['password'] = $row['password'];
                $return['forget_password'] = $row['forget_password'];
                $return['usertype'] = $row['usertype'];
                $return['status'] = $row['status'];
            }
        }

        return ($return);
    }

    function get_employee_grid() {
        $return = array();
        $query = $this->db->query("select * from employee order by id desc");
        if ($query->num_rows() > 0) {
            $return = $query->result_array();
        }
        return $return;
    }

    function checkduplicatenotificationemail($name) {
        $query = $this->db->query("select * from notification_email where lower(name)=lower('$name')");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_notificationemail_dropdown() {
        $return[''] = 'Select';
        $this->db->order_by("name", "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('notification_email');
        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }

    function get_master_d_commission_voucher($id) {

//        $return = array();
//        $query = $this->db->query("SELECT SUM(`commission_amount`) - SUM(`commission_paid`) as outstanding_amount FROM `master_d_commission` WHERE `d_id` = '$id'");
//        if ($query->num_rows() > 0) {
//            foreach ($query->result_array() as $row) {
//
//                $return['outstanding_amount'] = $row['outstanding_amount'];
//        }
//        return $return;
        $return = array();
        $query = $this->db->query("SELECT * FROM `master_d_commission` WHERE `d_id` = '$id' and status IS NULL order by id desc");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['d_id'] = $row['d_id'];
                $return['commission_percent'] = $row['commission_percent'];
                $return['commission_amount'] = $row['commission_amount'];
                $return['payment_type'] = $row['payment_type'];
                $return['commission_paid'] = $row['commission_paid'];
                $return['commission_to_be_paid'] = $row['commission_to_be_paid'];
                $return['created_date'] = $row['created_date'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function get_master_sd_commission_voucher($id) {

        $return = array();
        $query = $this->db->query("SELECT * FROM `master_sd_commission` WHERE `sd_id` = '$id' and status IS NULL order by id desc");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $return['id'] = $row['id'];
                $return['sd_id'] = $row['sd_id'];
                $return['sale_by_distributor'] = $row['sale_by_distributor'];
                $return['sale_by_member'] = $row['sale_by_member'];
                $return['commission_percent'] = $row['commission_percent'];
                $return['commission_amount'] = $row['commission_amount'];
                $return['payment_type'] = $row['payment_type'];
                $return['commission_paid'] = $row['commission_paid'];
                $return['commission_to_be_paid'] = $row['commission_to_be_paid'];
                $return['created_date'] = $row['created_date'];
                $return['total_sale'] = $row['total_sale'];
            }
        }
        return $return;
    }

    function get_member_discount($member_id, $carttotalamount) {

        $get_member_details_by_id = $this->herbal_model->get_member_details_by_id($member_id);
        $distributor_id = $get_member_details_by_id['distributor_id'];
        $super_distributor_id = $get_member_details_by_id['super_distributor_id'];

        $member_discount = $get_member_details_by_id['discount'];

        if ($distributor_id == '' && $super_distributor_id == '') {

            $member_discount_arr = $this->herbal_model->get_member_discount_details_without_dist_sd();
            foreach ($member_discount_arr as $row) {

                if ($carttotalamount >= $row['without_dist_sd_purchase_amount']) {
                    if ($member_discount == '' || $member_discount == 0) {
                        $cartdiscount = $row['without_dist_sd_purchase_discount'];
                    } else {
                        $cartdiscount = $member_discount;
                    }
                }
            }
        } else {
            $member_discount_arr = $this->herbal_model->get_member_discount_details_with_dist_sd();
            foreach ($member_discount_arr as $row) {

                if ($carttotalamount >= $row['with_dist_purchase_amount']) {
                    if ($member_discount == '' || $member_discount == 0) {
                        $cartdiscount = $row['with_dist_purchase_discount'];
                    } else {
                        $cartdiscount = $member_discount;
                    }
                }
            }
        }

        return $cartdiscount;
    }

    function get_member_discount_details_without_dist_sd() {

        $return = array();

        $query = $this->db->query("select without_dist_sd_purchase_amount,without_dist_sd_purchase_discount from member_discount  order by `without_dist_sd_purchase_amount` asc");
        $return = $query->result_array();
        return $return;
    }

    function get_member_discount_details_with_dist_sd() {

        $return = array();

        $query = $this->db->query("select with_dist_purchase_amount,with_dist_purchase_discount from member_discount order by `with_dist_purchase_amount` asc");
        $return = $query->result_array();
        return $return;
    }

    function get_sd_members_credit_dropdown($sd_id) {


        $return[''] = 'Select';
        $query = $this->db->query("select * from member WHERE super_distributor_id='$sd_id' and status= 1 and credit_status='0' order by name asc");

        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'] . ' (' . $row['mobileno'] . ')';
        }
        return $return;
    }

    function get_d_members_credit_dropdown($d_id) {


        $return[''] = 'Select';
        $query = $this->db->query("select * from member WHERE distributor_id='$d_id' and status= 1 and credit_status='0' order by name asc");

        foreach ($query->result_array() as $row) {
            $return[$row['id']] = $row['name'] . ' (' . $row['mobileno'] . ')';
        }
        return $return;
    }

    function refferal_template($url, $name) {

        $template = '<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>
Hello, </p><p>
Welcome to HH Wholesale Club.<br>
You are being referred by <b>' . ucwords($name) . '</b> to become a member of HH Wholesale Club.<br>
Here are the members benefit below:-<br>

<table>
<tr><td>Member Benefits</td><td>	Without Distributor code </td></tr>
	<tr><td>System Generated</td><td>	Code from Distributor</td></tr>
<tr><td>Doctor / Clinic / Retail Store</td><td>	Mim. Buy 5000 - 25%	Mim.</td></tr>
<tr><td></td><td>	 + 10000/- 30%	</td></tr>
<tr><td></td><td>	 + 15000/  - 35%	</td></tr>
<tr><td></td><td>	 + 25000/- 40%	</td></tr>
<tr><td></td><td>	 + 35000/- 45%	</td></tr>
		 
<tr><td>Loyalty Points	Earning Points	Earning Points
<tr><td></td><td>	Earn 1 pt. for Rs.100 purchase</td><td>	Earn 1 pt. for Rs.100 purchase</td></tr>
		
<tr><td></td><td>	Validity </td><td>	Validity </td></tr>
<tr><td></td><td>	2 yrs. From points earned </td><td> 	2 yrs. From points earned  </td></tr>
		
<tr><td></td><td>	Using Points</td><td>	Using Points</td></tr>
<tr><td></td><td>	Min. 25 points can be used	</td><td>Min. 25 points can be used</td></tr>
</table>
</p><p>
To become a Member <a href="' . $url . '">CLICK HERE</a>

</p><p>
Best Regards,<br>

_________      

</p>
 
</body>
</html>';


        return $template;
    }
    function refferal_member_with_sd_template($url, $name) {

        $template = '<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>
Hello, </p><p>
Welcome to HH Wholesale Club.<br>
You are being referred by <b>' . ucwords($name) . '</b> to become a member of HH Wholesale Club.<br>
Here are the members benefit below:-<br>

<table>
<tr><td>Member Benefits</td><td>	With Super Distributor code</td></tr>
	<tr><td>System Generated</td><td>Wholesale Discount		</td></tr>
<tr><td>Doctor / Clinic / Retail Store</td><td> Buy 5000 - 27.5%</td></tr>
<tr><td></td><td> + 10000/- 32.5%</td></tr>
<tr><td></td><td> + 15000/  - 37.5%</td></tr>
<tr><td></td><td> + 25000/- 42.5%</td></tr>
<tr><td></td><td> + 35000/- 47.5%</td></tr>
		 
<tr><td>Loyalty Points	Earning Points	Earning Points
<tr><td></td><td>	Earn 1 pt. for Rs.100 purchase</td><td>	Earn 1 pt. for Rs.100 purchase</td></tr>
		
<tr><td></td><td>	Validity </td><td>	Validity </td></tr>
<tr><td></td><td>	2 yrs. From points earned </td><td> 	2 yrs. From points earned  </td></tr>
		
<tr><td></td><td>	Using Points</td><td>	Using Points</td></tr>
<tr><td></td><td>	Min. 25 points can be used	</td><td>Min. 25 points can be used</td></tr>
</table>
</p><p>
To become a Member <a href="' . $url . '">CLICK HERE</a>

</p><p>
Best Regards,<br>

_________      

</p>
 
</body>
</html>';


        return $template;
    }
    function refferal_member_with_d_template($url, $name) {

        $template = '<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>
Hello, </p><p>
Welcome to HH Wholesale Club.<br>
You are being referred by <b>' . ucwords($name) . '</b> to become a member of HH Wholesale Club.<br>
Here are the members benefit below:-<br>

<table>
<tr><td>Member Benefits</td><td>	With Distributor code</td></tr>
	<tr><td>System Generated</td><td>Wholesale Discount		</td></tr>
<tr><td>Doctor / Clinic / Retail Store</td><td> Buy 5000 - 27.5%</td></tr>
<tr><td></td><td> + 10000/- 32.5%</td></tr>
<tr><td></td><td> + 15000/  - 37.5%</td></tr>
<tr><td></td><td> + 25000/- 42.5%</td></tr>
<tr><td></td><td> + 35000/- 47.5%</td></tr>
		 
<tr><td>Loyalty Points	Earning Points	Earning Points
<tr><td></td><td>	Earn 1 pt. for Rs.100 purchase</td><td>	Earn 1 pt. for Rs.100 purchase</td></tr>
		
<tr><td></td><td>	Validity </td><td>	Validity </td></tr>
<tr><td></td><td>	2 yrs. From points earned </td><td> 	2 yrs. From points earned  </td></tr>
		
<tr><td></td><td>	Using Points</td><td>	Using Points</td></tr>
<tr><td></td><td>	Min. 25 points can be used	</td><td>Min. 25 points can be used</td></tr>
</table>
</p><p>
To become a Member <a href="' . $url . '">CLICK HERE</a>

</p><p>
Best Regards,<br>

_________      

</p>
 
</body>
</html>';


        return $template;
    }

    function refferal_sd_template($url, $name) {

        $template = '<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>
Hello, </p>
<p>
Welcome to HH Wholesale Club.<br>
You are being referred by <b>' . ucwords($name) . '</b> to become a Super Distributor of HH Wholesale Club.<br>

To become a Super Distributor <a href=' . $url . '>CLICK HERE</a>
</p><p>
Best Regards,<br>
Team Herbalhills  

</p>
 
</body>
</html>';

        return $template;
    }

    function refferal_d_template($url, $name) {

        $template = '<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>
Hello, </p>
<p>
Welcome to HH Wholesale Club.<br>
You are being referred by <b>' . ucwords($name) . '</b> to become a Distributor of HH Wholesale Club.<br>

To become a Distributor <a href=' . $url . '>CLICK HERE</a>
</p><p>
Best Regards,<br>
Team Herbalhills  

</p>
 
</body>
</html>';

        return $template;
    }

    function member_credit_request_template($member_name, $get_distributor_details_by_id) {

        $template = '<html>
<head>
<title>Credit Activation</title>
</head>
<body>
<p>
Hello ' . ucwords($member_name) . ', </p>
<p>
Your Credit activation request has been sent successfully by ' . $get_distributor_details_by_id['name'] . '. <br>
Your Credit facility will Activate soon.
</p><p>
Best Regards,<br>
Team Herbalhills  

</p>
 
</body>
</html>';

        return $template;
    }

    function member_credit_request_approve_template($get_member_details_by_id, $arr_post_data) {
        if ($get_member_details_by_id['distributor_id'] != '') {
            $membership_section = 'Distributor';
        }
        if ($get_member_details_by_id['super_distributor_id'] != '') {
            $membership_section = 'Super Distributor';
        }
        $template = '<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>
Dear ' . ucwords($get_member_details_by_id['name']) . ', </p>
</p><p>
<table>

<tr><td>Membership Section</td><td>	' . $membership_section . '</td></tr>
<tr><td>Credit Limit</td><td>	Rs. ' . $arr_post_data['request_credit_amount'] . '</td></tr>
<tr><td>No. of Days</td><td>	' . $arr_post_data['no_of_days'] . '</td></tr>
 
</p><p>

Please be informed that your credit facility is approved and wish you the Best Luck for the future. Please do not hesitate if you require further assistance.

Thanks,<br>
Yours sincerely,<br>
Team Herbalhills.


</p>
 
</body>
</html>';

        return $template;
    }

    function send_member_tracking_template($get_order_details_by_id) {
        $member_id = $get_order_details_by_id['member_id'];
        $get_member_details_by_id = $this->herbal_model->get_member_details_by_id($member_id);
        $track_url = "https://track.aftership.com/" . $get_order_details_by_id['tracking_id'];
        $template = '
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>
Hello ' . ucwords($get_member_details_by_id['name']) . ', </p><p>
Please find the tracking details below:-<br>
Tracking No:- ' . $get_order_details_by_id['tracking_id'] . '<br>
Transporter:-<br>
Date:-<br>
You can also click on the link below to track your order and be updated for the same.<a href="' . $track_url . '">CLICK HERE</a>
</p><p>

</p><p>
Thanks,<br>
__________

</p>
 
</body>
</html>';

        return $template;
    }
   function welcome_direct_member_template($name) {

        $template = '<html>
<head>
<title>Welcome Member | Hhwholedaleclub.com</title>
</head>
<body>
<p>
Dear ' . ucwords($name) . ', ,<br>
Warm Greetings from HH Wholesale Club!!!<br>
Thank you so much for becoming a member of HH Wholesale Club! We’re thrilled to have you on board and can’t wait to get to know you.<br>
Your membership reflects your commitment to the promotion of excellence in Herbal Hills Products. We also warmly welcome you as a member of the [Member/Distributors/Super Distributors] Section. In addition, we want to make sure you’re taking full advantage of all the membership benefits available:-
</p><p>
<table>
<tr><td>Member Benefits</td><td>	 </td></tr>
	
<tr><td>Loyalty Points	Earning Points	Earning Points
<tr><td></td><td>	Earn 1 pt. for Rs.100 purchase</td></tr>
		
<tr><td></td><td>	Validity </td></tr>
<tr><td></td><td> 	2 yrs. From points earned  </td></tr>
		
<tr><td></td><td>	Using Points</td></tr>
<tr><td></td><td>Min. 25 points can be used</td></tr>
</table>
</p>
<p>
We HH Wholesale Club once again like to thank you & would like to have a long term relation with you.</p><p>
Your sincerely,<br>

Team Herbalhills.
</p>
 
</body>
</html>';


        return $template;
    }
    function welcome_member_under_distributor_template($name) {

        $template = '<html>
<head>
<title>Welcome Member | Hhwholedaleclub.com</title>
</head>
<body>
<p>
Dear ' . ucwords($name) . ', ,<br>
Warm Greetings from HH Wholesale Club!!!<br>
Thank you so much for becoming a member of HH Wholesale Club! We’re thrilled to have you on board and can’t wait to get to know you.<br>
Your membership reflects your commitment to the promotion of excellence in Herbal Hills Products. We also warmly welcome you as a member of the [Member/Distributors/Super Distributors] Section. In addition, we want to make sure you’re taking full advantage of all the membership benefits available:-
</p><p>
<table>
<tr><td>Member Benefits</td><td>	With Distributor </td></tr>
	<tr><td>System Generated</td><td>Wholesale Discount		</td></tr>
        <tr><td>Doctor / Clinic / Retail Store Buy</td><td></td>';
        $getdata = $this->db->query("select * from member_discount order by id desc");
                            if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
   $template .= '<tr><td></td> <td> +'.$rows['with_dist_purchase_amount'].' - '.$rows['with_dist_purchase_discount'].'%</td></tr>';

                            }}
		 
$template .= '<tr><td>Loyalty Points	Earning Points	Earning Points
<tr><td></td><td>	Earn 1 pt. for Rs.100 purchase</td></tr>
		
<tr><td></td><td>	Validity </td></tr>
<tr><td></td><td> 	2 yrs. From points earned  </td></tr>
		
<tr><td></td><td>	Using Points</td></tr>
<tr><td></td><td>Min. 25 points can be used</td></tr>
</table>
</p>
<p>
We HH Wholesale Club once again like to thank you & would like to have a long term relation with you.</p><p>
Your sincerely,<br>

Team Herbalhills.
</p>
 
</body>
</html>';


        return $template;
    }
    function welcome_member_under_superdistributor_template($name) {

        $template = '<html>
<head>
<title>Welcome Member | Hhwholedaleclub.com</title>
</head>
<body>
<p>
Dear ' . ucwords($name) . ', ,<br>
Warm Greetings from HH Wholesale Club!!!<br>
Thank you so much for becoming a member of HH Wholesale Club! We’re thrilled to have you on board and can’t wait to get to know you.<br>
Your membership reflects your commitment to the promotion of excellence in Herbal Hills Products. We also warmly welcome you as a member of the [Member/Distributors/Super Distributors] Section. In addition, we want to make sure you’re taking full advantage of all the membership benefits available:-
</p><p>
<table>
<tr><td>Member Benefits</td><td>	With Super Distributor </td></tr>
	<tr><td>System Generated</td><td>Wholesale Discount		</td></tr>
        <tr><td>Doctor / Clinic / Retail Store Buy</td><td></td>';
        $getdata = $this->db->query("select * from member_discount order by id desc");
                            if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
   $template .= '<tr><td></td> <td> +'.$rows['with_dist_purchase_amount'].' - '.$rows['with_dist_purchase_discount'].'%</td></tr>';

                            }}
		 
$template .= '<tr><td>Loyalty Points	Earning Points	Earning Points
<tr><td></td><td>	Earn 1 pt. for Rs.100 purchase</td></tr>
		
<tr><td></td><td>	Validity </td></tr>
<tr><td></td><td> 	2 yrs. From points earned  </td></tr>
		
<tr><td></td><td>	Using Points</td></tr>
<tr><td></td><td>Min. 25 points can be used</td></tr>
</table>
</p>
<p>
We HH Wholesale Club once again like to thank you & would like to have a long term relation with you.</p><p>
Your sincerely,<br>

Team Herbalhills.
</p>
 
</body>
</html>';


        return $template;
    }


    function welcome_sd_template($get_super_distributor_details_by_id) {

        $template = '<html>
<head>
<title>Welcome Super Distributor | Hhwholedaleclub.com</title>
</head>
<body>
<p>
Dear ' . ucwords($get_super_distributor_details_by_id['name']) . ',<br>
Warm Greetings from HH Wholesale Club!!!<br>
Thank you so much for becoming a Super Distributor of HH Wholesale Club! We’re thrilled to have you on board and can’t wait to get to know you.<br>
We want to make sure you’re taking full advantage of all the benefits available:-
</p><p>
 <table>
            <tr>
                <td><b>Super-Distributor Benefits</b></td>
                <td>' . $get_super_distributor_details_by_id['code'] . ' </td>
            </tr>
            <tr>
                <td><b>Club Member purchase or Distributor Purchase</b></td>
              
            <tr>
                <td>Super-Distributor</td>
                <td>3% on Purchases </td>
                
            </tr>
            <tr>
                <td></td>
                <td>	+ 250000/-  Monthly Sale - 3.5%</td>
               
            </tr>
            <tr>
                <td></td>
                <td>	 + 500000/-  Monthly sale - 4%</td>
               
            </tr>
            <tr>
                <td></td>
                <td>	+ 1000000/-  Monthly Sale -4.5%	</td>
                
            </tr>
            <tr>
                <td></td>
                <td>	+ 2500000/- Monthly Sale -5%	</td>
               
            </tr>
            <tr>
                <td></td>
                <td>	+ 5000000/- Monthly Sale - 5.5%</td>
               
            </tr>

        </table>
</p>
<p>
We HH Wholesale Club once again like to thank you & would like to have a long term relation with you.</p><p>
Your sincerely,<br>

Team Herbalhills.
</p>
 
</body>
</html>';


        return $template;
    }

    function welcome_d_template($get_distributor_details_by_id) {

        $template = '<html>
<head>
<title>Welcome Distributor | Hhwholedaleclub.com</title>
</head>
<body>
<p>
Dear ' . ucwords($get_distributor_details_by_id['name']) . ',<br>
Warm Greetings from HH Wholesale Club!!!<br>
Thank you so much for becoming a Distributor of HH Wholesale Club! We’re thrilled to have you on board and can’t wait to get to know you.<br>
We want to make sure you’re taking full advantage of all the benefits available:-
</p><p>
 <table>
Distributor Benefits	Without Super-Distributor code	With Super-Distributor code
Club Member purchase commission		
Distributor / Med.Rep.	5% of Club member sale	6% of Club member sale
	 + 25000/- Monthly Sale - 6% 	 + 25000/-  Monthly  Sale - 7%
	 + 50000/- Monthly Sale - 7%	 + 50000/- Monthly Sale - 8%
	 + 100000/-  Monthly  Sale - 8%	 + 100000/- Monthly  Sale - 9%
	 + 250000/- Monthly Sale - 9%	 + 250000/- Monthly Sale -10%
	 + 500000/- Monthly  Sale - 10%	 + 500000/- Monthly Sale - 11%

        </table>
</p>
<p>
We HH Wholesale Club once again like to thank you & would like to have a long term relation with you.</p><p>
Your sincerely,<br>

Team Herbalhills.
</p>
 
</body>
</html>';


        return $template;
    }
    function get_current_credit_balance($id) {

        $return = array();
        $query = $this->db->query("SELECT * FROM `member_credits` WHERE `member_id` = '$id' and status = 'approved' and expiry_date IS NULL");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['request_credit_amount'] = $row['request_credit_amount'];
                $return['approved_date'] = $row['approved_date'];
                $return['no_of_days'] = $row['no_of_days'];
            }
        }
        return $return;
    }
        function get_member_discount_list_by_cat_id($cat_id) {
        $return = '';
        $query = $this->db->query("select * from member_discount where cat_id='$cat_id'");
        if ($query->num_rows() > 0) {
            $return = $query->result_array();
        }
        return ($return);
    }
	
	 function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('product_detail');
        
        //fetch data by conditions
        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("order_by",$params)){
            $this->db->order_by($params['order_by']);
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
	
	
	//filter//
	
 function prsc_make_query($sort_by,$minimum_price, $maximum_price,$pet,$presc_alp,$brand,$condition,$formulation)
 {
  $query = "
  SELECT * FROM product_detail 
  WHERE status = '1' 
  ";

  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
   $query .= "
    AND sale_price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
   ";
  }

  if(isset($presc_alp))
  {
   $query .= "
    AND name LIKE  '$presc_alp%'
   ";
  }

 if(isset($pet))
  {
   $pet_filter = implode("','", $pet);
   $query .= "
    AND id in (select product_id from  product_sub_category where pet_id IN('".$pet_filter."'))
   ";
  }
  
  
  if(isset($brand))
  {
   $brand_filter = implode("','", $brand);
   $query .= "
    AND brand_id IN('".$brand_filter."')
   ";
  }
  
  if(isset($condition))
  {
   $condition_filter = implode("','", $condition);
   $query .= "
    AND id in (select product_id from  product_condition where condition_id IN('".$condition_filter."'))
   ";
  }


  if(isset($formulation))
  {
   $formulation_filter = implode("','", $formulation);
   $query .= "
    AND id in (select product_id from  product_formulation where type_id IN('".$formulation_filter."'))
   ";
  }
  
  if(isset($sort_by))
  {
	  if($sort_by==1){
		  $sort_by='asc';
	  }
	  else if($sort_by==2){
		  $sort_by='desc';
	  }
	  else{
		  $sort_by='desc';
	  }
   
   $query .= "AND prescription=1 order by  sale_price $sort_by";
  }
 
  return $query;
 }
 
 
/*  function check_availablity_stock($color,$product_type,$material,$size,$product_id)
 {
	  if(!empty($color) AND empty($product_type) AND empty($size) AND empty($material) ){
		 $var_aat="color='$color'";
	 }
	 if(empty($color) AND !empty($product_type) AND empty($size) AND empty($material)){
		 $var_aat="type='$product_type'";
	 }
	  if(empty($color) AND empty($product_type) AND !empty($size) AND empty($material)){
		$var_aat="size='$size'";
	 }
		if(!empty($color) AND empty($product_type) AND !empty($size) AND empty($material)){
		 $var_aat="color='$color' AND size='$size'";
	 }
	
	 	 if(empty($color) AND !empty($product_type) AND empty($size) AND !empty($material)){
		 $var_aat="type='$product_type' AND material='$material'";
	 }
	 
	 
	
  //$data = $this->db->query("select * from product_inventory where product_id='$product_id' and var_id in (select id from product_variation where $var_aat AND product_id='$product_id')");
  
  $result=$data->row();
  
  //return $result->stock;
  if($result->stock>0)
  {
 $stock="In Stock";	  
  }
  else{
  $stock="Out of Stock";
  }
  return $stock;
 }  */

  function product_var_price($color,$product_type,$material,$size,$product_id)
 {
	 
	  if(!empty($color) AND empty($product_type) AND empty($size) AND empty($material) ){
		 $var_aat="color='$color'";
	 }
	 if(empty($color) AND !empty($product_type) AND empty($size) AND empty($material)){
		 $var_aat="type='$product_type'";
	 }
	  if(empty($color) AND empty($product_type) AND !empty($size) AND empty($material)){
		$var_aat="size='$size'";
	 }
	   if(empty($color) AND empty($product_type) AND empty($size) AND !empty($material)){
		$var_aat="material='$material'";
	 }
	 
		if(!empty($color) AND empty($product_type) AND !empty($size) AND empty($material)){
		 $var_aat="color='$color' AND size='$size'";
	 }
	 
	   if(!empty($color) AND empty($product_type) AND empty($size) AND !empty($material)){
		 $var_aat="color='$color' AND material='$material'";
	 }
	 
	    if(!empty($color) AND !empty($product_type) AND empty($size) AND empty($material)){
		 $var_aat="color='$color' AND type='$product_type'";
	 }
	 
	 	if(empty($color) AND !empty($product_type) AND !empty($size) AND empty($material)){
		 $var_aat="type='$product_type' AND size='$size'";
	 }
	
	 	 if(empty($color) AND !empty($product_type) AND empty($size) AND !empty($material)){
		 $var_aat="type='$product_type' AND material='$material'";
	 }
	  	 if(empty($color) AND empty($product_type) AND !empty($size) AND !empty($material)){
		 $var_aat="size='$size' AND material='$material'";
	 }
	 
	  	 if(!empty($color) AND !empty($size) AND !empty($material) AND empty($product_type) ){
		 $var_aat="color='$color' AND size='$size' AND material='$material' ";
	 }
	 
  $data = $this->db->query("select * from product_variation where $var_aat AND product_id='$product_id' ");
  
  $result=$data->row();
  
  //return $result->stock;
  //$price=$result->price;
  $price .='<div class="price">
                <u><b><span style="font-size:23px; color:#eb5757;">&#8377;'.$result->sale_price.'.00</span></b></u>
				<del><span class="old-price" style="font-size:18px;">&#8377;'.$result->mrp.'.00</span></del>	
			</div>';
  
  return $price;
 }
 
 /*
 function product_variation_gallery_by_id($color,$product_type,$material,$size,$product_id)
 {
	  if(!empty($color) AND empty($product_type) AND empty($size) AND empty($material) ){
	 $var_aat="color='$color'";
	 }
	 if(empty($color) AND !empty($product_type) AND empty($size) AND empty($material)){
		 $var_aat="type='$product_type'";
	 }
	  if(empty($color) AND empty($product_type) AND !empty($size) AND empty($material)){
		$var_aat="size='$size'";
	 }
	   if(empty($color) AND empty($product_type) AND empty($size) AND !empty($material)){
		$var_aat="material='$material'";
	 }
		if(!empty($color) AND empty($product_type) AND !empty($size) AND empty($material)){
		 $var_aat="color='$color' AND size='$size'";
	 }
	
	 	 if(empty($color) AND !empty($product_type) AND empty($size) AND !empty($material)){
		 $var_aat="type='$product_type' AND material='$material'";
	 }
	 
	 	 if(empty($color) AND empty($product_type) AND !empty($size) AND !empty($material)){
		 $var_aat="size='$size' AND material='$material'";
	 }
	 
	 
	 //$stock="select * from product_inventory where product_id='$product_id' and var_id in (select id from product_variation where $var_aat AND product_id='$product_id')";
  $data = $this->db->query("select * from product_variation_gallery where product_id='$product_id' and p_var_id in (select id from product_variation where $var_aat AND product_id='$product_id')");
  if($data->num_rows() > 0){
  $result=$data->row();
  $image=$result->image;
  $image=base_url().'admin/assets/images/Gallery/'.$image;
  //return $result->stock;
  //$price=$result->price;
  $v_gallery='<div class="tt-product-vertical-layout" >
  <div class="tt-product-single-img" >
		<div>
			<button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
			<img class="zoom-product" src='.$image.' data-zoom-image="'.$image.'" alt="">
		</div>
	</div>
	<div class="tt-product-single-carousel-vertical">
		<ul id="smallGallery" class="tt-slick-button-vertical  slick-animated-show-js slick-initialized slick-slider slick-vertical">';
							
	$i=1;
	foreach($data->result_array() as $g_row){
		
		if($i==1){
		$active="zoomGalleryActive";
		}
		else{
			$active="zoomGalleryActive";
		}
		$g_image=base_url().'admin/image/product_gallery/'.$g_row['image'];
		
		$v_gallery .='<li><a class="'.$active.'" href="#" data-image="'.$g_image.'" data-zoom-image="'.$g_image.'"><img src="'.$g_image.'" alt=""></a></li>';
	
	$i++;
	}
	$v_gallery .='<li>
		<div style="display:none" class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="http://www.youtube.com/embed/GhyKqj_P2E4">
			<img src="images/product/product-small-empty.png" alt="">
			<div>
				<i class="icon-f-32"></i>
			</div>
		</div>
	</li>
	<li>
		<div   style="display:none" class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="video/video.mp4" data-poster="video/video_img.jpg">
			<img src="images/product/product-small-empty.png" alt="" >
			<div>
				<i class="icon-f-32"></i>
			</div>
		</div>
	</li>
</ul>
</div>
</div>';
  }
  else{
	  $data = $this->db->query("select * from product_gallery where product_id='$product_id' ");
	  $result=$data->row();
  $image=$result->image;
  $image=base_url().'admin/image/product_gallery/'.$image;
	   $v_gallery='<div class="tt-product-vertical-layout" >
  <div class="tt-product-single-img" >
		<div>
			<button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
			<img class="zoom-product" src='.$image.' data-zoom-image="'.$image.'" alt="">
		</div>
	</div>
	<div class="tt-product-single-carousel-vertical">
		<ul id="smallGallery" class="tt-slick-button-vertical  slick-animated-show-js slick-initialized slick-slider slick-vertical">';
							
	$i=1;
	foreach($data->result_array() as $g_row){
		
		if($i==1){
		$active="zoomGalleryActive";
		}
		else{
			$active="zoomGalleryActive";
		}
		$g_image=base_url().'admin/image/product_gallery/'.$g_row['image'];
		
		$v_gallery .='<li><a class="'.$active.'" href="#" data-image="'.$g_image.'" data-zoom-image="'.$g_image.'"><img src="'.$g_image.'" alt=""></a></li>';
	
	$i++;
	}
	$v_gallery .='<li>
		<div style="display:none" class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="http://www.youtube.com/embed/GhyKqj_P2E4">
			<img src="images/product/product-small-empty.png" alt="">
			<div>
				<i class="icon-f-32"></i>
			</div>
		</div>
	</li>
	<li>
		<div   style="display:none" class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="video/video.mp4" data-poster="video/video_img.jpg">
			<img src="images/product/product-small-empty.png" alt="" >
			<div>
				<i class="icon-f-32"></i>
			</div>
		</div>
	</li>
</ul>
</div>
</div>';
	 // $v_gallery="no";
  }
  return $v_gallery;
 } */

 
 function prsc_count_all($sort_by,$minimum_price, $maximum_price,$pet,$presc_alp,$brand,$condition,$formulation)
 {
  $query = $this->prsc_make_query($sort_by,$minimum_price, $maximum_price, $pet,$presc_alp,$brand,$condition,$formulation);

  $data = $this->db->query($query);
  return $data->num_rows();
  
 }

 function prsc_fetch_data($limit, $start, $sort_by,$minimum_price, $maximum_price,$pet,$presc_alp,$brand,$condition,$formulation)
 {
	
  $query = $this->prsc_make_query($sort_by,$minimum_price, $maximum_price,$pet,$presc_alp,$brand,$condition,$formulation);
 
  $query .= ' LIMIT '.$start.', ' . $limit;
 
  $data = $this->db->query($query);
  //echo $query;die;
  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   { $image=base_url()."admin/image/product_gallery/".$row['product_image'];
						 	$offer= $row['sale_price'] /  $row['mrp'] * 100;
						 	$offer=100-round($offer);
    $output .= '
							<div class="col-6 col-md-4 tt-col-item">
								<div class="tt-product thumbprod-center">
									<div class="tt-image-box">
										<a href="'.site_url('home/product_detail/'.$row['id']).'" class="tt-btn-quickview" data-tooltip="Quick View" data-tposition="left"></a>
							<a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
										<a href="'. site_url('home/product_detail/'.$row['id']).'">
											<img src="'. $image.'" data-src="'. $image.'" alt="">
											<span class="tt-img-roll-over"><img src="images/loader.svg" data-src="'.$image.'" alt=""></span>
											<s pan class="tt-label-location">
												<span class="tt-label-new">YOU SAVE <b style="font-size: 16px;">'.$offer.'%</b></span>
											</span>';
											if($row['prescription']==1){
												
						 $output .= '					<span class="tt-label-location">
											<div class="product-badge-wrap-prescription" title=" Vet prescription required in checkout">
											<div class="product-badge-prescription"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
										</div>
											</span>';
											 }
							 $output .= '			</a>
									</div>
									<div class="tt-description">
										
										<h2 class="tt-title"><a href="'.site_url('home/product_detail/'.$row['id']).'">'. $row['name'].'</a></h2>
										<div class="tt-price">
											<span class="old-price" style="    font-size: 15px;">&#8377;'. $row['mrp'].'</span>
										</div>
										
										<div class="tt-price">
											&#8377;'.$row['sale_price'].'
										</div>
										<div class="tt-product-inside-hover">
								
								<div class="tt-row-btn">
									<a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
									<a href="#" class="tt-btn-wishlist"></a>
									<a href="#" class="tt-btn-compare"></a>
								</div>
							</div>
									</div>
								</div>
							</div>
    ';
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }

function search_make_query($sort_by,$minimum_price, $maximum_price,$pet,$search_alp,$brand,$condition,$formulation)
 {
  $query = "
  SELECT * FROM product_detail 
  WHERE status = '1' 
  ";

  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
   $query .= "
    AND sale_price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
   ";
  }

  if(isset($search_alp))
  {
   $query .= "
    AND name LIKE  '%$search_alp%'
   ";
  }

 if(isset($pet))
  {
   $pet_filter = implode("','", $pet);
   $query .= "
    AND id in (select product_id from  product_sub_category where pet_id IN('".$pet_filter."'))
   ";
  }
  
  
  if(isset($brand))
  {
   $brand_filter = implode("','", $brand);
   $query .= "
    AND brand_id IN('".$brand_filter."')
   ";
  }
  
  if(isset($condition))
  {
   $condition_filter = implode("','", $condition);
   $query .= "
    AND id in (select product_id from  product_condition where condition_id IN('".$condition_filter."'))
   ";
  }


  if(isset($formulation))
  {
   $formulation_filter = implode("','", $formulation);
   $query .= "
    AND id in (select product_id from  product_formulation where type_id IN('".$formulation_filter."'))
   ";
  }
  
  if(isset($sort_by))
  {
	  if($sort_by==1){
		  $sort_by='asc';
	  }
	  else if($sort_by==2){
		  $sort_by='desc';
	  }
	  else{
		  $sort_by='desc';
	  }
   
   $query .= " order by  sale_price $sort_by";
  }
 //echo $query;die;
  return $query;
 }
 
 
 
 function search_count_all($sort_by,$minimum_price, $maximum_price,$pet,$search_alp,$brand,$condition,$formulation)
 {
  $query = $this->search_make_query($sort_by,$minimum_price, $maximum_price, $pet,$search_alp,$brand,$condition,$formulation);

  $data = $this->db->query($query);
  return $data->num_rows();
  
 }

 function search_fetch_data($limit, $start, $sort_by,$minimum_price, $maximum_price,$pet,$search_alp,$brand,$condition,$formulation)
 {
	
  $query = $this->search_make_query($sort_by,$minimum_price, $maximum_price,$pet,$search_alp,$brand,$condition,$formulation);
 
  $query .= ' LIMIT '.$start.', ' . $limit;
 
  $data = $this->db->query($query);
  //echo $query;die;
  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   { $image=base_url()."admin/image/product_gallery/".$row['product_image'];
						 	$offer= $row['sale_price'] /  $row['mrp'] * 100;
						 	$offer=100-round($offer);
    $output .= '
							<div class="col-6 col-md-4 tt-col-item">
								<div class="tt-product thumbprod-center">
									<div class="tt-image-box">
										<a href="'.site_url('home/product_detail/'.$row['id']).'" class="tt-btn-quickview" 	data-tooltip="Quick View" data-tposition="left"></a>
							<a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
										<a href="'. site_url('home/product_detail/'.$row['id']).'">
											<img src="'. $image.'" data-src="'. $image.'" alt="">
											<span class="tt-img-roll-over"><img src="images/loader.svg" data-src="'.$image.'" alt=""></span>
											<span class="tt-label-location">
												<span class="tt-label-new">YOU SAVE <b style="font-size: 16px;">'.$offer.'%</b></span>
											</span>';
											if($row['prescription']==1){
												
						 $output .= '					<span class="tt-label-location">
											<div class="product-badge-wrap-prescription" title=" Vet prescription required in checkout">
											<div class="product-badge-prescription"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
										</div>
											</span>';
											 }
							 $output .= '			</a>
									</div>
									<div class="tt-description">
										
										<h2 class="tt-title"><a href="'.site_url('home/product_detail/'.$row['id']).'">'. $row['name'].'</a></h2>
										<div class="tt-price">
											<span class="old-price" style="    font-size: 15px;">&#8377;'. $row['mrp'].'</span>
										</div>
										
										<div class="tt-price">
											&#8377;'.$row['sale_price'].'
										</div>
										<div class="tt-product-inside-hover">
								
								<div class="tt-row-btn">
									<a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
									<a href="#" class="tt-btn-wishlist"></a>
									<a href="#" class="tt-btn-compare"></a>
								</div>
							</div>
									</div>
								</div>
							</div>
    ';
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 } 
 
  function fetch_material($color_id,$product_id,$size_id)
 {
	//echo "select * from product_variation where product_id='$product_id' AND color='$color_id' AND size='$size_id' ";die; 
  $query = $this->db->query("select * from product_variation where product_id='$product_id' AND color='$color_id' AND size='$size_id' ");
  $output = '<option value="">Select material</option>';
  foreach($query->result() as $row)
  {
	  //echo "select  * from variation_detail where id='$row->material' ";die;
	  $queries=$this->db->query("select  * from variation_detail where id='$row->material' ");
	  $results=$queries->row();
   $output .= '<option value="'.$results->id.'">'.$results->name.'</option>';
  }
  return $output;
 }
 
 
  function fetch_size($color_id,$product_id)
 {
  $query = $this->db->query("select * from product_variation where product_id='$product_id' AND color='$color_id'");
  $output = '<option value="">Select Size</option>';
  foreach($query->result() as $row)
  {

	  $queries=$this->db->query("select  * from variation_detail where id='$row->size'");
	  $results=$queries->row();
   $output .= '<option value="'.$results->id.'">'.$results->name.'</option>';
  }
  return $output;
 }
 
   function fetch_type($color_id,$product_id)
 {
  $query = $this->db->query("select * from product_variation where product_id='$product_id' AND color='$color_id'");
  $output = '<option value="">Select Type</option>';
  foreach($query->result() as $row)
  {

	  $queries=$this->db->query("select  * from variation_detail where id='$row->type'");
	  $results=$queries->row();
   $output .= '<option value="'.$results->id.'">'.$results->name.'</option>';
  }
  return $output;
 }
 
 
  function carttotalamount() {
        $total_amount = 0;
        if (isset($this->session->userdata['cart_product']) && !empty($this->session->userdata['cart_product'])) {
            $item_total = 0;
            $amount = 0;
            $shippingchargestr = '';
            foreach ($this->session->userdata['cart_product'] as $item) {
                $get_product_details_by_id = $this->ph_model->get_product_details_by_id($item['product_id']);
                $item_total = $item_total + $item['total_price'];
            }
            $grand_total = $item_total + $amount;
            $coupon_code_discount_amount = $total_amount = $discount_percent = 0;
            $total_amount = number_format((float) $grand_total, 2, '.', '');
        }
        return $total_amount;
    }
	

  function get_wishlist_list_by_user_id($userid) {
        $return = array();
	
        $query = $this->db->query("select * from wishlist where user_id='$userid' order by id desc");
        $return = $query->result_array();
        return $return;
    }
	
	public function get_wishlist_list($userid) {
        $return = array();
	
        $query = $this->db->query("select * from wishlist where user_id='$userid' order by id desc");
        $return = $query->result();
        return $return;
    }
	

	public function get_wallet_detail($userid) {
        $return = array();
	
        $query = $this->db->query("select * from wallet_tbl where user_id='$userid' order by id desc");
        $return = $query->result();
        return $return;
    }

	
	    function get_order_product($id)
	{
		
		//echo "select * from order_product where order_id='$id'";die;
		$return=array();
		$query=$this->db->query("select * from order_product where order_id='$id'");
		
		if($query->num_rows()>0)
		{
        $return=$query->result();
		
	    }
	return ($return);
	}
	
	 public function get_product_name($product_id) {

        $return = array();
        $query = $this->db->query("select * from product_detail where id='$product_id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['name'] = $row['name'];  
                $return['SKU'] = $row['SKU'];  
            }
        }

        return ($return);
    }
	
	
/* 		 public function get_coupon_by_orderId($order_id) {

        $return = array();
        $query = $this->db->query("select * from order_detail where id='$order_id'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['coupon_id'] = $row['coupon_id'];  
            }
        }

        return ($return);
    } */
	

	
	
	
	function brand_make_query($sort_by,$minimum_price, $maximum_price,$pet,$brand_id,$condition,$formulation)
 {
  $query = "
  SELECT * FROM product_detail 
  WHERE status = '1' 
  ";

  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
   $query .= "
    AND sale_price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
   ";
  }

  if(isset($pet))
  {
   $pet_filter = implode("','", $pet);
   $query .= "
    AND id in (select product_id from  product_sub_category where pet_id IN('".$pet_filter."'))
   ";
  }
  
  
  if(isset($brand_id))
  {
   $query .= "
    AND brand_id='$brand_id'
   ";
  }
  
  if(isset($condition))
  {
   $condition_filter = implode("','", $condition);
   $query .= "
    AND id in (select product_id from  product_condition where condition_id IN('".$condition_filter."'))
   ";
  }


  if(isset($formulation))
  {
   $formulation_filter = implode("','", $formulation);
   $query .= "
    AND id in (select product_id from  product_formulation where type_id IN('".$formulation_filter."'))
   ";
  }
  
  if(isset($sort_by))
  {
	  if($sort_by==1){
		  $sort_by='asc';
	  }
	  else if($sort_by==2){
		  $sort_by='desc';
	  }
	  else{
		  $sort_by='desc';
	  }
   
   $query .= " order by  sale_price $sort_by";
  }
 //echo $query;die;
  return $query;
 }
 
 
 function brand_count_all($sort_by,$minimum_price, $maximum_price,$pet,$brand_id,$condition,$formulation)
 {
  $query = $this->brand_make_query($sort_by,$minimum_price, $maximum_price, $pet,$brand_id,$condition,$formulation);

  $data = $this->db->query($query);
  return $data->num_rows();
  
 }

 function brand_fetch_data($limit, $start, $sort_by,$minimum_price, $maximum_price,$pet,$brand_id,$condition,$formulation)
 {
	
  $query = $this->brand_make_query($sort_by,$minimum_price, $maximum_price,$pet,$brand_id,$condition,$formulation);
 
  $query .= ' LIMIT '.$start.', ' . $limit;
 
  $data = $this->db->query($query);
  
  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   { $image=base_url()."admin/image/product_gallery/".$row['product_image'];
						 	$offer= $row['sale_price'] /  $row['mrp'] * 100;
						 	$offer=100-round($offer);
    $output .= '
							<div class="col-6 col-md-4 tt-col-item">
								<div class="tt-product thumbprod-center">
									<div class="tt-image-box">
										<a href="'.site_url('home/product_detail/'.$row['id']).'" class="tt-btn-quickview" 	data-tooltip="Quick View" data-tposition="left"></a>
							<a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
										<a href="'. site_url('home/product_detail/'.$row['id']).'">
											<img src="'. $image.'" data-src="'. $image.'" alt="">
											<span class="tt-img-roll-over"><img src="images/loader.svg" data-src="'.$image.'" alt=""></span>
											<span class="tt-label-location">
												<span class="tt-label-new">YOU SAVE <b style="font-size: 16px;">'.$offer.'%</b></span>
											</span>';
											if($row['prescription']==1){
												
						 $output .= '					<span class="tt-label-location">
											<div class="product-badge-wrap-prescription" title=" Vet prescription required in checkout">
											<div class="product-badge-prescription"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
										</div>
											</span>';
											 }
							 $output .= '			</a>
									</div>
									<div class="tt-description">
										
										<h2 class="tt-title"><a href="'.site_url('home/product_detail/'.$row['id']).'">'. $row['name'].'</a></h2>
										<div class="tt-price">
											<span class="old-price" style="    font-size: 15px;">&#8377;'. $row['mrp'].'</span>
										</div>
										
										<div class="tt-price">
											&#8377;'.$row['sale_price'].'
										</div>
										<div class="tt-product-inside-hover">
								
								<div class="tt-row-btn">
									<a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
									<a href="#" class="tt-btn-wishlist"></a>
									<a href="#" class="tt-btn-compare"></a>
								</div>
							</div>
									</div>
								</div>
							</div>
    ';
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }



/* 	function get_product_detail_by_name($name){
		
		$return=array();
		
		$query=$this->db->query("select * from product_detail where name='$name' ");
		if($query->num_rows() > 0){
			$return=$query->result();
		} 
		return ($return);
	} */ 
	
 
 
 
/*      function get_product_var_qty_by_id($p_id,$var_id) {

        $return = array();

        $query = $this->db->query("select * from product_detail where id='$p_id' ");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['quantity'] = $row['quantity'];
                $return['fixed_quantity'] = $row['fixed_quantity'];
            }
        }

        return ($return);
    } */
	
 /* function get_product_var_qty_by_id($p_id,$var_id)
 {
	 
	 
	  if(empty($var_id)){
		  
		$return = array();
        $query1 = $this->db->query("select * from product_detail where id='$p_id' ");

        if ($query1->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['quantity'] = $row['quantity'];
                $return['fixed_quantity'] = $row['fixed_quantity'];
            }
        }
		    
     }
     else
	 
	 {
       $data = $this->db->query("select * from product_variation where product_id='$p_id' and id='$var_id'");
	 
	  $result=$data->row();
	  $pid=$result->product_id;
	  
		$return = array();
        $query2 = $this->db->query("select * from product_detail where id=' $pid' ");

        if ($query2->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['quantity'] = $row['quantity'];
                $return['fixed_quantity'] = $row['fixed_quantity'];
            }
        }
	  
	 }
	  
	 return ($return);
    } */
 
 
      function get_product_var_qty_by_id($p_id) {

        $return = array();

        $query = $this->db->query("select * from product_detail where id='$p_id' ");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $return['id'] = $row['id'];
                $return['quantity'] = $row['quantity'];
                $return['fixed_quantity'] = $row['fixed_quantity'];
                $return['SKU'] = $row['SKU'];
            }
        }

        return ($return);
    }
	
 function fetch_coupon_amount($coupon_id)
 {

  $query = $this->db->query("select * from tbl_coupon where  id='$coupon_id' ");
  $result=$query->row();
  
  $output .= '<tbody>';
  $output .= '<tr>';
  $output .= '<td>-(₹'.$result->coupon_amount.')</td>';
  $output .= '</tr>'; 
  $output .= '</tbody>';
 
  return $output; 
}

	function make_query($sort_by,$minimum_price, $maximum_price,$sub_category_id)
 {
	 	 
  $query = "
  SELECT * FROM product_detail 
  WHERE status = '1' 
  ";

  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
   $query .= "
    AND sale_price BETWEEN $minimum_price AND $maximum_price
   ";
  }

  
  if(isset($sub_category_id))
  {
	  if(!empty($sub_category_id))
  {
   $query .= "
    AND id in (select product_id from  product_sub_category where sub_category_id='$sub_category_id')
   ";
  }
  }
  
 
  if(isset($sort_by))
  {
	  if($sort_by==1){
		  $sort_by='asc';
	  }
	  else if($sort_by==2){
		  $sort_by='desc';
	  }
	  else{
		  $sort_by='desc';
	  }
   
   $query .= "
    order by  sale_price $sort_by
   ";
  }
 
  return $query;
 }

   function count_all($sort_by,$minimum_price, $maximum_price,$sub_category_id)
 {
  $query = $this->make_query($sort_by,$minimum_price, $maximum_price,$sub_category_id);
  $query;
  $data = $this->db->query($query);
  return $data->num_rows();
  
 }


 function fetch_data($limit, $start, $sort_by ,$minimum_price, $maximum_price,$sub_category_id)
 {
  $query = $this->make_query($sort_by,$minimum_price, $maximum_price,$sub_category_id);
 
  $query .= ' LIMIT '.$start.', ' . $limit;
 
  $data = $this->db->query($query);
  //echo $query;die;
  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   { $image=base_url()."admin/assets/images/Gallery/".$row['product_image'];
						 	$offer= $row['sale_price'] /  $row['mrp'] * 100;
						 	$offer=100-round($offer);
                            $urls = 'product/'.$row['name'];
							//$url3 =site_url('home/product_detail/'.$row['id']);
                            $urls = base_url() .str_replace(' ', '-', $urls);
								     
						$output .= '<div class="col-md-4 col-sm-6">
                                        <div class="thumbnail no-border no-padding">
                                            <div class="media">
                                                <a class="media-link" href=" '.$urls.'">
                                                    <img src="'. $image.'" alt=""/>
                                                    <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="caption text-center">
                                                <h4 class="caption-title">'. $row['name'].'</h4>
                                                <div class="rating">
                                                    <span class="star"></span><!--
                                                    --><span class="star active"></span><!--
                                                    --><span class="star active"></span><!--
                                                    --><span class="star active"></span><!--
                                                    --><span class="star active"></span>
                                                </div>
                                                <div class="price"><ins><i class="fa fa-inr" style="font-size:18px"></i>'.$formatted = number_format($row['sale_price'],2).'</ins> <del><i class="fa fa-inr" style="font-size:18px"></i> '.$formatted = number_format($row['mrp'],2).'</del></div>
                                            </div>
                                        </div>
                                    </div>';
	

   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 } 
 
 
  function searched_data($limit, $search,$start)
 {
  $query = $this->searched_query($search);
 
  $query .= ' LIMIT '.$start.', ' . $limit;
 
  $data = $this->db->query($query);

  return $data->result();
 }
 
  function searched_query($search)
 {
	 //echo " SELECT * FROM product_detail WHERE  name LIKE  '%$search%'";die;
  $query = " SELECT * FROM product_detail WHERE  name LIKE  '%$search%'";
  

 
  
  
  return $query;
 }
 
 
   function searched_count($search)
 {
  $query = $this->searched_query($search);
  //$query;
  $data = $this->db->query($query);
  return $data->num_rows();
  
 }
 
 function convert_number($number) {
        if (($number < 0) || ($number > 999999999)) {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 1000000);
        // Millions (giga)
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga) {
            $result .= $this->convert_number($giga) .  "Million";
        }
        if ($kilo) {
            $result .= (empty($result) ? "" : " ") .$this->convert_number($kilo) . " Thousand";
        }
        if ($hecto) {
            $result .= (empty($result) ? "" : " ") .$this->convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result)) {
                $result .= " and ";
            }
            if ($deca < 2) {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n) {
                    $result .= "-" . $ones[$n];
                }
            }
        }
        if (empty($result)) {
            $result = "zero";
        }
        return $result;
    }
 

 
 

	}
 

?>