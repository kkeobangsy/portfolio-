let form = naw Validator("contactform");

form.addValidation("name", "req", "Please provide you name");
form.addValidation("email", "req", "Please provide your email");
form.addValidation("email", "email", "Please enter a valid email address");
