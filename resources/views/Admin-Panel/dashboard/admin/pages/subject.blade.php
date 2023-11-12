

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
                    <th scope="row">
                        <a class="update_subject_link btn btn-success"
                            data-toggle="modal"
                            data-target="#updateModal"
                            data-id="{{ $subject->id }}"
                            data-subject="{{ $subject->subject }}"
                            >
                            Edit
                        </a>
                    </th>
                    <th scope="row">
                        <a class="delete_subject_link btn btn-danger"
                            data-id="{{ $subject->id }}"
                        >
                         Delete
                        </a>
                    </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Modal -->
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


   {{-- <!-- Modal-Update -->
   <div class="modal fade" id="Modal_update" tabindex="-1" role="dialog" aria-labelledby="updateleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form method="POST" action="/update" >
          @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="updateleModalLabel">Question Update Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <label style="padding-left: 20px">Question</label>
          </div>
          <input style="visibility: hidden" name="id"/>
          <div class="row">
            <div class="col-md-12"><input name="question"  class="form-control"></div>
          </div>
          <div class="row">
              <div class="col-md-6"><label>A:</label></div>
              <div class="col-md-6"><label>B:</label></div>
          </div>
          <div class="row">
            <div class="col-md-6"><input name="opa" class="form-control" ></div>
            <div class="col-md-6"><input name="opb" class="form-control" ></div>
          </div>
          <div class="row">
              <div class="col-md-6"><label>C:</label></div>
              <div class="col-md-6"><label>D:</label></div>
          </div>
          <div class="row">
              <div class="col-md-6"><input name="opc" class="form-control" ></div>
              <div class="col-md-6"><input name="opd" class="form-control" ></div>
            </div>
            <div class="row">
              <div class="col-md-3"><label>Answer</label>
                  <select name="ans" class="form-control">
                      <option value="{{ $question->d }}">{{ $question->answer }}</option>
                      <option value="a">A</option>
                      <option value="b">B</option>
                      <option value="c">C</option>
                      <option value="d">D</option>
                  </select>
              </div>
              <div class="col-md-9"></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Questions</button>
        </div>
      </form>
      </div>
    </div>
  </div> --}}

   <!-- UPDATE Modal -->
   <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form id="updateSubject">@csrf
    <input type="hidden" name="up_id" id="up_id" />
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Update Subject Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
         <input type="text" name="subject" id="subject" class="form-control" placeholder="Update Subject Name" required/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#updateModal">Update changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>


  <script>
        $(document).ready(function(){
            // add code
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
                            // remove old data from modal's input
                            $('#addSubject')[0].reset();
                            // table reload after data added into table
                            $('.table').load(location.href+'   .table');


                        }else{
                            alert(data.message);
                        }
                    }
                });

            })

            // update code for edit page
            $(document).on('click','.update_subject_link',function(){
                let id = $(this).data('id');
                let subject = $(this).data('subject');

                console.log(subject)

                $("#up_id").val(id);
                $("#subject").val(subject);

            })

            // update code
            $("#updateSubject").submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    url:'{{ route('update-subject') }}',
                    type:'POST',
                    data:formData,
                    success:function(data){
                        // console.log(data);
                        if(data.success == true)
                        {
                            // alert(data.success);
                            // remove old data from modal's input
                            $('#updateSubject')[0].reset();
                            // table reload after data added into table
                            $('.table').load(location.href+'   .table');


                        }else{
                            alert(data.message);
                        }
                    }
                });

            })

            // Delete Code
            $(document).on('click','.delete_subject_link',function(){
                let subject_id = $(this).data('id');

                if(confirm("Are You Want to Sure Delete This Item ?"))
                {
                    $.ajax({
                    url:'{{ route('remove-subject') }}',
                    type:'POST',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        subject_id:subject_id
                    },
                    success:function(data){
                        if(data.status == 'success')
                        {
                            // table reload after data added into table
                            $('.table').load(location.href+'   .table');
                        }
                       }
                    });

                }

            })


        });
  </script>


@endsection
