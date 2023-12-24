// external JavaScript document (siteJavascript.js)

// function use: to adjust (toggle) display of navigation bar when screen width <= 600px
function adjustTopnav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    }
    else {
        x.className = "topnav";
    }
}

// function use: to switch between Customer and Admin login forms in login.php
function setLoginForm(loginType) {
    if (loginType == 1) {   // 1 - admin
        // display the admin image and login form
        document.getElementById('loginAsAdminImage').style.display = 'inline-block';
        document.getElementById('adminLoginForm').style.display = 'inline-block';
        // add the 'active' class to the admin button
        document.getElementById('loginAsAdminButton').classList.add('active');

        // hide the customer image and login form
        document.getElementById('loginAsCustomerImage').style.display = 'none';
        document.getElementById('customerLoginForm').style.display = 'none';
        // remove the 'active' class from the customer button
        document.getElementById('loginAsCustomerButton').classList.remove('active');
    }
    else if (loginType == 2) {  // 2 - customer
        // display the customer image and login form
        document.getElementById('loginAsCustomerImage').style.display = 'inline-block';
        document.getElementById('customerLoginForm').style.display = 'inline-block';
        // add the 'active' class to the customer button
        document.getElementById('loginAsCustomerButton').classList.add('active');

        // hide the admin image and login form
        document.getElementById('loginAsAdminImage').style.display = 'none';
        document.getElementById('adminLoginForm').style.display = 'none';
        // remove the 'active' class from the admin button
        document.getElementById('loginAsAdminButton').classList.remove('active');
    }
}