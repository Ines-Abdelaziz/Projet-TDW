<?php
require_once ('./app/controllers/FestivalsController.php');
require_once ('./app/views/template.php');


Class AdminUserView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body style="background: #0D0D0D !important;">
  <link rel="stylesheet" href="../../public/css/category.css">
  <link rel="stylesheet" href="../../public/css/adminuser.css">
  <link rel="stylesheet" type="text/css" href="extensions/filter-control/bootstrap-table-filter-control.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
    <?php
      $this->header();
      $this->waitingList();
      $this->users();
      $this->footer();
    ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

  </body>
  <?php
}

//category image and title
public  function header()
{
    ?>
<div class="category-header">
  <img src="../../public/images/usermanage.jpg" alt="">
  <div class="category-title">User Management</div>  
</div>
<?php    
}

public function waitingList(){
    ?>
    <div class="category-slogan">Users on Hold</div>
    <div class="container" style="max-height:300px  ;">
<table id="table" 
			 data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-click-to-select="true"
			 data-toolbar="#toolbar"
       class="table-responsive">
	<thead>
		<tr>
        <th data-field="id" data-filter-control="input" data-sortable="true">Id</th>
			<th data-field="email"  data-filter-control="input" data-sortable="true">Email </th>
            <th data-field="fname" data-filter-control="input" data-sortable="true">First Name</th>
            <th data-field="lname" data-filter-control="input" data-sortable="true">Last Name</th>
			<th data-field="date" data-filter-control="datepicker" data-sortable="true">Birth Date</th>
			<th data-field="gender" data-filter-control="select" data-sortable="true" >Sexe</th>
            <th></th>
            <th></th>
            <th></th>
		</tr>
	</thead>
	<tbody>
    <?php 
        $cntr=new AdminUserController();
        $temp_users=$cntr->waitingList();
        foreach($temp_users as $t){
            ?><tr>
                <td><?php echo $t['id'] ;?></td>
                <td><?php echo $t['email'] ;?></td>
                <td><?php echo $t['first_name'] ;?></td>
                <td><?php echo $t['last_name'] ;?></td>
                <td><?php echo $t['birth_date'] ;?></td>
                <td><?php $s=$t['sexe']; if($s==0){echo "Female";}elseif($s==1){echo "Male";} ;?></td>
                <td><form action="./app/controllers/apiroute.php" method="post"><input name="invalidate" value="<?php echo $t['id'] ?>" hidden ><button onclick="this.form.submit()">Invalidate</button></form></td>
                <td><form action="./app/controllers/apiroute.php" method="post"><input name="validate" value="<?php echo $t['id'] ?>" hidden ><button onclick="this.form.submit()">Validate</button></form></td>
            </tr><?php
        }
        ?>

	</tbody>
</table>
</div>
    <?php
   

}
public function users(){
    ?>
    <div class="category-slogan">Users</div>
    <div class="container">




<table id="table" 
			 data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-click-to-select="true"
			 data-toolbar="#toolbar"
       class="table-responsive">
	<thead>
		<tr>
        <th data-field="id" data-filter-control="input" data-sortable="true">Id</th>
			<th data-field="email"  data-filter-control="input" data-sortable="true">Email </th>
            <th data-field="fname" data-filter-control="input" data-sortable="true">First Name</th>
            <th data-field="lname" data-filter-control="input" data-sortable="true">Last Name</th>
			<th data-field="date" data-filter-control="datepicker" data-sortable="true">Birth Date</th>
			<th data-field="gender" data-filter-control="select" data-sortable="true" >Sexe</th>
            <th></th>
            <th></th>
            <th></th>
		</tr>
	</thead>
	<tbody>
    <?php 
        $cntr=new AdminUserController();
        $temp_users=$cntr->users();
        foreach($temp_users as $t){
            ?><tr>
                <td><?php echo $t['id'] ;?></td>
                <td><?php echo $t['email'] ;?></td>
                <td><?php echo $t['first_name'] ;?></td>
                <td><?php echo $t['last_name'] ;?></td>
                <td><?php echo $t['birth_date'] ;?></td>
                <td><?php $s=$t['sexe']; if($s==0){echo "Female";}elseif($s==1){echo "Male";} ;?></td>
                <td><form action="./app/controllers/apiroute.php" method="post"><input name="makeadmin" value="<?php echo $t['id'] ?>" hidden ><button onclick="this.form.submit()">Make Admin</button></form></td>
                <td><form action="./app/controllers/apiroute.php" method="post"><input name="delete" value="<?php echo $t['id'] ?>" hidden ><button onclick="this.form.submit()">Delete</button></form></td>
                <td><form action="./app/controllers/apiroute.php" method="post"><input name="profile" value="<?php echo $t['id'] ?>" hidden ><button onclick="this.form.submit()">ViewProfile</button></form></td>
            </tr><?php
        }
        ?>

	</tbody>
</table>
</div>
    <?php
   

}
}