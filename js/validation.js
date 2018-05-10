//tutoreditvalidate
$(function(){
    $("#tutor-edit-form").validate({
        rules:{
            tutorName:{
                required: true,
                lettersonly: true
            },
            tutorEmail:{
                required: true,
                email: true
            },
            TUsername:{
                required: true
            },
            newaddress:{
                required: true
            },
            tutorNumber:{
                required: true
            },
            tutordescript:{
                required: true
            },
            password5:{
                required: true
            },
            password6:{
                required: true,
                equalTo: "#password5"
            }
        },
        messages:{
            tutorName:{
                required: "Please enter a valid name",
                lettersonly: "Please enter a valid name with no other characters"
            },
            tutorEmail:{
                required: "Please enter a valid email",
                email: "Please enter a valid email (must contain @)"
            },
            TUsername:{
                required: "Please enter a valid username"
            },
            newaddress:{
                required: "Please enter a valid address"
            },
            tutorNumber:{
                required: "Please enter a valid number"
            },
            tutordescript:{
                required: "Please enter a description"
            },
            password5:{
                required: "Please enter  valid password with 6 letters and a character"
            },
            password6:{
                required: "Please enter a password matching the first field",
                equalTo: "Password must match the first entry"
            }
        }
    });
});

//Student edit Validate
$(function(){
    $("#student-edit-form").validate({
        rules:{
            studentName:{
                required: true,
                lettersonly: true
            },
            studentEmail:{
                required: true,
                email: true
            },
            SUsername:{
                required: true
            },
            stuaddress:{
                required: true
            },
            stuNumber:{
                required: true
            },
            studescript:{
                required: true
            },
            password5:{
                required: true
            },
            password6:{
                required: true,
                equalTo: "#password5"
            }
        },
        messages:{
            studentName:{
                required: "Please enter a valid name",
                lettersonly: "Please enter a valid name with no other characters"
            },
            studentEmail:{
                required: "Please enter a valid email",
                email: "Please enter a valid email (must contain @)"
            },
            SUsername:{
                required: "Please enter a valid username"
            },
            stuaddress:{
                required: "Please enter a valid address"
            },
            stuNumber:{
                required: "Please enter a valid number"
            },
            studescript:{
                required: "Please enter a description"
            },
            password5:{
                required: "Please enter  valid password with 6 letters and a character"
            },
            password6:{
                required: "Please enter a password matching the first field",
                equalTo: "Password must match the first entry"
            }
        }
    });
});

//Student Booking Validate
$(function(){
    $("#booking-form").validate({
        rules: {
            datepicker:{
                required: true
            }
        },
        messages: {
            datepicker:{
                required: 'Please select a date'
            }
        }
    });
});
//Contact Request Validate
$(function(){
    $("#contact-req").validate({
        rules: {
            contactName: {
                required: true,
                lettersonly: true
            },
            emailAddress: {
                required: true,
                email: true
            },
            contactMessage: {
                required: true
            }
        },
        messages: {
            contactName: {
                required: 'Please enter a name for us to contact you by',
                lettersonly: 'Names can only contain letters'
            },
            emailAddress: {
                required: 'Please enter a valid email address',
                email: 'Please enter a valid email address'
            },
            contactMessage: {
                required: 'Please enter a message so we can get back to your request asap'
            }
            
        }
    });
});
//Parent Reg Validate
$(function(){

  $.validator.addMethod('strongPassword', function(value, element) {
      return this.optional(element)
        || value.length >= 6
        && /\d/.test(value)
        && /[a-z]/i.test(value);
    }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.'),

  $("#parents-reg").validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      username: {
          required: true
      },
      password1: {
        required: true,
        strongPassword: true
      },
      password2: {
        required: true,
        equalTo: "#password-1"
      },
      contactName: {
        required: true,
        lettersonly: true
      },
      contactNumber: {
          required: true
      }
    },
    messages: {
      email: {
        required: 'Please enter a valid email (Field is empty)',
        email: 'Please enter a valid email'
      },
      password1:{
          required: 'Please enter a password with atleast 6 characters and a number',
          strongPassword: 'Please enter a valid password with atleast 6 characters and a number'
      },
      password2: {
          required: 'Please enter a password that matches the first field',
          equalTo: 'Please enter a password that matches the first password field'
      },
      username: {
          required: 'Please enter a valid username'
      },
      //Not working with cutsom message
      contactName: {
        lettersonly: 'Letters only please'
      },
      //Not working with custom message
      contactNumber :{
          required: 'Please enter a valid phone number'
      }

    }
  });
  
  
});

//Students Reg Validation
$(function(){
    $.validator.addMethod('strongPassword', function(value, element) {
      return this.optional(element)
        || value.length >= 6
        && /\d/.test(value)
        && /[a-z]/i.test(value);
    }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')
    
    $("#students-reg").validate({
      rules: {
          //Not working with custom message
        contactName: {
            required: true,
            lettersonly: true
        },
        email: {
            required: true,
            email: true
        },
        //Not working
        contactNumber: {
            required: true
        },
        username: {
            required: true
        },
        stuaddress: {
            required:true
        },
        password3: {
            required: true
            //strongPassword: true
        },
        password4: {
          required: true,
          equalTo: "#password3"
        }
          
      },
      
      messages: {
        contactName: {
            required: 'Please enter a value (Letters only)',
            lettersonly: 'Letters only please'
        },
        emailAddress: {
            required: 'Please enter a valid email (Field is empty)',
            email: 'Please enter a valid email'
        },
        contactNumber: {
            required: 'Please enter a valid phone number'
        },
        username: {
            required: 'Please enter a valid username'
        },
        stuaddress: {
            required:'Please enter a valid address'
        },
        password3:{
          required: 'Please enter a password with atleast 6 characters and a number',
          strongPassword: 'Please enter a valid password with atleast 6 characters and a number'
        },
        password4: {
          required: 'Please enter a password that matches the first field',
          equalTo: 'Please enter a password that matches the first password field'
        } 
      }
      
  });
    
});
//Tutor Reg Validate
$(function(){

  $.validator.addMethod('strongPassword', function(value, element) {
      return this.optional(element)
        || value.length >= 6
        && /\d/.test(value)
        && /[a-z]/i.test(value);
    }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')

  $("#tutor-reg-form").validate({
    rules: {
      tutorName: {
        required: true,
        lettersonly: true
      },
      tutorEmail: {
        required: true,
        email: true
      },
      tutorNumber: {
          required: true
      },
      TUsername: {
          required:true
      },
      tAddress: {
          required: true
      },
      password5: {
        required: true,
        strongPassword: true
      },
      password6: {
        required: true,
        equalTo: "#password5"
      }
      
    },
    messages: {
      tutorName: {
        required: 'Please enter a valid name (Letters only)',
        lettersonly: 'Names can only contain letters'
      },
      tutorEmail: {
        required: "Please enter a valid email",
        email: "Please enter a valid email address(Must include @"
      },
      tutorNumber: {
          required: "Please enter a valid phone number"
      },
      TUsername: {
          required:"Please enter a valid username"
      },
      tAddress: {
          required: "Please enter a valid address"
      },
      password5: {
        required: "Please enter a valid password",
        strongPassword: true
      },
      password6: {
        required: "Please enter a valid password matching the first password"
        //Issues with equal to
        //equalTo: "Passwords must be matching"
      }

    }
  });
  
  
});