<div class="fc-tab-4">
	     <?= $this->Flash->render() ?>
  <div class="contact-container">
	<div class="row">

	  <div class="col-md-6">
		<div class="contact-form">
		  <div class="heading">
			<h2>Say Tello</h2>
		  </div>
				<?= $this->Form->create($add) ?>
				<?= $this->Form->control('usr_username', ['label' => 'Username']) ?>
				<?= $this->Form->control('USR_Password', ['label' => 'Password']) ?>
				<?= $this->Form->control('USR_ierjd', ['label' => 'Password']) ?>
				<?= $this->Form->button('Add') ?>
				<?= $this->Form->end() ?>
           </div>
        </div>
    </div>
</div>