<?php
include './connection.php';
ob_start();
session_start();
?>
   

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap');

    * {
        font-family: 'poppins', sans-serif;
    }

    body {
        background-color: rgba(98,79,181,0.9);
        
    }

    .fw-300 {
        font-weight: 300;
    }

    .fw-500 {
        font-weight: 500;
    }

    .mt-top {
        margin-top: 1.8em;
    }

    .nav_header {
        position: sticky;
        margin-left: 2em;
        margin-right: 2em;
        margin-top:2em;
        border-radius: 1em;
    }

    .nav_items {
        border-radius: .8em;
        background: white;
        list-style-type: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav_link {
        font-size: 1rem;
        margin: .5em;
    }
    .nav_link a {
        color: black;
        text-decoration: none;
    }

    .nav_link a:hover {
        text-decoration: underline;
        text-underline-offset: 5px;
    }

    .login {
        padding: .5rem .8rem;
        border-radius: .8em;
        background: black;
    }

    .login a {
        color: #fff;
        text-decoration:none;
    }
    
    .content {
        position: relative;
    }

    .lpimg {
        display: block;
        width: 100%;
        aspect-ratio: 16/6;
    }

    .regimg {
        margin:0;
        padding:0;
        display: block;
        width: 100%;
        aspect-ration: 6/16;
    }

    </style>
    <header class="header">
        <div class="nav_header">
            <ul class="nav_items">
                <li class="nav_link fw-500" style="font-size:1.4rem;"><a href="index.php">WMS</a></li>
                <li class="nav_link fw-300"><a href="reg3.php">user registration</a></li>
                <li class="nav_link login"><a href="login.php">login</a></li>
            </ul>
        </div>
    </header>
    
