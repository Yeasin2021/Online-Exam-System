
@extends('Admin-Panel.dashboard.admin.index')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampModal">
    Add Exam
  </button>


<br>
<br>

 <!-- Add Modal -->
 <div class="modal fade" id="exampModal" tabindex="-1" aria-labelledby="exampModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form id="addExam">@csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampModalLabel">Exam Name</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <input type="text" name="exam" class="form-control" placeholder="Enter Exam Name" required/>
         <br><br>
         <input type="date" name="date" class="form-control" min="@php echo date('Y-m-d'); @endphp" required/>
         <br><br>
         <input type="time" name="time" class="form-control"  required/>
         <br>
         <br>
         <select name="subject_id" required class="p-2 w-100" >
            <option value="">Select Subject</option>
            @if(count($subjects)>0)
                @foreach ($subjects as $subject)
                    <option  value="{{ $subject->id }}">{{ $subject->subject }}</option>
                @endforeach
            @endif
         </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampModal">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  <script>
    $(document).ready(function(){
        $("#addExam").submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    url:'{{ route('admin-exam-post') }}',
                    type:'POST',
                    data:formData,
                    success:function(data){
                        if(data.success == true)
                        {

                            // remove old data from modal's input
                            $('#addExam')[0].reset();
                            $('#addExam')[1].reset();
                            $('#addExam')[2].reset();
                            $('#addExam')[3].reset();
                            // table reload after data added into table
                            // $('.table').load(location.href+'   .table');


                        }else{
                            alert(data.message);
                        }
                    }
                });

            })


    });


</script>




@endsection



