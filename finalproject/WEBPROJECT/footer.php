<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2022 Restaurantnz</p>
            </div>
            <div class="col-md-6">
                <ul class="social-icons">
                    <li><a rel="nofollow" href="#" target="_parent"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>

<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js">
</script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js">
</script>

<script>
function validateForm() {
  let e = document.forms["myForm"]["loginId"].value;
  let p = document.forms["myForm"]["loginPass"].value;

  if (e == "") {
    alert("Email must be filled out");
    return false;
  }else if(p == ""){
    alert("Password must be filled out");
    return false;
  }
}
</script>
</body>
</html>