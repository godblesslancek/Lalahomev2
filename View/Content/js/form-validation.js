// Wait for the DOM to be ready
  $(document).ready(function(){
    
    $("#registration").validate({
      rules: {
        "LastName": {
          "required": true,
          "minlength": 2,
          "maxlength": 60000
        },
        "FirstName": {
          "required": true,
          "minlength": 2,
          "maxlength": 60000
        },
        "Email": {
          "required": true,
          "maxlength": 255
        },
        "Phone": {
          "required": true
        },
        "Password": {
          required: true,
          minlength: 8
      },
      messages: {
        LastName:{
          required: "Please enter a valid LastName",
        },
        FirstName:{
          required: "Please enter your FirstName",
        },
        Password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        Email:{
          required: "Please enter a valid email address"
        } 
      },
        
    }
  })
});