<?php 
    spl_autoload_register(function($class){
        require_once "classes/".$class.".php";
    });
    /* create student class object */
    $studentObj = new Student;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>
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
</head>
<?php 
    /* pagination number active */
    if(isset($_GET['page-nr'])){
        $id = $_GET['page-nr'];
    }else{
        $id = 1;
    }
?>
<body id=<?php echo $id; ?> >
<div class="container-xl">
    <?php
        /* Insert Data */
        if(isset($_POST['submit']) && $_POST['submit'] === 'Add'){
            $name = $_POST['name'];
            $dep  = $_POST['department'];
            $age  = $_POST['age'];

            $studentObj->insertData($name, $dep, $age);

            if(!empty($studentObj->errors)){
                foreach($studentObj->errors as $value){
                    echo "<div class='alert alert-danger alert-dismissible fade show mb-4 mt-4' role='alert'>
                        <strong>$value</strong>
                        <button type='button' class='close pt-2 pb-2 btn shadow-none' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                }
            }else{
                echo "<div class='alert alert-success alert-dismissible fade show mb-4 mt-4' role='alert'>
                        <strong>Successfully Student Added</strong>
                    <button type='button' class='close pt-2 pb-2 btn shadow-none' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
            }
        }

        /* Update Data */
        if(isset($_POST['submit']) && $_POST['submit'] === 'Save'){
            $get_id = $_POST['get_id'];
            $name   = $_POST['name'];
            $dep    = $_POST['department'];
            $age    = $_POST['age'];

            $studentObj->updateData($name, $dep, $age, $get_id);

            if(!empty($studentObj->errors)){
                foreach($studentObj->errors as $value){
                    echo "<div class='alert alert-danger alert-dismissible fade show mb-4 mt-4' role='alert'>
                        <strong>$value</strong>
                        <button type='button' class='close pt-2 pb-2 btn shadow-none' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                }
            }else{
                echo "<div class='alert alert-success alert-dismissible fade show mb-4 mt-4' role='alert'>
                        <strong>Successfully Student Updated</strong>
                    <button type='button' class='close pt-2 pb-2 btn shadow-none' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
            }
        }
        /* Delete data */
        if(isset($_POST['submit']) && $_POST['submit'] === 'Delete'){
            $get_id = $_POST['get_id'];

            $studentObj->deleteData($get_id);

            if(!empty($studentObj->errors)){
                foreach($studentObj->errors as $value){
                    echo "<div class='alert alert-danger alert-dismissible fade show mb-4 mt-4' role='alert'>
                        <strong>$value</strong>
                        <button type='button' class='close pt-2 pb-2 btn shadow-none' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                }
            }else{
                echo "<div class='alert alert-success alert-dismissible fade show mb-4 mt-4' role='alert'>
                        <strong>Successfully Student Deleted</strong>
                    <button type='button' class='close pt-2 pb-2 btn shadow-none' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
            }
        }
        /* Delete all data */
        if(isset($_POST['submit']) && $_POST['submit'] === 'Delete All'){
            $studentObj->deleteAll();
            echo "<div class='alert alert-success alert-dismissible fade show mb-4 mt-4' role='alert'>
                    <strong>Successfully Deleted All Student</strong>
                <button type='button' class='close pt-2 pb-2 btn shadow-none' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }

        /* pagination last and 1st page */
        if(isset($_GET['page-nr'])){
            $page               = $_GET['page-nr'] - 1;
            $studentObj->start  = $page * $studentObj->row_per_page;
        }
    ?>
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Students</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>All Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Department</th>
						<th>Age</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                    <?php 
                        $i = 0;
                        foreach($studentObj->readAll() as $key => $value){
                        $i++;
                    ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['department']; ?></td>
						<td><?php echo $value['age']; ?></td>
						<td>
							<a href="#editEmployeeModal-<?php echo $value['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal-<?php echo $value['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
                    <!-- Edit Modal HTML -->
                    <div id="editEmployeeModal-<?php echo $value['id']; ?>" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" method="POST">
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Edit Student</h4>
                                        <button type="button" class="close btn shadow-none" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">					
                                    <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $value['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" name="department" class="form-control" value="<?php echo $value['department']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" name="age" class="form-control" value="<?php echo $value['age']; ?>">
                                        </div>					
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="get_id" value="<?php echo $value['id']; ?>">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" name="submit" class="btn btn-info" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Modal HTML -->
                    <div id="deleteEmployeeModal-<?php echo $value['id']; ?>" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" method="POST">
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Delete Student</h4>
                                        <button type="button" class="close btn shadow-none" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">					
                                        <p>Are you sure you want to delete <span class="text-danger"><?php echo $value['name']; ?></span> Records?</p>
                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="get_id" value="<?php echo $value['id']; ?>">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
				</tbody>
			</table>
			<div class="clearfix">
                <?php
                    if(!isset($_GET['page-nr'])){
                        $page = 1;
                    }else{
                        $page = $_GET['page-nr'];
                    }
                ?>
				<div class="hint-text">Showing <b><?php echo $page; ?></b> out of <b><?php echo $studentObj->perPage(); ?></b> entries</div>
				
                <ul class="pagination">
                    <!-- FIRST PAGE -->
                    <li class="page-item"><a href="?page-nr=1" class="page-link">First</a></li>
					<!-- PREVIOUS PAGE -->
                    <?php
                        if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){  
                    ?>
                    <li class="page-item"><a href="?page-nr=<?php echo $_GET['page-nr'] - 1; ?>" class="page-link">Previous</a></li>
					<?php 
                        }else{
                    ?>
                        <li class="page-item"><a href="" class="page-link disabled">Previous</a></li>
                    <?php } ?>
                    <!-- PAGE NUMBER -->
                    <?php
                        for($counter = 1; $counter <= $studentObj->perPage(); $counter ++){
                    ?>
                    <li class="page-item page-number"><a href="?page-nr=<?php echo $counter; ?>" class="page-link"><?php echo $counter; ?></a></li>
                    <?php } ?>
                    <!-- NEXT PAGE -->
                    <?php 
                        if(!isset($_GET['page-nr'])){
                    ?>
					<li class="page-item"><a href="?page-nr=2" class="page-link">Next</a></li>
                    <?php 
                        }else{
                            if($_GET['page-nr'] >= $studentObj->perPage() ){
                        ?>
                            <li class="page-item"><a href="" class="page-link disabled">Next</a></li>
                        <?php 
                            }else{    
                        ?>
                        <li class="page-item"><a href="?page-nr=<?php echo $_GET['page-nr'] + 1; ?>" class="page-link">Next</a></li>
                        <?php }} ?>
                    <!-- LAST PAGE -->
                    <li class="page-item"><a href="?page-nr=<?php echo $studentObj->perPage(); ?>" class="page-link">Last</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Add Student</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Department</label>
						<input type="text" name="department" class="form-control">
					</div>
					<div class="form-group">
						<label>Age</label>
						<input type="text" name="age" class="form-control">
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">						
                    <h4 class="modal-title">Delete Student</h4>
                    <button type="button" class="close btn shadow-none" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <p>Are you sure you want to delete all Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="submit" class="btn btn-danger" value="Delete All">
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    let links   = document.querySelectorAll('.page-number');
    let bodyId  = parseInt(document.body.id) - 1;
    links[bodyId].classList.add("active");
</script>
</body>
</html>