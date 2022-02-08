$(function(){
    $(document).on('click', '.page-link', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
     });
    
     function fetch_data(page)
     {
      var useremail = $('#useremail').val();
      var _token = $("input[name=_token]").val();
      $.ajax({
          url:"api/lists?page=" + page,
          method:"GET",
          headers: {
              'email' : useremail
          },
          success:function(data)
          {
            $('#table-res').html(data);
          }
        });
     }


     $('.viewbtn').on('click', function(e){
        var id = this.id;
        var useremail = $('#useremail').val();
        console.log(id);
        $.ajax({
            url: 'api/view/' + id,
            method:"GET",
            headers: {
                'email' : useremail
            },
            success:function(response){
                console.log(response);
                if(response.status == '200'){
                    var type = JSON.parse(response.data['room_type']);

                    $('#viewData').html(`
                        <div class="d-flex justify-content-center">
                            <div class="col">
                                <p class="text">First Name</p>
                                <p class="text">`+ response.data['first_name'] +`</p>
                                <hr>
                                <p class="text">Last Name</p>
                                <p class="text">`+ response.data['last_name'] +`</p>
                                <hr>
                                <p class="text">Phone</p>
                                <p class="text">`+ response.data['phone'] +`</p>
                                <hr>
                                <p class="text">Email</p></p>
                                <p class="text">`+ response.data['email_address'] +`</p>
                                <hr>
                                <p class="text">Zip Code</p>
                                <p class="text">`+ response.data['zip_code'] +`</p>
                                <hr>
                                <p class="text">Address</p>
                                <p class="text">`+ response.data['address'] +`</p>
                                <hr>
                                <p class="text">City</p>
                                <p class="text">`+ response.data['city'] +`</p>
                                <hr>
                                <p class="text">State</p>
                                <p class="text">`+ response.data['state'] +`</p>
                                <hr>
                                <p class="text">Room Type</p>
                                <p class="text rootype"></p>
                            </div>
                            <div class="col">
                                <p class="text">Check In</p>
                                <p class="text">`+ response.data['check_in'] +`</p>
                                <hr>
                                <p class="text">Check Out</p>
                                <p class="text">`+ response.data['check_out'] +`</p>
                                <hr>
                                <p class="text">Check In Time</p>
                                <p class="text">`+ response.data['check_in_time'] +`</p>
                                <hr>
                                <p class="text">Check Out Time</p>
                                <p class="text">`+ response.data['check_out_time'] +`</p>
                                <hr>
                                <p class="text">Adult Count</p>
                                <p class="text">`+ response.data['adult_count'] +`</p>
                                <hr>
                                <p class="text">Children Count</p>
                                <p class="text">`+ response.data['children_count'] +`</p>
                                <hr>
                                <p class="text">Room</p>
                                <p class="text">`+ response.data['room_number'] +`</p>
                                <hr>
                                <p class="text">Reservation Date</p>
                                <p class="text">`+ new Date(response.data['created_at']) +`</p>
                            </div>
                        </div>
                    `);

                    $.each(type, function(i,v){
                        $('.rootype').append(`
                            <p class="text">`+ i +`</p>
                            <p class="text">`+ v +`</p>
                            <hr>
                        `)
                    });
                }
            }
        });
     })


     $('.deletebtn').on('click', function(){
        var id = this.id;
        $('.confirm').attr('id', id);
     });


     $('.confirm').on('click', function(){
         var del_id = this.id;
         console.log(del_id);
         var useremail = $('#useremail').val();
        $.ajax({
            url: 'api/delete/' + del_id,
            method:"POST",
            headers: {
                'email' : useremail
            },
            success:function(response){
                console.log(response);
                if(response.status == '200'){
                    $('deletemodal').modal('hide');
                    location.reload();
                }
            }
        });
     })

     $('.csv').on('click', function(){
        $("#res-table").table2csv();
     });
});

