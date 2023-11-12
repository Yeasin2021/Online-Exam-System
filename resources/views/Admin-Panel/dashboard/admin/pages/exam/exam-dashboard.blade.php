
@extends('Admin-Panel.dashboard.admin.index')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampModal">
    Add Exam
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
                <th scope="col">Exam</th>
                <th scope="col">Subject</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <tbody>
            @if (count($exams) > 0)
                @foreach ($exams as $key=>$exam)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <th scope="row">{{ $exam->exam_name }}</th>
                        <th scope="row">{{ $exam->subjects[0]['subject'] }}</th>
                        <th scope="row">{{ $exam->date }}</th>
                        <th scope="row">{{ $exam->time }}</th>
                            {{-- <th scope="row">
                                <a class="update_subject_link btn btn-success"
                                    data-toggle="modal"
                                    data-target="#updateModal"
                                    data-id="{{ $subject->id }}"
                                    data-subject="{{ $subject->subject }}"
                                    >
                                    Edit
                                </a>
                            </th> --}}
                            {{-- <th scope="row">
                            <a class="delete_subject_link btn btn-danger"
                                data-id="{{ $subject->id }}"
                            >
                            Delete
                            </a>
                        </th> --}}
                    </tr>
                @endforeach
                @else
                <tr>
                    <th scope="row">Exam Not Found.</th>
                </tr>
            @endif

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

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


                            // table reload after data added into table
                            $('.table').load(location.href+' .table');
                             // remove old data from modal's input
                            $('#addExam')[0].reset();
                            $('#addExam')[1].reset();
                            $('#addExam')[2].reset();
                            $('#addExam')[3].reset();


                        }else{
                            alert(data.message);
                            }
                        }
                    });

                })




        });


</script>




@endsection



