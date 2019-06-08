@extends('layouts.app')


@section('stylesheets')

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
@endsection

@section('content')

<div class="panel-body">
<h3>Recently Billed Customers</h3>
<ul class="list-group list-group-flush">

  @if(!count($customers))
      <b>No Billed Customers available. Click <a href="{{route('customer.create')}}">here</a> to add a new customer
      </b>

  @endif

  @foreach($customers as $customer)

<li class="list-group-item">

<p>

  <b>{{$customer->name}},{{$customer->contact_no}}</b>

  <a href="{{route('customer.show',$customer->id)}}">          <span class="glyphicon glyphicon-ok"></span></a>

<!-- glyphicon glyphicon-trash -->

 <a href="javascript:void(0)">
           <span onclick="myFunction({{$customer->id}})"  class="glyphicon glyphicon-trash"></span>
         </a>
</p>
</li>

  @endforeach
</ul>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/cropper.js') }}"></script>

<script type="text/javascript">

function myFunction(id) {
    var r=confirm("Are you sure you want to delete the details?");

    if (r == true) {
      
      window.location="{{route('customer.delete','')}}"+"/"+id;

} else {

   return false;
}


}

</script>

@endsection

