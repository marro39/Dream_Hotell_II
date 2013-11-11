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
							'id' => 'password'						
						);
						echo form_password($passwordData);						
					?>
						<input type="checkbox" id=""/>
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
				<label for="firstName" class="labelInput">Firstname </label><span class="redColor"> *</span>
				<?php					
					echo form_open('main/createAccount');
					$firstName=array(
						'id' => 'firstName',
						'name' => 'firstName',
						'class'=> ''						
					);
					echo form_input($firstName);
				?>
				<br /><label for="lastName" class="labelInput">Lastname </label><span class="redColor">*</span>
				<?php					
					$lastName=array(
						'id' => 'lastName',
						'name' => 'lastName',
						'class'=> ''						
					);
					echo form_input($lastName);
				?>
				<label for="email1" class="labelInput">Username </label><span class="redColor">*</span>
				<input type="email" name="email1" id="email1" value="someone@hotmail.com"/><br />
				
				
				<?php
					echo form_close();
				?>
				
			</div>		
		</div>			
</section>
<aside></aside>

