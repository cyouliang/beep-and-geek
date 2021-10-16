<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Form</title>
</head>
<script>
    //TODO validate input fields
    function validate() {
        return True
    }
</script>
<body>
    <form action="script/create_transaction.php" method="post" onsubmit="return validate()">
        <label>Name: <input type="text" name="cust_name" placeholder="Name" required></label><br>
        <label>Phone: <input type="text" name="cust_phone" placeholder="Phone number" required></label><br>
        <label>Email: <input type="text" name="cust_email" placeholder="Email" required></label><br>
        <label>Address: <textarea name="cust_address" rows="4" cols="40" placeholder="Delivery address" required></textarea></label><br>
        <input type="reset" value="Oops">
        <input type="submit" value="Order now!">
    </form>
</body>

</html>