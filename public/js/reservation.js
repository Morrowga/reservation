$(function(){
    $('#room_type').html(`
    <select class="form-control" name="room_type[]" required>
        <option disabled selected>Room Type</option>
        <option value="Standard" >Stardard</option>
        <option value="Deluxe">Deluxe</option>
        <option value="Suite">Suite</option>
    </select>
    `)

    $('#room').on('keyup', function(){
        if($(this).val() != '1'){
           $('#room_type').html(`
           <p>Standard</p>
           <input type="number" name="room_type[]" id="standard" placeholder="enter count" class="form-control">  
           <p>Deluxe</p>
           <input type="number" name="room_type[]" id="suite" placeholder="enter count" class="form-control">
           <p>Suite</p>
           <input type="number" name="room_type[]" id="deluxe" placeholder="enter count" class="form-control">
           `);
        } else {
            $('#room_type').html(`
            <select class="form-control" name="room_type[]" required>
                <option disabled selected>Room Type</option>
                <option value="Standard" >Stardard</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Suite">Suite</option>
            </select>
            `)
        }
    });


    $('#formRes').on('submit', function(e){
        e.preventDefault();
        var create_res = 'api/create_res';
        var token =  $('#token').val();
        let formData = new FormData(this);

        $.ajax({
            url: create_res,
            method:'POST',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-Token': token,
            },
            data: formData,
            success:function(response){
                console.log(response);
               if(response.status == "200") {
                    $('#successModal').modal('show');
               }
            }
        });
    });

    $('#updateFormRes').on('submit', function(e){

        e.preventDefault();
        var useremail = $('#useremail').val();
        var resid = $('#resid').val();
        var update_res = '/api/update_res/' + resid;
        var token =  $('#token').val();
        let formDataUpdate = new FormData(this);

        $.ajax({
            url: update_res,
            method:'POST',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-Token': token,
                'email': useremail
            },
            data: formDataUpdate,
            success:function(response){
                console.log(response);
               if(response.status == "200") {
                    $('#successModalEdit').modal('show');
               }
            }
        });
    });

    $('.ok').on('click', function(){
        window.location = '/';
    }); 

    $('.ok-edit').on('click', function(){
        window.location = '/lists';
    }); 


    $('#room').on('keyup', function(){
        if($(this).val() != '1'){
           $('#roomtype').html(`
           <p>Standard</p>
           <input type="number" name="room_type[]" id="standard" placeholder="enter count" class="form-control">  
           <p>Deluxe</p>
           <input type="number" name="room_type[]" id="suite" placeholder="enter count" class="form-control">
           <p>Suite</p>
           <input type="number" name="room_type[]" id="deluxe" placeholder="enter count" class="form-control">
           `);
        } else {
            $('#roomtype').html(`
            <select class="form-control" name="room_type[]" required>
                <option disabled selected>Room Type</option>
                <option value="Standard" >Stardard</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Suite">Suite</option>
            </select>
            `)
        }
    });
})

