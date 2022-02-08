@extends('layouts.app')

@section('content')

<div class="col-md-12 text-right">
<button class="btn btn-success csv">Export CSV</button>
</div>
<input type="text" id="useremail" value="{{ Auth::user()->email }}" hidden>
<div id="table-res">
@include('panel.table_res_data')
</div>

@section('script')
<script src="../js/lists.js"></script>

@endsection
@endsection
