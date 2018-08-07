<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo base_url().'apps';?>">Apps</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?php echo base_url().'dashboard/'.$this->uri->segment(2);?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      <span class="transaction_type"></span>s
    </li>
    <li class="breadcrumb-item">
      <div class="float-right"> Wallet Balance: <b>KES.<span class="wallet_bal"><?php echo number_format($wallet_balance); ?></span></b></div>
    </li>
  </ol>
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-4">
      <?php echo $this->session->flashdata('trans_msg'); ?>
      <button class="btn btn-md btn-info pull-right" data-toggle="modal" data-target="#createMeetingModal" id="modalBtn"> <i class='fa fa-plus'></i> New <span class="transaction_type"></span></button> 
    </div>
  </div>
  <div class="row">
    <div class="card mb-3 col-md-12">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="transaction_type"></span>s</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableList" width="100%" cellspacing="0">
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated at <?php echo date('d-F-Y h:i:s a'); ?></div>
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!--modals-->
<!--meetingModal-->
<div class="modal fade" id="createMeetingModal" tabindex="-1" role="dialog" aria-labelledby="createMeetingModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url().'create_group/'.$this->uri->segment(1).'/'.$this->uri->segment(2);?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Meeting Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
            <div class="form-group col-sm-12">
              <label for="input_title">Title</label>
              <input class="form-control" id="input_title" type="text" aria-describedby="nameTitle" placeholder="Enter Title" name="title" required="">
            </div>
            <div class="form-group col-sm-12">
              <label for="input_phone">Description</label>
              <textarea class="form-control" id="input_description" aria-describedby=descriptionHelp" placeholder="Enter Description" cols="10" rows="4" name="description" required=""></textarea>
            </div>
            <div class="form-group col-sm-6">
              <label for="input_organizer">Organizer</label>
              <input class="form-control" id="input_organizer" type="text" aria-describedby="organizerHelp" placeholder="Enter Organizer" name="organizer" required="">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_venue">Venue</label>
              <input class="form-control" id="input_venue" type="text" aria-describedby="nameVenue" placeholder="Enter Venue" name="venue" required="">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_start_date">StartDate</label>
              <input class="form-control" id="input_start_date" type="date" aria-describedby="nameStartDate" placeholder="Enter StartDate" name="start_date" required="">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_start_date">EndDate</label>
              <input class="form-control" id="input_end_date" type="date" aria-describedby="nameEndDate" placeholder="Enter EndDate" name="end_date" required="">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_participants">Expected No. of Participants</label>

              <input class="form-control" id="input_participants" type="number" aria-describedby="nameParticipants" placeholder="Enter Participants" name="participants" required="" cata-toggle="tooltip" data-placement="top" title="Alert! You have exceeded the app wallet balance">
            </div>
            <div class="form-group col-sm-6">
              <label for="input_facilitators">Facilitators</label>
              <input class="form-control" id="input_facilitators" type="text" aria-describedby="nameFacilitators" placeholder="Enter Facilitators" name="facilitators" required="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="message_grp_btn" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--messageModal-->
<div class="modal fade" id="createMessageModal" tabindex="-1" role="dialog" aria-labelledby="createMessageModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url().'create_group/'.$this->uri->segment(1).'/'.$this->uri->segment(2);?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Message Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="input_name">Name</label>
              <input class="form-control" id="input_name" type="text" aria-describedby="nameHelp" placeholder="Enter Message Name" name="name" required="">
            </div>
            <div class="form-group">
              <label for="input_phone">Description</label>
              <textarea class="form-control" id="input_description" aria-describedby=descriptionHelp" placeholder="Enter Description" cols="10" rows="4" name="description" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--paymentModal-->
<div class="modal fade" id="createPaymentModal" tabindex="-1" role="dialog" aria-labelledby="createPaymentModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url().'create_group/'.$this->uri->segment(1).'/'.$this->uri->segment(2);?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Payment App</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="input_name">Name</label>
              <input class="form-control" id="input_name" type="text" aria-describedby="nameHelp" placeholder="Enter Payment Name" name="name" required="">
            </div>
            <div class="form-group">
              <label for="input_phone">Description</label>
              <textarea class="form-control" id="input_description" aria-describedby=descriptionHelp" placeholder="Enter Description" cols="10" rows="4" name="description" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--participantModal-->
<div class="modal fade" id="participantModal" tabindex="-1" role="dialog" aria-labelledby="participantModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Participant List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container-fluid">
          <div class="row">
            <div class="form-group col-md-5">
              <label for="participant_pname">Name</label>
              <input class="form-control" id="participant_name" type="text" aria-describedby="nameHelp" placeholder="Enter Participant Name" name="name" cata-toggle="tooltip" data-placement="top" title="Required! Participant Name">
            </div>
            <div class="form-group col-md-5">
              <label for="participant_phone">Phone</label>
              <input class="form-control" id="participant_phone" type="text" aria-describedby="nameHelp" placeholder="Enter Participant Phone" name="phone" cata-toggle="tooltip" data-placement="top" title="Required! Participant Phone">
            </div>
            <div class="form-group col-md-2">
              <label for="participant_savebtn">#</label>
              <button type="button" class="form-control btn btn-success btn-md" id="participant_savebtn"> <i class='fa fa-plus'></i> Save</button> 
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-condensed" id="participant_tbl">
                <caption>Participant List-<span id="participant_meeting_code"></span></caption>
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Options</th>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="participant_download"><i class="fa fa-download"></i> Download</button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var appID = "<?php echo ucwords($this->uri->segment(2)); ?>"
  var service = "<?php echo ucwords($this->uri->segment(1)); ?>"
  var dataURL = "../transactions/"+service+"/"+appID
  var editURL = "../manage_participant"
  var addURL = "../add_participant"
  var participantURL = "<?php echo base_url() . 'participants/'; ?>"
  var editTransactionURL = "../manage_transaction/"+service.toLowerCase()
  var code = ''
  var columns = {
    'meeting': {identifier: [5, 'id'], editable: [[1, 'description'], [2, 'end_date'], [3, 'exp_participants'], [4, 'facilitators'], [6, 'name'], [7, 'organizer'], [8, 'start_date'], [9, 'venue']]},
    'message': {identifier: [0, 'id'], editable: [[1, 'name'], [2, 'description']]},
    'payment': {identifier: [0, 'id'], editable: [[1, 'name'], [2, 'description']]}
  }
  $(function(){
    //Add dynamic label based on service
    addLabel(".transaction_type", service)
    //Add target create modal button
    $("#modalBtn").attr("data-target", "#create"+service+"Modal")
    //Add table based on service
    getTransactions(dataURL, columns[service.toLowerCase()])
    //Load Participants when Modal shown
    $("#participantModal").on("show.bs.modal", function(e) {
        code = $(e.relatedTarget).data('code');
        getParticipants(participantURL+code)
    });
    //Check balance limit
    $("#input_participants").on('keyup', function(){
      $("#message_grp_btn").attr("disabled", false);
      var wallet_bal = $(".wallet_bal").text().replace(',', '')
      var participants = $(this).val();
      var participant_rate = 5;
      if ((participant_rate * participants) > wallet_bal){
        $("#message_grp_btn").attr("disabled", true);
        $('#input_participants').tooltip('show');
      }
    });
    //Save new participant
    $('#participant_savebtn').click(function(){
      var name = $("#participant_name").val()
      var phone = $("#participant_phone").val()
      //Validate fields not empty
      if(name == ''){
        $('#participant_name').tooltip('show');
      }if(phone == ''){
        $('#participant_phone').tooltip('show');
      }else{
        $.post(addURL, {'name': name, 'phone': phone, 'code': code}, function(){
          $("#participant_name").val('')
          $("#participant_phone").val('')
          getParticipants(participantURL+code)
        });
      }
    });
    //Download partifcipant list
    $("#participant_download").click(function(){
      $("#participant_tbl").tableToCSV();
    });
  });

  function addLabel(className, label){
    $(className).text(label)
  }
  function getParticipants(participantURL){
    $("#participant_meeting_code").text(code)
    $.getJSON(participantURL, function(json){
      $("#participant_tbl").find('td:last-child, th:last-child').remove();
      $("#participant_tbl").dataTable(json);
      $('#participant_tbl').Tabledit({
        url: editURL,
        columns: {
            identifier: [0, 'id'],
            editable: [[1, 'name'], [2, 'phone']]
        },
        buttons: {
          edit: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-pencil-square-o"></span>',
              action: 'edit'
          },
          delete: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-trash-o"></span>',
              action: 'delete'
          }
        },
        onSuccess: function(data, textStatus, jqXHR) {
          getParticipants(participantURL)
        }
      });
    });
  }
  function getTransactions(dataURL, columns){
    $.getJSON(dataURL, function(jsondata){
      $('#dataTableList').dataTable(jsondata);
      //Addd edit/delete options based on service
      $('#dataTableList').Tabledit({
        url: editTransactionURL,
        columns: columns,
        buttons: {
          edit: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-pencil-square-o"></span>',
              action: 'edit'
          },
          delete: {
              class: 'btn btn-sm btn-default',
              html: '<span class="fa fa-trash-o"></span>',
              action: 'delete'
          }
        },
        onSuccess: function(data, textStatus, jqXHR) {
          getTransactions(dataURL, columns[service.toLowerCase()])
        }
      });
    });
  }
</script>