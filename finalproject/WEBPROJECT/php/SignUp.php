<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="handle_signUp.php" method="post" name="Registration">
  
    
<label for="inputfirstname">First Name </label> 
    <input type="text" id="inputfirstname" name="inputfirstname" pleaceholder="Please enter your First Name"  class="Input"required>
</br>
    <label for="inputlastname">Last Name </label>
    <input type="text" id="inputlastname" name="inputlastname" pleaceholder="Please enter your Last Name" class="Input"required>
</br>
    
    <label for="inputEmail">Email</label>
     <input type="email" id="inputEmail" pleaceholder="Please enter your Email" name="inputEmail" required>
</br>
     <label for="inputPassword">Password</label>
    <input  type="password" id ="inputPassword" name="inputPassword" pleaceholder="Please enter your password" class="Input"required>
</br>
    <label for="inputMobileNum">Mobile Number</label>
      <input type="text" id="inputMobileNum" name="inputMobileNum" pleaceholder="For Example 0782315478" class="Input" required>
</br>
     <label for="city">City:</label>
      <select name="city" id="city">
  		<option value="Amman">Amman</option>
  		<option value="Irbid">Irbid</option>
          <option value="Jaresh">Jaresh</option>
          <option value="Zarqa">Zarqa</option>
          <option value="Salt">Salt</option>
          <option value="Ajloun">Ajloun</option>
</select> 
</br>
      <td><input  type="submit" name="Sign" value="SignUp"></td>
</form>
</body>
</html>