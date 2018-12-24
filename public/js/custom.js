$(document).ready(function(){

  // $('html').show();

  jQuery.fn.preventDoubleSubmit = function() {
    jQuery(this).submit(function() {
      if (this.beenSubmitted)
        return false;
      else
        this.beenSubmitted = true;
    });
  };


  var delay = (function(){
    var timer = 0;
    return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
    };
  })();




  $('table').on('click','a.delete-record',function(ev){
    ev.preventDefault();

    $route = $(this).attr('href');
    console.log($route);

    swal({
      title: 'Are you sure?',
      text: 'Your record is going to be deleted. !',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, keep it',
      confirmButtonClass: "btn btn-success",
      cancelButtonClass: "btn btn-danger",
      buttonsStyling: false
    }).then(function(result) {

      if(result.value){

      $.ajax({
        type: "POST",
        url : $route,
        data: {'_method':'DELETE'},
        beforeSend: function(request) {
         return request.setRequestHeader("X-CSRF-Token", $("input[name='_token']").val());
       },
       success: function(data){

        swal({
          title: 'Deleted!',
          text: data,
          type: 'success',
          confirmButtonClass: "btn btn-success",
          buttonsStyling: false
        }).then(function(){
          window.location.reload();
        })

        


      }
    });

    }else{


      swal({
          title: 'Cancelled',
          text: 'Record not deleted :)',
          type: 'error',
          confirmButtonClass: "btn btn-info",
          buttonsStyling: false
        })

      


    }

    }, function(dismiss) {

      if (dismiss === 'cancel') {
        swal({
          title: 'Cancelled',
          text: 'Record not deleted :)',
          type: 'error',
          confirmButtonClass: "btn btn-info",
          buttonsStyling: false
        })
      }
    })




  });




  $('h4').on('click','a.confirmation',function(ev){
    ev.preventDefault();

    $route = $(this).attr('href');



    swal({
      title: 'Are you sure?',
      text: 'You want to proceed. !',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, proceed!',
      cancelButtonText: 'No, Abort',
      confirmButtonClass: "btn btn-success",
      cancelButtonClass: "btn btn-danger",
      buttonsStyling: false
    }).then(function() {

      $.ajax({
        type: "POST",
        url : $route,
        beforeSend: function(request) {
         return request.setRequestHeader("X-CSRF-Token", $("input[name='_token']").val());
       },
       success: function(data){

        swal({
          title: 'Success!',
          text: data,
          type: 'success',
          confirmButtonClass: "btn btn-success",
          buttonsStyling: false
        }).then(function(){
          window.location.reload();
        })

        


      }
    });

    }, function(dismiss) {

      if (dismiss === 'cancel') {
        swal({
          title: 'Cancelled',
          text: 'Not Processed :)',
          type: 'error',
          confirmButtonClass: "btn btn-info",
          buttonsStyling: false
        })
      }
    })




  });




 $('table').on('click','a.confirmation',function(ev){
    ev.preventDefault();

    $route = $(this).attr('href');



    swal({
      title: 'Are you sure?',
      text: 'You want to proceed. !',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, proceed!',
      cancelButtonText: 'No, Abort',
      confirmButtonClass: "btn btn-success",
      cancelButtonClass: "btn btn-danger",
      buttonsStyling: false
    }).then(function() {

      $.ajax({
        type: "POST",
        url : $route,
        beforeSend: function(request) {
         return request.setRequestHeader("X-CSRF-Token", $("input[name='_token']").val());
       },
       success: function(data){

        swal({
          title: 'Success!',
          text: data,
          type: 'success',
          confirmButtonClass: "btn btn-success",
          buttonsStyling: false
        }).then(function(){
          window.location.reload();
        })

        


      }
    });

    }, function(dismiss) {

      if (dismiss === 'cancel') {
        swal({
          title: 'Cancelled',
          text: 'Not Processed :)',
          type: 'error',
          confirmButtonClass: "btn btn-info",
          buttonsStyling: false
        })
      }
    })




  });



});