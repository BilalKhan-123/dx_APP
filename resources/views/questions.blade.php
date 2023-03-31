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

               				<h5 align="center"><b>Questions: {{-- {{count($questions)}} --}}/{{count($count)}}</b></h5>

               				@if($questions)
               				
               			 	<h5 align="center"><b>Subject: 

                                @if($questions->subjects->title)
               					{{$questions->subjects->title}}
                                @endif
							   </b>
						    </h5> 	
               			
               					
               				<h3>{{$questions->question}} </h3>

								<div class="form-group"> 
								<ol>
									<li>
                                        <label for="{{$questions->option1}}" id="option1">
										<input onclick="return makeAnswer('option1')" type="radio" name="answers" id="{{$questions->option1}}" value="@if($questions->correct_answer == 'option1') {{$questions->correct_answer}} @else 'option1' @endif" /> {{$questions->option1}}
                                        </label>
									</li>
									<li>
								         <label for="{{$questions->option2}}" id="option2">
                                        <input onclick="return makeAnswer('option2')" type="radio" name="answers" id="{{$questions->option2}}" value="@if($questions->correct_answer == 'option2') {{$questions->correct_answer}} @else 'option2' @endif" /> {{$questions->option2}}
                                        </label>
									</li>
									<li>
										 <label for="{{$questions->option3}}" id="option3">
                                        <input onclick="return makeAnswer('option3')" type="radio" name="answers" id="{{$questions->option3}}" value="@if($questions->correct_answer == 'option3') {{$questions->correct_answer}} @else 'option3' @endif" /> {{$questions->option3}}
                                        </label>
									</li>
									<li>
										 <label for="{{$questions->option4}}" id="option4">
                                        <input onclick="return makeAnswer('option4')" type="radio" name="answers" id="{{$questions->option4}}" value="@if($questions->correct_answer == 'option4') {{$questions->correct_answer}} @else 'option4' @endif" /> {{$questions->option4}}
                                        </label>
									</li>
								
								</ol>
								</div>

								  <input id="next" type="submit" value="Next" name="next" class="btn btn-success btn-md" />
								  <input id="skip" type="submit" value="Skip" name="skip" class="btn btn-danger btn-md" />
								  <input type="text" name="question_id" id="question_id" value="{{$questions->id}}">

                          
						
								@endif  

                      </div> 

            

                
                  </div>

            


                    <div class="col-md-3"></div> 
                </div>
            </div>
        </div>

    </form>
  </div>
</body>


  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>

   <script type="text/javascript">
      	


    function makeAnswer(answers) {
      

        var correct=1;
        var question_id = $("#question_id").val();


           

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
               type:'POST',
               url:"{{ url('mcqs/next') }}",
               data:{question_id:question_id,answers:answers},
               success:function(data) {
                  if(data == correct) {



                    $('input[type=radio]').attr("disabled",true);




                  }

                  
               }
            });
          }



  


    </script>



</html>