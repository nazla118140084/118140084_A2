<?php echo doctype('html5'); ?>
<html>
<head>
	<title>Login</title>
</head>
<body>
	 <div class="center-login">

        <h2>Login User</h2>
        <div class="border-title"></div>

        <?php
            if($this->session->flashdata('success') <> ''){
        ?>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
        <?php
                echo br(2 );
            } else if($this->session->flashdata('danger') <> ''){
        ?>
            <p class="danger"><?php echo $this->session->flashdata('danger'); ?></p>
        <?php
                echo br(2 );
            }
        ?>
      <?php

        validation_errors();

        $username = array(
            'name'            => 'username',
            'type'            => 'text',
            'value'           => "",
            'class'           => 'form-login',
        );

        $password = array(
            'name'            => 'password',
            'type'            => 'password',
            'value'           => "",
            'class'           => 'form-login',
        );

        $submit = array(
            'name'            => 'insertusers',
            'type'            => 'submit',
            'value'           => 'Login Data',
            'class'           => 'form-button'
        );

        echo  form_open_multipart('home/loginAction');

          echo form_label('Username');
          echo br(1);
          echo form_input($username);
          echo form_error('username');
          echo br(2);


          echo form_label('Password');
          echo br(1);
          echo form_input($password);
          echo form_error('password');
          echo br(2);

          echo form_submit($submit);
          echo br(2);

        echo form_close();

        if ($this->session->flashdata('sukses_insert_users') <> '') {
          echo $this->session->flashdata('sukses_insert_users');
        }

        ?>

        <?php echo anchor('home/register/', 'Buat Akun', ['class' => 'register']); ?>	
    </div>

</body>
</html>