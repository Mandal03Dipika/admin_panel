<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Json</title>
</head>

<body>
    <h1>Test Json</h1>
    <div class="container" id="result_panel">
        <li></li>
    </div>
</body>
<script>
    var data_set={
    "firstName": "Rack",
    "lastName": "Jackon",
    "gender": "man",
    "age": 24,
    "address": {
        "streetAddress": "126",
        "city": "San Jone",
        "state": "CA",
        "postalCode": "394221"
    },
    "phoneNumbers": [
        { "type": "home", "number": "7383627627" },
        { "type": "office", "number": "7383627627" }
    ]
    };
    var cont = document.getElementById('result_panel');
    var div = document.createElement("div");
    var str="";
    for (let i=0;i<data_set.phoneNumbers.length;i++)
    {
        str=str+" <div>"+data_set.phoneNumbers[i].type+" "+data_set.phoneNumbers[i].number+"</div>";
    }
    cont.innerHTML='<div>First Name: '+data_set.firstName+'</div><div> Last Name: '
    +data_set.lastName+'</div><div> Gender: '+data_set.gender+'</div><div> Age: '+data_set.age
    +'</div><div> Address: Street Address: '+data_set.address.streetAddress+'</div><div> City: '+data_set.address.city
    +'</div><div> State: '+data_set.address.state+'</div><div> Postal Code: '+data_set.address.postalCode+'</div><div style="padding:10px;"> Phone Numbers: '+str+'</div>';
    // cont.appendChild(div);
</script>

</html>