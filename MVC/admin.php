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
include_once("./controllers/product_controller.php");

// include_once("./settings/core.php");

// Call the display products controller function
$products = display_products_ctr();

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
						<h2>Manage <b>Products</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#deleteProductModal" class="delete btn btn-danger" data-toggle="modal" data-target="#deleteProductModal" data-productid="' . $product['product_id'] . '">
							<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i> <span>Delete</span>
						</a>											
						<a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
						<a href="#logoutModal" class="btn btn-dang
                        
                        er" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Logout</span></a>	
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
                        <th>product_cat</th>
                        <th>product_brand</th>
						<th>product_title</th>
                        <th>product_price</th>
                        <th>product_desc</th>
                        <th>product_image</th>
                        <th>product_keywords</th>
						<th></th>
                    </tr>
                </thead>
				<tbody>
    <?php
    // Check if products are available
    if ($products) {
        // Iterate through each product and display its details
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>";
            echo '<span class="custom-checkbox">';
            echo '<input type="checkbox" id="checkbox' . $product['product_id'] . '" name="options[]" value="' . $product['product_id'] . '">';
            echo '<label for="checkbox' . $product['product_id'] . '"></label>';
            echo '</span>';
            echo "</td>";
            echo "<td>" . $product['product_cat'] . "</td>";
            echo "<td>" . $product['product_brand'] . "</td>";
            echo "<td>" . $product['product_title'] . "</td>";
            echo "<td>" . $product['product_price'] . "</td>";
            echo "<td>" . $product['product_desc'] . "</td>";
            echo "<td>" . $product['product_image'] . "</td>";
            echo "<td>" . $product['product_keywords'] . "</td>";
            // Add the data in the last column
            echo '<td>';
            echo '<a href="#editProductModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
			<a href="#" class="delete" data-toggle="modal" data-target="#deleteProductModal" data-productid="' . $product['product_id'] . '">
			<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
		    </a>';
            echo '</td>';
            echo "</tr>";
        }
    } else {
        // If no products are available, display a message
        echo "<tr><td colspan='9'>No products found</td></tr>";
    }
    ?>
</tbody>
        </table>
			<div class="clearfix">
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
	<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="./actions/addprod_process.php" method="post" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>product_cat</label>
							<input type="number" name="product_cat" class="form-control" required>
						</div>
						<div class="form-group">
							<label>product_brand</label>
							<input type="number" name="product_brand" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>product_title</label>
							<input type="text" name="product_title" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>product_price</label>
							<input type="number" name="product_price" class="form-control" required>
						</div>
						<div class="form-group">
							<label>product_desc</label>
							<textarea name="product_desc" class="form-control" required></textarea>
						</div>
                        <div class="form-group">
							<label for="product_image">Upload product Image</label>
                            <input type="file" id="product_image" name="product_image" class="form-control border-0 py-3 mb-4" accept="image/*">

						</div>
                        <div class="form-group">
							<label>product_keywords</label>
							<input type="text" name="product_keywords" class="form-control" required>
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
<div id="editProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./actions/updateprod_process.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">                        
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label>Product Category</label>
                        <input type="number" id="editProductCat" name="product_cat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Brand</label>
                        <input type="number" id="editProductBrand" name="product_brand" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="editProductTitle" name="product_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" id="editProductPrice" name="product_price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea id="editProductDesc" name="product_desc" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editProductImage">Upload Product Image</label>
                        <input type="file" id="editProductImage" name="product_image" class="form-control border-0 py-3 mb-4" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input type="text" id="editProductKeywords" name="product_keywords" class="form-control" required>
                    </div>
                    <input type="hidden" id="editProductId" name="product_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
...

	<!-- Delete Modal HTML -->
<!-- Delete Modal HTML -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./actions/delprod_process.php" method="post">
                <div class="modal-header">                        
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <p>Are you sure you want to delete this product?</p>
                    <input type="hidden" id="deleteProductId" name="product_id" value="">
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
        // Set product ID when delete button is clicked
        $('.delete').click(function(){
            var productId = $(this).data('productid');
            $('#deleteProductId').val(productId);
        });
    });
</script>
<script>
	$(document).ready(function(){
    // Populate the form fields with product details when the edit button is clicked
    $('.edit').click(function(){
        var productId = $(this).closest('tr').find('input[type="checkbox"]').val();
        var productCat = $(this).closest('tr').find('td:nth-child(2)').text();
        var productBrand = $(this).closest('tr').find('td:nth-child(3)').text();
        var productTitle = $(this).closest('tr').find('td:nth-child(4)').text();
        var productPrice = $(this).closest('tr').find('td:nth-child(5)').text();
        var productDesc = $(this).closest('tr').find('td:nth-child(6)').text();
        var productKeywords = $(this).closest('tr').find('td:nth-child(8)').text();

        // Set the values of the form fields
        $('#editProductId').val(productId);
        $('#editProductCat').val(productCat);
        $('#editProductBrand').val(productBrand);
        $('#editProductTitle').val(productTitle);
        $('#editProductPrice').val(productPrice);
        $('#editProductDesc').val(productDesc);
        $('#editProductKeywords').val(productKeywords);
    });
});

</script>
</html>

<!-- <li><a class="sidebar-nav-link">Logout</a></li> -->
