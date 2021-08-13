@extends('layouts.dashboard')
@section('page-heading', 'Apply DSC')
@section('content')
<div class="row">
  <div class="col-md-12">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
          <div>{{$error}}</div>
      @endforeach
    @endif
   <script>
     function hidenseek(x){
       if(x==1)
       {
         document.getElementById('ind').style.display='block';
         document.getElementById('org').style.display='none';
       }
       else{
        document.getElementById('ind').style.display='none';
         document.getElementById('org').style.display='block';
       }

     }
   </script>
      <div id="step1">
        <section>
          <div class="form">
         
              <h1>Application Type</h1>
              <hr/>
              
              <div class="mb-4">
                <div class="form-check-inline">
                  <input type="radio" name="type" onclick="hidenseek(1)" id="radio1" value="Ind">
                  <label class="form-check-label" for="radio1">Ind</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="type" onclick="hidenseek(2)" id="radio2" >
                  <label class="form-check-label" for="radio2">Org</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="type" id="radio3" disabled>
                  <label class="form-check-label" for="radio3">Govt</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="type" id="radio4" disabled>
                  <label class="form-check-label" for="radio4">Doc Signer</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="type" id="radio5" disabled>
                  <label class="form-check-label" for="radio5">Foregin</label>
                </div>
                <p id="type_error"></p>
              </div>
              <div class="text-right">
                <a href="{{route('saurav.ind')}}" type="button" id="ind" class=" btn btn-form" style="display: none">Next </a>
                <a href="{{route('saurav.orggovnon')}}" type="button" id="org" class=" btn btn-form" style="display: none">Next </a>
                <a href="" type="button" id="govt" class=" btn btn-form" style="display: none">Next</a>
                <a href="" type="button" id="doc" class=" btn btn-form" style="display: none">Next</a>
                <a href="" type="button" id="foregin" class=" btn btn-form" style="display: none">Next</a>
              </div>
          
          </div>
        <section>
        <hr/>
      </div>

    

  </div>

</div>
@endsection



            
          
          