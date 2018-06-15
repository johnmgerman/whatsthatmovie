
<div class="fc-tab-4">
	     <?= $this->Flash->render() ?>
  <div class="contact-container">
	<div class="row">

	  <div class="col-md-6">
		<div class="contact-form">
		  <div class="heading">
			<h2>Say Tello</h2>
		  </div>
                <?php
					echo $this->Form->create($contact);
					echo $this->Form->control('CON_Name', ['label' => 'Name']);
					echo $this->Form->control('CON_Subject', ['label' => 'Subject']);
					echo $this->Form->control('CON_Email', ['label' => 'Email']);
					echo $this->Form->control('CON_Message', ['label' => 'Message']);
					echo $this->Form->button('Submit');
					echo $this->Form->end();
				?>
           </div>
        </div>
		  <div class="col-md-6">
			<div class="more-info">
			  <p>...</p>
			</div>
		  </div>
    </div>
</div>