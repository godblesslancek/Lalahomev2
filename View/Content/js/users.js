// Wait for the DOM to be ready
$(document).ready(function(){
    validateForm();
    getListUsers();
});


function getListUsers(name) {
  $.ajax({
    url: "index.php", // on donne l'URL du fichier de traitement
    type: "GET", // la requête est de type POST
    data: "controller=user&action=userList&name=" + name, // et on envoie nos données,
    datatype: "json",
    success: function (data) {
      console.log(data);
      createTable(data);
    }
  });
}

function validateForm() {
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
        LastName: {
          required: "Please enter a valid LastName",
        },
        FirstName: {
          required: "Please enter your FirstName",
        },
        Password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        Email: {
          required: "Please enter a valid email address"
        }
      },

    }
  })
}

function createTable(data) {
  $('#content').append('<table id="fieldsetTabUser"></table>');
  var row = JSON.parse(data);
  var header = {
    "name_user": "Nom",
    "surname_user": "Prenom",
    "role_user": "Role",
    "email": "@mail",
    "phone": "Phone",
    "id_flat": "Id_flat",


  };
  createRow(header);
  $.each(row, function (index) {
    createRow(row[index]);
  })
}
function createRow(data) {
  var row = $("<tr />")
  $('#fieldsetTabUser').append(row);
  row.append($("<td>" + data.name_user + "</td>"));
  row.append($("<td>" + data.surname_user+ "</td>"));
  row.append($("<td>" + data.role_user + "</td>"));
  row.append($("<td>" + data.email + "</td>"));
  row.append($("<td>" + data.phone + "</td>"));
  row.append($("<td>" + data.id_flat+ "</td>"));
  
}