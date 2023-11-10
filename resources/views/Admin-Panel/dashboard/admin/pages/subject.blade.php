

@extends('Admin-Panel.dashboard.admin.index')
@section('content')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add Subject
  </button>


<br>
<br>


  {{-- Table  --}}
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body" >
        <h5 class="card-title">Responsive Table</h5>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subjects as $key=>$subject)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <th scope="row">{{ $subject->subject }}</th>
                    <th scope="row">Edit</th>
                    <th scope="row">Delete</th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form id="addSubject">@csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subject title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <input type="text" name="subject" class="form-control" placeholder="Enter Subject Name" required/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>


  <script>
        $(document).ready(function(){
            $("#addSubject").submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    url:'{{ route('add-subject') }}',
                    type:'POST',
                    data:formData,
                    success:function(data){
                        // console.log(data);
                        if(data.success == true)
                        {
                            // alert(data.success);
                            $('.table').load(location.href+'   .table');

                        }else{
                            alert(data.message);
                        }
                    }
                });

            })
        });
  </script>


@endsection
