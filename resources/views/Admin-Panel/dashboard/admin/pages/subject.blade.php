

@extends('Admin-Panel.dashboard.admin.index')
@section('content')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add Subject
  </button>

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
         <input type="text" name="subject" class="form-control" placeholder="Enter Subject Name"/>
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
                            // location.reload();
                            alert(response.success);
                        }else{
                            alert(data.message);
                        }
                    }
                });
            })
        });
  </script>

  
@endsection
