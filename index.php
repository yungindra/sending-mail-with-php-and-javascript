<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Form - PHPMailer</title>
</head>
<body>
<div class="form-box">
      <form id="form" action="form/send.php" method="post">
        <h2>Form Submit with PHPMailer</h2>
        <div class="flex">
          <div class="form-control">
            <input type="text" name="firstName" id="firstName" oninput="checkInputValue()" />
            <label>First Name</label>
            <small>Error Message</small>
          </div>
          <div class="form-control">
            <input type="text" id="lastName" name="lastName" oninput="checkInputValue()" />
            <label>Last Name</label>
            <small>Error Message</small>
          </div>
        </div>
        <div class="flex">
          <div class="form-control">
            <select id="title" name="title">
              <option value="">-Title-</option>
                      <option>Mr.</option>
                      <option>Miss.</option>
                      <option>Mrs.</option>
            </select>
            <small>Error Message</small>
          </div>
          
          <div class="form-control">
            <input type="email" id="email" name="email" oninput="checkInputValue()"/>
            <label>Email Address</label>
            <small>Error Message</small>
          </div>
        </div>

       
          <div class="form-control">
           <textarea name="message" id="message" rows="5" oninput="checkInputValue()"></textarea>
            <label>Message</label>
            <small>Error Message</small>
          </div>
         
       <a href="" onclick="submitForm(event)">
          <span></span>
          <span></span>
          <span></span>
          <span></span>          
          Submit</a>
       
      </form>
    </div>
    

    <script src="script.js"></script>
</body>
</html>