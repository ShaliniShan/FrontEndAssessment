<?php session_start();

if(isset($_POST['submit_course'])) {
	$myFile = "inventory.json";
	$arr_data = array(); // create empty array

	try
	{
		//Get form data
		$formdata = array(
	      'id'=> $_POST['course_id'],
	      'title'=> $_POST['course_title'],
	      'slug'=>$_POST['course_slug'],
	      'time'=> $_POST['time'],
	   	  'description'=> $_POST['course_description'],
	      'graphic_src'=> $_POST['graphic_src'],
	      'graphic_alt'=>$_POST['graphic_alt'],
	      'language'=> $_POST['language'],	
	   	  'lessons_count'=> $_POST['lessons_count'],
	      'date_created'=> $_POST['date_created'],
	      'last_update'=> $_POST['last_update'],
	      'skill'=> $_POST['skill']
		);

		//Get data from existing json file
		$jsondata = file_get_contents($myFile);

		// converts json data into array
		$arr_data = json_decode($jsondata, true);

		// Push user data to array
		array_push($arr_data,$formdata);

		//Convert updated array to JSON
		$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

		//write json data into data.json file
		if(file_put_contents($myFile, $jsondata)) {
			echo 'Data successfully saved';
		}
		else
		echo "error";

	}
	catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

if(isset($_POST['update_course'])) {
	$courseId = $_SESSION['courseId'] ;

	// read file
	$data = file_get_contents('inventory.json');

	// decode json to array
	$json_arr = json_decode($data, true);

	try{
		foreach ($json_arr as $key => $value) {
			if ($value['id'] === $courseId) {
				$json_arr[$key]['title'] = $_POST['course_title'];
				$json_arr[$key]['time'] = $_POST['time'];
				$json_arr[$key]['slug'] = $_POST['course_slug'];
				$json_arr[$key]['description'] = $_POST['course_description'];
				$json_arr[$key]['graphic_src'] = $_POST['graphic_src'];
				$json_arr[$key]['graphic_alt'] = $_POST['graphic_alt'];
				$json_arr[$key]['language'] = $_POST['language'];
				$json_arr[$key]['lessons_count'] = $_POST['lessons_count'];
				$json_arr[$key]['date_created'] = $_POST['date_created'];
				$json_arr[$key]['last_update'] = $_POST['last_update'];
				$json_arr[$key]['skill'] = $_POST['skill'];
					
			}
		}
		//Convert updated array to JSON
		$jsondata = json_encode($json_arr, JSON_PRETTY_PRINT);
		// encode array to json and save to file
		if(file_put_contents('inventory.json', $jsondata)){
			echo 'Data successfully updated';
		}
		else
		echo "Update error";
	}
	catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
?>
<html>
<head>
<title>Synopsis Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/frontEndStyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src=https://code.jquery.com/jquery-1.12.4.js></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src=https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js></script>
<script src=https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js></script>
<script src=https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
</head>
<div class="container-fluid half-padding">
<div class="pages pages_dashboard">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel panel-danger">
<div class="panel-heading">
<h3 class="panel-title"><em>Front End Assessment</em></h3>
<a style="float: right; position: relative; bottom: 25.5px;"
	class="btn btn-custom"
	href="/Synopsis/add-course.php">Add Courses</a></div>
<div class="panel-body">
<table id="records" class="table table_pick datatable display">
	<thead>
		<tr>
		<?php

		$tabhead = '
					    				<th class="table-header">Image</th>
					    				<th class="table-header">Title</th>
										<th class="table-header">Edit</th>
										<th class="table-header">Delete</th>';

		echo $tabhead;
		?>
		</tr>
	</thead>
	<tbody>
	<?php
	$html = "";
	$json_string =    file_get_contents("Inventory.json");
	$parsed_json = json_decode($json_string, true);

	foreach($parsed_json as $key => $value)
	{
		$source_img = '<img src="'.$value['graphic']['src'].'" alt="" width="50" >';
		$html .= "<tr data-id='".$value['id']."'><td>".$source_img."</td>"
		."<td><a data-id='".$value['id']."' data-toggle='modal' data-target='#myModal'>".$value['title']."</td>"
		."<td><a class = 'editRec' href='/Synopsis/editCourse.php'>Edit</a></td>"
		."<td><a class='deleteRec' href=''>Delete</a></td></tr>";
	}
	echo $html;
	?>
	<script type="text/javascript" src="assets/js/frontScript.js"></script>
	<script type="text/javascript" src="assets/js/ajaxHandler.js"></script>
	</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog"><!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Course Details</h4>
</div>
<div id="course_details" class="modal-body"></div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" data-dismiss="modal" aria-label="Close"
	class="close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Wait!</h4>
</div>
<div class="modal-body">
<div role="alert" class="alert alert-danger">
<h4><i class="alert-ico fa fa-fw fa-ban"></i><strong>Confirm</strong></h4>
Are you sure?</div>
</div>
<div class="modal-footer">
<button id="delete_node" type="button" data-dismiss="modal"
	class="btn btn-danger">Yes</button>
<button type="button" data-dismiss="modal" class="btn btn-default">No</button>
</div>
</div>
</div>
</div>