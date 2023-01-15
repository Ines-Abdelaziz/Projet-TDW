<?php

require_once './app/models/Model.php';   

class RecipeModel extends Model{


  //get recipe
  public function getRecipe($recipetitle){
   
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `recipe` WHERE name='$recipetitle'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
 
// get recipe media            
public function getMedia($recipeId){
  $conn=$this->connexion("cookbook","localhost:3307","root","");
  $q= "SELECT * FROM `recipemedia` WHERE recipe_id='$recipeId'";
  $r= $this->requete($conn,$q);
  $this->deconnexion($conn);
  return $r;
}

//get recipe steps
public function getRecipeSteps($recipeId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `recipe_step` WHERE recipe_id='$recipeId' ORDER BY step_number ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }

  //get recipe ingredients
public function getRecipeIngredients($recipeId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `recipe_ingredients` WHERE recipe_id='$recipeId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }

    //get  ingredient unit
public function getIngredient($ingredientId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `ingredient` WHERE id='$ingredientId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
public function getUnit($unitId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `unit` WHERE id='$unitId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
}

public  function ifFavorite($user,$recipeId)
{
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT count(*) FROM user_favorite WHERE user_id='$user' AND recipe_id='$recipeId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r->fetchColumn();
}
  //get recipe rating
  public function getRating($recipeId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT rating FROM `recipe` WHERE id='$recipeId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r->fetchColumn();
  }
function decimalToFraction($decimal) 
{
    // Determine decimal precision and extrapolate multiplier required to convert to integer
    $precision = strpos(strrev($decimal), '.') ?: 0;
    $multiplier = pow(10, $precision);

    // Calculate initial numerator and denominator
    $numerator = $decimal * $multiplier;
    $denominator = 1 * $multiplier;

    // Extract whole number from numerator
    $whole = floor($numerator / $denominator);
    $numerator = $numerator % $denominator;

    // Find greatest common divisor between numerator and denominator and reduce accordingly
    $factor = gmp_intval(gmp_gcd($numerator, $denominator));
    $numerator /= $factor;
    $denominator /= $factor;

    // Create fraction value
    $fraction = [];
    $whole && $fraction[] = $whole;
    $numerator && $fraction[] = "{$numerator}/{$denominator}";

    return implode(' ', $fraction);
}


}

?>