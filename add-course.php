<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src=https://code.jquery.com/jquery-1.12.4.js></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src=https://code.jquery.com/jquery-1.12.4.js></script>
<script src=https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js></script>
<script src=https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js></script>
<script src=https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<div class="container-fluid half-padding">
	<div class="pages pages_dashboard">
		<div class="row">
			<div class="col-md-9">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-file"></i>  Add Courses </h3>
					</div>
					<div class="panel-body">
					      
						<form name='add_course_name' id='add_course' class="col-md-12" action='/Synopsis/frontEnd.php' method='POST' accept-charset='UTF-8' enctype="multipart/form-data" autocomplete="on">
						<div id="error_container"></div>
						<div class="form-group col-md-4">
				          	  <label for="course_id">ID</label>
				              <input type='text' name='course_id' class="form-control input-lg" id='course_id' value='' placeholder="ID">
				          </div>
				          <div class="form-group col-md-8">
				          	  <label for="course_title">Title</label>
				              <input type='text' name='course_title' class="form-control input-lg" id='course_title' value='' placeholder="Title">
				         </div>
				          <div class="form-group col-md-6">
				          	  <label for="course_slug">Slug</label>
				              <input type='text' name='course_slug' class="form-control input-lg" id='course_slug' value='' placeholder="Slug">
				        </div>
				        <div class="form-group col-md-6">
				          	  <label for="time">Time</label>
				              <input type='text' name='time' class="form-control input-lg" id='time' value='' placeholder="time">
				        </div>
				           <div class="form-group col-md-12">
						          	  <label for="course_description">Description</label>
						              <textarea name='course_description' class="form-control input-lg" id='course_description' value='' placeholder="Description"></textarea>
						</div>
						  
						    <div class="form-group col-md-8">
						          	  <label for="graphic_src">Graphic-src</label>
						                <input type='text' name='graphic_src' class="form-control input-lg" id='graphic_src' value='' placeholder="Graphic-src">
						</div>
						  
						    <div class="form-group col-md-4">
				          	  <label for="graphic_alt">Graphic-alt</label>
				              <input type='text' name='graphic_alt' class="form-control input-lg" id='graphic_alt' value='' placeholder="Graphic-alt">
				        </div>
						  
						   <div class="form-group col-md-6">
				          	  <label for="language">Language</label>
				              <input type='text' name='language' class="form-control input-lg" id='language' value='' placeholder="Language">
				        </div>     
				          
				          <div class="form-group col-md-6">
				          	  <label for="lessons_count">Lessons-count</label>
				              <input type='text' name='lessons_count' class="form-control input-lg" id='lesson_count' value='' placeholder="Lessons-count">
				        </div>
						   
				          <div class="form-group col-md-6">
				          	  <label for="date_created">Date Created</label>
				              <input type='text' name='date_created' class="date_pick form-control input-lg" data-date-orientation='top auto' id='date_created' placeholder="Date Created">
				        </div>
				          
				          <div class="form-group col-md-6">
				               <label for="last_update">Last Update</label>
				               <input type='text' name='last_update'  class='date_pick form-control input-lg' id='last_update'  placeholder='Last Update'>  
				        </div>
				          
				           <div class="form-group col-md-8">
				          	  <label for="skill">Skill</label>
				              <input type='text' name='skill' class="form-control input-lg" id='skill' value='' placeholder="Skill">
				        </div>
						      
				          <div class="form-group col-md-12">
				              <button name="submit_course" type='submit' onClick="return Error_checks.automaticCheck('<?=$type?>');" class="btn btn-custom btn-lg ">Add Course</button>
				         		<a id="cancelButton" href="javascript:history.go(-1)" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'">Cancel</a>
				         </div>
					    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>