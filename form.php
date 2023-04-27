<?php

include('includes/config.php');

 

if (isset($_POST['submit'])) 

{
     $name=$_POST['name'];
     $fathername=$_POST['fathername'];
     $email=$_POST['email'];
     $pwd=MD5($_POST['pwd']);
     $age=$_POST['age']; 
     $phone=$_POST['phone'];
     $streetaddress=$_POST['streetaddress'];
     $postalcode=$_POST['postalcode'];
     $city=$_POST['city'];
     $country=$_POST['country'];
     $favlanguage=$_POST['favlanguage'];
     $vehicle1=$_POST['vehicle1'];
     $vehicle2=$_POST['vehicle2'];
     $vehicle3=$_POST['vehicle3'];
     $cars=$_POST['cars'];
     $w3review=$_POST['w3review'];
     
     $image=$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"],"uploaded/".$_FILES["image"]["name"]);
     $query = mysqli_query($con, "INSERT INTO employee(name,email,age,favlanguage,vehicle1,vehicle2,vehicle3,cars,w3review,phone,pwd,fathername,streetaddress,postalcode,city,country,image)
     VALUES('$name','$email','$age','$favlanguage','$vehicle1','$vehicle2','$vehicle3','$cars','$w3review','$phone','$pwd','$fathername','$streetaddress','$postalcode','$city','$country','$image')");
     if($query)
     {
       echo "Data inserted successfully";
     }
     else
     {
       echo "Something went wrong";
     }
     
     
     
            
}

			
	
		
		
	
	
	






?>

<html>  
<body>

<form  method="post" enctype='multipart/form-data'>

Name: <input type="text" name="name"><br>

fathername: <input type="text" name="fathername"><br>

E-mail: <input type="text" name="email"><br>

<label for="pwd">Password:</label>
<input type="password" id="pwd" name="pwd"><br>

Age : <input type="number" name="age"><br>

<label for="phone">Enter your phone number:</label>
<input type="text" id="phone" name="phone"><br> 

<div>
        <label for="streetaddress">Street address</label>
        <input type="text" id="streetaddress" name="streetaddress" autocomplete="streetaddress" required enterkeyhint="next"></input>
      
</div>

      <div>
            <label for="postalcode">ZIP or postal code (optional)</label>
            <input class="postalcode" id="postalcode" name="postalcode" autocomplete="postalcode" enterkeyhint="next">
      </div>

      <div>
           <label for="city">City</label>
            <input required type="text" id="city" name="city" autocomplete="addresslevel2" enterkeyhint="next">
      </div>

      <div>
        <label for="country">Country or region</label>
        <select id="country" name="country" autocomplete="country" enterkeyhint="done" required>
            <option></option>
            <option value="AF">Afghanistan</option>
            <option value="AX">Åland Islands</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua &amp; Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AC">Ascension Island</option>
                              
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia &amp; Herzegovina</option>
            <option value="IN">India</option>
            <option value="PK">Pakistan</option>
        </select>
      </div>
Subject :<br>
                <input type="radio" id="html" name="favlanguage" value="HTML">
                  <label for="html">HTML</label><br>
                    <input type="radio" id="css" name="favlanguage" value="CSS">
                      <label for="css">CSS</label><br>
                        <input type="radio" id="javascript" name="favlanguage" value="JavaScript">

                         <label for="javascript">JavaScript</label><br>
vehicle:<br>
              <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                  <label for="vehicle1"> I have a bike</label><br>
                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                     <label for="vehicle2"> I have a car</label><br>
                      <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                        <label for="vehicle3"> I have a boat</label><br>
                        <label for="cars">Choose a car:</label>

<select name="cars" id="cars">
      <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
         <option value="mercedes">Mercedes</option>
           <option value="audi">Audi</option>
            <option value="bmw">Bmw</option>
             <option value="bmw">Toyota</option>
              <option value="bmw">Jeep</option>
</select><br>
   <label for="w3review">Review of W3Schools:</label>

       <textarea id="w3review" name="w3review" rows="4" cols="50">
               
       </textarea><br> 
 

<div class="container">
	<h1>Select Image to Upload</h1>
	<div class="form-group">
	 <input type="file" name="image" id="file">
	</div> 
	
</div>	
<input type="submit" name="submit">
</form>

</body>
</html>
