<table class="table mt-5" id="res-table">
    <thead>
        <tr>
        <!-- <th scope="col">No.</th> -->
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Check In</th>
        <th scope="col">Check Out</th>
        <th scope="col">Check In Time</th>
        <th scope="col">Check Out Time</th>
        <th scope="col">Adult</th>
        <th scope="col">Childern</th>
        <th scope="col">Date</th>
        <th scope="col">Room</th>
        <th scope="col">Room Type</th>
        <th scope="col">Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $res)
            <tr>
                <!-- <td>{{ $res->id }}</td> -->
                <td>{{ $res->first_name }} <br> {{ $res->last_name }}</td>
                <td>{{ $res->phone }}</td>
                <td>{{ $res->email_address }}</td>
                <td>{{ $res->check_in }}</td>
                <td>{{ $res->check_out }}</td>
                <td>{{ $res->check_in_time }}</td>
                <td>{{ $res->check_out_time }}</td>
                <td>{{ $res->adult_count }}</td>
                <td>{{ $res->children_count }}</td>
                <td>{{ $res->created_at->diffForHumans() }}, <br> {{ $res->created_at->format('Y-m-d') }} </td>
                <td>{{ $res->room_number }}</td>
                <td>
                    @foreach(json_decode($res->room_type) as $key => $type)
                    @if($type == null)
                    {{ $key }} : 0 <br>
                    @else 
                    {{ $key }} : {{ $type }} <br>
                    @endif
                    @endforeach
                </td>
                <td>
                    @if(Auth::user()->role == 'hotel_manager')
                    <a href="{{ route('res.edit', $res->id) }}" class="btn btn-info"><i class="fa fa-edit pr-1"></i>Edit</a>
                    @endif
                    <button class="btn btn-success viewbtn" data-toggle="modal" data-target="#viewModal" id="{{ $res->id }}"><i class="fa fa-eye pr-1"></i>View</button>
                    <button class="btn btn-danger deletebtn" id="{{ $res->id }}" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash pr-1"></i>Delete</button></td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $reservations->links() !!}
    </div>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header register-head">
            <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body register-body" id="viewData">
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header register-head">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure want to delete this ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body register-body text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Antu_dialog-warning.svg/1200px-Antu_dialog-warning.svg.png" alt="" width="150" height="150">
      </div>
      <div class="modal-footer del_foot register-head">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger confirm">Yes, I want to delete.</button>
      </div>
    </div>
    </div>
  </div>
</div>
