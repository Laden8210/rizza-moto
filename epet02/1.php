<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Information Form</title>
<style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}

.container {
  max-width: 500px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="email"],
input[type="tel"],
input[type="number"],
button {
  width: 100%;
  padding: 5px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

</style>
</head>
<body>
<div class="container">
  <h1>User Information Form</h1>
  <form id="userForm">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone" pattern="09\d{9}" required>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="number" id="age" name="age" min="0" required>
    </div>
    <button type="submit">Submit</button>
  </form>
</div>
<script>
document.getElementById("userForm").addEventListener("submit", function(event) {
  event.preventDefault();
  var emailInput = document.getElementById("email").value.trim();
  var phone = document.getElementById("phone").value.trim();
  var age = parseInt(document.getElementById("age").value);
  var confirmed = window.confirm("Are you sure you want to submit this form?");
  
  if (confirmed) {
    // Form is confirmed, submit the form
    this.submit();
  }

  // Check if email ends with "@gmail.com"
  if (!emailInput.endsWith("@gmail.com")) {
    alert("Please enter a valid email address ending with '@gmail.com'.");
    return;
  }

  // Check phone number format
  if (!phone.match(/^09\d{9}$/)) {
    alert("Phone number should start with '09' and have 11 digits.");
    return;
  }

  // Check age is not negative
  if (age < 0) {
    alert("Age cannot be negative.");
    return;
  }

  // Form is valid, you can perform further actions like sending data to server
  alert("Form submitted successfully!");
});
</script>
</body>
</html>
