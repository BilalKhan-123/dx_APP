<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<body>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="container">
 

    <form action="{{ url('mcqs/process') }}" method="post">
        @csrf
        <div class="container">
            
            <div class="row">
                 <div class="col-md-12">

                


                      <div class="col-md-3"></div> 
                      <div class="col-md-6" style="display: block;" id="currentQuestion">
                         <div class="form-group">
               				<h5 align="center"><b>Student Name: 

               					@if(session()->has('name'))

               					 {{session()->get('name')}}	
 									
               					@endif


               				</b></h5>

               			<h5 align="center"><b>Student id: 

                                @if(session()->has('id'))

                                 {{session()->get('id')}} 
                                    
                                @endif


                            </b></h5>

               				<h5 align="center"><b>Questions: {{count($count)}}</b></h5>

               			
               			
               					
               				<h3>Results </h3>

								<div class="form-group"> 
							
								<h4><b>Correct:</b> ({{$correct}})</h4>
								<h4><b>Wrong:</b> ({{$wrong}})</h4>
								<h4><b>Skipped:</b> ({{$skipp}})</h4>
								</div>


                          
						
				

                      </div> 

            

                
                  </div>

            


                    <div class="col-md-3"></div> 
                </div>
            </div>
        </div>

    </form>
  </div>
</body>




</html>