/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

//Password match
// function matchPassword() {  
//     var pw1 = document.getElementById("password").value;  
//     var pw2 = document.getElementById("confirmPassword").value;
//     var fname = document.getElementById("firstName").value;  
//     var lname = document.getElementById("lastName").value;
//     var email = document.getElementById("email").value;
//     var pnumber = document.getElementById("phoneNumber").value;
        
//     if(pw1 != pw2)  
//     {   
//         document.getElementById("message").innerHTML = "**Passwords did not match";  
//         return false;  
//     }
//     if(pw1 == "")  
//       {   
//           document.getElementById("message").innerHTML = "**Passwords did not match";  
//           return false;  
//       }
    
//       if(pw2 == "")  
//         {   
//             document.getElementById("message").innerHTML = "**Passwords did not match";  
//             return false;  
//         }  
//      //check empty first name field  
//      if(fname == "") {  
//         document.getElementById("fnameMessage").innerHTML = "**Fill the first name";  
//         return false;  
//       }
//       //check empty Last name field  
//      if(lname == "") {  
//         document.getElementById("lnameMessage").innerHTML = "**Fill the last name";  
//         return false;  
//       }
//       //check empty Last name field  
//      if(email == "") {  
//         document.getElementById("emailMessage").innerHTML = "**Fill the email";  
//         return false;  
//       }
//       //check empty Last name field  
//      if(pnumber == "") {  
//         document.getElementById("pnumberMessage").innerHTML = "**Fill the phone number";  
//         return false;  
//       }  
//   }

/********************************************************************/
 /* 
 * Service
 */ 
 /******************************************************************/

  $(document).ready(function(){
    $(document).on('click', '.serviceEditLink', function(){
        var service_id = $(this).val();
        $('#serviceEditModal').modal('show');
        $.ajax({
          type:"GET",
          url: "service/"+service_id,
          success:function(response){
            //console.log(response.service.title);
            $('#editServiceTitle').val(response.service.title);
            $('#editServiceShortDescription').val(response.service.short_description);
            $('#editServiceDescription').val(response.service.main_description);
            $('#service_id').val(service_id);
            $('#editServiceImage').attr('src', "/uploads/service/" + response.service.image);
          }
        });
    });
  });
  $(document).ready(function(){
    $(document).on('click','.serviceViewLink', function(){
      var service_id = $(this).val();
      $('#serviceViewModal').modal('show');
      $.ajax({
        type:"GET",
        url:"service/"+service_id,
        success:function(response){
          //console.log(response.service);
          $('#viewServiceTitle').html(response.service.title);
          $('#viewServiceImage').attr('src', "/uploads/service/" + response.service.image);
          $('#viewServiceDescription').html(response.service.main_description);
        }
      });
    });

  });
  $(document).ready(function(){
    $(document).on('click','.serviceDeleteLink', function(){
      var service_id = $(this).val();
      $('#deleteModal').modal('show');
      $('#deleteService_id').val(service_id);
      
    });

  });


/********************************************************************/
 /* 
 * About
 */ 
 /******************************************************************/


//About Update
$(document).ready(function(){
  $(document).on('click', '.aboutEditLink', function(){
      var about_id = $(this).val();
      $('#aboutEditModal').modal('show');
      $.ajax({
        type:"GET",
        url: "about/"+about_id,
        success:function(response){
          //console.log(response.service.title);
          $('#editAboutTitle').val(response.about.title);
          $('#editAboutDescription').val(response.about.description);
          $('#about_id').val(about_id);
        }
      });
  });
});


// About View
$(document).ready(function(){
  $(document).on('click','.aboutViewLink', function(){
    var about_id = $(this).val();
    $('#aboutViewModal').modal('show');
    $.ajax({
      type:"GET",
      url:"about/"+about_id,
      success:function(response){
        //console.log(response.service);
        $('#viewAboutTitle').html(response.about.title);
        $('#viewAboutDescription').html(response.about.description);
      }
    });
  });

});

/********************************************************************/
 /* 
 * Testimonial
 */ 
 /******************************************************************/

 $(document).ready(function(){
  $(document).on('click', '.testimonialEditLink', function(){
      var testimonial_id = $(this).val();
      $('#testimonialEditModal').modal('show');
      $.ajax({
        type:"GET",
        url: "testimonial/"+testimonial_id,
        success:function(response){
          //console.log(response.service.title);
          $('#editTestimonialClientName').val(response.testimonial.client_name);
          $('#editTestimonial').val(response.testimonial.testimonial);
          $('#testimonial_id').val(testimonial_id);
          $('#editTestimonialImage').attr('src', "/uploads/testimonial/" + response.testimonial.image);
        }
      });
  });
});
$(document).ready(function(){
  $(document).on('click','.testimonialViewLink', function(){
    var testimonial_id = $(this).val();
    $('#testimonialViewModal').modal('show');
    $.ajax({
      type:"GET",
      url:"testimonial/"+testimonial_id,
      success:function(response){
        //console.log(response.service);
        $('#viewTestimonialClientName').html(response.testimonial.client_name);
        $('#viewTestimonialImage').attr('src', "/uploads/testimonial/" + response.testimonial.image);
        $('#viewTestimonial').html(response.testimonial.testimonial);
      }
    });
  });

});
$(document).ready(function(){
  $(document).on('click','.testimonialDeleteLink', function(){
    var testimonial_id = $(this).val();
    $('#deleteTestimonialModal').modal('show');
    $('#deleteTestimonial_id').val(testimonial_id);
    
  });

});


/********************************************************************/
 /* 
 * Company
 */ 
 /******************************************************************/


//company Update
$(document).ready(function(){
  $(document).on('click', '.companyEditLink', function(){
      var company_id = $(this).val();
      $('#companyEditModal').modal('show');
      $.ajax({
        type:"GET",
        url: "company/"+company_id,
        success:function(response){
          //console.log(response.service.title);
          $('#editCompanyEmail').val(response.company.email);
          $('#editCompanyPhone').val(response.company.phone);
          $('#editCompanyAddress').val(response.company.address);
          $('#company_id').val(company_id);
        }
      });
  });
});


// Company View
$(document).ready(function(){
  $(document).on('click','.companyViewLink', function(){
    var company_id = $(this).val();
    $('#companyViewModal').modal('show');
    $.ajax({
      type:"GET",
      url:"company/"+company_id,
      success:function(response){
        //console.log(response.service);
        $('#viewCompanyEmail').html(response.company.email);
        $('#viewCompanyPhone').html(response.company.phone);
        $('#viewCompanyAddress').html(response.company.address);
      }
    });
  });

});


/********************************************************************/
 /* 
 * Message
 */ 
 /******************************************************************/

 $(document).ready(function(){
  $(document).on('click', '.messageEditLink', function(){
      var message_id = $(this).val();
      $('#messageEditModal').modal('show');
      $.ajax({
        type:"GET",
        url: "message/"+message_id,
        success:function(response){
          //console.log(response.service.title);
          $('#editMessageName').val(response.message.name);
          $('#editMessageEmail').val(response.message.email);
          $('#editMessagePhone').val(response.message.phone);
          $('#editMessageSubject').val(response.message.subject);
          $('#editMessage').val(response.message.message);
          $('#message_id').val(message_id);
        }
      });
  });
});
$(document).ready(function(){
  $(document).on('click','.messageViewLink', function(){
    var message_id = $(this).val();
    $('#messageViewModal').modal('show');
    $.ajax({
      type:"GET",
      url:"message/"+message_id,
      success:function(response){
        //console.log(response.service);
        $('#viewMessageName').html(response.message.name);
        $('#viewMessageEmail').html(response.message.email);
        $('#viewMessagePhone').html(response.message.phone);
        $('#viewMessageSubject').html(response.message.subject);
        $('#viewMessage').html(response.message.message);
      }
    });
  });

});
$(document).ready(function(){
  $(document).on('click','.messageDeleteLink', function(){
    var message_id = $(this).val();
    $('#deleteMessageModal').modal('show');
    $('#deleteMessage_id').val(message_id);
    
  });

});

/********************************************************************/
 /* 
 * Team
 */ 
 /******************************************************************/

 $(document).ready(function(){
  $(document).on('click', '.teamEditLink', function(){
      var team_id = $(this).val();
      $('#teamEditModal').modal('show');
      $.ajax({
        type:"GET",
        url: "team/"+team_id,
        success:function(response){
          //console.log(response.service.title);
          $('#editTeamName').val(response.team.name);
          $('#editTeamPosition').val(response.team.position);
          $('#editTeamAbout').val(response.team.about);
          $('#team_id').val(team_id);
          $('#editTeamImage').attr('src', "/uploads/team/" + response.team.image);
        }
      });
  });
});
$(document).ready(function(){
  $(document).on('click','.teamViewLink', function(){
    var team_id = $(this).val();
    $('#teamViewModal').modal('show');
    $.ajax({
      type:"GET",
      url:"team/"+team_id,
      success:function(response){
        //console.log(response.service);
        $('#viewTeamTitle').html(response.team.name);
        $('#viewTeamPosition').html(response.team.position);
        $('#viewTeamAbout').html(response.team.about);
        $('#viewTeamImage').attr('src', "/uploads/team/" + response.team.image);
      }
    });
  });

});
$(document).ready(function(){
  $(document).on('click','.teamDeleteLink', function(){
    var team_id = $(this).val();
    $('#deleteTeamModal').modal('show');
    $('#deleteTeam_id').val(team_id);
    
  });

});
