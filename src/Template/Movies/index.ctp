<script>
	/*$(document).click(function(e)
	{
		alert(e.target.id);
		
		if (e.target.id.indexOf("answers_") > -1)
		{
		    var id = e.target.id.replace('answers_', '');

			$.ajax({
				type: 'GET',
				cache: false,
				url: 'http://localhost:4221/asdfasdf/movies/dse/' + id + '/234234234'
			})
			.done(function (msg) {	
				alert(msg);
			})
			.fail(function(jqXHR, textStatus, errorThrown)zses
			{
				alert(textStatus + ' - ' + errorThrown);
			});
		}
	});*/
	
	var globalVariable = '<?= $logline1['TSL_ID']; ?>,<?= $logline2['TSL_ID']; ?>,<?= $logline3['TSL_ID']; ?>,<?= $logline4['TSL_ID']; ?>';
	var asdfasddf = 0;
	
	$(document).ready(function(){
		$(document).on("click", ".answers", function () {
		
			if (asdfasddf == 1)			
				return false;
				
			tsl_id = this.id.replace('answers_', '');
			$.ajax({
				type: 'GET',
				cache: false,
				url: 'http://localhost:4322/asdfasdf/movies/dse/' + this.id + '/' + document.getElementById('tsl').getAttribute("tslid").replace('/', '-YTYTY-').replace('/', '-YTYTY-') + '/' + globalVariable
			})
			.done(function (msg) {

				if (msg.indexOf('_') > -1)
				{
					splitMsg = msg.split('_');
					msg = splitMsg[0];
					xier = splitMsg[1];
				}
					
				if(msg == 'oi')
				{
					$("#areyoucorrecttext, #areyoucorrect, #keier_" + tsl_id).css('padding', '2px').css('border', '2px solid green');
					$("#areyoucorrecttext").text('Correct');
				}
				else
				{
					$("#areyoucorrecttext, #areyoucorrect, #keier_" + tsl_id).css('padding', '2px').css('border', '2px solid red');
					$("#areyoucorrecttext").text('Incorrect');
					
					$("#keier_" + xier).css('padding', '2px').css('border', '2px solid green');
				}
				
				$("#areyoucorrecttext, #areyoucorrect, #keier_" + tsl_id).css('background', '#F5F5F5');
				
				asdf = globalVariable.split(',');
				
				for (i=0; i<=asdf.length - 1;i++) {
					if(asdf[i] != tsl_id)
					{
						$("#keier_" + asdf[i]).css('background', 'silver');
					}
				}

				asdfasddf = 1;
			})
			.fail(function(jqXHR, textStatus, errorThrown)
			{
				alert(textStatus + ' - ' + errorThrown);
			});
			
			return true;
		});
	});
</script>
<div class="fc-tab-1">   
  <div class="home-container">
	<div class="row">
	  <div class="col-md-12">
		<div class="left-content">
		  <?= $this->Flash->render() ?>
		  <div class="left-line"></div> 
		  <h2>What's That <em>Movie</em>?</h2>
			<div id="areyoucorrect">
				<p id="tsl" tslid="<?= $TSL_ID; ?>"><?= $TSL_Logline; ?></p>
			</div>
		  <div class="primary-button" style="float: left; width: 50%">
			<a href="#" id="areyoucorrecttext">Chooose...</a>
		  </div>
		  <div style="float: right; width: 50%; margin-top: 22px">
			<ul class="">
				<li class="asdf" id="keier_<?= $logline1['TSL_ID']; ?>"><a name="d"><span class="answers" id="answers_<?= $logline1['TSL_ID']; ?>"><?= $logline1['TSL_Name']; ?></span></a></li>
				<li class="asdf" id="keier_<?= $logline2['TSL_ID']; ?>"><a name="e"><span class="answers" id="answers_<?= $logline2['TSL_ID']; ?>"><?= $logline2['TSL_Name']; ?></span></a></li>
				<li class="asdf" id="keier_<?= $logline3['TSL_ID']; ?>"><a name="f"><span class="answers" id="answers_<?= $logline3['TSL_ID']; ?>"><?= $logline3['TSL_Name']; ?></span></a></li>  			
				<li class="asdf" id="keier_<?= $logline4['TSL_ID']; ?>"><a name="g"><span class="answers" id="answers_<?= $logline4['TSL_ID']; ?>"><?= $logline4['TSL_Name']; ?></span></a></li>
			</ul>
		  </div>
		  <div>&nbsp;</div>
		</div>
	  </div>
	</div>
  </div>
  <br />
