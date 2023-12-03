<?php
include('../db/db.php');
session_start();

if(isset($_SESSION['user'])){
    $_SESSION['visitor_id']=$_SESSION['user'];
    $_SESSION['unique_id']=$_SESSION['user'];
    if($_SESSION['role']=='customer'){
        header("location:../user");
    }elseif($_SESSION['role']=='user'){
        header("location:../user");
    }
    if($_SESSION['b_id']==''){
        header("location:create");
    }else{
        $b_id = $_SESSION['b_id'];
    }

}else{
    header("location:login");
}


if(!isset($_SESSION['user'])){
    header('location:login');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../output/./output.css">

    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: flex-start;
            height: 100vh;
        }

        #left-container {
            width: 20%;
            padding: 20px;
        }

        #right-container {
            width: 80%;
            padding: 20px;
        }

        #customer-image {
            max-width: 100%;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        #buttons-container {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .profile-button {
            padding: 10px;
            margin: 5px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #profile-content {
            margin-top: 20px;
            text-align: center;
        }

        .input-field {
            margin: 10px;
            padding: 10px; /* Increased height */
            width: 80%;
        }

        #update-btn, #confirm-btn {
            margin-top: 10px;
            padding: 10px;
            background-color: #2ecc71;
            color: white;
            border: none;
            cursor: pointer;
            width: 40%; /* Decreased width */
        }

        #bio-division {
            margin-top: 20px;
        }
    .logout_btn{
        text-decoration: none;
       color:white;

}
        

    </style>
</head>
<body>

    <!-- <a href="../../out">Admin Logout</a> -->

    <div id="left-container">
    <img id="customer-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdizAfib6M2QSUpFechCxvCGIOWpRriMKJkrKh3OUCrw&s" alt="Customer Image">
    <h2 id="customer-name">ABCDEFG</h2>
    <h5 id="profile-Bio">@bio</h5>

    <div id="buttons-container">
        <button class="profile-button" onclick="showContent('account')">Account</button>
        <button class="profile-button" onclick="showContent('password')">Password</button>
        <button class="profile-button">Security</button>
        <button class="profile-button">Application</button>
        <button class="profile-button">Notification</button>
        <button class="profile-button">
            <a href="../out" class="logout_btn">Log Out</a>
        </button>
    </div>
</div>

<div id="right-container">
    <div id="profile-content">
        <!-- Content will be dynamically updated here -->
    </div>
</div>

<script>
    function showContent(type) {
        // Hide all content
        document.getElementById('profile-content').innerHTML = '';

        // Reset button styles
        document.querySelectorAll('.profile-button').forEach(button => {
            button.style.backgroundColor = '#3498db';
        });

        // Highlight the selected button
        document.querySelector(`.profile-button[onclick="showContent('${type}')"]`).style.backgroundColor = '#2980b9';

        // Display content based on the selected button
        if (type === 'account') {
            document.getElementById('profile-content').innerHTML = `
                <h3>Account Setting</h3>
                <input class="input-field" type="text" id="first-name-input" placeholder="First Name">
                <input class="input-field" type="text" placeholder="Last Name">
                <input class="input-field" type="email" placeholder="Email">
                <input class="input-field" type="tel" placeholder="Phone">
                <input class="input-field" type="text" placeholder="Company">
                <input class="input-field" type="text" placeholder="Designation">
                <textarea class="input-field" id="bio-input" placeholder="Bio (max 100 words)"></textarea>
                <button id="update-btn" onclick="updateAccount()">Update</button>
            `;
        } else if (type === 'password') {
            document.getElementById('profile-content').innerHTML = `
                <h3>Change Password</h3>
                <input class="input-field" type="password" placeholder="Recent Password">
                <input class="input-field" type="password" placeholder="New Password">
                <input class="input-field" type="password" placeholder="Confirm Password">
                <button id="confirm-btn" onclick="confirmPassword()">Confirm</button>
            `;
        }
    }

    function updateAccount() {
        // Implement logic to update account information
        const firstNameInput = document.getElementById('first-name-input');
        const newFirstName = firstNameInput.value;

        if (newFirstName !== "") {
            // Update customer name dynamically
            document.getElementById('customer-name').innerText = newFirstName;
            alert('Account information updated!');
        } else {
            alert('Please enter a valid first name.');
            //return;
        }

        // Update Bio division
        const bioInput = document.getElementById('bio-input');
        const newBio = bioInput.value;

        if (newBio !== "") {
            document.getElementById('profile-Bio').innerText = newBio;
            alert('Account information updated!');
        } else {
            alert('Please enter a valid Bio.');
        }
    }

    function confirmPassword() {
        // Implement logic to update password
        const newPassword = document.querySelector('.input-field[placeholder="New Password"]').value;
        const confirmPassword = document.querySelector('.input-field[placeholder="Confirm Password"]').value;

        if (newPassword === confirmPassword) {
            alert('Password changed successfully!');
        } else {
            alert('New Password and Confirm Password do not match.');
        }
    }
</script>

</body>
    


</html>