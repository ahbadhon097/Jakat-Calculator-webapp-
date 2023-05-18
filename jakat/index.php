<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="homeStyle.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
	Welcome to my project page	
	
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

   
		<div id="header">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#header">Home</a></li>
                    <li><a href="#about">What is?</a></li>
                    <li><a href="#picks">My calculation</a></li>
                    <li><a href="#contact">Donate</a></li>
                </ul>
            </nav>
            <div class="header-text">
                <h1>Allah Made Zakat <br> <span>Obligatory</span> </h1>

            </div>
        </div>
    </div>
    <!----------about---------->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/p.jpg" alt="">
                </div>
                <div class="about-col-2">
                    <h1 class="sub">What is?</h1>
                    <p>Zakat is an Islamic finance term referring to the obligation that an individual has to donate a
                        certain proportion of wealth each year to charitable causes. Zakat is mandatory for all Muslims
                        in most countries and is considered to be a form of worship. Giving away money to the poor is
                        said to purify yearly earnings that are over and above what is required to provide a person and
                        their family with their essential needs.<br>Zakat is based on income and the value of
                        possessions. The common minimum amount for those who qualify is 2.5% or 1/40 of a Muslim's total
                        savings and wealth. </p>
                </div>
            </div>
        </div>
    </div>
    <!-----------my picks-->
    <div id="picks">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/calculation.jpg" alt="">

</div>

                <div class="about-col-2">
                <h1>My Calculations</h1>
            <form>
                <label for="income">Total Income:</label>
                <input class="total-income" type="number" id="income" name="income"
                    placeholder="Enter your total income"><br>

                <label for="debts">Total Debts:</label>
                <input class="total-debts" type="number" id="debts" name="debts"
                    placeholder="Enter your total debts"><br>

                <label for="expenses">Total Expenses:</label>
                <input class="total-expeneses" type="number" id="expenses" name="expenses"
                    placeholder="Enter your total expenses"><br>

                <button onclick="calculate()">Calculate Zakat</button>
            </form>

            <div id="result"></div>

            <script>
                function calculate() {
                    var income = document.getElementById("income").value;
                    var debts = document.getElementById("debts").value;
                    var expenses = document.getElementById("expenses").value;

                    var zakat = (income - debts) * 0.025;

                    if (zakat > expenses) {
                        document.getElementById("result").innerHTML = "Your Zakat is: " + zakat.toFixed(2) + " USD";
                    } else {
                        document.getElementById("result").innerHTML = "You do not have to pay Zakat this year.";
                    }
                }
            </script>
        </div>
    </div>
    </div>
    <!------------Contact---------->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/donation-1.jpg" alt="">
                    </div>
                    
                    <div class="about-col-2">
                        <h1>Make Donation</h1>
            <form>
                <label for="name">Name:</label>
                <input class="name-cont" type="text" id="name" name="name" placeholder="Enter your name"><br>

                <label for="email">Email:</label>
                <input class="email-cont" type="email" id="email" name="email" placeholder="Enter your email"><br>

                <label for="amount">Donation Amount:</label>
                <input class="amount-cont" type="number" id="amount" name="amount"
                    placeholder="Enter the donation amount"><br>

                <label for="message"></label>
                <textarea id="message" name="message" placeholder="Enter a message"></textarea><br>

                <button onclick="submitForm()">Submit Donation</button>
            </form>

            <script>
                function submitForm() {
                    var name = document.getElementById("name").value;
                    var email = document.getElementById("email").value;
                    var amount = document.getElementById("amount").value;
                    var message = document.getElementById("message").value;

                    // You can add a code here to submit the form to a server or payment gateway for processing.

                    alert("Thank you for your donation, " + name + "! We appreciate your support.");
                    document.getElementById("name").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("amount").value = "";
                    document.getElementById("message").value = "";
                }
            </script>
        </div>
		
		 <!-- logged in user information -->
		 <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>