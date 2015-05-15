<?php
//$a = json_decode('[{"id":1,"name":"name_1"},{"id":2,"name":"name_2","children":[{"id":3,"name":"name_3"},{"id":4,"name":"name_4"},{"id":5,"name":"name_5","children":[{"id":6,"name":"name_6"},{"id":7,"name":"name_7"},{"id":8,"name":"name_8"}]},{"id":9,"name":"name_9"}]},{"id":10,"name":"name_10"},{"id":11},{"id":12}]');
//$a = json_decode('[{"id":"c0690dc3c5cf23c6dec9328336a941f163c76ec7","name":"Admin","url":"#","children":[{"id":"2de23b0f3de5c6bce6f817f56b730d696507a64f","name":"user_management","url":"user_management"},{"id":"ad53c97032121985fa5693e5e600494e374f326d","name":"user_group","url":"user_group"},{"id":5,"name":"name_5","children":[{"id":6,"name":"name_6"},{"id":7,"name":"name_7"},{"id":8,"name":"name_8"}]},{"id":9,"name":"name_9"}]},{"id":10,"name":"name_10"},{"id":11,"name":"name_10"},{"id":12,"name":"name_10"}]');
echo '<pre>';
//$a['4'] = array('id'=>1,'name'=>"namesa",'url'=>'url','children'=> array( '0' =>array('id'=>1,'name'=>"namesa",'url'=>'url')));



$a['0'] = array('id'=>'0','name'=>"admin",'url'=>'#','children'=> array( '0' =>array('id'=>'2de23b0f3de5c6bce6f817f56b730d696507a64f','name'=>"user_management",'url'=>'users','children'=> array( '0' =>array('id'=>'2de23b0f3de5c6bce6f817f56b730d696507a64f','name'=>"users",'url'=>'users'),'1' =>array('id'=>'ad53c97032121985fa5693e5e600494e374f326d','name'=>"user_type",'url'=>'users/user_type'),'2' =>array('id'=>'a585db06059bd3550940ead8f040a82a2df29d6c','name'=>"user_permission",'url'=>'users/user_permission')	)),'1' =>array('id'=>'8a6742a8e15c7351f9bc8d8ac102c37ec3d081cc','name'=>"template",'url'=>'template'),'2' =>array('id'=>'f4a4d61d6b230f1338ead411b05a4039591c5764','name'=>"custom",'url'=>'admin/custom'),'3' =>array('id'=>'b2e756c30992c20dd40c15f2dce8b30d8f853056','name'=>"dropdown",'url'=>'admin/dropdowns')	) 	);
$a['1'] = array('id'=>'c0690dc3c5cf23c6dec9328336a941f163c76ec7','name'=>"eim",'url'=>'eim','children'=> array( '0' =>array('id'=>'7ef21193050ba33796f1a4a506c4cd7d35399d57','name'=>"Add Employees",'url'=>'eim/create'),'1' =>array('id'=>'12213753cd898110cc32805feef6e3764b6d016b','name'=>"eim_articles",'url'=>'eim/eim_articles'),'2' =>array('id'=>'020deff8c0bd252a4053fffe2d2c3d969d1c2a98','name'=>"eim_dropdown",'url'=>'eim/eim_dropdown')));
$a['2'] = array('id'=>'cb27b783abd8f1567e962c363a385f63338482e6','name'=>"recruitement",'url'=>'#','children'=> array( '0' =>array('id'=>'10a93f3aa01f00d51324aed3e0976315c3305f7a','name'=>"vacancy",'url'=>'recruitement/vacancy'),'1' =>array('id'=>'a7713d58876add426634e5fdc7a4037e9e50fa8f','name'=>"candidates",'url'=>'recruitement/candidates')));
/*
$a['0'] = array('id'=>'ebc7b0b550bb22f64372951ffeac3b3ef1acc61c','name'=>"home",'url'=>'ess');
$a['1'] = array('id'=>'c444fffa948a3b8fec2d09dba46d865ae8049f16','name'=>"Leave",'url'=>'#');
$a['2'] = array('id'=>'3b1dbf9e0a690d83ce4bbdb59b97cf94daa61d86','name'=>"Time & Attandance",'url'=>'#');*/
$a = arrayToObject($a);

echo json_encode($a);
echo "<br>";
echo "L.B.Thushali Dilrukshenee Rathnayake sdaiojdjkas dsn dsahdjksajkldjkasjdkhasjkhdkjsadk";
print_r ($a);


echo '</pre>';



echo show_menu_array($a);
function arrayToObject($d) {
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return (object) array_map(__FUNCTION__, $d);
		}
		else {
			// Return object
			return $d;
		}
	}
function show_menu_array($array){
    $output = '<ul>';
    foreach ($array as $key => $mixedValue) {
        if (isset($mixedValue->children)) {
		
	        $output .= '<li class="has-sub"><a href="#"><span>'. $mixedValue->name;
			 $output .= '<ul class="">';
		     $output .= menu_lists($mixedValue->children);
			 $output .= '</ul>';
			 $output .= '</span></a></li>';	
			
        } else {
            $output .= '<li><a href="#"><span>' . $mixedValue->name . '</li></span></a>';
        }
    }
    $output .= '</ul>';
    echo $output;
}

function menu_lists($array){
$output ='';
		foreach ($array as $key => $mixedValue){
					if (isset($mixedValue->children)) {				
					 $output .= '<li class="has-sub"><a href="#"><span>'. $mixedValue->name;
					 $output .= '<ul>';
					  $output .= menu_lists($mixedValue->children);
					 $output .= '</ul>';
					 $output .= '</span></a></li>';		
				} else {
					$output .= '<li><a href="#"><span>' . $mixedValue->name . '</span></a></li>';
				}
			 }
	return $output;
}


?>
