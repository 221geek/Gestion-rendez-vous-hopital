<?php

	$sql = "SELECT id, patient, medecin, start, color FROM rendezVous ";

	$req = $bdd->prepare($sql);
	$req->execute();

	$events = $req->fetchAll();

	$requete = $bdd->prepare("SELECT * FROM users WHERE id_role = 3");
	$requete->execute();

	$medecin = $requete->fetchAll();

?>

    <style>
		#calendar {
			max-width: 800px;
		}
		.col-centered{
			float: none;
			margin: 0 auto;
		}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Page Content -->
	

    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Rendez-vous dalal Jamm</h1>
                <p class="lead">Programmer, modifier ou supprimer des Rendez-vous</p>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="app/config/addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ajouter un Rendez-vous</h4>
			  </div>
			  <div class="momodaldal-body">
				
				  <div class="form-group">
					<label for="patient" class="col-sm-2 control-label">Patient</label>
					<div class="col-sm-10">
					  <input type="text" name="patient" class="form-control" id="patient" placeholder="patient">
					</div>
				  </div>
				  <div class="form-group">
					<label for="medecin" class="col-sm-2 control-label">Medecin</label>
					<div class="col-sm-10">
					  <select name="medecin" class="form-control" id="medecin">
							<option value="">Choisir un medecin</option>
							<?php for ($i=0; $i < sizeof($medecin); $i++) { ?>
								<option value="<?php echo $medecin[$i]['id'];?>"><?php echo "Docteur ".$medecin[$i]['prenom']." ".$medecin[$i]['nom']; ?></option>
							<?php } ?>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Date</label>
					<div class="col-sm-10">
						<div class="form-row">
							<div class="col">
								<select class="form-control heure" name="">
									<?php for ($i=8; $i < 13; $i++) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?> h</option>
									<?php } ?>
									<?php for ($i=15; $i < 18; $i++) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?> h</option>
									<?php } ?>
								</select>
							</div>
							<div class="col">
								<select class="form-control minutes" name="">
									<?php for ($i=00; $i < 60; $i+=15) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?> min</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<input type="hidden" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Choisir la couleur</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Bleu</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Vert</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Jaune</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>
						  <option style="color:#000;" value="#000">&#9724; Noir</option>
						</select>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary">Enregistrer</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="app/config/editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editer ce rendez-vous</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="patient" class="col-sm-2 control-label">Patient</label>
					<div class="col-sm-10">
					  <input type="text" name="patient" class="form-control" id="patient" placeholder="patient">
					</div>
				  </div>
				  <div class="form-group">
					<label for="medecin" class="col-sm-2 control-label">Changer le medecin</label>
					<div class="col-sm-10">
					  <select name="medecin" class="form-control" id="medecin">
							<?php for ($i=0; $i < sizeof($medecin); $i++) { ?>
								<option value="<?php echo $medecin[$i]['id'];?>"><?php echo "Docteur ".$medecin[$i]['prenom']." ".$medecin[$i]['nom']; ?></option>
							<?php } ?>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Changer la couleur</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Annuler le rendez-vous</label>
						  </div>
						</div>
					</div>
				  <input type="hidden" name="id" class="form-control" id="id">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary">Valider</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="datervchange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Changement de date</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Le rendez-vous a été déplacé
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>

    </div>
    <!-- /.container -->

	<script>

	
	$("select.heure").change(function(){
		var heure = $(this).children("option:selected").val();
		$("select.minutes").change(function(){
			var minutes = $(this).children("option:selected").val();
		});
	});

	dateauj = new Date();
	today = dateauj.getFullYear()+"-"+(dateauj.getMonth()+1)+"-"+dateauj.getDate()

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			businessHours:{
				dow: [ 1, 2, 3, 4, 5, 6 ], // Lundi, Mardi, 
				start: '08:00', // 8am
				end: '18:00' // 6pm
			},
			eventConstraint:"businessHours",
			viewRender: function (view, e) {
				var bh = view.options.businessHours,
					startDate = view.start;

				if (view.type === "agendaDay" && bh.dow.indexOf(startDate.day()) === -1) {
					$('#calendar').fullCalendar('renderEvent', {
						start: moment(startDate),
						end: moment(view.end),
						rendering: 'background',
						className: 'fc-nonbusiness'
					}, false);

					$('#calendar').fullCalendar('renderEvent', {
						start: moment(startDate),
						allDay: true,
						rendering: 'background',
						className: 'fc-nonbusiness'
					}, false);
				}
			},
			defaultDate: today,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			timeFormat: 'H(:mm)',
			eventConstraint: {
				start: moment().format('YYYY-MM-DD'),
				end: '2100-01-01' // hard coded goodness unfortunately
			},
			select: function(start) {
				if(start.isBefore(moment())) {
					$('#calendar').fullCalendar('unselect');
					return false;
				}
					$('#ModalAdd #date').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #patient').val(event.patient);
					$('#ModalEdit #medecin').val(event.medecin);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);
				
			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['patient']; ?>',
					patient: '<?php echo $event['patient']; ?>',
					medecin: '<?php echo $event['medecin']; ?>',
					start: '<?php echo $start; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});

		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			
			$.ajax({
			 url: 'app/config/editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						$('#datervchange').modal('show');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
		
	});

</script>