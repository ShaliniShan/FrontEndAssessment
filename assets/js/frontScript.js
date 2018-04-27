$(document).ready(function () {
	 $('#records').DataTable( {
	 "lengthMenu": [[10,25,50 -1], [10,25,50, "All"]]
} );

	 $('a.deleteRec').on('click', function(e) {
		  e.preventDefault();
		  e.stopPropagation();
		  var id = $(this).closest('tr').data('id');
		  //alert(id);
		  var row = $(this)[0].parentElement.parentElement;
		  $('#deleteModal').data({'id': id, 'row':row}).modal('show');
});

	 $('#delete_node').click(function() {
		 var id = $('#deleteModal').data('id');
		 var row = $('#deleteModal').data('row');
		 populateTable.deleteRow(id, row);
		 $('#deleteModal').modal('hide');
});

	 $('a.editRec').click(function(e) {
		 e.stopPropagation();
		 var id = $(this).closest('tr').data('id');
		 populateTable.editRow(id);
});	
	 
$(document).on('click', "#records tr", function() {
	  var selected_course_id = String($(this).data('id'));
	  var item;
	  var match = false;
			 
    $.getJSON('Inventory.json', function (json) {
				 
		for (var key in json) {
			if (json.hasOwnProperty(key)) {
				 item = json[key];
				 //alert(item.id);
				 //alert(selected_course_id);
			if (selected_course_id === item.id) {
				match = true;
				 break;
				   } 
				                   
				}
			}

		if (match) {
			var c_graphic_src = '';
			var c_graphic_alt = '';

		var c_id = '<b>Id :</b>' + selected_course_id + ',<br>';
		var c_title = '<b>Title:</b>' +item.title+',<br>';
		var c_desc = '<b>Description:</b>' +item.description +',<br>';
		var c_slug = '<b>Slug:</b>' +item.slug +',<br>';
		var c_time = '<b>Time:</b>' +item.time +',<br>';
		if (item.graphic) {
		    c_graphic_src = '<b>Graphic_src:</b>' +item.graphic.src +',<br>';
		    c_graphic_alt = '<b>Graphic_alt:</b>' +item.graphic.alt +',<br>';
		}
		var c_lang = '<b>Language:</b>' +item.language +',<br>';
		var c_skill = '<b>Skill:</b>' +item.skill +',<br>';
		var c_created = '<b>Date-Created:</b>' +item.date_created +',<br>';
		var c_updated = '<b>Last-Updated:</b>' +item.last_update +',<br>';
		var c_count = '<b>Lessons-Count:</b>' +item.lessons_count +'<br>';

		var metadata = c_id + c_title + c_desc + c_slug + c_time + c_graphic_src + c_graphic_alt + c_lang + c_skill + c_created + c_updated + c_count;
	    $('#course_details').html((metadata));
		} else {
			var detail = '<b>No course found</b>';
			$('#course_details').html((detail));
		}
				 
});
});
});
