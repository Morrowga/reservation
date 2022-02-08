<!DOCTYPE html>
<html>
  <head>
    <title>Hotel Reservation Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="nav-hotel">
        <div class="container">
            <a class="navbar-brand text" href="{{ url('/home') }}">
                My Hotel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="testbox">
      <form id="updateFormRes" action="POST">
        @csrf
        <div class="banner">
          <h1>Hotel Reservation Form</h1>
        </div>
        <br/>
        <input type="text" id="resid" value="{{ $res->id }}" hidden>
        <input type="text" id="useremail" value="{{ Auth::user()->email }}" hidden>
        <fieldset class="field-panel">
        <legend><span class="label-span">Reservation Details</span></legend>
          <div class="columns">
            <div class="item">
              <label for="fname">First Name<span>*</span></label>
              <input id="fname" type="text" name="fname" value="{{ $res->first_name }}" />
            </div>
            <div class="item">
              <label for="lname"> Last Name<span>*</span></label>
              <input id="lname" type="text" name="lname" value="{{ $res->last_name }}" />
            </div>
            <div class="item">
              <label for="address">Address<span>*</span></label>
              <input id="address" type="text"   name="address" value="{{ $res->address }}"/>
            </div>
            <div class="item">
              <label for="zip">Zip Code<span>*</span></label>
              <input id="zip" type="text"   name="zip" value="{{ $res->zip_code }}" required/>
            </div>
            <div class="item">
              <label for="city">City<span>*</span></label>
              <input id="city" type="text"   name="city" value="{{ $res->city }}" />
            </div>
            <div class="item">
              <label for="state">State<span>*</span></label>
              <input id="state" type="text"   name="state" value="{{ $res->state }}" />
            </div>
            <div class="item">
              <label for="eaddress">Email Address<span>*</span></label>
              <input id="eaddress" type="text"   name="eaddress" value="{{ $res->email_address }}" />
            </div>
            <div class="item">
              <label for="phone">Phone<span>*</span></label>
              <input id="phone" type="tel"   name="phone" value="{{ $res->phone }}" />
            </div>
        </fieldset>
        <br/>
        <fieldset class="field-panel">
        <legend><span class="label-span">Dates</span></legend>
        <div class="columns">
        <div class="item">
        <label for="checkindate">Check-in Date <span>*</span></label>
        <input id="checkindate" class="form-control" type="date" name="checkindate" value="{{ $res->check_in }}" />
        <i class="fas fa-calendar-alt pt-2"></i>
        </div>
        <div class="item">
        <label for="checkoutdate">Check-out Date <span>*</span></label>
        <input id="checkoutdate" class="form-control" type="date" name="checkoutdate" value="{{ $res->check_out }}" />
        <i class="fas fa-calendar-alt pt-2"></i>
        </div>
        <div class="item">
        <p>Check-in Time </p>
        <select name="checkintime">
        <option value="{{ $res->check_in_time }}" selected>{{ $res->check_in_time }}</option>
        <option value="morning" >Morning</option>
        <option value="afternoon">Afternoon</option>
        <option value="evening">Evening</option>
        </select>
        </div>
        <div class="item">
        <p>Check-out Time </p>
        <select name="checkouttime">
        <option value="{{ $res->check_out_time }}" selected>{{ $res->check_out_time }}</option>
        <option value="morning" >Morning</option>
        <option value="afternoon">Afternoon</option>
        <option value="evening">Evening</option>
        </select>
        </div>    
        <div class="item">
        <p>How many adults are coming?</p>
        <select name="adult_count">
        <option value="{{ $res->adult_count }}" selected>{{ $res->adult_count }}</option>
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
        <option value="{{ $res->children_count }}" selected>{{ $res->children_count }}</option>
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
          <input id="room" type="number" name="room" value="{{ $res->room_number }}"/>
        </div>
        @if($res->room_number != '1')
        <div class="item" id="roomtype">
            @foreach(json_decode($res->room_type) as  $key => $type)
            @if($type == null)
            <p class="cap">{{ $key }}</p>
           <input type="number" name="room_type[]" value="0" id="standard" placeholder="enter count" class="form-control"> 
            @else 
            <p class="cap">{{ $key }}</p>
           <input type="number" name="room_type[]" value="{{ $type }}" id="standard" placeholder="enter count" class="form-control"> 
            @endif 
           @endforeach
        </div>
        @else
        <div class="item" id="roomtype">
            <select class="form-control" name="room_type[]" required>
                @foreach(json_decode($res->room_type) as  $key => $type)
                <option  class="cap" value="{{ $key }}" >{{ $key }}</option>
                @endforeach
                <option class="cap" value="Standard" >Stardard</option>
                <option class="cap" value="Deluxe">Deluxe</option>
                <option class="cap" value="Suite">Suite</option>
            </select>
        </div>
        @endif
        <div class="item">
        <label for="instruction">Special Instructions</label>
        <textarea name="instructions" value="{{ $res->instructions }}" id="instruction" rows="3">{{ $res->instructions }}</textarea>
        </div>
        </fieldset>
        <div class="btn-block">
          <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
          <button>Submit</button>
        </div>
      </form>
    </div>
</div>

    <div class="modal fade" id="successModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <button type="button" class="btn btn-success btn-block ok-edit" data-dismiss="modal">OK</button>
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
