<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="loadDoc();">
        <p id="check">Check Out</p>
        <form action="details.php" method="post">
            <label for="fname">First Name *</label>
            <input type="text" id="fname" name="fname" required/> <br>
            <label for="lname">Last Name *</label>
            <input type="text" id="lname" name="lname" required/> <br>
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" required/> <br>
            <label for="address1">Address Line 1 *</label>
            <input type="text" id="address1" name="address1" required/> <br>
            <label for="address2">Address Line 2</label>
            <input type="text" id="address2" name="address2"/> <br>
            <label for="city">City *</label>
            <input type="text" id="city" name="city" required/> <br>
            <label for="state">State *</label>
            <select id="state" name="state" required>
                <option value="new south wales">New South Wales</option>
                <option value="queensland">Queensland</option>
                <option value="south australia">South Australia</option>
                <option value="victoria">Victoria</option>
                <option value="western australia">Western Australia</option>
            </select> <br>
            <label for="passCode">Pass Code *</label>
            <input type="text" id="passCode" name="passCode" required/> <br>
            <label for="type">Payment Type *</label>
            <select id="type" name="type" required> 
                <option value="viza">Viza</option>
                <option value="paypal">Paypal</option>
            </select> <br>
            
            <input type="button" onclick="location.href='reservation_page.php'" value="Continue Selection"/>
            <input type="submit" value="Booking"/>
            
        </form>
        
        <p id="amount">You are required to pay</p>
    </body>
</html>

<script>
    var myObj;
    //var total = 0;
    
    function loadDoc() {
        var amount = 0
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            
            myObj = JSON.parse(this.responseText);
            
            for (let x in myObj) {
                    
                amount = amount + myObj[x].amount * myObj[x].priceperday
                

                
            }
            document.getElementById("amount").innerHTML = "You are required to pay $" + amount;
        }
        xhttp.open("GET", "read_cart.php", true);
        xhttp.send();
    }    
    
</script>

<?php

?>
