<?php
// Start session
session_start();

// Check if user is logged in
if(empty($_SESSION['customer_email'])) {
    // Redirect to login page if not logged in
    header("Location: ./ecom/login.php");
    exit; // Stop further execution
}
// Include the products controller file
include_once("../controllers/category_controller.php");


// include_once("./settings/core.php");

// Call the display products controller function
$category = display_category_ctr();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./ecom/css/admin_style.css">

  
  <body>
    <div class="container-fluid">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Category</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#deleteCategoryModal" class="delete btn btn-danger" data-toggle="modal" data-target="#deleteCategoryModal" data-productid="' . $product['product_id'] . '">
							<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i> <span>Delete</span>
						</a>											
						<a href="#addCategoryModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Category</span></a>
						<a href="#logoutModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Logout</span></a>	
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>category_name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if categories are available
                if ($category) {
                    // Iterate through each category and display its details
                    foreach ($category as $cat) {
                        echo "<tr>";
                        echo "<td>";
                        echo '<span class="custom-checkbox">';
                        echo '<input type="checkbox" id="checkbox' . $cat['cat_id'] . '" name="options[]" value="' . $cat['cat_id'] . '">';
                        echo '<label for="checkbox' . $cat['cat_id'] . '"></label>';
                        echo '</span>';
                        echo "</td>";
                        // Display category name instead of ID
                        echo "<td>" . $cat['cat_name'] . "</td>";
                        echo '<td>';
                        echo '<a href="#editCategoryModal" class="edit" data-toggle="modal" data-catid="' . $cat['cat_id'] . '"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#" class="delete" data-toggle="modal" data-target="#deleteCategoryModal" data-catid="' . $cat['cat_id'] . '">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>';
                        echo '</td>';
                        echo "</tr>";
                    }
                } else {
                    // If no categories are available, display a message
                    echo "<tr><td colspan='9'>No categories found</td></tr>";
                }
                ?>
            </tbody>
        </table>			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addCategoryModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="./actions/addcat_process.php" method="post" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add Category</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
                        <div class="form-group">
							<label>category_name</label>
							<input type="text" name="cat_name" class="form-control" required>
						</div>			
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	
<!-- Edit Modal HTML -->
<!-- Edit Modal HTML -->
<div id="editCategoryModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./actions/updatecat_process.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">                        
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" id="editCategoryName" name="cat_name" class="form-control" required>
                    </div>
                    <input type="hidden" id="editCategoryId" name="cat_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

	<!-- Delete Modal HTML -->
<!-- Delete Modal HTML -->
<!-- Delete Modal HTML -->
<div id="deleteCategoryModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./actions/delcat_process.php" method="post">
                <div class="modal-header">                        
                    <h4 class="modal-title">Delete Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <p>Are you sure you want to delete this category?</p>
                    <input type="hidden" id="deleteCategoryId" name="cat_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <div id="logoutModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="./actions/logout.php">
					<div class="modal-header">						
						<h4 class="modal-title">Logout</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to logout?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Logout">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script>
    $(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>

<script>
$(document).ready(function(){
    // Set category ID when delete button is clicked
    $('.delete').click(function(){
        var categoryId = $(this).data('catid');
        $('#deleteCategoryId').val(categoryId);
    });
});
</script>

<script>
$(document).ready(function(){
    // Populate the form fields with category details when the edit button is clicked
    $('.edit').click(function(){
        var categoryId = $(this).closest('tr').find('input[type="checkbox"]').val();
        var categoryName = $(this).closest('tr').find('td:nth-child(2)').text();

        // Set the values of the form fields
        $('#editCategoryId').val(categoryId);
        $('#editCategoryName').val(categoryName);
    });
});
</script>

</html>

<!-- <li><a class="sidebar-nav-link">Logout</a></li> -->
