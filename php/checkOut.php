<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>check out</title>
    <link rel="stylesheet" type="text/css" href="../css/checkOut.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<header>
    <img src="../img/background.jpg" alt="galaxy">
    <a href="#" id="title">Apollo 42 Express</a>
</header>
<main>
    <form>
        <fieldset>
            <legend>Customer info</legend>
            <!-- part 1 -->
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" placeholder="First Name">
            <br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" placeholder="Last Name">
            <br>

            <!-- part 2 address include: street, city, state, zip-->
            <label for="ship_address">Shipping Address:</label>
            <br>
            <input type="text" name="ship_address" id="street_address" placeholder="Street">
            <input type="text" name="ship_address" id="city_address" placeholder="City">
            <select name="ship_address">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select>
            <input type="text" name="ship_address" id="zipCode" placeholder="Zip">
            <br>
            <label for="phone">Phone Number:</label>
            <input type="number" name="phone" placeholder="Example: 123456789">
        </fieldset>
        <br>

        <fieldset>
            <!-- part 3, credit or debit info -->
            <legend>Credit or Debit card</legend>
            <!-- chioce of credit or debit -->
            <label for="credit">Credit Card</label>
            <input type="radio" name="card" value="credit">
            <label for="debit">Debit Card</label>
            <input type="radio" name="card" value="debit">
            <br>
            <label for="credit_card">Card Holder:</label>
            <input type="text" name="credit_card" placeholder="Name: John Won">
            <br>
            <label for="credit_card">Card Number:</label>
            <input type="text" name="credit_card" placeholder="Example:3354 1234 6543 7896">
            <br>

            <!-- needs to change date format later -->
            <label for="credit_card">Expiration Date:</label>
            <input type="date" name="credit_card">
            <br>
            <label for="credit_card">CVV:</label>
            <input type="text" name="credit_card" placeholder="Example: 123">
            <br>

            <label for="card_address">Card Address:</label>
            <br>
            <label for="card_address">Same as shipping?</label>
            <input type="radio" name="card_address">
            <br>
            <input type="text" name="card_address" id="street_address" placeholder="Street">
            <input type="text" name="card_address" id="city_address" placeholder="City">
            <select name="card_address">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select>
            <input type="text" name="card_address" id="zipCode" placeholder="Zip">
        </fieldset>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>

    </form>

</main>


<footer>

</footer>
</body>
</html>