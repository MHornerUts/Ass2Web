
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="loadDoc();">
        <input type="button" onclick="location.href='reservation_page.php'" value="Car Reservation"/>
        <div id="holder" class="gridcontainer"></div>
    </body>
</html>

<script>
    var myObj;
    
    function loadDoc() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            myObj = JSON.parse(this.responseText);
            
            for (let x in myObj.cars) {
                
                
                const img = new Image(100, 100);
                img.src = "images/" + myObj.cars[x].model + ".jpg";
               
                
                let btn1 = document.createElement('button');
                
                btn1.innerHTML = "Add Item";
                
                
                
                btn1.addEventListener("click", function () {
                    addItem(myObj.cars[x])
                })
                
                const cont = document.createElement('div');
                
                cont.classList.add('card');
                
                cont.appendChild(img);
                
                const card = document.createElement('div');
                
                cont.classList.add("container");
                
                let name = document.createElement('h4')
                
                name.innerHTML = myObj.cars[x].brand + "-" + myObj.cars[x].model + "-" + myObj.cars[x].modelyear;
                
                let mileage = document.createElement('p');
                
                let fuel = document.createElement('p');
                
                let seats = document.createElement('p');
                
                let price = document.createElement('p');
                
                let avi = document.createElement('p');
                
                let desc = document.createElement('p');
                
                mileage.innerHTML = "<b> Milage:  </b>" + myObj.cars[x].mileage;
                
                fuel.innerHTML = "<b> Fuel type:  </b>" + myObj.cars[x].fueltype;
                
                seats.innerHTML = "<b> Seats:  </b>" + myObj.cars[x].seats;
                
                price.innerHTML = "<b> Price Per Day:  </b>" + myObj.cars[x].priceperday;
                
                avi.innerHTML = "<b> Availiablity:  </b>" + myObj.cars[x].availability;
                
                desc.innerHTML = "<b> Description:  </b>" + myObj.cars[x].description;
                
                
                card.appendChild(name);
                
                card.appendChild(mileage);
                
                card.appendChild(fuel);
                
                card.appendChild(seats);
                
                card.appendChild(price);
                
                card.appendChild(avi);
                
                card.appendChild(desc);
                
                card.appendChild(btn1);
                
                cont.appendChild(card);
                
                document.getElementById("holder").appendChild(cont);

                
            }
            
        }
        xhttp.open("GET", "read_carsjson.php", true);
        xhttp.send();
    }
    
    function addItem(item) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            if (this.responseText == "Y") {
                alert("Added to the cart successfully")
            } else {
                alert("Sorry, the car is not available now. Please try other cars.")
            }
        }
        };
        xmlhttp.open("GET", "check_carsjson.php?model=" + item.brand + "-" + item.model + "-" + item.modelyear, true);
        xmlhttp.send();    
    }
    
</script>