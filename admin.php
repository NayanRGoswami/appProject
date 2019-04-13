

<!-- Start of Header -->
<?php include_once "includes/header.inc.php"?>
<!-- End of Header -->
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>category managing page</title>
    <script src='cate_master/jquery-3.3.1.js'></script>
    <link rel="stylesheet" type="text/css" href="cate_master/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="cate_master/admin_php/admin.css">
</head>
<body>
<div id='wrap' style="height:850px">
    <div id='btn'>
    
    <p>Hello Master <strong>Admin</strong></p>
    <button id='add' class = "btn btn-primary">Add a new category</button>
    <button id="all" class = 'btn btn-primary'>See All </button>
    <a id="btn_member" href="cate_master/admin_php/post_master.php" class = 'btn btn-primary'>Post Management </a>

    </div>
    <ul style="margin-left:75%" class="nav navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../logout.php"><span class="fas fa-sign-in-alt"></span>Logout</a>
      </li>
    </ul>
<!--.............................................................-->
    <div id= "div_add" style="display:none" class = 'jumbotron'>
    <form id= 'cate_add'>
    <table id='tbl_add'>
    <tr><td><label>Category Name</label></td><td><input type="text" name="name" id="name" class = 'form-control cate_addd' ></td></tr>
    <tr><td><label>Description</label></td><td><textarea  rows="5" cols="10" wrap="soft" class = 'form-control cate_addd' name="description" id="description"> </textarea></td></tr>
    <tr><td><label>Created by</label></td><td><input type="text" name="created_by" class = 'form-control cate_addd' id="created_by"></td></tr>
    </table> 
    
    <input type="submit" id="sbmt" value = "submit" class = 'btn btn-secondary'>
    </form>
    <div id= "err"></div>
    </div>
    <!--.............................................................-->
    <div id= "div_showAll" style="display:none">
    <br>
    
    <select id = "cate_sel" class="selectpicker" data-style="btn-primary" style="margin-left:80%">
    <option value="">Sort By</option>
    <option value="cate_id">Category ID</option>
    <option value="cate_name">Category Name</option>
    <option value="cate_admin">Created by</option>
    <option value="cate_date">Date</option>
    </select>
    
    <br>
    <br>
    <div id='showAll'></div>
    </div>
<!--.............................................................-->
    <div id="div_member" style="display:none">
    <div id="show_members"></div>
    </div>

</div>

   <script src="cate_master/category_master.js"></script>
</body>
</html>

 <!-- Start of Footer -->

 <?php include_once "includes/footer.inc.php"?>
 <!-- End of Footer -->

