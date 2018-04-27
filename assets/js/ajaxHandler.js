var populateTable = (function () {
	function deleteInfo($id, $row) {
		$.post("/Synopsis/delete_info.php", {id : $id}, function (data) {
			$row.style.display = "none";
		});
	}
	function editInfo($id) {
			$.post("/Synopsis/edit_info.php", {id : $id}, function (data) {
			//	$row.style.display = "none";
			});
	}
	/**
	 * @return Object      for the iife to call interanl methods
	 * @method deleteRow   removes specific row and ajax call deletes from backend
	 * @static editRow     edits specific rows 
	 */
	var publicAPI = {
		deleteRow : deleteInfo,
		editRow: editInfo
	};
	return publicAPI;
})();