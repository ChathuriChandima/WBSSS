@extends('layouts.app')

@section('content')
<img src="img/car.jpg" width="1400px" height="300px">
    <h1><img src="img/ic.png" width="70px" >
        <img src="img/contact.gif" width="200px" ></h1>
    <br><br><br>

    
<style>
body {font-family: Arial, Helvetica, sans-serif;align: center}
* {box-sizing: border-box;}
.form-container {
  
    text-align:center;
    align:center;
  max-width: 600px;
  padding: 40px;
  background-color: lightslategray;
}
  
.form-container input[type=text], select ,textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  margin-bottom:10px;
}

/* When the inputs get focus, do something */
.form-container input[type=text],select,textarea {
  background-color: white;
  outline: none;
}
        
    input[type=submit] {
            
                
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 20px;
    cursor: pointer;
    }
            
            input[type=submit]:hover {
                background-color: greenyellow;
            }
            
            </style>
            </head>
            <body>
            
                
        

  <form action="/contact.blade.php" class="form-container">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder=" ">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder=" ">

    <label for="tele">Contact No</label>
    <input type="text" id="contct" name="contact" placeholder=" ">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." ></textarea>

    <input type="submit" value="Submit">
  </form>

  
    
</body>