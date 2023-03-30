<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<body>
  <div class="container">
    <h1>{{$title}}</h1>
    <p>Please fill the details and answers the all questions-</p>
    <form action="{{ url('mcqs/process') }}" method="post">
        @csrf
        <div class="container">
            
            <div class="row">
                 <div class="col-md-12">

                        <div class="flashes">
                           @if(Session::has('success'))
                           <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                           @endif
                             @if(Session::has('failed'))
                           <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('failed') }}</p>
                           @endif
                        </div>


                      <div class="col-md-3"></div> 
                      <div class="col-md-6">
                         <div class="form-group">
                            <strong>Name*:</strong>
                            <br />
                            <input required type="text" class="form-control input-lg" name="name" value="" />
                          </div>

                         
                          <br />
                     
                          <div class="form-group">
                            <input type="submit" value="Next" name="submit" class="btn btn-success btn-lg" />
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