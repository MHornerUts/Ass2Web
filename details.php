<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="loadDoc();">
        <p id="details">Delivery details</p>
        <label for="fname">First Name </label>
        <b><?php echo $_POST['fname'];?> </b> <br>
        <label for="lname">Last Name </label>
        <b><?php echo $_POST['lname'];?> </b> <br>
        <label for="email">Email Address </label>
        <b><?php echo $_POST['email'];?> </b> <br>
        <label for="address1">Address Line 1 </label>
        <b><?php echo $_POST['address1'];?> </b> <br>
        <label for="city">City </label>
        <b><?php echo $_POST['city'];?> </b> <br>
        <label for="state">State </label>
        <b><?php echo $_POST['state'];?> </b> <br>
        <label for="passCode">Pass Code </label>
        <b><?php echo $_POST['passCode'];?> </b> <br>
        <label for="type">Payment Type </label>
        <b><?php echo $_POST['type'];?> </b> <br>
    </body>
</html>

<script>
    var myObj;
    
    function loadDoc() {
        var amount = 0
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            
            myObj = JSON.parse(this.responseText);
            
            for (let x in myObj) {
                    
                amount = amount + myObj[x].amount * myObj[x].priceperday
             
                const img = new Image(100, 100);
                
                img.src = "images/" + myObj[x].model + ".jpg";
                
                
                const div = document.createElement('div');
                
                const veh = document.createElement("p");
                
                const price = document.createElement("p");
                
                const amo = document.createElement("p");
                
                price.innerHTML = "Price per day " + myObj[x].priceperday;
                
                veh.innerHTML = x;
                
                amo.innerHTML = "Amount of days " + myObj[x].amount;
                
                div.appendChild(img);
                
                
                div.appendChild(veh);
                
                div.appendChild(price);
                
                div.appendChild(amo);
                
            
                
                document.body.appendChild(div);    
                
            }
            
            const total = document.createElement('p');
            
            total.innerHTML = "The total amount owed $" + amount;
            
            document.body.appendChild(total);
            
            
            
        }
        xhttp.open("GET", "read_cart_final.php", true);
        xhttp.send();
    }    
    
</script>

