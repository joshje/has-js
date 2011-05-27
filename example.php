<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<title>A better load</title>
<style>
.has-js input[type="submit"] {
    display: none;
}
</style>
</head>
<body>
<script>
document.body.className+=' has-js';
var hasjsrm=setTimeout(function(){document.body.className=document.body.className.replace(' has-js','')},5000);
</script>
<form action="" method="GET">
<label for="fruit">What is your favorite fruit?</label>
<select id="fruit" name="fruit">
<option disabled>Choose a fruit:</option>
<option value="apples">Apples</option>
<option value="pears">Pears</option>
</select>
<input type="submit" value="Go" />
</form>
<p id="result"><?php if (isset($_GET['fruit'])) echo 'You like ' . $_GET['fruit'] . ', me too!'; ?></p>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>
$('#fruit').change(function() {
    $('#result').text('You like '+ $(this).val() + ', me too!');
});
// These 2 lines must be at the end of your script in case there was an error:
clearTimeout(hasjsrm);
$('body').addClass('has-js');
</script>
</html>