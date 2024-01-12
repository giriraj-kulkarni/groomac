
<link rel="stylesheet" href="index.css">

<script>
// Store the multiplication result globally
let multiplicationResult = null;

function multiplyNumbers() {
    var param1 = document.getElementById("param1").value;
    var param2 = document.getElementById("param2").value;

    // Create the XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    
    xhr.open("POST", "process.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            multiplicationResult = response.result; // Store the result
        }
    };
    xhr.send("param1=" + param1 + "&param2=" + param2);
}

function displayResult() {
    if (multiplicationResult !== null) {
        document.getElementById("result").innerHTML = "Result: " + multiplicationResult;
    } else {
        alert("Please submit the form to calculate the result first.");
    }
}
function viewUpdatedScript() {
    var xhr = new XMLHttpRequest();
    
    xhr.open("GET", "drop.php", true);
    
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                try {
                    var response = JSON.parse(this.responseText);
                    
                    if (response.status === 'success') {
                        document.getElementById("result").innerHTML = "<textarea rows='20' cols='50'>" + response.content + "</textarea>";
                    } else {
                        alert('Failed to view the updated script.');
                    }
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    alert("Failed to parse server response.");
                }
            } else {
                console.error("Error fetching content:", this.status);
                alert("Failed to fetch content from server.");
            }
        }
    };
    
    xhr.send();
}
let isDropdownOpen = false;

function toggleDropdown() {
  const dropdownContent = document.getElementById("dropdownContent");
  const pushDownContainer = document.getElementById("pushDownContainer");

  if (isDropdownOpen) {
    // Close dropdown
    dropdownContent.style.display = "none";
    pushDownContainer.style.marginTop = "0";
    isDropdownOpen = false;
  } else {
    // Open dropdown
    dropdownContent.style.display = "block";
    pushDownContainer.style.marginTop = `${dropdownContent.clientHeight}px`;
    isDropdownOpen = true;
  }
}




</script>

</head>
<body>

  <!-- Sidebar -->
<div class="sidebar">
  <a class="active" href="#home">gromacs</a>
  
  <!-- Gromacs dropdown -->
  <div class="dropdown-container">
    <button class="dropbtn" onclick="toggleDropdown()">Tutorials</button>
    <div class="dropdown-content" id="dropdownContent">
      
      <a href="C:\xampp\htdocs\web\electronproject\video.php">Videotutorials</a>
      <a href="#">Option 2</a>
      <a href="#">Option 3</a>
    </div>
  </div>
  
  <!-- Container for gromacs links to be pushed down -->
  <div id="pushDownContainer">
    <a href="#contact">gromacs</a>
    <a href="#about">gromacs</a>
  </div>
</div>

</div>
<div class="deploy">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select directory to upload to:</label>
        <select name="directory" class="form-select">
            <option value="php_files">php_files</option>
            <option value="another_directory">Another_Directory</option>
            
        </select>

        <br><br>
        <label>Select PHP file to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" accept=".php" class="file-input">
        <br><br>
        <input type="submit" value="Upload File" name="submit" class="submit-btn">
    </form>

<!-- Form for multiplying two numbers -->
<!-- Form for multiplying two numbers -->
<!-- Form for multiplying two numbers -->
<form id="multiplicationForm" action="drop.php" method="post">
    Parameter 1: <input type="number" id="param1" name="param1" min="1" max="40" required><br><br>
    Parameter 2: <input type="number" id="param2" name="param2" min="1" max="40" required><br><br>
    <input type="button" value="Submit" onclick="multiplyNumbers()">
    <input type="button" value="Display Result" onclick="displayResult()">
    <!-- Add a button to view the updated process.php script -->
<input type="button" value="View Updated Script" onclick="viewUpdatedScript()">

</form>

<!-- Display the result here -->
<div id="result" style="margin-top: 20px;"></div>






</body>
</html>