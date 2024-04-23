
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Quizzer</title>
        <link rel="shortcut icon" type="image/png" href="iq.jpg" />
        <style>
            body {
                width: 100%;
                background: url("download.jpg");
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                backdrop-filter: blur(8px);
            }
            body
             { line-height: 1;
                 margin: auto;
                  padding: auto; 
                }

html, body {
     width: 100%;
      height: 100%; 
      overflow: hidden; }

a:link { text-decoration: none; }

.intro {
     position: absolute;
      left: 0;
       top:20%;
        padding: 0 20px;
        width: 100%; 
         text-align: center; }
  h1 {
    color: black;
    text-transform: uppercase;
    font-size: 100px;
    font-weight: 700;
    letter-spacing: 0.015em;
  }
  h1::after {
    content: '';
    width: 200px;
    display: block;
    background: #ffee58;
    height: 6px;
    margin: 30px auto;
    line-height: 1.1;
  }
  .btn {
    display: inline-block;
    padding: 15px 30px;
    border: 2px solid black;
    text-transform: uppercase;
    letter-spacing: 0.015em;
    font-size: 18px;
    font-weight: 600;
    line-height: 1;
    color: black;
    text-decoration: none;
  }
  .btn:hover {
    color: black;
    border-color: red;
    background-color: green;
  }
  h2 {
    color:black;
    text-transform: lower case;
    font-size: 35px;
    font-weight: 700;
    letter-spacing: 0.015em;
  }
  
  @media only screen and (max-width: 1000px) {
    h1 {
      font-size: 70px;
    }
  }
  
  @media only screen and (max-width: 800px) {
    h1 {
      font-size: 48px;
    }
    h1::after {
      height: 8px;
    }
  }
  @media only screen and (max-width: 550px) {
    .btn {
    display: inline-block;
    padding: 5px 15px;
    border: 2px solid #fff;
    text-transform: uppercase;
    letter-spacing: 0.009em;
    font-size: 13px;
    font-weight: 400;
    line-height: 1;
    color: #fff;
    text-decoration: none;
    -webkit-transition: all 0.4s;
       -moz-transition: all 0.4s;
         -o-transition: all 0.4s;
            transition: all 0.4s;
    }
  }
  
  @media only screen and (max-width: 430px) {
    .btn {
    display: inline-block;
    padding: 5px 10px;
    border: 1px solid #fff;
    text-transform: uppercase;
    letter-spacing: 0.005em;
    font-size: 10px;
    font-weight: 400;
    line-height: 1;
    color: #fff;
    text-decoration: none;
    }
  }
  
  table {
  border-collapse: collapse;
  width: 300px; /* Set your desired width */
  border: 1px solid #000; /* Border color */
  position: fixed;
  bottom: 20px; /* Adjust as needed */
  left: 20px; /* Adjust as needed */
}

td {
  padding: 10px;
}

h2 {
  font-size: 24px;
  color: #333; /* Text color */
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  color: #666; /* Text color */
  line-height: 1.5;
}


  @media only screen and (max-width: 568px) {
    .intro {
      padding: 0 10px;
    }
    h1 {
      font-size: 30px;
    }
    h1::after {
      height: 6px;
    }
    p {
      font-size: 18px;
    }
    .btn {
      font-size: 16px;
    }
  }
  
  @media only screen and (max-width: 320px) {
    h1 {
      font-size: 28px;
    }
    h1::after {
      height: 4px;
    }
  }
        </style>
    </head>
    <body>
          <<table border="1" id="myTable">>
<tr><td>
<h2>Are you ready to test your knowledge and have some fun?</h2><br>
 Look no further!  here is to challenge you with a variety of exciting quizzes,
  covering a wide range of topics.<br> Whether you're a history buff, a science enthusiast, 
  a pop culture aficionado, or just someone who loves a good brain teaster 
  we have something for everyone.
            <td>
            </table>
            <centre>
            <div class="intro">
                <h1> online quiz system </h1>
                <a href="login.php" class="btn"> login </a> &emsp;
                <a href="registration.php" class="btn"> register </a>
                <h2> Good &nbsp;Luck. </h2>
            </div>
</centre>
</table>
    </body>
</html>