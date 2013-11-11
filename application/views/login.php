<section>
		<div id="sectionContent0">
			<h2 id="headerTitle">Login</h2>
			<div id="inputContainer">
				<?php echo form_open('main/login'); ?>				
					<label for="email" class="labelInput">Email:</label>
					<span class="redColor"> *</span>
					
					<input type="email" name="email" id="email" value="someone@hotmail.com"/><br />
					
					<label for="password" class='labelInput'>Password:</label>
					<span class="redColor"> *</span>
					
					<?php 
						$passwordData=array(
							'name' => 'password',
							'id' => 'password',
							'class' => 'password'						
						);
						echo form_password($passwordData);						
					?>
						<input type="checkbox" class="showPassword"/>
					<?php
						$submitData=array(
							'name' => 'buttonSubmit',
							'id' => 'buttonSubmit',
							'class' => 'button0',
							'value' => 'Login'						
						);
						echo form_submit($submitData);
						echo form_close();
					?>	
					<p id="pCreateAccount">Click <a href="#" id="createAccount">here</a> to create a new account</p>
			</div>
			<div id="createAccountContent">
				<?php echo form_open('main/createAccount');?>
				<label for="firstName" class="labelInput">Firstname:</label><span class="redColor">&nbsp&nbsp&nbsp</span>
				<?php					
					
					$firstName=array(
						'id' => 'firstName',
						'name' => 'firstName',
						'class'=> ''						
					);
					echo form_input($firstName);
				?>
				<br /><label for="lastName" class="labelInput">Lastname:</label><span class="redColor">&nbsp&nbsp&nbsp</span>
				<?php					
					$lastName=array(
						'id' => 'lastName',
						'name' => 'lastName',
						'class'=> ''						
					);
					echo form_input($lastName);
				?>
				<br /><label for="email1" class="labelInput">Username:</label><span class="redColor"> *</span>
				<input type="email" name="email1" id="email1" value="someone@hotmail.com"/>
				<br /><label for="newPassword" class="labelInput">Password:</label><span class="redColor"> *</span>
				<?php 
					$passwordData1=array(
						'id' => 'password1',
						'name' => 'password1',
						'class'=> 'password'
					);
					echo form_password($passwordData1);
				?>
				<input type="checkbox" class="showPassword"/>
				<br /><label for="newPasswordCheck" class="labelInput">Repeat password:</label><span class="redColor"> *</span>
				<?php 
					$passwordData2=array(
						'id' => 'password2',
						'name' => 'password2',
						'class'=> 'password'
					);
					echo form_password($passwordData2);
					$submitData1=array(
							'name' => 'buttonSubmit1',
							'id' => 'buttonSubmit1',
							'class' => 'button0',
							'value' => 'Apply'						
						);
						echo form_submit($submitData1);
				?>
				
				<?php
					echo form_close();
				?>
				
			</div>		
		</div>			
</section>
<aside></aside>
<script type="text/javascript" src="<?php echo base_url()?>public/js/login.js"></script>

