<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/shipping_styles.css">
    <style>
        @font-face {
            font-family: 'Mystical';
            src: url(fonts/DsMysticora-d9dZ.ttf);
        }
    </style>
    <meta charset="utf-8" />
    <meta name="author" content="T Temby, J Gibson, Author 3, Author 4" />
    <meta name="description" content="Assignment 2 - COMP2772" />
    <script src="scripts/script.js" defer></script>
    <title>Mystic Shop</title>
  </head>

 <body>

     
  <div class="title">
        <div class="mysticfont">
          <h1>Mystic Shop</h1>
  </div> 



<div class = "shippingdetail">

  <div class = "sub-Heading">
      <h2>Please fill out your shipping detail</h2>
      
      <br>
  </div> 


    <form action = "ship_submitpage.php"  method ="POST">
    
      <span class = "ship-fname">
          <input type="text" placeholder="First Name" id="shipfName" name="shipfName" minlength="2" required>
      </span>

     <span class = "ship-lname">
          <input type="text" placeholder="Last Name" id="shiplName" name="shiplName" minlength="2" required>
            <br>
      </span>

      <div class = "ship-Email">
          <input type="text" placeholder="Email" id="shipEmail" name="shipEmail" required>
          <br>  
       </div>

      <div class = "shipAddress">
        <input type="text" placeholder = "Address" id="shipAddress1" name="shipAddress1" required>
          <br>
        <input type="text" placeholder = "Address 2 (optional)" id="shipAddress2" name="shipAddress2">
        <br> 
      </div>
      <div class = "shipPlace">
        
        <label for ="apartment" id="shipApartment" > Select you apartment type:</label>
        <select name="shipApartment" id="apartment" required>
            <option value="spaceRock">Space Rock</option>
            <option value="Space Station">Space Station</option>
            <option value="vault">Vault</option>
            <option value="palace">Palace</option>
        
        </select>
        
      </div>
      
      <div class = "ship-Suburb">   
         <input type="text" placeholder="Suburb(Planet)" id=shipSuburb name="shipSuburb" required>
         <br>
         </div>
         
         <div class ="shipRegion">
           <label for="shipGalaxy" id="ship-Galaxy">Select your galaxy(Country):</label>
            <select name="shipGalaxy" id="shipGalaxy" required>
              <option value="milkeyway">Milkey Way</option>
              <option value="hyrule">Hyrule</option>
              <option value="diamondcity">Diamond City</option>
            
          </select>
         
          

          <span class="shipTerrotory">
            <label for="shipSystem" id="ship-System">Select your system(territory):</label>
              <select name="shipSystem" id="shipSystem" required="required">
                <option value="solar">Solar</option>
                <option value="halcyon">Halcyon</option>
                <option value="goodneighbour">Good Neighbour</option>
              </select>
          </span>
        
          <span class="postCode">
            <input type=text placeholder="Postcode" id="shipPostcode" name="shipPostcode" >
          </span>
         </div>
       


        <div class = "phoneNumber">
            <input type="text" placeholder="Phone" id="shipPhone" name="shipPhone" >
        </div> 
        <div class = "phoneNumber">
            <input type="text" placeholder="Creditcard" minlength="20" maxlength="20" id="creditcard" name="creditcard" required>
        </div> 
          
  </div>
  <div class = ship-button>
   
    <button type="submit" value="back" id="backButton" name='shipBack' onClick="window.location='index.php'">Continue shopping</button>


    <button type="submit" value="submit" id="submitButton" name="shipSubmit">Submit</button>
    <!--<button type="submit" value="back" id="backButton" name='shipBack'>Continue shopping</button>-->
    </form>
</div>

<div class = "reminder">
  <p id ="shipReminder"><b>Please double check your detail, if the product end up in other galaxy The Company will NOT take any action ( ͡° ͜ʖ ͡°)</b></p>
</div>

    




</body>
