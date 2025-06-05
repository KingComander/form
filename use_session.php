<?php include("nav_component.php");?>



<style>
    h1 {
  font-family: "Poppins", sans-serif;
  font-size: 2.5rem;
  color: #333;
  text-align: center;
  margin-top: 50px;
}

h1 span {
  color: #007bff; /* Highlight the username */
  font-weight: bold;
  margin-left: 10px;
  animation: fadeIn 1s ease-in-out;
}

/* Optional: Simple fade-in animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>

<h1>Hello 
    <span>
        <?php
            if(isset($_SESSION['user']))
                echo $_SESSION['user'];
        ?>
    </span>
</h1>

