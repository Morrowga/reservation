<!DOCTYPE html>
<html>
  <head>
    <title>Hotel Reservation Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <body>
    <div class="testbox">
      <form id="formRes" action="POST">
        @csrf
        <div class="banner">
          <h1>Hotel Reservation Form</h1>
        </div>
        <br/>
        <fieldset class="field">
        <legend><span class="label-span">Reservation Details</span></legend>
          <div class="columns">
            <div class="item">
              <label for="fname">First Name<span>*</span></label>
              <input id="fname" type="text" name="fname" />
            </div>
            <div class="item">
              <label for="lname"> Last Name<span>*</span></label>
              <input id="lname" type="text" name="lname" />
            </div>
            <div class="item">
              <label for="address">Address<span>*</span></label>
              <input id="address" type="text"   name="address" />
            </div>
            <div class="item">
              <label for="zip">Zip Code<span>*</span></label>
              <input id="zip" type="text"   name="zip" required/>
            </div>
            <div class="item">
              <label for="city">City<span>*</span></label>
              <input id="city" type="text"   name="city" />
            </div>
            <div class="item">
              <label for="state">State<span>*</span></label>
              <input id="state" type="text"   name="state" />
            </div>
            <div class="item">
              <label for="eaddress">Email Address<span>*</span></label>
              <input id="eaddress" type="text"   name="eaddress" />
            </div>
            <div class="item">
              <label for="phone">Phone<span>*</span></label>
              <input id="phone" type="tel"   name="phone" />
            </div>
        </fieldset>
        <br/>
        <fieldset class="field">
        <legend><span class="label-span">Dates</span></legend>
        <div class="columns">
        <div class="item">
        <label for="checkindate">Check-in Date <span>*</span></label>
        <input id="checkindate" class="form-control" type="date" name="checkindate" />
        <i class="fas fa-calendar-alt pt-2"></i>
        </div>
        <div class="item">
        <label for="checkoutdate">Check-out Date <span>*</span></label>
        <input id="checkoutdate" class="form-control" type="date" name="checkoutdate" />
        <i class="fas fa-calendar-alt pt-2"></i>
        </div>
        <div class="item">
        <p>Check-in Time </p>
        <select name="checkintime">
        <option disabled selected>Select time</option>
        <option value="Morning" >Morning</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Evening">Evening</option>
        </select>
        </div>
        <div class="item">
        <p>Check-out Time </p>
        <select name="checkouttime">
        <option disabled selected>Select time</option>
        <option value="Morning" >Morning</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Evening">Evening</option>
        </select>
        </div>    
        <div class="item">
        <p>How many adults are coming?</p>
        <select name="adult_count">
        <option disabled selected>Number of adults</option>
        <option value="1" >1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </div>    
        <div class="item">
        <p>How many children are coming?</p>
        <select name="childern_count">
        <option disabled selected>Number of children</option>
        <option value="0" >0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </div>   
        <div class="item" style=width:100%>
          <label for="room">Number of rooms</label>
          <input id="room" type="number" name="room"/>
        </div>
        <div class="item" id="room_type">

        </div>
        <div class="item">
        <label for="instruction">Special Instructions</label>
        <textarea name="instructions" id="instruction" rows="3"></textarea>
        </div>
        </fieldset>
        <div class="btn-block">
          <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
          <button>Submit</button>
        </div>
      </form>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title text-center" id="exampleModalLabel">Reservation Success</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
          </div>
          <div class="modal-body text-center">
            <i class="fas fa-check-circle fa-5x"></i>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success btn-block ok" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/jquery-1.11.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/reservation.js"></script>
  </body>
</html>