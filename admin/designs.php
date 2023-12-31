<?php
if (isset($_SESSION['b_id'])) {
    $b_id = $_SESSION['b_id'];



} else {

    header('Location: ../');
    exit();
}
?>
				
			<div class="main-content">
					<div class="row">
						<div class="col-md-12">
						<div class="table-wrapper">
							
						<div class="table-title">
							<div class="row">
								<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
									<h2 class="ml-lg-2">Designs</h2>
								</div>
								<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
								<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
								<i class="material-icons">&#xE147;</i>
								<span>Add Design</span>
								</a>
								<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
								<i class="material-icons">&#xE15C;</i>
								<span>Delete</span>
								</a>
								</div>
							</div>
						</div>
						
						<table class="table table-striped table-hover">
							<thead>
								<tr>
								<th><span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label></th>
								<th>Design</th>
								<th>Type</th>
								<th>Price</th>
								<th>Actions</th>
								</tr>
							</thead>
							
							<tbody>


									<?php
										$de_sql = "SELECT * FROM product WHERE b_id='$b_id' AND book_order='1' ";
										$de_result = mysqli_query($con,$de_sql);
										$de_num = mysqli_num_rows($de_result);
										if($de_num != 0){
											while($de_row = mysqli_fetch_array($de_result)){
												$i=0;
												?>

												<tr>
												<th><span class="custom-checkbox">
												<input type="checkbox" id="checkbox1" name="option[]" value="<?=$i++?>">
												<label for="checkbox1"></label></th>
												<th><?=$de_row['pro_name']?></th>
												<th><?=$de_row['pro_type']?></th>
												<th><?=$de_row['price']?></th>
												<th>
													<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
												</a>
												<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
												<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
												</a>
												</th>
												</tr>

												<?php
											}
										}

									?>
								
								
								<!-- <tr>
								<th><span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="option[]" value="1">
								<label for="checkbox2"></label></th>
								<th>Dominique Perrier</th>
								<th>dominiquePerrier@gmail.com</th>
								<th>90r ser57, Berlin poland Bermany.</th>
								<th>(78-5235-2-9)</th>
								<th>
									<a href="#editEmployeeModal" class="edit" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
								</a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
								</a>
								</th>
								</tr>
								
								
								<tr>
								<th><span class="custom-checkbox">
								<input type="checkbox" id="checkbox3" name="option[]" value="1">
								<label for="checkbox3"></label></th>
								<th>Marai Andres</th>
								<th>MarariAndres@gmail.com</th>
								<th>90r ser57, Berlin poland Bermany.</th>
								<th>(78-239-669)</th>
								<th>
									<a href="#edit" class="edit" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
								</a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
								</a>
								</th>
								</tr>
								
								<tr>
								<th><span class="custom-checkbox">
								<input type="checkbox" id="checkbox4" name="option[]" value="1">
								<label for="checkbox4"></label></th>
								<th>Vishweb Design</th>
								<th>vishwebdesign@gmail.com</th>
								<th> B-2 ser57 Nodia East Delhi,India.</th>
								<th>(78-239-669)</th>
								<th>
									<a href="#editEmployeeModal" class="edit" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
								</a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
								</a>
								</th>
								</tr>
								
								<tr>
								<th><span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="option[]" value="1">
								<label for="checkbox5"></label></th>
								<th>Vishwajeet Kumar</th>
								<th>vishkumar234@gmail.com</th>
								<th> B-2 ser57 Nodia East Delhi,India.</th>
								<th>(78-555-229)</th>
								<th>
									<a href="#editEmployeeModal" class="edit" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
								</a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
								</a>
								</th>
								</tr> -->
								
							</tbody>
							
							
						</table>
						
						<div class="clearfix">
							<div class="hint-text">showing <b>5</b> out of <b>25</b></div>
							<ul class="pagination">
								<li class="page-item disabled"><a href="#">Previous</a></li>
								<li class="page-item "><a href="#"class="page-link">1</a></li>
								<li class="page-item "><a href="#"class="page-link">2</a></li>
								<li class="page-item active"><a href="#"class="page-link">3</a></li>
								<li class="page-item "><a href="#"class="page-link">4</a></li>
								<li class="page-item "><a href="#"class="page-link">5</a></li>
								<li class="page-item "><a href="#" class="page-link">Next</a></li>
							</ul>
						</div>
						
						
						
						
		
						
						
						
						
						</div>
						</div>
						
						
										<!----add-modal start--------->
			<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Add Design Category</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Category Name</label>
				<input type="text" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Category Details</label>
				<textarea class="form-control" required></textarea>
			</div>
			<div class="form-group">
			<span>Upload Category Image</span>
								<div class="field image form-control">
									<button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imgup22"><span class="bi bi-file-image"></span> Upload Image-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
									<input style="display:none" type="file" onchange="getPicture(this.value)" name="updateimage" class="form-control" id="imgup22" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
									<div style="color:red" class="btn btn-outline-info" id="display-picture" data-bs-toggle="modal" data-bs-target="#drop2"></div>
								</div>

								<script>
										function getPicture(imagenameup){
											var newimgup = imagenameup.replace(/^.*\\/,"");
											$('#display-picture').html(newimgup);
										}
								</script>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-success">Add</button>
		</div>
		</div>
	</div>
	</div>

						<!----edit-modal end--------->
						
						
						
						
						
					<!----edit-modal start--------->
			<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Edit Employees</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="emil" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea class="form-control" required></textarea>
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" class="form-control" required>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-success">Save</button>
		</div>
		</div>
	</div>
	</div>

						<!----edit-modal end--------->	   
						
						
						<!----delete-modal start--------->
			<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Delete Employees</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<p>Are you sure you want to delete this Records</p>
			<p class="text-warning"><small>this action Cannot be Undone,</small></p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-success">Delete</button>
		</div>
		</div>
	</div>
	</div>

						<!----edit-modal end--------->   
						
						
						
					
					</div>
				</div>
			
				<!------main-content-end-----------> 
		