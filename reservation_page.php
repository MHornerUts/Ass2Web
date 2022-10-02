<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="loadDoc()">
        <p id="reservation">THIS IS THE RESERVATION PAGE</p>
        <p id="emptycart"></p>
    </body>
</html>
<script>
    var myObj;
    
    var empty;
    
    var textboxes = [];
    
    function loadDoc() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText == "Empty!") {
                document.getElementById("emptycart").innerHTML = "Cart is empty!";
                
                empty = true;
            } else {
                myObj = JSON.parse(this.responseText);
                
                empty = false;
                
                for (let x in myObj) {
                    const img = new Image(100, 100);
                    img.src = "images/" + myObj[x].model + ".jpg";
                    
                    
                    const div = document.createElement('div');
                    
                    const veh = document.createElement("p");
                    
                    const amo = document.createElement("p");
                    
                    amo.innerHTML = "Price per day: " + myObj[x].priceperday;
                    
                    veh.innerHTML = x;
                    
                    const textbox = document.createElement("input");
                    
                    
                    
                    textbox.setAttribute('type', "text");
                    
                    textbox.addEventListener("keyup", function() {
                        myObj[x].amount = textbox.value
                    })
                    
                    textboxes.push(textbox);
                    
                    let btn1 = document.createElement('button');
                    
                    btn1.innerHTML = "Delete Item";
                    
                    
                    btn1.addEventListener("click", function () {
                        deleteItem(myObj[x]);
                    })
                    
                    div.appendChild(img);
                    
                    
                    div.appendChild(veh);
                    
                    div.appendChild(amo);
                    
                    div.appendChild(textbox);
                    
                    div.appendChild(btn1);
                    
                    
                    
                    document.body.appendChild(div);
                }
                
            
                
            }
            
            let btn2 = document.createElement('button');
            document.body.appendChild(btn2);
            
            btn2.innerHTML = "Proceed to checkout"
            
            btn2.addEventListener("click", function () {
                        checkout();
            })
        }
        xhttp.open("GET", "read_cart.php", true);
        xhttp.send();
    }
    
    function deleteItem(item) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            alert("Item deleted");
            location.reload(); 
            
        }
        };
        xmlhttp.open("GET", "delete_item.php?model=" + item.brand + "-" + item.model + "-" + item.modelyear, true);
        xmlhttp.send();    
    }
    
    function checkout() {
        if (empty) {
            alert("The cart is empty")
            location.href = "index.php"
        } else if (validate() == false) {
               alert("One or more textfields has an invalid value!") 
        } else {
            let myString = JSON.stringify(myObj);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.href = "checkout.php";
                }
            };
            xmlhttp.open("GET", "set_amount.php?obj=" + myString, true);
            xmlhttp.send();   
            
            
        }    
    }
    
    
    function validate() {
        
        for (var i = 0; i < textboxes.length; i++) {
            
            if ( isNaN(textboxes[i].value)) {
                
                return false;
            } else if (textboxes[i].value == "" || textboxes[i].value < 1 || textboxes[i].value % 1 != 0) {
                return false
            }
            
            
        }
        
        return true;
        
        
    }    
    
    
</script>
