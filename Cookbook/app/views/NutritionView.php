<?php
require_once ('./app/controllers/NutritionController.php');
require_once ('./app/views/template.php');


Class NutritionView extends template{

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
  <link rel="stylesheet" href="../../public/css/profile.css">

  <link rel="stylesheet" type="text/css" href="extensions/filter-control/bootstrap-table-filter-control.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
    <?php
      $this->header();
      $this->ingredients();
      $this->footer();
    ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

  <?php
}

//category image and title
public  function header()
{
    ?>
<div class="category-header">
  <img src="../../public/images/nutritionmanage.jpg" alt="">
  <div class="category-title">Nutrition </div>  
</div>
<?php    
}
public function ingredients(){
    ?>
    <div class="category-slogan">Ingredients Nutrition Information Per Unit</div>
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
			<th   data-field="name" data-filter-control="input" data-sortable="true">Name </th>
            <th  data-field="desc" data-filter-control="input" data-sortable="true">Calories</th>
            <th  data-field="ptime" data-filter-control="input" data-sortable="true">Fat</th>
            <th  data-field="ctime" data-filter-control="input" data-sortable="true">Protein</th>
            <th  data-field="rtime" data-filter-control="input" data-sortable="true">Carbohydrates</th>
            <th  data-field="difficulty" data-filter-control="select" data-sortable="true">Unit</th>
            <th  data-field="calories" data-filter-control="input" data-sortable="true">Healthy</th>
            <th  data-field="category" data-filter-control="select" data-sortable="true">Season</th>
		</tr>
	</thead>
	<tbody>
    <?php 
        $cntr=new NutritionController();
        $ings=$cntr->ingredients();
        foreach($ings as $r){
            ?><tr>
                <td><?php echo $r['name'] ;?></td>
                <td><?php echo $r['calories'] ;?></td>
                <td><?php echo $r['fat'] ;?></td>
                <td><?php echo $r['protein'] ;?></td>
                <td><?php echo $r['carbohydrates'] ;?></td>
                <td><?php echo $cntr->getUnit($r['unit_id']);?></td>
                <td><?php echo round((float)$r['healthy'] * 100 ) . '%' ;?></td>
                <td><?php echo $cntr->getSeason($r['season_id']);?></td>
            </tr><?php }
        
        ?>

	</tbody>
</table>
</div>
    <?php
   

}

}

